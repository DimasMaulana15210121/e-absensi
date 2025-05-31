<?php
namespace App\Controllers;

use App\Models\M_Karyawan;

class Profile extends BaseController
{
    public function profile()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelKaryawan = new M_Karyawan;

        $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')])->getRowArray();

        $data['data_karyawan'] = $dataKaryawan;
        $data['page'] = $page;
        $data['judul'] = "Profile" ;
        $data['menu'] = "profile" ;

        echo view('Frontend/template/header' ,$data);    
        echo view('Frontend/MasterProfile/profile-karyawan', $data);    
        echo view('Frontend/template/bottom-menu', $data);    
    }

    public function simpan_profile()
    {

        $modelKaryawan = new M_Karyawan;

        $nik_karyawan = $this->request->getPost('nik_karyawan');
        $nama_karyawan = $this->request->getPost('nama_karyawan');
        $alamat = $this->request->getPost('alamat');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $no_hp = $this->request->getPost('no_hp');
        $username = $this->request->getPost('username');
        $password_old = $this->request->getPost('password');
        $foto_karyawan_old = $this->request->getPost('foto_karyawan_old');
        $foto_karyawan = $this->request->getFile('foto_karyawan');

        $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')])->getRowArray();
        $idUpdate = $dataKaryawan['id_karyawan'];

        if ($foto_karyawan->isValid() && !$foto_karyawan->hasMoved()) {
            // Validasi file
            if (!$this->validate([
                'foto_karyawan' => 'max_size[foto_karyawan,10240]|ext_in[foto_karyawan,jpg,jpeg,png]',
            ])) {
                return $this->response->setJSON([
                    'status' => 'error', 'message' => 'Format file yang diizinkan: JPG, JPEG, PNG maksimal 10MB'
                ]);
            }
        
            $ext1 = $foto_karyawan->getClientExtension();
            $namaFile1 = ($foto_karyawan_old == '-' || !file_exists("Assets/img/karyawan/".$foto_karyawan_old))
                ? "PP-".date("ymdHis").".".$ext1
                : $foto_karyawan_old;
        
            $foto_karyawan->move('Assets/img/karyawan/', $namaFile1, true);
        } else {
            $namaFile1 = $foto_karyawan_old; // Tidak upload, pakai yang lama
        }

        $dataUpdate = [
            'nik_karyawan' => $nik_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'username' => $username,
            'password' => ($password_old == '') ? $dataKaryawan['password'] : password_hash($password_old, PASSWORD_DEFAULT),
            'foto_karyawan' => $namaFile1,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $whereUpdate = ['id_karyawan' => $idUpdate];
        $modelKaryawan->updateDataKaryawan($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        return $this->response->setJSON([
            'status' => 'success', 'message' => 'Profil berhasil diperbarui'
        ]);
        // session()->setFlashdata('success','Data Profile Berhasil Diperbarui!!');
        // return redirect()->to(base_url('/karyawan/profile'));
    }

    public function edit_rekening()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelKaryawan = new M_Karyawan;

        $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')])->getRowArray();

        $data['data_karyawan'] = $dataKaryawan;
        $data['page'] = $page;
        $data['judul'] = "Edit Data Rekening" ;
        $data['menu'] = "rekening" ;

        echo view('Frontend/template/header' ,$data);    
        echo view('Frontend/MasterProfile/edit-data-rekening', $data);    
        echo view('Frontend/template/bottom-menu', $data);    
    }

    public function update_rekening()
    {

        $modelKaryawan = new M_Karyawan;

        $no_rek = $this->request->getPost('no_rek');
        $nama_bank = $this->request->getPost('nama_bank');
        $atas_nama = $this->request->getPost('atas_nama');

        $dataKaryawan = $modelKaryawan->getDataKaryawan(['tbl_karyawan.id_karyawan' => session('ses_id')])->getRowArray();
        $idUpdate = $dataKaryawan['id_karyawan'];

        $dataUpdate = [
            'no_rek' => $no_rek,
            'nama_bank' => $nama_bank,
            'atas_nama' => $atas_nama,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $whereUpdate = ['id_karyawan' => $idUpdate];
        $modelKaryawan->updateDataKaryawan($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Rekening Berhasil Diperbarui!!');
        return redirect()->to(base_url('/karyawan/profile'));
    }
}
