<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::auth_karyawan');

//Frontend
    //Auth
    $routes->post('/karyawan/login-checker', 'Auth::karyawan_login_checker');
    $routes->get('/karyawan/logout', 'Auth::logout_karyawan');
    //Home
    $routes->get('/karyawan/home', 'Home::home');
    $routes->get('/karyawan/detail-absen-karyawan/(:alphanum)/(:alphanum)', 'Home::detail_absen_karyawan/$1/$2');
    //Riwayat
    $routes->get('/karyawan/riwayat-pembayaran-gaji', 'Gaji::riwayat_gaji_karyawan');
    $routes->get('/karyawan/detail-gaji/(:alphanum)', 'Gaji::detail_gaji/$1');
    $routes->get('/karyawan/cetak-pembayaran/(:alphanum)', 'Gaji::karyawan_cetak_pembayaran/$1');
    //History
    $routes->get('/karyawan/history-absen', 'History::history_absen');
    // $routes->get('/karyawan/view', 'History::view');
    $routes->post('/karyawan/view-history', 'History::view_history');
    $routes->get('/karyawan/detail-history-absen/(:alphanum)/(:alphanum)', 'History::detail_history_absen/$1/$2');
    //Absen
    $routes->get('/karyawan/presensi', 'Absen::presensi');
    $routes->post('/karyawan/simpan-absen-masuk', 'Absen::simpan_absen_masuk');
    $routes->post('/karyawan/simpan-absen-pulang', 'Absen::simpan_absen_pulang');
    //Izin
    $routes->get('/karyawan/master-data-izin', 'Izin::master_izin');
    $routes->get('/karyawan/pengajuan-izin', 'Izin::pengajuan_izin');
    $routes->post('/karyawan/simpan-data-izin', 'Izin::simpan_data_izin');
    $routes->get('/karyawan/edit-data-izin/(:alphanum)', 'Izin::edit_data_izin/$1');
    $routes->post('/karyawan/update-data-izin/(:alphanum)', 'Izin::update_data_izin/$1');
    //Profile
    $routes->get('/karyawan/profile', 'Profile::profile');
    $routes->post('/karyawan/simpan-profile', 'Profile::simpan_profile');
    $routes->get('/karyawan/edit-data-rekening', 'Profile::edit_rekening');
    $routes->post('/karyawan/update-data-rekening', 'Profile::update_rekening');
    
