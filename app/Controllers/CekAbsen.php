<?php
namespace App\Controllers;

use App\Models\M_Absen;
use App\Models\M_Karyawan;
use App\Models\M_Jadwal;

class CekAbsen extends BaseController
{
    public function cek_alpha()
    {
        $modelAbsen = new M_Absen;
        $modelJadwal = new M_Jadwal;

        // $tanggalHariIni = date('Y-m-d');
        $waktuSekarang = date('H:i:s');

        // Ambil semua data absen yang belum ada jam masuk dan jam keluar (berarti belum absen)
        $dataAbsen = $modelAbsen->getDataAbsen(['tbl_absen.status' => null, 'tbl_jadwal.tanggal' => date('Y-m-d')])->getResultArray();
        if (!$dataAbsen) {
            session()->setFlashdata('error', 'Data jadwal absen belum dibuat !');
            return redirect()->to(base_url('/admin/dashboard'));
        }
        
        $dataJadwal = $modelJadwal->getDataJadwal(['tanggal' => date('Y-m-d')])->getRowArray();
        $count = count($dataAbsen);
        $jumlahAlpha = 0;
        $jamSekarang = strtotime(date('H:i:s'));
        $jamPulang = strtotime($dataJadwal['jam_keluar']);

        if ($jamSekarang < $jamPulang) {
            session()->setFlashdata('error','Waktu Pengecekan Karyawan Yang Belum Hadir Bisa Dilakukan Pukul ' .$dataJadwal['jam_keluar'].' !');
            return redirect()->to(base_url('/admin/dashboard'));
        } else {
            foreach ($dataAbsen as $data) {
                $jadwal = $modelJadwal->getDataJadwal(['id_jadwal' => $data['id_jadwal']])->getRowArray();

                if (!$jadwal) continue;

                // Jika sudah lewat jam keluar dan belum absen, maka set status Alpha
                if (strtotime($waktuSekarang) > strtotime($jadwal['jam_keluar'])) {
                    $dataUpdate = [
                        'status' => 'Alpha',
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $modelAbsen->updateDataAbsen($dataUpdate, ['id_absen' => $data['id_absen']]);
                    $jumlahAlpha++;
                }
            }
            session()->setFlashdata('success','Pengecekan Kehadiran Sukses, Ada '.$count.' Karyawan Yang Belum Melakukan Absen Dan Sudah Diperbarui Menjadi Alpha !' );
            return redirect()->to(base_url('/admin/dashboard'));
        }
    }
}