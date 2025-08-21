<?php 
namespace App\Controllers;

use App\Models\M_Absen;
use App\Models\M_Karyawan;
use App\Models\M_Jadwal;
use App\Models\M_Izin;

use DatePeriod;
use DateInterval;
use DateTime;


class Jadwal extends BaseController
{
    public function master_jadwal()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelJadwal = new M_Jadwal;
        $dataJadwal = $modelJadwal->getDataJadwal(['is_delete_jadwal' => '0'])->getResultArray();
        
        $data['page'] = $page;
        $data['data_jadwal'] = $dataJadwal;
        $data['menu'] = "jadwal";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterJadwal/master-data-jadwal', $data);
        echo view('Backend/template/footer', $data);
    }

    public function tambah_data_jadwal()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelJadwal = new M_Jadwal;
        $dataJadwal = $modelJadwal->getDataJadwal(['is_delete_jadwal' => '0'])->getResultArray();
        
        $data['page'] = $page;
        $data['data_jadwal'] = $dataJadwal;
        $data['menu'] = "jadwal";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterJadwal/tambah-data-jadwal', $data);
        echo view('Backend/template/footer', $data);
    }

    public function simpan_data_jadwal()
    {
        $modelJadwal = new M_Jadwal;
        $modelKaryawan = new M_Karyawan;
        $modelAbsen = new M_Absen;
        $modelIzin = new M_Izin;

        $sqlKaryawan = $modelKaryawan->getDataKaryawan(['is_delete_karyawan' => '0']);
        $dataKaryawan = $sqlKaryawan->getResultArray();

        // Ambil data dari form
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');
        $keterangan = $this->request->getPost('keterangan');
        $jam_masuk = $this->request->getPost('jam_masuk');
        $jam_keluar = $this->request->getPost('jam_keluar');
        $absen_dibuka = $this->request->getPost('absen_dibuka');
        $absen_telat = $this->request->getPost('absen_telat');
        $absen_alpha = $this->request->getPost('absen_alpha');

        // Validasi absen alpha tidak lebih kecil sama dengan telat
        if ($absen_alpha <= $absen_telat) {
            session()->setFlashdata('error', "Absen alpha tidak boleh lebih kecil dari/sama dengan absen telat !");
            return redirect()->to('hr/tambah-data-jadwal')->withInput();
        }

        if ($this->request->getPost('tanggal_akhir')) {
            $tanggal_akhir = $this->request->getPost('tanggal_akhir');
        } else {
            $dt = new DateTime($tanggal_mulai);
            $tanggal_akhir = $dt->format('Y-m-t');
        }

        $tgl_mulai = new DateTime($tanggal_mulai);
        $tgl_akhir = (new DateTime($tanggal_akhir))->modify('+1 day'); // include tanggal akhir
        
        $periode = new DatePeriod($tgl_mulai, new DateInterval('P1D'), $tgl_akhir);

        foreach ($periode as $date) {
            $tanggal = $date->format('Y-m-d');
    
            // Cek apakah tanggal sudah pernah diinput
            $sqlCek = $modelJadwal->getDataJadwal(['tanggal' => $tanggal]);
            if ($sqlCek->getNumRows() > 0) {
                session()->setFlashdata('error', 'Tanggal Jadwal ' . $tanggal . ' sudah ada!');
                return redirect()->to(base_url('/hr/tambah-data-jadwal'))->withInput();
            }

            // Buat ID jadwal
            $hasil = $modelJadwal->autoNumber()->getRowArray();
            if (!$hasil) {
                 $idJadwal = "JDWL" . date("Ymd") . "00001";
            } else {
                 $kode = $hasil['id_jadwal'];
                 $noUrut = (int) substr($kode, -5);
                 $noUrut++;
                 $idJadwal = "JDWL" . date("Ymd") . sprintf("%05s", $noUrut);
            }

            // Simpan data jadwal
            $dataSimpan = [
                'id_jadwal'     => $idJadwal,
                'tanggal'       => $tanggal,
                'keterangan'    => $keterangan,
                'jam_masuk'     => $jam_masuk,
                'jam_keluar'    => $jam_keluar,
                'absen_dibuka'  => $absen_dibuka,
                'absen_telat'   => $absen_telat,
                'absen_alpha'   => $absen_alpha,
                'is_delete_jadwal' => '0',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ];

            $modelJadwal->saveDataJadwal($dataSimpan);

            // Ambil kembali data jadwal yang baru disimpan
            $dataJadwal = $modelJadwal->getDataJadwal(['id_jadwal' => $idJadwal])->getRowArray();

            // Generate data absen awal untuk semua karyawan
            foreach ($dataKaryawan as $data) {
                $statusAbsen = null;

                // Cek apakah hari ini libur
                if ($dataJadwal['keterangan'] == 'libur') {
                    $statusAbsen = 'Libur';
                } else {
                    // Cek izin
                    $sqlCekIzin = $modelIzin->getDataIzin(['tbl_izin.id_karyawan' => $data['id_karyawan'], 'tgl_mulai <=' => $tanggal, 'tgl_selesai >=' => $tanggal, 'status_approved' => '1']);

                    if ($sqlCekIzin->getNumRows() > 0) {
                        $dataIzin = $sqlCekIzin->getRowArray();
                        $statusAbsen = $dataIzin['status_izin'];
                    }
                }

                // Buat ID absen
                $hasil = $modelAbsen->autoNumber()->getRowArray();
                if (!$hasil) {
                    $idAbsen = "ABSN" . date("Ymd") . "00001";
                } else {
                    $kode = $hasil['id_absen'];
                    $noUrut = (int) substr($kode, -5);
                    $noUrut++;
                    $idAbsen = "ABSN" . date("Ymd") . sprintf("%05s", $noUrut);
                }

                // Simpan data absen default
                $dataAbsensi = [
                    'id_absen' => $idAbsen,
                    'id_jadwal' => $idJadwal,
                    'id_karyawan' => $data['id_karyawan'],
                    'keterangan_absen' => $keterangan,
                    'jam_masuk_absen' => '00:00:00',
                    'jam_keluar_absen' => '00:00:00',
                    'status' => $statusAbsen,
                    'lokasi_masuk' => null,
                    'lokasi_keluar' => null,
                    'foto_masuk' => null,
                    'foto_keluar' => null,
                    'is_delete_absen' => '0',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ];

                $modelAbsen->saveDataAbsen($dataAbsensi);
            }
        }

        session()->setFlashdata('success', 'Data Jadwal Tersimpan !!');
        return redirect()->to(base_url('/hr/master-data-jadwal'));
    }

    public function edit_jadwal()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelJadwal = new M_Jadwal;
        $dataJadwal = $modelJadwal->getDataJadwal(['sha1(id_jadwal)' => $idEdit])->getRowArray();
        
        $data['page'] = $page;
        $data['data_jadwal'] = $dataJadwal;
        $data['menu'] = "jadwal";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterJadwal/edit-data-jadwal', $data);
        echo view('Backend/template/footer', $data);
    }

    public function update_data_jadwal()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelJadwal = new M_Jadwal;
        $modelAbsen = new M_Absen;

        $tanggal = $this->request->getPost('tanggal');
        $keterangan = $this->request->getPost('keterangan');
        $jam_masuk = $this->request->getPost('jam_masuk');
        $jam_keluar = $this->request->getPost('jam_keluar');
        $absen_dibuka = $this->request->getPost('absen_dibuka');
        $absen_telat = $this->request->getPost('absen_telat');
        $absen_alpha = $this->request->getPost('absen_alpha');

        $dataJadwal = $modelJadwal->getDataJadwal(['id_jadwal' => $idEdit])->getRowArray();
        $idUpdate = $dataJadwal['id_jadwal'];

        if ($absen_alpha <= $absen_telat) {
            session()->setFlashdata('error', "Absen alpha tidak boleh lebih kecil sama dengan absen telat !");
            return redirect()->to('hr/edit-data-jadwal/'.sha1($idUpdate))->withInput();
        }

        $dataUpdate = [
            'tanggal' => $tanggal,
            'keterangan' => $keterangan,
            'jam_masuk' => $jam_masuk,
            'jam_keluar' => $jam_keluar,
            'absen_dibuka' => $absen_dibuka,
            'absen_telat' => $absen_telat,
            'absen_alpha' => $absen_alpha,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $whereUpdate = ['id_jadwal' => $idUpdate];
        $modelJadwal->updateDataJadwal($dataUpdate, $whereUpdate);

        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.id_jadwal' => $idUpdate])->getResultArray();

        foreach ($dataAbsen as $absen) {
            //jangan ubah status
            $statusAbsen = $absen['status'];
        
            // Jika keterangan diubah jadi libur, ubah status ke Libur
            if ($keterangan == 'libur') {
                $statusAbsen = 'Libur';
            }
            
            $dataUpdate1 = [
                'keterangan_absen' => $keterangan,
                'status' => $statusAbsen,
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            $whereUpdate1 = ['id_absen' => $absen['id_absen']];
            $modelAbsen->updateDataAbsen($dataUpdate1, $whereUpdate1);
            session()->remove('idUpdate');
        }
        session()->setFlashdata('success','Data Berhasil Diperbarui!!');
        return redirect()->to(base_url('/hr/master-data-jadwal'));
    }

    public function update_data_libur()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        // $idEdit = $uri->getSegment(3);

        $modelJadwal = new M_Jadwal;
        $dataJadwal = $modelJadwal->getDataJadwal()->getResultArray();
        
        $data['page'] = $page;
        $data['data_jadwal'] = $dataJadwal;
        $data['menu'] = "jadwal";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterJadwal/update-data-libur', $data);
        echo view('Backend/template/footer', $data);
    }

    public function update_libur()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelJadwal = new M_Jadwal;
        $modelAbsen = new M_Absen;

        $tanggalSemua = $this->request->getPost('tanggal');
        $keteranganSemua = $this->request->getPost('keterangan');
        $tgl_kosong = [];

        for ($i = 0; $i < count($tanggalSemua); $i++) {
            $tanggal = $tanggalSemua[$i];
            $keterangan = $keteranganSemua[$i];
            
            $dataJadwal = $modelJadwal->getDataJadwal(['tanggal' => $tanggal])->getRowArray();
            if (!$dataJadwal) {
                $tgl_kosong[] = $tanggal; // Simpan tanggal yang tidak ditemukan
                continue; // Lewati ke loop berikutnya
            }
            
            $idUpdate = $dataJadwal['id_jadwal'];

            $dataUpdate = [
                'tanggal' => $tanggal,
                'keterangan' => $keterangan,
                'jam_masuk' => '00:00:00',
                'jam_keluar' => '00:00:00',
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $whereUpdate = ['id_jadwal' => $idUpdate];
            $modelJadwal->updateDataJadwal($dataUpdate, $whereUpdate);

            if ($keterangan == 'libur') {
                $statusAbsen = 'Libur';
            } else {
                $statusAbsen = null;
            }

            $dataUpdate1 = [
                'keterangan_absen' => $keterangan,
                'status' => $statusAbsen,
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            $whereUpdate1 = ['id_jadwal' => $idUpdate];
            $modelAbsen->updateDataAbsen($dataUpdate1, $whereUpdate1);
        }
        if (!empty($tgl_kosong)) {
            // Gabungkan tanggal yang gagal dalam satu string
            $daftarTanggal = implode(', ', $tgl_kosong);
            session()->setFlashdata('error', 'Tanggal Berikut Belum Dibuat: ' . $daftarTanggal);
            return redirect()->to(base_url('/hr/update-data-libur'))->withInput();
        }
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Berhasil Diperbarui!!');
        return redirect()->to(base_url('/hr/master-data-jadwal'));
    }

    public function hapus_data_jadwal($id)
    {
 
        $modelJadwal = new M_Jadwal;
        $modelAbsen = new M_Absen;
    
        $modelJadwal->hapusDataJadwal($id);
        $modelAbsen->hapusDataAbsen('id_jadwal', $id);

        session()->setFlashdata('success','Data Jadwal Berhasil dihapus!!');

        return redirect()->to(base_url('/hr/master-data-jadwal'));
    }
}