<?php 
namespace App\Controllers;

use App\Models\M_Izin;
use App\Models\M_Jadwal;
use App\Models\M_Absen;

use DatePeriod;
use DateInterval;
use DateTime;

class Izin extends BaseController
{
    public function master_Izin()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelIzin = new M_Izin;

        $dataIzin = $modelIzin->getDataIzin(['tbl_izin.id_karyawan' => session('ses_id')])->getResultArray();
        $data['data_izin'] = $dataIzin;
      
        $data['page'] = $page;
        $data['judul'] = "Data Izin" ;
        $data['menu'] = "izin" ;

        echo view('Frontend/template/header' , $data);    
        echo view('Frontend/MasterIzin/master-data-izin' , $data);    
        echo view('Frontend/template/bottom-menu', $data);   
    }

    public function pengajuan_izin()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelIzin = new M_Izin;

        $dataIzin = $modelIzin->getDataIzin(['tbl_izin.id_karyawan' => session('ses_id')])->getResultArray();
        $data['data_izin'] = $dataIzin;
      
        $data['page'] = $page;
        $data['judul'] = "Pengajuan Izin" ;
        $data['menu'] = "izin" ;

        echo view('Frontend/template/header' , $data);    
        echo view('Frontend/MasterIzin/input-data-izin' , $data);    
        echo view('Frontend/template/bottom-menu', $data);   
    }

    public function simpan_data_izin()
    {
        $modelIzin = new M_Izin;

        $id_karyawan = session()->get('ses_id');
        $tgl_mulai = $this->request->getPost('tgl_mulai');
        $tgl_selesai = $this->request->getPost('tgl_selesai');
        $status_izin = $this->request->getPost('status_izin');
        $ket_izin = $this->request->getPost('ket_izin');

        if($status_izin ==""){
            session()->setFlashdata('error','Status Izin Tidak boleh Kosong!');
            return redirect()->to(base_url('/karyawan/pengajuan-izin'))->withInput();
        }

        $hasil = $modelIzin->autoNumber()->getRowArray();
        if (!$hasil) {
            $id = "IZN".date("Ymd")."00001";
        } else {
            $kode = $hasil['id_izin'];
            $noUrut = (int) substr($kode, -5);
            $noUrut++;
            $id = "IZN".date("Ymd").sprintf("%05s", $noUrut);
        }

        $dataSimpan = [
            'id_izin' => $id,
            'id_karyawan' => $id_karyawan,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
            'status_izin' => $status_izin,
            'ket_izin' => $ket_izin,
            'ket_pengajuan' => '',
            'status_approved' => '0',
            'is_delete_izin' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $modelIzin->saveDataIzin($dataSimpan);
        session()->setFlashdata('success', 'Permohonan izin berhasil ditambahkan!!');
        return redirect()->to(base_url('/karyawan/master-data-izin'));
    }

    public function edit_data_Izin()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelIzin = new M_Izin;

        $dataIzin = $modelIzin->getDataIzin(['sha1(tbl_izin.id_izin)' => $idEdit])->getRowArray();

        $data['data_izin'] = $dataIzin;
          
        $data['page'] = $page;
        $data['judul'] = "Edit Data Izin" ;
        $data['menu'] = "izin" ;
    
        echo view('Frontend/template/header' , $data);    
        echo view('Frontend/MasterIzin/edit-data-izin' , $data);    
        echo view('Frontend/template/bottom-menu', $data);   
    }

    public function update_data_izin()
    {
        $uri = service('uri');
        $idEdit = $uri->getSegment(3);

        $modelIzin = new M_Izin;

        $dataIzin = $modelIzin->getDataIzin(['tbl_izin.id_izin' => $idEdit])->getRowArray();
        $idUpdate = $dataIzin['id_izin'];

        $tgl_mulai = $this->request->getPost('tgl_mulai');
        $tgl_selesai = $this->request->getPost('tgl_selesai');
        $status_izin = $this->request->getPost('status_izin');
        $ket_izin = $this->request->getPost('ket_izin');

        $dataUpdate = [
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
            'status_izin' => $status_izin,
            'ket_izin' => $ket_izin,
            'status_approved' => '0',
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $whereUpdate = ['id_izin' => $idUpdate];
        $modelIzin->updateDataIzin($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Berhasil Diperbarui!!');
        return redirect()->to(base_url('/karyawan/master-data-izin'));
    }

    public function detail_data_Izin()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelIzin = new M_Izin;

        $dataIzin = $modelIzin->getDataIzin(['sha1(tbl_izin.id_izin)' => $idEdit])->getRowArray();

        $data['data_izin'] = $dataIzin;
          
        $data['page'] = $page;
        $data['judul'] = "Edit Data Izin" ;
        $data['menu'] = "izin" ;

        echo view('Frontend/template/header' , $data);    
        echo view('Frontend/MasterIzin/detail-data-izin' , $data);    
        echo view('Frontend/template/bottom-menu', $data);   
    }
//Akhir Karyawan

//Awal Admin
    public function master_data_pengajuan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelIzin = new M_Izin;

        $dataPending = $modelIzin->getDataIzin(['tbl_izin.status_approved' => '0' ])->getResultArray();
        $data['data_pending'] = $dataPending;

        $dataDiterima = $modelIzin->getDataIzin(['tbl_izin.status_approved' => '1' ])->getResultArray();
        $data['data_diterima'] = $dataDiterima;
        
        $dataDitolak = $modelIzin->getDataIzin(['tbl_izin.status_approved' => '2' ])->getResultArray();
        $data['data_ditolak'] = $dataDitolak;
      
        $data['page'] = $page;
        $data['judul'] = "Pengajuan Izin" ;
        $data['menu'] = "izin" ;

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterPengajuan/master-data-pengajuan', $data);
        echo view('Backend/template/footer', $data);
    }

    // public function terima_data_pengajuan()
    // {
    //     $uri = service('uri');
    //     $idEdit = $uri->getSegment(3);
    //     $idKaryawan = $uri->getSegment(4);

        // $modelIzin = new M_Izin;
        // $modelJadwal = new M_Jadwal;
        // $modelAbsen = new M_Absen;

    //     // Ambil data izin yang akan disetujui
    //     $dataPengajuan = $modelIzin->getDataIzin(['tbl_izin.id_izin' => $idEdit])->getRowArray();

    //     // Update status pengajuan menjadi disetujui
    //     $modelIzin->updateDataIzin([
    //         'status_approved' => '1',
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ], ['id_izin' => $idEdit]);

        // // Ambil tanggal mulai dan selesai dari data izin
        // $tanggalMulai = $dataPengajuan['tgl_mulai'];
        // $tanggalSelesai = $dataPengajuan['tgl_selesai'];
        // $statusIzin = $dataPengajuan['status_izin'];

    //     // Loop tanggal dari mulai sampai selesai
        // $periode = new DatePeriod(
        //     new DateTime($tanggalMulai),
        //     new DateInterval('P1D'),
        //     (new DateTime($tanggalSelesai))->modify('+1 day')
        // );

        // foreach ($periode as $tanggal) {
        //     $tgl = $tanggal->format('Y-m-d');

        //     // Cek apakah jadwal sudah ada di tanggal tersebut
        //     $jadwal = $modelJadwal->getDataJadwal(['tanggal' => $tgl])->getRowArray();
        //     if ($jadwal) {
        //         // Update absen karyawan pada tanggal tersebut
        //         $whereUpdate2 = [
        //             'id_jadwal' => $jadwal['id_jadwal'],
        //             'id_karyawan' => $idKaryawan
        //         ];
        //         $dataUpdate2 = [
        //             'status' => $statusIzin,
        //             'updated_at' => date('Y-m-d H:i:s'),
        //         ];
        //         $modelAbsen->updateDataAbsen($dataUpdate2, $whereUpdate2);
        //     }
        // }

    //     session()->remove('idUpdate');
    //     session()->setFlashdata('success','Data Pengajuan Diterima dan Absen Diupdate!');
    //     return redirect()->to(base_url('/admin/master-data-pengajuan'));
    // }

    public function terima_data_pengajuan()
    {
        $uri = service('uri');
        $idEdit = $uri->getSegment(3);
        $idKaryawan = $uri->getSegment(4);

        $modelIzin = new M_Izin;
        $modelJadwal = new M_Jadwal;
        $modelAbsen = new M_Absen;

        $dataPengajuan = $modelIzin->getDataIzin(['tbl_izin.id_izin' => $idEdit])->getRowArray();
        $idUpdate = $dataPengajuan['id_izin'];

        $ket_pengajuan = $this->request->getPost('ket_pengajuan');

        $dataUpdate1 = [
            'ket_pengajuan' => $ket_pengajuan,
            'status_approved' => '1',
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $whereUpdate1 = ['id_izin' => $idUpdate];
        $modelIzin->updateDataIzin($dataUpdate1, $whereUpdate1);

        $tanggalMulai = $dataPengajuan['tgl_mulai'];
        $tanggalSelesai = $dataPengajuan['tgl_selesai'];
        $statusIzin = $dataPengajuan['status_izin'];

        $periode = new DatePeriod(
            new DateTime($tanggalMulai),
            new DateInterval('P1D'),
            (new DateTime($tanggalSelesai))->modify('+1 day')
        );

        foreach ($periode as $tanggal) {
            $tgl = $tanggal->format('Y-m-d');

            $jadwal = $modelJadwal->getDataJadwal(['tanggal' => $tgl])->getRowArray();
            if ($jadwal) {
                $dataUpdate2 = [
                    'status' => $statusIzin,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $whereUpdate2 = ['id_jadwal' => $jadwal['id_jadwal'], 'id_karyawan' => $idKaryawan];
                $modelAbsen->updateDataAbsen($dataUpdate2, $whereUpdate2);
            }
        }
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Pengajuan Diterima !');
        return redirect()->to(base_url('/hr/master-data-pengajuan'));
    }

    public function tolak_data_pengajuan()
    {
        $uri = service('uri');
        $idEdit = $uri->getSegment(3);

        $modelIzin = new M_Izin;

        $dataPengajuan = $modelIzin->getDataIzin(['tbl_izin.id_izin' => $idEdit])->getRowArray();
        $idUpdate = $dataPengajuan['id_izin'];
        $ket_pengajuan = $this->request->getPost('ket_pengajuan');

        $dataUpdate = [
            'ket_pengajuan' => $ket_pengajuan,
            'status_approved' => '2',
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $whereUpdate = ['id_izin' => $idUpdate];
        $modelIzin->updateDataIzin($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Pengajuan Ditolak !');
        return redirect()->to(base_url('/hr/master-data-pengajuan'));
    }
}