//Backend
    //CekAbsen
    $routes->get('/hr/cek-alpha', 'CekAbsen::cek_alpha');
    //Auth
    $routes->get('/hr/login', 'Auth::auth_admin');
    $routes->post('/hr/login-checker', 'Auth::admin_login_checker');
    $routes->get('/hr/logout', 'Auth::logout_admin');
    
    //Admin
    $routes->get('/hr/dashboard', 'Admin::dashboard');
    $routes->get('/hr/detail-absen-karyawan/(:alphanum)/(:alphanum)', 'Admin::detail_absen_karyawan/$1/$2');
    $routes->get('/hr/profile-admin', 'Admin::profile_admin');
    $routes->post('/hr/simpan-profile-admin', 'Admin::simpan_profile_admin');
    $routes->get('/hr/logo-perusahaan', 'Admin::logo_perusahaan');
    $routes->post('/hr/simpan-logo-perusahaan', 'Admin::simpan_logo_perusahaan');
    $routes->get('/hr/edit-logo-perusahaan/(:alphanum)', 'Admin::edit_logo/$1');
    $routes->post('/hr/update-logo-perusahaan/(:alphanum)', 'Admin::update_logo_perusahaan/$1');
    $routes->get('/hr/hapus-logo-perusahaan/(:alphanum)', 'Admin::hapus_logo_perusahaan/$1');
    
    //Karyawan
    $routes->get('/hr/master-data-karyawan', 'Karyawan::master_karyawan');
    $routes->get('/hr/hapus-data-karyawan/(:alphanum)', 'Karyawan::hapus_data_karyawan/$1');
    $routes->get('/hr/tambah-data-karyawan', 'Karyawan::tambah_data_karyawan');
    $routes->post('/hr/simpan-data-karyawan', 'Karyawan::simpan_data_karyawan');
    $routes->get('/hr/edit-data-karyawan/(:alphanum)', 'Karyawan::edit_data_karyawan/$1');
    $routes->post('/hr/update-data-karyawan/(:alphanum)', 'Karyawan::update_data_karyawan/$1');

    //Jabatan
    $routes->get('/hr/master-data-jabatan', 'Jabatan::master_jabatan');
    $routes->get('/hr/hapus-data-jabatan/(:alphanum)', 'Jabatan::hapus_data_jabatan/$1');
    $routes->post('/hr/simpan-data-jabatan', 'Jabatan::simpan_data_jabatan');
    $routes->post('/hr/update-data-jabatan/(:alphanum)', 'Jabatan::update_data_jabatan/$1');
    $routes->get('/hr/view-karyawan-perjabatan/(:alphanum)', 'Jabatan::view_jabatan/$1');
    $routes->get('/hr/view-karyawan-perjabatan/(:alphanum)/(:alphanum)', 'Jabatan::view_karyawan_perjabatan/$1/$2');

    //Jadwal
    $routes->get('/hr/master-data-jadwal', 'Jadwal::master_jadwal');
    $routes->get('/hr/tambah-data-jadwal', 'Jadwal::tambah_data_jadwal');
    $routes->post('/hr/simpan-data-jadwal', 'Jadwal::simpan_data_jadwal');
    $routes->get('/hr/edit-data-jadwal/(:alphanum)', 'Jadwal::edit_jadwal/$1');
    $routes->post('/hr/update-data-jadwal/(:alphanum)', 'Jadwal::update_data_jadwal/$1');
    $routes->get('/hr/update-data-libur', 'Jadwal::update_data_libur');
    $routes->post('/hr/update-libur', 'Jadwal::update_libur');
    $routes->get('/hr/hapus-data-jadwal/(:alphanum)', 'Jadwal::hapus_data_jadwal/$1');

    //Lokasi
    $routes->get('/hr/master-data-lokasi', 'Lokasi::master_data_lokasi');
    $routes->get('/hr/tambah-data-lokasi', 'Lokasi::tambah_data_lokasi');
    $routes->post('/hr/simpan-data-lokasi', 'Lokasi::simpan_data_lokasi');
    $routes->get('/hr/edit-data-lokasi/(:alphanum)', 'Lokasi::edit_data_lokasi/$1');
    $routes->post('/hr/update-lokasi/(:alphanum)', 'Lokasi::update_lokasi/$1');
    $routes->get('/hr/hapus-data-lokasi/(:alphanum)', 'Lokasi::hapus_data_lokasi/$1');

    //Pengajuan
    $routes->get('/hr/master-data-pengajuan', 'Izin::master_data_pengajuan');
    $routes->post('/hr/terima-pengajuan/(:alphanum)/(:alphanum)', 'Izin::terima_data_pengajuan/$1/$2');
    $routes->post('/hr/tolak-pengajuan/(:alphanum)', 'Izin::tolak_data_pengajuan/$1');
    
    //Daftar Gaji
    $routes->get('/hr/master-daftar-gaji', 'Gaji::daftar_gaji');
    $routes->post('/hr/simpan-daftar-gaji', 'Gaji::simpan_daftar_gaji');
    $routes->get('/hr/edit-daftar-gaji/(:alphanum)', 'Gaji::edit_daftar_gaji/$1');
    $routes->post('/hr/update-daftar-gaji/(:alphanum)', 'Gaji::update_daftar_gaji/$1');
    $routes->get('/hr/hapus-daftar-gaji/(:alphanum)', 'Gaji::hapus_daftar_gaji/$1');

    //Master Pembayaran Gaji
    $routes->get('/hr/master-pembayaran-gaji', 'Gaji::master_pembayaran');
    $routes->post('/hr/simpan-pembayaran-gaji', 'Gaji::simpan_pembayaran_gaji');
    $routes->post('/hr/update-pembayaran-gaji/(:alphanum)', 'Gaji::update_pembayaran_gaji/$1');
    $routes->get('/hr/hapus-pembayaran-gaji/(:alphanum)', 'Gaji::hapus_pembayaran_gaji/$1');
    $routes->get('/hr/cetak-pembayaran/(:alphanum)', 'Gaji::cetak_pembayaran/$1');

    //History Absensi
    $routes->get('/hr/laporan-absensi', 'History::laporan_absensi');
    $routes->get('/hr/history-absensi', 'History::history_absensi');
    $routes->get('/hr/detail-history-absensi/(:alphanum)/(:alphanum)', 'History::detail_history_absensi/$1/$2');