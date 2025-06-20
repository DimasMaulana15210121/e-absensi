<?php 
namespace App\Controllers;

use App\Models\M_User;
use App\Models\M_Gambar;
use App\Models\M_Karyawan;
use App\Models\M_Jabatan;
use App\Models\M_Absen;
use App\Models\M_Izin;


class Admin extends BaseController
{
    public function dashboard()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelKaryawan = new M_Karyawan;
        $modelJabatan = new M_Jabatan;
        $modelAbsen = new M_Absen;

        $dataKaryawan = $modelKaryawan->getDataKaryawan()->getResultArray();
        $dataJabatan = $modelJabatan->getDataJabatan()->getResultArray();
        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_jadwal.tanggal' => date('Y-m-d')])->getResultArray();
        //Mengambil data count seluruh status
        $dataHadir = $modelAbsen->getDataAbsen(['tbl_absen.status' => 'Hadir', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataTerlambat = $modelAbsen->getDataAbsen(['tbl_absen.status' => 'Terlambat', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataAlpha = $modelAbsen->getDataAbsen(['tbl_absen.status' => 'Alpha', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataCuti = $modelAbsen->getDataAbsen(['tbl_absen.status' => 'Cuti', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataIzin = $modelAbsen->getDataAbsen(['tbl_absen.status' => 'Izin', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        
        $data['data_hadir'] = $dataHadir;
        $data['data_terlambat'] = $dataTerlambat;
        $data['data_alpha'] = $dataAlpha;
        $data['data_cuti'] = $dataCuti;
        $data['data_izin'] = $dataIzin;
        
        $data['page'] = $page;
        $data['data_karyawan'] = $dataKaryawan;
        $data['data_jabatan'] = $dataJabatan;
        $data['data_absen'] = $dataAbsen;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/dashboard', $data);
        echo view('Backend/template/footer', $data);
    }

    public function detail_absen_karyawan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idAbsen = $uri->getSegment(3);
        $idKaryawan = $uri->getSegment(4);

        $modelAbsen = new M_Absen;
        $modelKaryawan = new M_Karyawan;
        $modelIzin = new M_Izin;

        $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_absen)' => $idAbsen,'tbl_jadwal.tanggal' => date('Y-m-d')])->getRowArray();
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['sha1(tbl_karyawan.id_karyawan)' => $idKaryawan])->getRowArray();
        $dataIzin = $modelIzin->getDataIzin(['sha1(tbl_izin.id_karyawan)' => $idKaryawan])->getRowArray();

        if ($dataAbsen['keterangan_absen'] == 'masuk') {
            //Jika belum absen
            if ($dataAbsen['status'] == null) {
                session()->setFlashdata('info','Karyawan Ini Belum Melakukan Absensi !');
                return redirect()->to(base_url('/hr/dashboard'));
            }
            elseif ($dataAbsen['status'] == 'Alpha') {
                session()->setFlashdata('info','Karyawan Ini Tidak Hadir !');
                return redirect()->to(base_url('/hr/dashboard'));
            }
            //Jika status nya cuti
            elseif ($dataAbsen['status'] == 'Cuti') {
                session()->setFlashdata('info','Karyawan Ini Sedang Cuti Dari Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/hr/dashboard'));
            }
            //Jika status nya izin
            elseif ($dataAbsen['status'] == 'Izin') {
                session()->setFlashdata('info','Karyawan Ini Sedang Izin Dari Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/hr/dashboard'));
            }
        } else {
            session()->setFlashdata('info','Hari Ini Adalah Hari Libur !');
            return redirect()->to(base_url('/hr/dashboard'));
        }
        
        $data['page'] = $page;
        $data['data_absen'] = $dataAbsen;
        $data['data_karyawan'] = $dataKaryawan;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterAbsen/detail-absen-karyawan', $data);
        echo view('Backend/template/footer', $data);   
    }

    public function profile_admin()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelUser = new M_User;
        $dataUser = $modelUser->getDataUser(['id_user' => session('ses_id')])->getRowArray();
        
        $data['page'] = $page;
        $data['data_admin'] = $dataUser;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterAdmin/edit-profile-admin', $data);
        echo view('Backend/template/footer', $data);
    }

    public function simpan_profile_admin()
    {
        $uri = service('uri');
        // $idEdit = $uri->getSegment(3);

        $modelUser = new M_User();

        $nama_user = $this->request->getPost('nama_user');
        $username = $this->request->getPost('username');
        $password_old = $this->request->getPost('password');
        $foto_user_old = $this->request->getPost('foto_user_old');
        $foto_user = $this->request->getFile('foto_user');

        $dataUser = $modelUser->getDataUser(['id_user' => session('ses_id')])->getRowArray();
        $idUpdate = session()->get('ses_id');

        if ($foto_user->isValid() && !$foto_user->hasMoved()) {
            // Validasi file
            if (!$this->validate([
                'foto_user' => 'max_size[foto_user,10240]|ext_in[foto_user,jpg,jpeg,png]',
            ])) {
                session()->setFlashdata('error', "Format file yang diizinkan: JPG, JPEG, PNG maksimal 10MB");
                return redirect()->to('/hr/profile-admin')->withInput();
            }
        
            $ext1 = $foto_user->getClientExtension();
            $namaFile1 = ($foto_user_old == '-' || !file_exists("Assets/img/user/".$foto_user_old))
                ? "PP-".date("ymdHis").".".$ext1
                : $foto_user_old;
        
            $foto_user->move('Assets/img/user/', $namaFile1, true);
        } else {
            $namaFile1 = $foto_user_old; // Tidak upload, pakai yang lama
        }

            $dataUpdate = [
                'nama_user' => $nama_user,
                'username' => $username,
                'password' => ($password_old == '') ? $dataUser['password'] : password_hash($password_old, PASSWORD_DEFAULT),
                'foto_user' => $namaFile1,
                'updated_at' => date('Y-m-d H:i:s')
            ];

        $whereUpdate = ['id_user' => $idUpdate];
        $modelUser->updateDataUser($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Berhasil Diperbarui!!');
        // return redirect()->to(base_url('/admin/master-data-karyawan'));
    }

    public function logo_perusahaan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelGambar = new M_Gambar;

        $dataGambar = $modelGambar->getDataGambar()->getResultArray();

        $data['data_gambar'] = $dataGambar;
        $data['page'] = $page;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterGambar/logo-perusahaan', $data);
        echo view('Backend/template/footer', $data);
    }

    public function simpan_logo_perusahaan()
    {
        $modelGambar = new M_Gambar;

        $nama_pt = $this->request->getPost('nama_pt');
        $bagian = $this->request->getPost('bagian');

        $sqlCek = $modelGambar->getDataGambar(['bagian' => $bagian]);
        $cekBagian = $sqlCek->getNumRows();
        if($bagian ==""){
            session()->setFlashdata('error','Data Bagian Tidak boleh Kosong!');
            return redirect()->to(base_url('/hr/logo-perusahaan'))->withInput();
        }

        elseif ($cekBagian > 0 ) {
            session()->setFlashdata('error','Bagian Sudah Ditambahkan Dan Tidak Bisa Ditambahkan Lagi, Silahkan Edit Bagian !');
            return redirect()->to(base_url('/hr/logo-perusahaan'))->withInput();
        }
        else{
            $gambar = $this->request->getFile('gambar');
            if ($gambar->isValid() && !$gambar->hasMoved()) {
                $ext1 = $gambar->getClientExtension();
                $namaFile1 = "LOGO-" . date("ymdHis") . "." . $ext1;
                $gambar->move('Assets/img/logo', $namaFile1);
            } else {
                $namaFile1 = '-'; // atau bisa juga null, tergantung kebutuhan database
            };
            
            $hasil = $modelGambar->autoNumber()->getRowArray();
            if (!$hasil) {
                $id = "GMB".date("Ymd")."00001";
            } else {
                $kode = $hasil['id_gambar'];
                $noUrut = (int) substr($kode, -5);
                $noUrut++;
                $id = "GMB".date("Ymd").sprintf("%05s", $noUrut);
            }

        $dataSimpan = [
            'id_gambar' => $id,
            'nama_pt' => $nama_pt,
            'gambar' => $namaFile1,
            'bagian' => $bagian,
            'is_delete_gambar' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $modelGambar->saveDataGambar($dataSimpan);

        session()->setFlashdata('success','Data Logo Perusahaan berhasil ditambahkan!!');
        return redirect()->to(base_url('/hr/logo-perusahaan'));
        }
    }

    public function edit_logo()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelGambar = new M_Gambar;
        $dataGambar = $modelGambar->getDataGambar(['sha1(id_gambar)' => $idEdit])->getRowArray();
        
        $data['page'] = $page;
        $data['data_logo'] = $dataGambar;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterGambar/edit-logo', $data);
        echo view('Backend/template/footer', $data);
    }

    public function update_logo_perusahaan()
    {
        $uri = service('uri');
        $idEdit = $uri->getSegment(3);

        $modelGambar = new M_Gambar();

        $nama_pt = $this->request->getPost('nama_pt');
        $bagian = $this->request->getPost('bagian');
        $gambar_old = $this->request->getPost('gambar_old');
        $gambar = $this->request->getFile('gambar');

        $dataGambar = $modelGambar->getDataGambar(['id_gambar' => $idEdit])->getRowArray();
        $idUpdate = $dataGambar['id_gambar'];

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Validasi file
            if (!$this->validate([
                'gambar' => 'max_size[gambar,10240]|ext_in[gambar,jpg,jpeg,png]',
            ])) {
                session()->setFlashdata('error', "Format file yang diizinkan: JPG, JPEG, PNG maksimal 10MB");
                return redirect()->to('/hr/edit-logo-perusahaan/'.$idEdit)->withInput();
            }
        
            $ext1 = $gambar->getClientExtension();
            $namaFile1 = ($gambar_old == '-' || !file_exists("Assets/img/logo/".$gambar_old))
                ? "PP-".date("ymdHis").".".$ext1
                : $gambar_old;
        
            $gambar->move('Assets/img/logo/', $namaFile1, true);
        } else {
            $namaFile1 = $gambar_old; // Tidak upload, pakai yang lama
        }

            $dataUpdate = [
                'nama_pt' => $nama_pt,
                'bagian' => $bagian,
                'gambar' => $namaFile1,
                'updated_at' => date('Y-m-d H:i:s')
            ];

        $whereUpdate = ['id_gambar' => $idUpdate];
        $modelGambar->updateDataGambar($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Berhasil Diperbarui!!');
        return redirect()->to(base_url('/hr/logo-perusahaan'));
    }

    public function hapus_logo_perusahaan($id)
    {
        $modelGambar = new M_Gambar;
    
        $modelGambar->hapusDataGambar($id);
        
        session()->setFlashdata('success','Data Berhasil dihapus!!');

        return redirect()->to(base_url('/hr/logo-perusahaan'));
    }
}