<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Izin extends Model
{
    protected $table = 'tbl_izin';
 
    public function getDataIzin($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->join('tbl_karyawan','tbl_karyawan.id_karyawan = tbl_izin.id_karyawan', 'LEFT');
            $builder->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_karyawan.id_jabatan', 'LEFT');
            $builder->orderBy('tbl_izin.id_izin','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->join('tbl_karyawan','tbl_karyawan.id_karyawan = tbl_izin.id_karyawan', 'LEFT');
            $builder->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_karyawan.id_jabatan', 'LEFT');
            $builder->orderBy('tbl_izin.id_izin','ASC');
            return $query = $builder->get();
        }
    }
    
    public function saveDataIzin($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataIzin($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }
    
    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_izin");
        $builder->orderBy("id_izin", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>