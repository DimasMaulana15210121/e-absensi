<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Karyawan extends Model
{
    protected $table = 'tbl_karyawan';
 
    public function getDataKaryawan($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_karyawan.id_jabatan', 'LEFT');
            $builder->join('tbl_gaji','tbl_gaji.id_jabatan = tbl_karyawan.id_jabatan', 'LEFT');
            $builder->join('tbl_lokasi','tbl_lokasi.id_lokasi = tbl_karyawan.id_lokasi', 'LEFT');
            $builder->orderBy('tbl_karyawan.id_karyawan','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_karyawan.id_jabatan', 'LEFT');
            $builder->join('tbl_gaji','tbl_gaji.id_jabatan = tbl_karyawan.id_jabatan', 'LEFT');
            $builder->join('tbl_lokasi','tbl_lokasi.id_lokasi = tbl_karyawan.id_lokasi', 'LEFT');
            $builder->orderBy('tbl_karyawan.id_karyawan','ASC');
            return $query = $builder->get();
        }
    }

    public function getDataYears($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_karyawan','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_karyawan','ASC');
            return $query = $builder->get();
        }
    }
    
    public function saveDataKaryawan($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataKaryawan($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataKaryawan($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_karyawan', $id);
        $result = $builder->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_karyawan");
        $builder->orderBy("id_karyawan", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>