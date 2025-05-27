<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Jadwal extends Model
{
    protected $table = 'tbl_jadwal';
 
    public function getDataJadwal($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_jadwal','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_jadwal','ASC');
            return $query = $builder->get();
        }
    }

    // public function getDataHistory($idKaryawan = null, $bulan = null, $tahun = null)
    // {
    //     $builder = $this->db->table($this->table);
    //     $builder->select('*');
    //     $builder->join('tbl_karyawan', 'tbl_karyawan.id_karyawan = tbl_absen.id_karyawan', 'LEFT');
        
    //     if ($idKaryawan && $bulan && $tahun) {
    //         $builder->where('tbl_absen.id_karyawan', $idKaryawan);
    //         $builder->where('MONTH(tbl_absen.tgl_absen)', $bulan);
    //         $builder->where('YEAR(tbl_absen.tgl_absen)', $tahun);
    //     }
    
    //     $builder->orderBy('tbl_absen.id_karyawan', 'ASC');
    //     return $builder->get();
    // }
    
    public function saveDataJadwal($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataJadwal($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataJadwal($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_jadwal', $id);
        $result = $builder->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_jadwal");
        $builder->orderBy("id_jadwal", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>