<?php 
namespace App\Controllers;

use App\Models\M_Absen;
use App\Models\M_Jadwal;
use App\Models\M_Izin;
use App\Models\M_Karyawan;


class Absen extends BaseController
{
    public function presensi()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelAbsen = new M_Absen;
        $modelIzin = new M_Izin;
        $modelJadwal = new M_Jadwal;
        $modelKaryawan = new M_Karyawan;
        
        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_jadwal.tanggal' => date('Y-m-d')])->getRowArray();
        $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')])->getRowArray();
        $dataIzin = $modelIzin->getDataIzin(['tbl_izin.id_karyawan' => session('ses_id')])->getRowArray();

        $dataJadwal = $modelJadwal->getDataJadwal(['tanggal' => date('Y-m-d')])->getRowArray();
        $jamSekarang = strtotime(date('H:i:s'));
        $jamMasukJadwal = strtotime($dataJadwal['jam_masuk'] ?? '00:00:00');
        $batasTelat = $jamMasukJadwal + ($dataJadwal['absen_alpha'] * 60); 

        // Jika data absen tidak ditemukan
        if (!$dataAbsen) {
            session()->setFlashdata('error', 'Data jadwal absen belum dibuat !');
            return redirect()->to(base_url('/karyawan/home'));
        } elseif ($dataKaryawan['id_lokasi'] == '') {
            session()->setFlashdata('error', 'Data penempatan belum dipilih oleh admin !');
            return redirect()->to(base_url('/karyawan/home'));
        }

