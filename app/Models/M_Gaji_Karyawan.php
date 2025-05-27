<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Gaji_Karyawan extends Model
{
    protected $table = 'tbl_gaji_karyawan';
    
    public function getDataGajiKaryawan($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->join('tbl_karyawan','tbl_karyawan.id_karyawan = tbl_gaji_karyawan.id_karyawan', 'LEFT');
            $builder->join('tbl_gaji','tbl_gaji.id_gaji = tbl_gaji_karyawan.id_gaji', 'LEFT');
            $builder->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_karyawan.id_jabatan', 'LEFT');
            $builder->orderBy('tbl_gaji_karyawan.id_gaji_karyawan','DESC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->join('tbl_karyawan','tbl_karyawan.id_karyawan = tbl_gaji_karyawan.id_karyawan', 'LEFT');
            $builder->join('tbl_gaji','tbl_gaji.id_gaji = tbl_gaji_karyawan.id_gaji', 'LEFT');
            $builder->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_karyawan.id_jabatan', 'LEFT');
            $builder->orderBy('tbl_gaji_karyawan.id_gaji_karyawan','DESC');
            return $query = $builder->get();
        }
    }

    public function saveDataGajiKaryawan($data)
    {
      $builder = $this->db->table($this->table);
      return $builder->insert($data);
    }

    public function updateDataGajiKaryawan($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataGaji($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_gaji_karyawan', $id);
        $result = $builder->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function autoNumber() 
    {
        $builder = $this->db->table($this->table);
        $builder->select("id_gaji_karyawan");
        $builder->orderBy("id_gaji_karyawan", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
    }
}
