<?php
namespace App\Controllers;

use App\Models\M_Absen;

class Home extends BaseController
{
    public function home()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelAbsen = new M_Absen;

        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_jadwal.tanggal' => date('Y-m-d')])->getRowArray();
        $dataBulanan = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();

        //Mengambil data count seluruh status
        $dataHadir = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Hadir', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataTerlambat = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Terlambat', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataAlpha = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Alpha', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        // $dataSakit = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Sakit'])->getResultArray();
        $dataCuti = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Cuti', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataIzin = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Izin', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();

        $data['data_hadir'] = $dataHadir;
        $data['data_terlambat'] = $dataTerlambat;
        // $data['data_sakit'] = $dataSakit;
        $data['data_alpha'] = $dataAlpha;
        $data['data_cuti'] = $dataCuti;
        $data['data_izin'] = $dataIzin;

        $data['data_absen'] = $dataAbsen;
        $data['data_bulanan'] = $dataBulanan;
        $data['page'] = $page;
        $data['menu'] = "home";

        echo view('Frontend/template/header' , $data);    
        echo view('Frontend/template/index' , $data);    
        echo view('Frontend/template/bottom-menu', $data);    
    }

    public function profile()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
      
        $data['page'] = $page;
        $data['judul'] = "Profile" ;
        $data['menu'] = "profile" ;

        echo view('Frontend/template/header' ,$data);    
        echo view('Frontend/template/profile', $data);    
        echo view('Frontend/template/bottom-menu', $data);    
    }
}