        if (($dataAbsen['jam_masuk_absen'] == '00:00:00') && ($dataAbsen['status'] == null) &&
            $jamSekarang > $batasTelat
        ) {
            $dataUpdate = [
                'status' => 'Alpha',
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $whereUpdate = ['id_absen' => $dataAbsen['id_absen']];
            $modelAbsen->updateDataAbsen($dataUpdate, $whereUpdate); 
            session()->setFlashdata('error', 'Anda Melebihi Batas Masuk, Maka Status Alpha Dicatat !');
            return redirect()->to(base_url('/karyawan/home'));
        }


        if ($dataAbsen['keterangan_absen'] == 'masuk') {
            //Jika status nya cuti
            if ($dataAbsen['status'] == 'Cuti') {
                session()->setFlashdata('info','Anda Sedang Cuti Dari Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/karyawan/home'));
            }
            //Jika status nya izin
            elseif ($dataAbsen['status'] == 'Izin') {
                session()->setFlashdata('info','Anda Sedang Izin Dari Tanggal: ' .$dataIzin['tgl_mulai']. ' s/d '. $dataIzin['tgl_selesai']);
                return redirect()->to(base_url('/karyawan/home'));
            }
            // Jika keterangan alpha
            elseif ($dataAbsen['status'] == 'Alpha') {
                session()->setFlashdata('error','Anda Sudah Tercatat Alpha Dan Tidak Bisa Absen !');
                return redirect()->to(base_url('/karyawan/home'));
            }
            // Jika belum absen masuk
            elseif ($dataAbsen['lokasi_masuk'] == null || $dataAbsen['jarak_masuk'] == null || $dataAbsen['foto_masuk'] == null || $dataAbsen['status'] == null) {
                $data['data_karyawan'] = $dataKaryawan;
                $data['judul'] = "Absen Masuk";
                $data['menu'] = "presensi";

                echo view('Frontend/template/header', $data);
                echo view('Frontend/MasterAbsen/absen-masuk', $data);
                echo view('Frontend/template/bottom-menu', $data);
            }
            // Jika sudah absen masuk tapi belum absen keluar
            elseif ($dataAbsen['lokasi_keluar'] == null || $dataAbsen['jarak_keluar'] == null || $dataAbsen['foto_keluar'] == null) {
                $data['data_karyawan'] = $dataKaryawan;
                $data['judul'] = "Absen Keluar";
                $data['menu'] = "presensi";

                echo view('Frontend/template/header', $data);
                echo view('Frontend/MasterAbsen/absen-keluar', $data);
                echo view('Frontend/template/bottom-menu', $data);
            }
            // Jika sudah absen masuk dan keluar
            else {
                $data['data_absen'] = $dataAbsen;
                $data['judul'] = "Sudah Absen";
                $data['menu'] = "presensi";

                echo view('Frontend/template/header', $data);
                echo view('Frontend/MasterAbsen/sudah-absen', $data);
                echo view('Frontend/template/bottom-menu', $data);
            }
        } else {
            session()->setFlashdata('info','Hari Ini Adalah Hari Libur !');
            return redirect()->to(base_url('/karyawan/home'));
        }
    }

    public function simpan_absen_masuk()
    {
        $modelAbsen = new M_Absen;
        $modelJadwal = new M_Jadwal;
        $modelKaryawan = new M_Karyawan;
        
        // $id_karyawan = session()->get('ses_id');
        $foto_masuk = $this->request->getPost('foto');
        $lokasi_masuk = $this->request->getPost('lokasi');
        $jarak_masuk = $this->request->getPost('jarak');

        $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')])->getRowArray();

        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'), 'tbl_jadwal.tanggal' => date('Y-m-d')])->getRowArray();
        $idUpdate = $dataAbsen['id_absen'];
        
        // Validasi data dasar
        if (!$foto_masuk || !$lokasi_masuk || !$jarak_masuk) {
            return $this->response->setStatusCode(400)->setBody("Data tidak lengkap.");
        }

        if (!$dataAbsen) {
            return $this->response->setStatusCode(400)->setBody("Data absen tidak ditemukan.");
        }

        $dataJadwal = $modelJadwal->getDataJadwal(['id_jadwal' => $dataAbsen['id_jadwal'],'tanggal' => date('Y-m-d')])->getRowArray();

        $jamMasuk = date('H:i:s');
        $jamMasukSekarang = strtotime($jamMasuk);
        $jamMasukJadwal = strtotime($dataJadwal['jam_masuk']);
        $awalMasuk = $jamMasukJadwal - ($dataJadwal['absen_dibuka'] * 60);

        // Jika belum waktunya absen
        if ($jamMasukSekarang < $awalMasuk) {
            return $this->response->setStatusCode(400)->setBody("Absensi Masuk baru bisa dilakukan mulai pukul " . date('H:i:s', $awalMasuk). '!');
        }

        // Status absen
        $selisihMenit = ($jamMasukSekarang - $jamMasukJadwal) / 60;
        if ($selisihMenit <= $dataJadwal['absen_dibuka']) {
            $status_absen = 'Hadir';
        } elseif($selisihMenit > $dataJadwal['absen_telat']) {
            $status_absen = 'Terlambat';
        }

        // Validasi foto base64
        if (!$foto_masuk || strpos($foto_masuk, 'base64') === false) {
            return $this->response->setStatusCode(400)->setBody("Foto base64 tidak valid");
        }

        // Simpan foto
        $formatNama = "MSK" . "-" . date("Y-m-d_His");
        $filePath = 'Assets/img/foto-absen/absen-masuk/';
        $fileName = $formatNama . '.png';
        $file = $filePath . $fileName;

        $imagePart = explode(";base64", $foto_masuk);
        $imageBase64 = base64_decode($imagePart[1]);

        if (!is_dir($filePath)) {
            mkdir($filePath, 0755, true);
        }

        file_put_contents($file, $imageBase64);

        // Update absen
        $dataUpdate = [
            'id_lokasi' => $dataKaryawan['id_lokasi'],
            'jam_masuk_absen' => $jamMasuk,
            'status' => $status_absen,
            'lokasi_masuk' => $lokasi_masuk,
            'jarak_masuk' => intval($jarak_masuk),
            'foto_masuk' => $fileName,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $whereUpdate = ['id_absen' => $idUpdate];
        $modelAbsen->updateDataAbsen($dataUpdate, $whereUpdate);

        // return $this->response->setStatusCode(200)->setJSON(['message' => 'Absen berhasil disimpan']);
    }

    public function simpan_absen_pulang()
    {
        $modelAbsen = new M_Absen;
        $modelJadwal = new M_Jadwal;
        
        
        // $id_karyawan = session()->get('ses_id');
        $foto_keluar = $this->request->getPost('foto');
        $lokasi_keluar = $this->request->getPost('lokasi');
        $jarak_keluar = $this->request->getPost('jarak');
        
        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.id_karyawan' => session('ses_id'),'tbl_jadwal.tanggal' => date('Y-m-d') ])->getRowArray();
        $idUpdate = $dataAbsen['id_absen'];
        // Validasi data dasar
        if (!$foto_keluar || !$lokasi_keluar || !$jarak_keluar) {
            return $this->response->setStatusCode(400)->setBody("Data tidak lengkap.");
        }

        $dataJadwal = $modelJadwal->getDataJadwal(['id_jadwal' => $dataAbsen['id_jadwal'],'tanggal' => date('Y-m-d')])->getRowArray();
        $jamKeluarAbsen = date('H:i:s');

        // Jika belum waktunya absen pulang
        if ($jamKeluarAbsen < $dataJadwal['jam_keluar']) {
            return $this->response->setStatusCode(400)->setBody("Absensi Pulang baru bisa dilakukan mulai pukul " . $dataJadwal['jam_keluar'] .'!');
        }

        //mengubah foto menjadi file
        $formatNama= "KLR"."-".date("Y-m-d_His");
        $filePath = 'Assets/img/foto-absen/absen-pulang/' ;
        $imagePart = explode(";base64", $foto_keluar);
        $imageBase64 = base64_decode($imagePart[1]);
        $fileName = $formatNama . '.png';
        $file = $filePath.$fileName;

        if (!$foto_keluar || strpos($foto_keluar, 'base64') === false) {
            return $this->response->setStatusCode(400)->setBody("Foto base64 tidak valid");
        }
        if (!is_dir($filePath)) {
            mkdir($filePath, 0755, true); // buat direktori jika belum ada
        }

        file_put_contents($file, $imageBase64);

        // date_default_timezone_set('Asia/Jakarta');
        $dataUpdate = [
            // 'id_absen' => $id,
            // 'id_karyawan' => $id_karyawan,
            // 'tgl_absen' => date('Y-m-d'),
            'jam_keluar_absen' => date('H:i:s'),
            'lokasi_keluar' => $lokasi_keluar,
            'jarak_keluar' => intval($jarak_keluar),
            'foto_keluar' => $fileName,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $whereUpdate = ['id_absen' => $idUpdate];
        $modelAbsen->updateDataAbsen($dataUpdate, $whereUpdate);
    }
//Akhir Karyawan

}