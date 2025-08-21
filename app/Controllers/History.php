<?php
namespace App\Controllers;

use App\Models\M_Absen;
use App\Models\M_Karyawan;
use App\Models\M_Izin;

class History extends BaseController
{
    public function history_absen()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelAbsen = new M_Absen;
        $modelKaryawan = new M_Karyawan;

        $dataHistory = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id')])->getResultArray();
        $dataKaryawan = $modelKaryawan->getDataYears(['id_karyawan' => session('ses_id')])->getRowArray();

        $data['page'] = $page;
        $data['data_history'] = $dataHistory;
        $data['data_karyawan'] = $dataKaryawan;
        $data['judul'] = "History Absensi" ;
        $data['menu'] = "history" ;

        echo view('Frontend/template/header', $data);    
        echo view('Frontend/MasterHistory/master-data-history', $data);      
        echo view('Frontend/template/bottom-menu', $data);    
    }
    
    public function view_history()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');

        $modelAbsen = new M_Absen;
        $modelKaryawan = new M_Karyawan;

        $dataHistory = $modelAbsen->getDataHistory(['tbl_absen.id_karyawan' => session('ses_id')], $bulan, $tahun)->getResultArray();
        $dataKaryawan = $modelKaryawan->getDataYears(['id_karyawan' => session('ses_id')])->getRowArray();

        $data['data_history'] = $dataHistory;
        $data['data_karyawan'] = $dataKaryawan;
        $data['judul'] = "History Absensi" ;
        $data['menu'] = "history" ;

        if ($dataHistory) {
            $response = [
                'status' => 'success',
                'data' =>  view('Frontend/MasterHistory/view-history', $data)
            ];
        } else {
            $response = [
                'status' => 'empty',
                'message' => 'Data tidak ditemukan.'
            ];
        }


        echo json_encode($response);   
    }
    public function detail_history_absen()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idAbsen = $uri->getSegment(3);
        $idKaryawan = $uri->getSegment(4);

        $modelAbsen = new M_Absen;
        $modelKaryawan = new M_Karyawan;
        $modelIzin = new M_Izin;

        $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_absen)' => $idAbsen])->getRowArray();
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['sha1(tbl_karyawan.id_karyawan)' => $idKaryawan])->getRowArray();
        $dataIzin = $modelIzin->getDataIzin(['sha1(tbl_izin.id_karyawan)' => $idKaryawan])->getRowArray();

        if ($dataAbsen['keterangan_absen'] == 'masuk') {
            //Jika status nya cuti
            if ($dataAbsen['status'] == 'Cuti') {
                session()->setFlashdata('info','Anda Sedang Cuti Pada Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/karyawan/history-absen'));
            }
            //Jika status nya izin
            elseif ($dataAbsen['status'] == 'Izin') {
                session()->setFlashdata('info','Anda Sedang Izin Pada Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/karyawan/history-absen'));
            }
        } else {
            session()->setFlashdata('info','Hari Ini Adalah Hari Libur !');
            return redirect()->to(base_url('/karyawan/history-absen'));
        }
        
        $data['page'] = $page;
        $data['data_absen'] = $dataAbsen;
        $data['data_karyawan'] = $dataKaryawan;
        $data['judul'] = "Detail Absen Karyawan" ;
        $data['menu'] = "history" ;

        echo view('Frontend/template/header' ,$data);    
        echo view('Frontend/MasterHistory/detail-absen-karyawan', $data);    
        echo view('Frontend/template/bottom-menu', $data);      
    }
//Akhir Karyawan

//Awal Rekap Admin

    public function laporan_absensi()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $tgl_awal = $this->request->getVar('tgl_awal');
        $tgl_akhir = $this->request->getVar('tgl_akhir');

        $modelAbsen = new M_Absen;

        $dataAbsen = $modelAbsen->getDataFilterAbsen(['tbl_absen.keterangan_absen' => 'masuk'], $tgl_awal, $tgl_akhir)->getResultArray();

        if ($tgl_akhir < $tgl_awal) {
            return redirect()->back()->with('error', 'Tanggal Akhir Tidak Boleh Lebih Kecil Dari Tanggal Awal !');
        }

        $data['page'] = $page;
        $data['web_title'] = "Laporan Data Absensi";
        $data['data_absen'] = $dataAbsen;

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterAbsen/laporan-absensi', $data);
        echo view('Backend/template/footer', $data);
    }

    public function history_absensi()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $tgl_awal = $this->request->getVar('tgl_awal');
        $tgl_akhir = $this->request->getVar('tgl_akhir');

        $modelAbsen = new M_Absen;

        $dataAbsen = $modelAbsen->getDataFilterAbsen(['tbl_absen.keterangan_absen' => 'masuk'], $tgl_awal, $tgl_akhir)->getResultArray();

        if ($tgl_akhir < $tgl_awal) {
            return redirect()->back()->with('error', 'Tanggal Akhir Tidak Boleh Lebih Kecil Dari Tanggal Awal !');
        }


        $data['page'] = $page;
        $data['web_title'] = "History Absensi";
        $data['data_absen'] = $dataAbsen;

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;


        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterAbsen/history-absensi', $data);
        echo view('Backend/template/footer', $data);
    }

    public function detail_history_absensi()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idAbsen = $uri->getSegment(3);
        $idKaryawan = $uri->getSegment(4);

        $modelAbsen = new M_Absen;
        $modelKaryawan = new M_Karyawan;
        $modelIzin = new M_Izin;

        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        $dataAbsen = $modelAbsen->getDataAbsen(['sha1(tbl_absen.id_absen)' => $idAbsen])->getRowArray();
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['sha1(tbl_karyawan.id_karyawan)' => $idKaryawan])->getRowArray();
        $dataIzin = $modelIzin->getDataIzin(['sha1(tbl_izin.id_karyawan)' => $idKaryawan])->getRowArray();

        if ($dataAbsen['keterangan_absen'] == 'masuk') {
            //Jika status nya cuti
            if ($dataAbsen['status'] == 'Cuti') {
                session()->setFlashdata('info','Karyawan Ini Sedang Cuti Dari Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/hr/history-absensi'));
            }
            //Jika status nya izin
            elseif ($dataAbsen['status'] == 'Izin') {
                session()->setFlashdata('info','Karyawan Ini Sedang Izin Dari Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/hr/history-absensi'));
            }
        } else {
            session()->setFlashdata('info','Hari Ini Adalah Hari Libur !');
            return redirect()->to(base_url('/hr/history-absensi'));
        }
        
        $data['page'] = $page;
        $data['data_absen'] = $dataAbsen;
        $data['data_karyawan'] = $dataKaryawan;
        $data['menu'] = "history-absen";

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterAbsen/detail-history-absensi', $data);
        echo view('Backend/template/footer', $data);   
    }

    // public function filter_laporan_pajak()
    // {
    //   $tgl_awal = $this->request->getVar('tgl_awal');
    //   $tgl_akhir = $this->request->getVar('tgl_akhir');
    //   return $this->laporan_pajak($tgl_awal, $tgl_akhir);
    // }

}