<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Gaji extends Model
{
    protected $table = 'tbl_gaji';
 
    public function getDataGaji($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_gaji.id_jabatan', 'LEFT');
            $builder->orderBy('tbl_gaji.id_gaji','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_gaji.id_jabatan', 'LEFT');
            $builder->orderBy('tbl_gaji.id_gaji','ASC');
            return $query = $builder->get();
        }
    }
    
    public function saveDataGaji($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataGaji($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataGaji($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_gaji', $id);
        $result = $builder->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_gaji");
        $builder->orderBy("id_gaji", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>