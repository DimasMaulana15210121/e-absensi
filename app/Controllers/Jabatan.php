<?php 
namespace App\Controllers;

use App\Models\M_Jabatan;
use App\Models\M_Karyawan;


class Jabatan extends BaseController
{
    public function master_jabatan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelJabatan = new M_Jabatan();
        $dataJabatan = $modelJabatan->getDataJabatan(['is_delete_jabatan' => '0'])->getResultArray();
        
        $data['page'] = $page;
        $data['data_jabatan'] = $dataJabatan;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterJabatan/master-data-jabatan', $data);
        echo view('Backend/template/footer', $data);
    }

    public function simpan_data_jabatan()
    {
        $modelJabatan = new M_Jabatan;

        $nama_jabatan = $this->request->getPost('nama_jabatan');

        $hasil = $modelJabatan->autoNumber()->getRowArray();
        if (!$hasil) {
            $id = "JBT".date("Ymd")."00001";
        } else {
            $kode = $hasil['id_jabatan'];
            $noUrut = (int) substr($kode, -5);
            $noUrut++;
            $id = "JBT".date("Ymd").sprintf("%05s", $noUrut);
        }

        $dataSimpan = [
            'id_jabatan' => $id,
            'nama_jabatan' => $nama_jabatan,
            'is_delete_jabatan' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $modelJabatan->saveDataJabatan($dataSimpan);
        session()->setFlashdata('success', 'Permohonan izin berhasil ditambahkan!!');
        return redirect()->to(base_url('/admin/master-data-jabatan'));
    }

    public function update_data_jabatan()
    {
        $uri = service('uri');
        // $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelJabatan = new M_Jabatan;

        $nama_jabatan = $this->request->getPost('edit_nama_jabatan');
        $dataJabatan = $modelJabatan->getDataJabatan(['id_jabatan' => $idEdit])->getRowArray();
        $idUpdate = $dataJabatan['id_jabatan'];

        $dataUpdate = [
            'nama_jabatan' => $nama_jabatan,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $whereUpdate = ['id_jabatan' => $idUpdate];
        $modelJabatan->updateDataJabatan($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Berhasil Diperbarui!!');
        return redirect()->to(base_url('/admin/master-data-jabatan'));
    }

    public function hapus_data_jabatan($id)
    {
 
        $modelJabatan = new M_Jabatan;;
    
        $modelJabatan->hapusDataJabatan($id);

        session()->setFlashdata('success','Data Karyawan Berhasil dihapus!!');

        return redirect()->to(base_url('/admin/master-data-jabatan'));
    }

    public function view_jabatan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idView = $uri->getSegment(3);

        $modelJabatan = new M_Jabatan;
        $modelKaryawan = new M_Karyawan;

        $dataKaryawan = $modelKaryawan->getDataKaryawan(['sha1(tbl_karyawan.id_jabatan)' => $idView])->getResultArray();
        $dataJabatan = $modelJabatan->getDataJabatan(['sha1(id_jabatan)' => $idView])->getRowArray();
        
        $data['page'] = $page;
        $data['data_jabatan'] = $dataJabatan;
        $data['data_karyawan'] = $dataKaryawan;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterJabatan/view-jabatan', $data);
        echo view('Backend/template/footer', $data);
    }

    public function view_karyawan_perjabatan()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idJabatan = $uri->getSegment(3);
        $idKaryawan = $uri->getSegment(4);

        $modelJabatan = new M_Jabatan;
        $modelKaryawan = new M_Karyawan;

        $dataKaryawan = $modelKaryawan->getDataKaryawan(['sha1(tbl_karyawan.id_jabatan)' => $idJabatan, 'sha1(tbl_karyawan.id_karyawan)' => $idKaryawan])->getRowArray();
        // $dataJabatan = $modelJabatan->getDataJabatan(['sha1(id_jabatan)' => $idView])->getRowArray();
        
        $data['page'] = $page;
        // $data['data_jabatan'] = $dataJabatan;
        $data['data_karyawan'] = $dataKaryawan;
        $data['menu'] = "dashboard";

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterJabatan/view-karyawan-perjabatan', $data);
        echo view('Backend/template/footer', $data);
    }
}