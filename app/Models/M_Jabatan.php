<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Jabatan extends Model
{
    protected $table = 'tbl_jabatan';
 
    public function getDataJabatan($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_jabatan','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_jabatan','ASC');
            return $query = $builder->get();
        }
    }

    public function saveDataJabatan($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataJabatan($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataJabatan($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_jabatan', $id);
        $result = $builder->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_jabatan");
        $builder->orderBy("id_jabatan", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>