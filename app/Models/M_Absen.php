<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Absen extends Model
{
    protected $table = 'tbl_absen';
 
    public function getDataAbsen($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->join('tbl_karyawan','tbl_karyawan.id_karyawan = tbl_absen.id_karyawan', 'LEFT');
            $builder->join('tbl_lokasi','tbl_lokasi.id_lokasi = tbl_absen.id_lokasi', 'LEFT');
            $builder->join('tbl_jadwal','tbl_jadwal.id_jadwal = tbl_absen.id_jadwal', 'LEFT');
            $builder->orderBy('tbl_absen.id_absen','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->join('tbl_karyawan','tbl_karyawan.id_karyawan = tbl_absen.id_karyawan', 'LEFT');
            $builder->join('tbl_lokasi','tbl_lokasi.id_lokasi = tbl_absen.id_lokasi', 'LEFT');
            $builder->join('tbl_jadwal','tbl_jadwal.id_jadwal = tbl_absen.id_jadwal', 'LEFT');
            $builder->orderBy('tbl_absen.id_absen','ASC');
            return $query = $builder->get();
        }
    }
    public function getDataFilterAbsen($filter = [], $tgl_awal = null, $tgl_akhir = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('tbl_absen.status IS NOT NULL', null, false);
        $builder->join('tbl_karyawan','tbl_karyawan.id_karyawan = tbl_absen.id_karyawan', 'LEFT');
        $builder->join('tbl_lokasi','tbl_lokasi.id_lokasi = tbl_absen.id_lokasi', 'LEFT');
        $builder->join('tbl_jadwal','tbl_jadwal.id_jadwal = tbl_absen.id_jadwal', 'LEFT');
        $builder->orderBy('tbl_absen.id_absen','ASC');
        // filter kondisi
        if (!empty($filter)) {
            $builder->where($filter);
        }
        // filter tanggal
        if ($tgl_awal && $tgl_akhir) {
            $builder->where('tbl_jadwal.tanggal >=', $tgl_awal);
            $builder->where('tbl_jadwal.tanggal <=', $tgl_akhir);
        }
    
        return $builder->get();
    }

    public function getDataHistory($idKaryawan = null, $bulan = null, $tahun = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('tbl_karyawan', 'tbl_karyawan.id_karyawan = tbl_absen.id_karyawan', 'LEFT');
        $builder->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_absen.id_jadwal', 'LEFT');
        
        if ($idKaryawan && $bulan && $tahun) {
            $builder->where('tbl_absen.id_karyawan', $idKaryawan);
            $builder->where('MONTH(tbl_jadwal.tanggal)', $bulan);
            $builder->where('YEAR(tbl_jadwal.tanggal)', $tahun);
        }
    
        $builder->orderBy('tbl_absen.id_karyawan', 'ASC');
        return $builder->get();
    }

    // public function getStatusAbsenKosong($tanggal)
    // {
    //         $builder = $this->db->table($this->table);
    //         $builder->select('*');
    //         $builder->join('tbl_jadwal','tbl_jadwal.id_jadwal = tbl_absen.id_jadwal', 'LEFT');
    //         $builder->where('tbl_jadwal.tanggal', $tanggal);
    //         $builder->where('tbl_absen.status', null);
    //         // $builder->orderBy('tbl_absen.id_absen','ASC');
    //         return $builder->get();
    // }
    
    public function saveDataAbsen($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataAbsen($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function hapusDataAbsen($column, $value)
    {
        $builder = $this->db->table($this->table);
        $builder->where($column, $value);
        return $builder->delete();
    }
    
    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_absen");
        $builder->orderBy("id_absen", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>