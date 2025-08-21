<?php
namespace App\Controllers;

use App\Models\M_Gaji;
use App\Models\M_Jabatan;
use App\Models\M_Karyawan;
use App\Models\M_Gaji_Karyawan;
use App\Models\M_Absen;

use Dompdf\Dompdf;

class Gaji extends BaseController
{
    public function daftar_gaji()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelGaji = new M_Gaji;
        $modelJabatan = new M_Jabatan;

        $dataGaji = $modelGaji->getDataGaji(['is_delete_gaji' => '0'])->getResultArray();
        $dataJabatan = $modelJabatan->getDataJabatan(['is_delete_jabatan' => '0'])->getResultArray();
        // $dataBulanan = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();

        $data['data_gaji'] = $dataGaji;
        $data['data_jabatan'] = $dataJabatan;
        $data['page'] = $page;
        $data['menu'] = "home";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterGaji/daftar-gaji/master-daftar-gaji', $data);
        echo view('Backend/template/footer', $data);
    }

    public function simpan_daftar_gaji()
    {
        $modelGaji = new M_Gaji();
      
        $id_jabatan = $this->request->getPost('id_jabatan');
        $gaji_pokok = $this->request->getPost('gaji_pokok');
        $uang_makan = $this->request->getPost('uang_makan');
        $tj_kesehatan = $this->request->getPost('tj_kesehatan');
        $tj_transportasi = $this->request->getPost('tj_transportasi');
        $potong_gaji = $this->request->getPost('potong_gaji');
        $bpjs = $this->request->getPost('bpjs');
        $pajak = $this->request->getPost('pajak');

        $cekGaji = $modelGaji->getDataGaji(['tbl_gaji.id_jabatan' => $id_jabatan, 'is_delete_gaji' => '0'])->getNumRows();

        if($cekGaji){
            session()->setFlashdata('error', 'Gaji Jabatan Tersebut Sudah ada!');
            return redirect()->to(base_url('hr/master-daftar-gaji'));
        }else{
            $hasil = $modelGaji->autoNumber()->getRowArray();
            if (!$hasil) {
                $idGaji = "GJI".date("Ymd")."00001";
            } else {
                $kode = $hasil['id_gaji'];

                $noUrut = (int) substr($kode, -5);
                $noUrut++;
                $idGaji = "GJI".date("Ymd").sprintf("%05s", $noUrut);
            }

            $dataSimpan =[
               'id_gaji' => $idGaji,
               'id_jabatan' => $id_jabatan,
               'gaji_pokok' => $gaji_pokok,
               'uang_makan' => $uang_makan,
               'tj_kesehatan' => $tj_kesehatan,
               'tj_transportasi' => $tj_transportasi,
               'potong_gaji' => $potong_gaji,
               'bpjs' => $bpjs,
               'pajak' => $pajak,
               'is_delete_gaji' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s"),
            ];
            $modelGaji->saveDataGaji($dataSimpan);
            session()->setFlashdata('success', 'Gaji Jabatan Berhasil DiTambahkan!');
            return redirect()->to(base_url('hr/master-daftar-gaji'));
        }
    }

    public function edit_daftar_gaji()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelGaji = new M_Gaji;
        $modelJabatan = new M_Jabatan;

        $dataGaji = $modelGaji->getDataGaji(['sha1(tbl_gaji.id_gaji)' => $idEdit])->getRowArray();
        $dataJabatan = $modelJabatan->getDataJabatan(['is_delete_jabatan' => '0'])->getResultArray();
        // $dataBulanan = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();

        $data['data_gaji'] = $dataGaji;
        $data['data_jabatan'] = $dataJabatan;
        $data['page'] = $page;
        $data['menu'] = "home";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterGaji/daftar-gaji/edit-daftar-gaji', $data);
        echo view('Backend/template/footer', $data);
    }

    public function update_daftar_gaji()
    {
        $uri = service('uri');
        // $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelGaji = new M_Gaji();

      
        $gaji_pokok = $this->request->getPost('gaji_pokok');
        $uang_makan = $this->request->getPost('uang_makan');
        $tj_kesehatan = $this->request->getPost('tj_kesehatan');
        $tj_transportasi = $this->request->getPost('tj_transportasi');
        $bpjs = $this->request->getPost('bpjs');
        $pajak = $this->request->getPost('pajak');
        $potong_gaji = $this->request->getPost('potong_gaji');

        $dataGaji = $modelGaji->getDataGaji(['id_gaji' => $idEdit])->getRowArray();
        $idUpdate = $dataGaji['id_gaji'];

        $dataUpdate =[
           'gaji_pokok' => $gaji_pokok,
           'uang_makan' => $uang_makan,
           'tj_kesehatan' => $tj_kesehatan,
           'tj_transportasi' => $tj_transportasi,
           'bpjs' => $bpjs,
           'pajak' => $pajak,
           'potong_gaji' => $potong_gaji,
           'updated_at' => date("Y-m-d H:i:s"),
        ];
        $whereUpdate = ['id_gaji' => $idUpdate];
        $modelGaji->updateDataGaji($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success', 'Gaji Jabatan Berhasil DiUpdate !');
        return redirect()->to(base_url('hr/master-daftar-gaji'));
    }

    public function hapus_daftar_gaji($id)
    {
 
        $modelGaji = new M_Gaji;
    
        $modelGaji->hapusDataGaji($id);

        session()->setFlashdata('success','Data Gaji Berhasil dihapus!!');

        return redirect()->to(base_url('/hr/master-daftar-gaji'));
    }
    //Akhir Daftar Gaji

    //Awal Pembayaran Gaji
    public function master_pembayaran()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelGaji = new M_Gaji();
        $modelGajiKaryawan = new M_Gaji_Karyawan();
        $modelKaryawan = new M_Karyawan();

        $dataGaji = $modelGaji->getDataGaji(['is_delete_gaji' => '0'])->getResultArray();
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['is_delete_karyawan' => '0'])->getResultArray();
        $dataGajiKaryawan = $modelGajiKaryawan->getDataGajiKaryawan(['is_delete_gaji_karyawan' => '0'])->getResultArray();


        $data['page'] = $page;
        $data['dataGajiKaryawan'] = $dataGajiKaryawan;
        $data['data_karyawan'] = $dataKaryawan;
        $data['data_gaji'] = $dataGaji;

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterGaji/pembayaran/master-pembayaran', $data);
        echo view('Backend/template/footer', $data);
    }

    public function simpan_pembayaran_gaji()
    {
        $modelGaji = new M_Gaji();
        $modelGajiKaryawan = new M_Gaji_Karyawan();
        $modelKaryawan = new M_Karyawan();
        $modelAbsen = new M_Absen();

        $id_karyawan = $this->request->getPost('id_karyawan');
        $tgl_gajian = $this->request->getPost('tgl_gajian');
        $bonus_gajian = $this->request->getPost('bonus_gajian');

        $bulan_gajian = date('m', strtotime($tgl_gajian));
        $tahun_gajian = date('Y', strtotime($tgl_gajian));

        if($id_karyawan ==""){
            session()->setFlashdata('error','Karyawan Belum Dipilih!');
            return redirect()->to(base_url('/hr/master-pembayaran-gaji'))->withInput();
        }

        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => $id_karyawan, 'tbl_absen.status' => 'Alpha', 'month(tbl_jadwal.tanggal)' => $bulan_gajian,
        'year(tbl_jadwal.tanggal)' => $tahun_gajian])->getResultArray();

        $total_alpha = count($dataAbsen);
        
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => $id_karyawan])->getRowArray();
        if (!$dataKaryawan['id_jabatan']) {
            session()->setFlashdata('error', 'Gaji untuk Jabatan tersebut belum diAtur!');
            return redirect()->to(base_url('/hr/master-pembayaran-gaji'));
        }
    
        // Ambil data gaji berdasarkan jabatan
        $dataGaji = $modelGaji->getDataGaji(['tbl_gaji.id_jabatan' => $dataKaryawan['id_jabatan'],'is_delete_gaji' => '0'])->getRowArray();

        $hasil = $modelGajiKaryawan->autoNumber()->getRowArray();
            if (!$hasil) {
                $id = "GJK".date("Ymd")."00001";
            } else {
                $kode = $hasil['id_gaji_karyawan'];

                $noUrut = (int) substr($kode, -5);
                $noUrut++;
                $id = "GJK".date("Ymd").sprintf("%05s", $noUrut);
            }

        $dataSimpan = [
            'id_gaji_karyawan' => $id,
            'id_karyawan' => $id_karyawan,
            'id_gaji' => $dataGaji['id_gaji'],
            'tgl_gajian' => $tgl_gajian,
            'bonus_gajian' => $bonus_gajian,
            'total_alpha' => $total_alpha,
            'is_delete_gaji_karyawan' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $modelGajiKaryawan->saveDataGajiKaryawan($dataSimpan);
        session()->setFlashdata('success', 'Penggajian Sudah Berhasil Dibuat!');
        return redirect()->to(base_url('/hr/master-pembayaran-gaji'));
    }

    public function update_pembayaran_gaji()
    {
        $uri = service('uri');
        // $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelGajiKaryawan = new M_Gaji_Karyawan();
        $modelAbsen = new M_Absen();
      
        $tgl_gajian = $this->request->getPost('edit_tgl_gajian');
        $bonus_gajian = $this->request->getPost('edit_bonus_gajian');

        $bulan_gajian = date('m', strtotime($tgl_gajian));
        $tahun_gajian = date('Y', strtotime($tgl_gajian));

        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.status' => 'Alpha', 'month(tbl_jadwal.tanggal)' => $bulan_gajian,
        'year(tbl_jadwal.tanggal)' => $tahun_gajian])->getResultArray();

        $total_alpha = count($dataAbsen);

        $dataGajiKaryawan = $modelGajiKaryawan->getDataGajiKaryawan(['id_gaji_karyawan' => $idEdit], $dataAbsen)->getRowArray();
        $idUpdate = $dataGajiKaryawan['id_gaji_karyawan'];

        $dataUpdate =[
           'tgl_gajian' => $tgl_gajian,
           'bonus_gajian' => $bonus_gajian,
           'total_alpha' => $total_alpha,
           'updated_at' => date("Y-m-d H:i:s"),
        ];
        $whereUpdate = ['id_gaji_karyawan' => $idUpdate];
        $modelGajiKaryawan->updateDataGajiKaryawan($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success', 'Tanggal Pembayaran Berhasil DiUpdate!');
        return redirect()->to(base_url('/hr/master-pembayaran-gaji'));
    }

    public function hapus_pembayaran_gaji($id)
    {
 
        $modelGajiKaryawan = new M_Gaji_Karyawan();
    
        $modelGajiKaryawan->hapusDataGaji($id);

        session()->setFlashdata('success','Data Gaji Berhasil dihapus!!');

        return redirect()->to(base_url('/hr/master-pembayaran-gaji'));
    }

    public function cetak_pembayaran()
    {
        $uri = service('uri');
        $idGajiKaryawan = $uri->getSegment(3);
        // $idKaryawan = $uri->getSegment(4);
        
        $modelGajiKaryawan = new M_Gaji_Karyawan;
        // $modelAbsen = new M_Absen;

        $dataGajiKaryawan = $modelGajiKaryawan->getDataGajiKaryawan(['sha1(id_gaji_karyawan)' => $idGajiKaryawan])->getRowArray();
        // $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_karyawan)' => $idKaryawan, 'month(tbl_jadwal.tanggal)' => date('m') ,'tbl_absen.status' => 'Alpha' ])->getResultArray();
        // $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_karyawan)' => $idKaryawan, 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        // $dataStatus = array_filter($dataAbsen, function($status) {
        //     return in_array($status['status'], ['Alpha', null]);
        // });

        $data['dataGajiKaryawan'] = $dataGajiKaryawan;
        // $data['data_absen'] = $dataStatus;
        $filename = 'GAJI-KARYAWAN-'.date('y-m-d H:i:s');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('Backend/pdf/pdf-gaji-karyawan', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }

    // public function cetak_pembayaran()
    // {
    //     $uri = service('uri');
    //     $page = $uri->getSegment(2);
    //     $idGajiKaryawan = $uri->getSegment(3);
    //     $idKaryawan = $uri->getSegment(4);

    //     $modelGajiKaryawan = new M_Gaji_Karyawan();
    //     $modelAbsen = new M_Absen;

    //     $dataGajiKaryawan = $modelGajiKaryawan->getDataGajiKaryawan(['sha1(id_gaji_karyawan)' => $idGajiKaryawan])->getRowArray();
    //     // $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_karyawan)' => $idKaryawan, 'month(tbl_jadwal.tanggal)' => date('m') ,'tbl_absen.status' => 'Alpha' ])->getResultArray();
    //     // $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_karyawan)' => $idKaryawan, 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
    //     // $dataStatus = array_filter($dataAbsen, function($status) {
    //     //     return in_array($status['status'], ['Alpha', null]);
    //     // });

    //     $data['dataGajiKaryawan'] = $dataGajiKaryawan;
    //     // $data['data_absen'] = $dataStatus;
    //     $data['page'] = $page;
    //     $data['menu'] = "home";

    //     // echo view('Backend/template/head', $data);
    //     // echo view('Backend/template/sidebar', $data);
    //     echo view('Backend/pdf/pdf-gaji-karyawan', $data);
    //     // echo view('Backend/template/footer', $data);
    // }

    //akhir pembayaran gaji
//akhir admin

//awal karyawan

    public function riwayat_gaji_karyawan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelGajiKaryawan = new M_Gaji_Karyawan;

        $dataGajiKaryawan = $modelGajiKaryawan->getDataGajiKaryawan(['tbl_gaji_karyawan.id_karyawan' => session('ses_id')])->getResultArray();
        $data['dataGajiKaryawan'] = $dataGajiKaryawan;
      
        $data['page'] = $page;
        $data['judul'] = "Riwayat Gaji Karyawan" ;
        $data['menu'] = "riwayat-gaji" ;

        echo view('Frontend/template/header' , $data);    
        echo view('Frontend/MasterRiwayat/master-riwayat-gaji' , $data);    
        echo view('Frontend/template/bottom-menu', $data);   
    }

    public function karyawan_cetak_pembayaran()
    {
        $uri = service('uri');
        $idGajiKaryawan = $uri->getSegment(3);
        // $idKaryawan = $uri->getSegment(4);
        
        $modelGajiKaryawan = new M_Gaji_Karyawan;
        // $modelAbsen = new M_Absen;

        $dataGajiKaryawan = $modelGajiKaryawan->getDataGajiKaryawan(['sha1(id_gaji_karyawan)' => $idGajiKaryawan])->getRowArray();
        // $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_karyawan)' => $idKaryawan, 'month(tbl_jadwal.tanggal)' => date('m') ,'tbl_absen.status' => 'Alpha' ])->getResultArray();
        // $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_karyawan)' => $idKaryawan, 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        // $dataStatus = array_filter($dataAbsen, function($status) {
        //     return in_array($status['status'], ['Alpha', null]);
        // });

        $data['dataGajiKaryawan'] = $dataGajiKaryawan;
        // $data['data_absen'] = $dataStatus;
        $filename = 'GAJI-KARYAWAN-'.date('y-m-d H:i:s');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('Backend/pdf/pdf-gaji-karyawan', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }

    public function detail_gaji()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idGajiKaryawan = $uri->getSegment(3);
        // $idKaryawan = $uri->getSegment(4);

        $modelGajiKaryawan = new M_Gaji_Karyawan();
        // $modelAbsen = new M_Absen;
        // $modelKaryawan = new M_Karyawan();

        $dataGajiKaryawan = $modelGajiKaryawan->getDataGajiKaryawan(['sha1(id_gaji_karyawan)' => $idGajiKaryawan])->getRowArray();
        // $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_karyawan)' => $idKaryawan, 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        // $dataStatus = array_filter($dataAbsen, function($status) {
        //     return in_array($status['status'], ['Alpha', null]);
        // });
        
        // $sqlProfile = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')]);
        // $cekProfile = $sqlProfile->getNumRows();
        // if(!$cekProfile){
        //     $dataProfile = '';
        // }else{
        //     $dataProfile = $sqlProfile->getRowArray();
        // }
        
        $data['page'] = $page;
        // $data['data_absen'] = $dataStatus;
        // $data['dataProfile'] = $dataProfile;
        $data['dataGajiKaryawan'] = $dataGajiKaryawan;
        $data['judul'] = "Detail Gaji Karyawan" ;
        $data['menu'] = "detail-gaji-karyawan" ;

        echo view('Frontend/template/header' , $data);    
        echo view('Frontend/MasterRiwayat/detail-pembayaran' , $data);    
        echo view('Frontend/template/bottom-menu', $data);   
    }

}