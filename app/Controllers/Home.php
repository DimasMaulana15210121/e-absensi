<?php
namespace App\Controllers;

use App\Models\M_Absen;
use App\Models\M_Karyawan;
use App\Models\M_Izin;

class Home extends BaseController
{
    public function home()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelAbsen = new M_Absen;
        $modelKaryawan = new M_Karyawan;

        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_jadwal.tanggal' => date('Y-m-d')])->getRowArray();
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')])->getRowArray();
        $dataBulanan = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();

        //Mengambil data count seluruh status
        $dataHadir = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Hadir', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataTerlambat = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Terlambat', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataAlpha = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Alpha', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        // $dataSakit = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Sakit'])->getResultArray();
        $dataCuti = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Cuti', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();
        $dataIzin = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_absen.status' => 'Izin', 'month(tbl_jadwal.tanggal)' => date('m')])->getResultArray();

        if (!$dataAbsen) {
            $dataAbsen = [
                'keterangan_absen' => null,
                'lokasi_masuk' => null,
                'jarak_masuk' => null,
                'foto_masuk' => null,
                'status' => null,
                'jam_masuk' => null,
                'jam_masuk_absen' => null,
                'jam_keluar' => null,
                'jam_keluar_absen' => null
            ];
        }

        $data['data_hadir'] = $dataHadir;
        $data['data_terlambat'] = $dataTerlambat;
        // $data['data_sakit'] = $dataSakit;
        $data['data_alpha'] = $dataAlpha;
        $data['data_cuti'] = $dataCuti;
        $data['data_izin'] = $dataIzin;

        $data['data_absen'] = $dataAbsen;
        $data['data_karyawan'] = $dataKaryawan;
        $data['data_bulanan'] = $dataBulanan;
        $data['page'] = $page;
        $data['menu'] = "home";

        echo view('Frontend/template/header' , $data);    
        echo view('Frontend/template/index' , $data);    
        echo view('Frontend/template/bottom-menu', $data);    
    }

    public function detail_absen_karyawan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idAbsen = $uri->getSegment(3);
        $idKaryawan = $uri->getSegment(4);
        // $idKaryawan = session('ses_id');

        $modelAbsen = new M_Absen;
        $modelKaryawan = new M_Karyawan;
        $modelIzin = new M_Izin;

        $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_absen)' => $idAbsen,'month(tbl_jadwal.tanggal)' => date('m')])->getRowArray();
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['sha1(tbl_karyawan.id_karyawan)' => $idKaryawan])->getRowArray();
        $dataIzin = $modelIzin->getDataIzin(['sha1(tbl_izin.id_karyawan)' => $idKaryawan])->getRowArray();

        if ($dataAbsen['keterangan_absen'] == 'masuk') {
            //Jika status nya cuti
            if ($dataAbsen['status'] == 'Cuti') {
                session()->setFlashdata('info','Anda Sedang Cuti Pada Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/karyawan/home'));
            }
            //Jika status nya izin
            elseif ($dataAbsen['status'] == 'Izin') {
                session()->setFlashdata('info','Anda Sedang Izin Pada Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/karyawan/home'));
            }
        } else {
            session()->setFlashdata('info','Hari Ini Adalah Hari Libur !');
            return redirect()->to(base_url('/karyawan/home'));
        }
        
        $data['page'] = $page;
        $data['data_absen'] = $dataAbsen;
        $data['data_karyawan'] = $dataKaryawan;
        $data['judul'] = "Detail Absen Karyawan" ;
        $data['menu'] = "home" ;

        echo view('Frontend/template/header' ,$data);    
        echo view('Frontend/MasterHistory/detail-absen-karyawan', $data);    
        echo view('Frontend/template/bottom-menu', $data);    
    }
}
