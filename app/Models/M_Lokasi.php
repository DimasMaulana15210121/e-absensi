<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Lokasi extends Model
{
    protected $table = 'tbl_lokasi';
 
    public function getDataLokasi($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_lokasi','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_lokasi','ASC');
            return $query = $builder->get();
        }
    }

    public function saveDataLokasi($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataLokasi($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataLokasi($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_lokasi', $id);
        $result = $builder->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_lokasi");
        $builder->orderBy("id_lokasi", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>