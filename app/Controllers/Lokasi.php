<?php 
namespace App\Controllers;

use App\Models\M_Lokasi;

class Lokasi extends BaseController
{
    public function master_data_lokasi()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelLokasi = new M_Lokasi;

        $dataLokasi = $modelLokasi->getDataLokasi(['is_delete_lokasi' => '0'])->getResultArray();
        $data['data_lokasi'] = $dataLokasi;

        $data['page'] = $page;

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterLokasi/master-data-lokasi', $data);
        echo view('Backend/template/footer', $data);
    }
    
    public function tambah_data_lokasi()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $modelLokasi = new M_Lokasi;

        $dataLokasi = $modelLokasi->getDataLokasi(['is_delete_lokasi' => '0'])->getResultArray();
        $data['data_lokasi'] = $dataLokasi;

        $data['page'] = $page;

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterLokasi/tambah-data-lokasi', $data);
        echo view('Backend/template/footer', $data);
    }

    public function simpan_data_lokasi()
    {
        $modelLokasi = new M_Lokasi;

        $nama_lokasi = $this->request->getPost('nama_lokasi');
        $alamat = $this->request->getPost('alamat');
        $lokasi = $this->request->getPost('lokasi');
        $radius = $this->request->getPost('radius');

        $hasil = $modelLokasi->autoNumber()->getRowArray();
        if (!$hasil) {
            $id = "LOK".date("Ymd")."00001";
        } else {
            $kode = $hasil['id_lokasi'];
            $noUrut = (int) substr($kode, -5);
            $noUrut++;
            $id = "LOK".date("Ymd").sprintf("%05s", $noUrut);
        }

        $dataSimpan = [
            'id_lokasi' => $id,
            'nama_lokasi' => $nama_lokasi,
            'alamat' => $alamat,
            'lokasi' => $lokasi,
            'radius' => $radius,
            'is_delete_lokasi' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $modelLokasi->saveDataLokasi($dataSimpan);
        session()->setFlashdata('success', 'Data Lokasi berhasil ditambahkan!!');
        return redirect()->to(base_url('/hr/master-data-lokasi'));
    }
    
    public function edit_data_lokasi()
    {
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);

        $modelLokasi = new M_Lokasi;

        $dataLokasi = $modelLokasi->getDataLokasi(['sha1(id_lokasi)' => $idEdit])->getRowArray();
        $data['data_lokasi'] = $dataLokasi;

        $data['page'] = $page;

        echo view('Backend/template/head', $data);
        echo view('Backend/template/sidebar', $data);
        echo view('Backend/MasterLokasi/edit-data-lokasi', $data);
        echo view('Backend/template/footer', $data);
    }

    public function update_lokasi()
    {
        $modelLokasi = new M_Lokasi;
        $uri = service('uri');
        $idEdit = $uri->getSegment(3);

        $dataLokasi = $modelLokasi->getDataLokasi(['id_lokasi' => $idEdit])->getRowArray();
        $idUpdate = $dataLokasi['id_lokasi'];
        
        $nama_lokasi = $this->request->getPost('nama_lokasi');
        $alamat = $this->request->getPost('alamat');
        $lokasi = $this->request->getPost('lokasi');
        $radius = $this->request->getPost('radius');

        $dataUpdate = [
            'nama_lokasi' => $nama_lokasi,
            'alamat' => $alamat,
            'lokasi' => $lokasi,
            'radius' => $radius,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $whereUpdate = ['id_lokasi' => $idUpdate];
        $modelLokasi->updateDataLokasi($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        session()->setFlashdata('success','Data Berhasil Diperbarui!!');
        return redirect()->to(base_url('/hr/master-data-lokasi'));
    }

    public function hapus_data_lokasi($id)
    {
 
        $modelLokasi = new M_Lokasi;
    
        $modelLokasi->hapusDataLokasi($id);

        session()->setFlashdata('success','Data Lokasi Berhasil dihapus!!');

        return redirect()->to(base_url('/hr/master-data-lokasi'));
    }
}