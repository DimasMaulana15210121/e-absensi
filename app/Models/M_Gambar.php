<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Gambar extends Model
{
    protected $table = 'tbl_gambar';
 
    public function getDataGambar($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_gambar','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_gambar','ASC');
            return $query = $builder->get();
        }
    }

    public function saveDataGambar($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataGambar($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataGambar($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_gambar', $id);
        $result = $builder->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_gambar");
        $builder->orderBy("id_gambar", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>