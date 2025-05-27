<?php 
namespace App\Controllers;

use App\Models\M_Karyawan;
use App\Models\M_Jabatan;
use App\Models\M_Absen;
use App\Models\M_Lokasi;


class Karyawan extends BaseController
{
    public function master_karyawan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelKaryawan = new M_Karyawan;
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['is_delete_karyawan' => '0'])->getResultArray();
        
        $data['page'] = $page;
        $data['data_karyawan'] = $dataKaryawan;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterKaryawan/master-data-karyawan', $data);
        echo view('Backend/template/footer', $data);
    }
    
    public function tambah_data_karyawan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelJabatan = new M_Jabatan;
        $modelLokasi = new M_Lokasi;

        $dataJabatan = $modelJabatan->getDataJabatan(['is_delete_jabatan' => '0'])->getResultArray();
        $dataLokasi = $modelLokasi->getDataLokasi(['is_delete_lokasi' => '0'])->getResultArray();
        
        $data['page'] = $page;
        $data['data_jabatan'] = $dataJabatan;
        $data['data_lokasi'] = $dataLokasi;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterKaryawan/tambah-data-karyawan', $data);
        echo view('Backend/template/footer', $data);
    }

    public function simpan_data_karyawan()
    {
        $modelKaryawan = new M_Karyawan();

        $id_lokasi = $this->request->getPost('id_lokasi');
        $nik_karyawan = $this->request->getPost('nik_karyawan');
        $nama_karyawan = $this->request->getPost('nama_karyawan');
        $alamat_rumah = $this->request->getPost('alamat_rumah');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $no_hp = $this->request->getPost('no_hp');
        $id_jabatan = $this->request->getPost('id_jabatan');
        $username = $this->request->getPost('username');

        $foto_karyawan = $this->request->getFile('foto_karyawan');
        if ($foto_karyawan->isValid() && !$foto_karyawan->hasMoved()) {
            $ext1 = $foto_karyawan->getClientExtension();
            $namaFile1 = "PP-" . date("ymdHis") . "." . $ext1;
            $foto_karyawan->move('Assets/img/karyawan', $namaFile1);
        } else {
            $namaFile1 = '-'; // atau bisa juga null, tergantung kebutuhan database
        };

        $sqlCek1 = $modelKaryawan->getDataKaryawan(['tbl_karyawan.nik_karyawan' => $nik_karyawan]);
        $sqlCek2 = $modelKaryawan->getDataKaryawan(['tbl_karyawan.username' => $username]);
        $cekNik = $sqlCek1->getNumRows();
        $cekUser = $sqlCek2->getNumRows();
        if($id_jabatan ==""){
            session()->setFlashdata('error','Data Jabatan Tidak boleh Kosong!');
            return redirect()->to(base_url('/admin/tambah-data-karyawan'))->withInput();
        }
        elseif ($cekNik > 0 || $cekUser > 0) {
            session()->setFlashdata('error','NIK atau Username sudah ada!');
            return redirect()->to(base_url('/admin/tambah-data-karyawan'))->withInput();
        }
        else{
        $hasil = $modelKaryawan->autoNumber()->getRowArray();
        if (!$hasil) {
            $id = "KRY".date("Ymd")."00001";
        } else {
            $kode = $hasil['id_karyawan'];
            $noUrut = (int) substr($kode, -5);
            $noUrut++;
            $id = "KRY".date("Ymd").sprintf("%05s", $noUrut);
        }

        $dataSimpan = [
            'id_karyawan' => $id,
            'id_lokasi' => $id_lokasi,
            'nik_karyawan' => $nik_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'alamat_rumah' => $alamat_rumah,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'id_jabatan' => $id_jabatan,
            'username' => $username,
            'password' => password_hash('user123', PASSWORD_DEFAULT),
            'foto_karyawan' => $namaFile1,
            'is_delete_karyawan' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $modelKaryawan->saveDataKaryawan($dataSimpan);

        session()->setFlashdata('success','Data Karyawan berhasil ditambahkan!!');
        return redirect()->to(base_url('/admin/master-data-karyawan'));
        }
    }

    public function edit_data_karyawan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelJabatan = new M_Jabatan;
        $modelKaryawan = new M_Karyawan;
        $modelLokasi = new M_Lokasi;

        
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['sha1(tbl_karyawan.id_karyawan)' => $idEdit])->getRowArray();
        $dataJabatan = $modelJabatan->getDataJabatan(['is_delete_jabatan' => '0'])->getResultArray();
        $dataLokasi = $modelLokasi->getDataLokasi(['is_delete_lokasi' => '0'])->getResultArray();
        
        $data['page'] = $page;
        $data['data_jabatan'] = $dataJabatan;
        $data['data_karyawan'] = $dataKaryawan;
        $data['data_lokasi'] = $dataLokasi;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterKaryawan/edit-data-karyawan', $data);
        echo view('Backend/template/footer', $data);
    }

    public function update_data_karyawan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelKaryawan = new M_Karyawan();

        $id_lokasi = $this->request->getPost('id_lokasi');
        $nik_karyawan = $this->request->getPost('nik_karyawan');
        $nama_karyawan = $this->request->getPost('nama_karyawan');
        $alamat_rumah = $this->request->getPost('alamat_rumah');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $no_hp = $this->request->getPost('no_hp');
        $id_jabatan = $this->request->getPost('id_jabatan');
        $username = $this->request->getPost('username');
        $password_old = $this->request->getPost('password');
        $foto_karyawan_old = $this->request->getPost('foto_karyawan_old');
        $foto_karyawan = $this->request->getFile('foto_karyawan');

        $dataKaryawan = $modelKaryawan->getDataKaryawan(['id_karyawan' => $idEdit])->getRowArray();
        $idUpdate = $dataKaryawan['id_karyawan'];

        if ($foto_karyawan->isValid() && !$foto_karyawan->hasMoved()) {
            // Validasi file
            if (!$this->validate([
                'foto_karyawan' => 'max_size[foto_karyawan,10240]|ext_in[foto_karyawan,jpg,jpeg,png]',
            ])) {
                session()->setFlashdata('error', "Format file yang diizinkan: JPG, JPEG, PNG maksimal 10MB");
                return redirect()->to('/admin/master-data-karyawan')->withInput();
            }
        
            $ext1 = $foto_karyawan->getClientExtension();
            $namaFile1 = ($foto_karyawan_old == '-' || !file_exists("Assets/img/karyawan/".$foto_karyawan_old))
                ? "PP-".date("ymdHis").".".$ext1
                : $foto_karyawan_old;
        
            $foto_karyawan->move('Assets/img/karyawan/', $namaFile1, true);
        } else {
            $namaFile1 = $foto_karyawan_old; // Tidak upload, pakai yang lama
        }

            $dataUpdate = [
                'id_lokasi' => $id_lokasi,
                'nik_karyawan' => $nik_karyawan,
                'nama_karyawan' => $nama_karyawan,
                'alamat_rumah' => $alamat_rumah,
                'tgl_lahir' => $tgl_lahir,
                'no_hp' => $no_hp,
                'id_jabatan' => $id_jabatan,
                'username' => $username,
                'password' => ($password_old == '') ? $dataKaryawan['password'] : password_hash($password_old, PASSWORD_DEFAULT),
                'foto_karyawan' => $namaFile1,
                'updated_at' => date('Y-m-d H:i:s')
            ];

        $whereUpdate = ['id_karyawan' => $idUpdate];
        $modelKaryawan->updateDataKaryawan($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Berhasil Diperbarui!!');
        return redirect()->to(base_url('/admin/master-data-karyawan'));
    }

    public function hapus_data_karyawan($id)
    {
 
        $modelKaryawan = new M_Karyawan;
        $modelAbsen = new M_Absen;
    
        $modelKaryawan->hapusDataKaryawan($id);
        $modelAbsen->hapusDataAbsen('id_karyawan', $id);
        
        session()->setFlashdata('success','Data Karyawan Berhasil dihapus!!');

        return redirect()->to(base_url('/admin/master-data-karyawan'));
    }

    // public function simpan_data_jabatan()
    // {
    //     $modelJabatan = new M_Jabatan;

    //     $nama_jabatan = $this->request->getPost('nama_jabatan');

        // $hasil = $modelJabatan->autoNumber()->getRowArray();
        // if (!$hasil) {
        //     $id = "JBT".date("Ymd")."00001";
        // } else {
        //     $kode = $hasil['id_jabatan'];
        //     $noUrut = (int) substr($kode, -5);
        //     $noUrut++;
        //     $id = "JBT".date("Ymd").sprintf("%05s", $noUrut);
        // }

    //     $dataSimpan = [
    //         'id_jabatan' => $id,
    //         'nama_jabatan' => $nama_jabatan,
    //         'is_delete_jabatan' => '0',
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ];
    //     $modelJabatan->saveDataJabatan($dataSimpan);
    //     session()->setFlashdata('success', 'Permohonan izin berhasil ditambahkan!!');
    //     return redirect()->to(base_url('/admin/master-data-jabatan'));
    // }

    // public function update_data_jabatan()
    // {
    //     $modelJabatan = new M_Jabatan;

    //     $nama_jabatan = $this->request->getPost('edit_nama_jabatan');
    //     $dataJabatan = $modelJabatan->getDataJabatan(['is_delete_jabatan' => '0'])->getRowArray();
    //     $idUpdate = $dataJabatan['id_jabatan'];

    //     $dataUpdate = [
    //         'nama_jabatan' => $nama_jabatan,
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ];
    //     $whereUpdate = ['id_jabatan' => $idUpdate];
    //     $modelJabatan->updateDataJabatan($dataUpdate, $whereUpdate);
    //     session()->remove('idUpdate');
    //     session()->setFlashdata('success','Data Berhasil Diperbarui!!');
    //     return redirect()->to(base_url('/admin/master-data-jabatan'));
    // }
}