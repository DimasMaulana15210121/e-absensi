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
    //Riwayat
    $routes->get('/karyawan/riwayat-pembayaran-gaji', 'Gaji::riwayat_gaji_karyawan');
    $routes->get('/karyawan/detail-gaji/(:alphanum)/(:alphanum)', 'Gaji::detail_gaji/$1/$2');
    //History
    $routes->get('/karyawan/history-absen', 'History::history_absen');
    // $routes->get('/karyawan/view', 'History::view');
    $routes->post('/karyawan/view-history', 'History::view_history');
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
    
//Backend
    //CekAbsen
    $routes->get('/admin/cek-alpha', 'CekAbsen::cek_alpha');
    //Auth
    $routes->get('/admin/login', 'Auth::auth_admin');
    $routes->post('/admin/login-checker', 'Auth::admin_login_checker');
    $routes->get('/admin/logout', 'Auth::logout_admin');
    
    //Admin
    $routes->get('/admin/dashboard', 'Admin::dashboard');
    $routes->get('/admin/detail-absen-karyawan/(:alphanum)/(:alphanum)', 'Admin::detail_absen_karyawan/$1/$2');
    $routes->get('/admin/profile-admin', 'Admin::profile_admin');
    $routes->post('/admin/simpan-profile-admin', 'Admin::simpan_profile_admin');
    $routes->get('/admin/logo-perusahaan', 'Admin::logo_perusahaan');
    $routes->post('/admin/simpan-logo-perusahaan', 'Admin::simpan_logo_perusahaan');
    
    //Karyawan
    $routes->get('/admin/master-data-karyawan', 'Karyawan::master_karyawan');
    $routes->get('/admin/hapus-data-karyawan/(:alphanum)', 'Karyawan::hapus_data_karyawan/$1');
    $routes->get('/admin/tambah-data-karyawan', 'Karyawan::tambah_data_karyawan');
    $routes->post('/admin/simpan-data-karyawan', 'Karyawan::simpan_data_karyawan');
    $routes->get('/admin/edit-data-karyawan/(:alphanum)', 'Karyawan::edit_data_karyawan/$1');
    $routes->post('/admin/update-data-karyawan/(:alphanum)', 'Karyawan::update_data_karyawan/$1');

    //Jabatan
    $routes->get('/admin/master-data-jabatan', 'Jabatan::master_jabatan');
    $routes->get('/admin/hapus-data-jabatan/(:alphanum)', 'Jabatan::hapus_data_jabatan/$1');
    $routes->post('/admin/simpan-data-jabatan', 'Jabatan::simpan_data_jabatan');
    $routes->post('/admin/update-data-jabatan/(:alphanum)', 'Jabatan::update_data_jabatan/$1');
    $routes->get('/admin/view-karyawan-perjabatan/(:alphanum)', 'Jabatan::view_jabatan/$1');
    $routes->get('/admin/view-karyawan-perjabatan/(:alphanum)/(:alphanum)', 'Jabatan::view_karyawan_perjabatan/$1/$2');

    //Jadwal
    $routes->get('/admin/master-data-jadwal', 'Jadwal::master_jadwal');
    $routes->post('/admin/simpan-data-jadwal', 'Jadwal::simpan_data_jadwal');
    $routes->get('/admin/tambah-data-jadwal', 'Jadwal::tambah_data_jadwal');
    $routes->get('/admin/edit-data-jadwal/(:alphanum)', 'Jadwal::edit_jadwal/$1');
    $routes->post('/admin/update-data-jadwal/(:alphanum)', 'Jadwal::update_data_jadwal/$1');
    $routes->get('/admin/update-data-libur', 'Jadwal::update_data_libur');
    $routes->post('/admin/update-libur', 'Jadwal::update_libur');
    $routes->get('/admin/hapus-data-jadwal/(:alphanum)', 'Jadwal::hapus_data_jadwal/$1');

    //Lokasi
    $routes->get('/admin/master-data-lokasi', 'Lokasi::master_data_lokasi');
    $routes->get('/admin/tambah-data-lokasi', 'Lokasi::tambah_data_lokasi');
    $routes->post('/admin/simpan-data-lokasi', 'Lokasi::simpan_data_lokasi');
    $routes->get('/admin/edit-data-lokasi/(:alphanum)', 'Lokasi::edit_data_lokasi/$1');
    $routes->post('/admin/update-lokasi/(:alphanum)', 'Lokasi::update_lokasi/$1');

    //Pengajuan
    $routes->get('/admin/master-data-pengajuan', 'Izin::master_data_pengajuan');
    $routes->post('/admin/terima-pengajuan/(:alphanum)/(:alphanum)', 'Izin::terima_data_pengajuan/$1/$2');
    $routes->post('/admin/tolak-pengajuan/(:alphanum)', 'Izin::tolak_data_pengajuan/$1');
    
    //Daftar Gaji
    $routes->get('/admin/master-daftar-gaji', 'Gaji::daftar_gaji');
    $routes->post('/admin/simpan-daftar-gaji', 'Gaji::simpan_daftar_gaji');
    $routes->get('/admin/edit-daftar-gaji/(:alphanum)', 'Gaji::edit_daftar_gaji/$1');
    $routes->post('/admin/update-daftar-gaji/(:alphanum)', 'Gaji::update_daftar_gaji/$1');
    $routes->get('/admin/hapus-daftar-gaji/(:alphanum)', 'Gaji::hapus_daftar_gaji/$1');

    //Master Pembayaran Gaji
    $routes->get('/admin/master-pembayaran-gaji', 'Gaji::master_pembayaran');
    $routes->post('/admin/simpan-pembayaran-gaji', 'Gaji::simpan_pembayaran_gaji');
    $routes->post('/admin/update-pembayaran-gaji/(:alphanum)', 'Gaji::update_pembayaran_gaji/$1');
    $routes->get('/admin/hapus-pembayaran-gaji/(:alphanum)', 'Gaji::hapus_pembayaran_gaji/$1');
    $routes->get('/admin/cetak-pembayaran/(:alphanum)/(:alphanum)', 'Gaji::cetak_pembayaran/$1/$2');

    //History Absensi
    $routes->get('/admin/laporan-absensi', 'History::laporan_absensi');
    $routes->get('/admin/history-absensi', 'History::history_absensi');
    $routes->get('/admin/detail-history-absensi/(:alphanum)/(:alphanum)', 'History::detail_history_absensi/$1/$2');