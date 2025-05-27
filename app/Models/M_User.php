<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_User extends Model
{
    protected $table = 'tbl_user';
 
    public function getDataUser($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_user','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_user','ASC');
            return $query = $builder->get();
        }
    }
    
    public function saveDataUser($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataUser($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }
    
    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_user");
        $builder->orderBy("id_user", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>