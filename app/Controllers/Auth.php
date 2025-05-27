<?php 
namespace App\Controllers;

use App\Models\M_Karyawan;
use App\Models\M_User;

class Auth extends BaseController
{
    public function antiinjection($data)
    {
        $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
        return $filter_sql;
    }
    public function auth_karyawan()
    {
        echo view('Frontend/auth/login', );    
    }
    public function karyawan_login_checker()
    {
        $modelKaryawan = new M_Karyawan;
        $username = $this->antiinjection($this->request->getPost('username'));
        $password = $this->antiinjection($this->request->getPost('password'));
    
        $sqlCek = $modelKaryawan->getDataKaryawan(['username' => $username]);
        $ada = $sqlCek->getNumRows();
     
        if($ada == 0) {
            session()->setFlashdata('error', "Gagal... Cek Kombinasi Username dan Password!!");
            ?>
    <script type="text/javascript">
       document.location = "<?php echo base_url('/');?>";
    </script>
    <?php
        }else{
            $dataKaryawan = $sqlCek->getRowArray();
     
            $verifyPass = password_verify($password, $dataKaryawan['password']);
            if (!$verifyPass) {
                session()->setFlashdata('error','Gagal... Cek Kombinasi Username dan Password!!');
                ?>
                <script type="text/javascript">
                    document.location = "<?php echo base_url('/');?>";
                </script>
                <?php
            }
            else{
                $dataSession =[
                    'ses_id' => $dataKaryawan['id_karyawan'],                
                    'ses_nik' => $dataKaryawan['nik_karyawan'],                
                    'ses_karyawan' => $dataKaryawan['nama_karyawan'],
                    'ses_username' => $dataKaryawan['username'],
                    'enid' => sha1($dataKaryawan['id_karyawan'])
                ];
                session()->set($dataSession);

                ?>
                <script type="text/javascript">
                document.location = "<?php echo base_url('/karyawan/home'); ?>";
                </script>
                <?php
            }
        }
    }

    public function logout_karyawan()
    {
        session()->remove('ses_id');
        session()->remove('ses_karyawan');
        session()->remove('enid');
        session()->setFlashdata('info', 'Keluar dari Sistem!!');
        ?>
        <script>
            document.location = "<?= base_url('/'); ?>";
        </script>
    <?php
    }

    public function auth_admin()
    {
        echo view('Backend/auth/login');
    }

    public function admin_login_checker()
    {
        $modelUser = new M_User;
        $username = $this->antiinjection($this->request->getPost('username'));
        $password = $this->antiinjection($this->request->getPost('password'));
    
        $sqlCek = $modelUser->getDataUser(['username' => $username]);
        $ada = $sqlCek->getNumRows();
     
        if($ada == 0) {
            session()->setFlashdata('error', "Gagal... Cek Kombinasi Username dan Password!!");
            ?>
    <script type="text/javascript">
       document.location = "<?php echo base_url('/admin/login');?>";
    </script>
    <?php
        }else{
            $dataUser = $sqlCek->getRowArray();
     
            $verifyPass = password_verify($password, $dataUser['password']);
            if (!$verifyPass) {
                session()->setFlashdata('error','Gagal... Cek Kombinasi Username dan Password!!');
                ?>
                <script type="text/javascript">
                    document.location = "<?php echo base_url('/admin/login');?>";
                </script>
                <?php
            }
            else{
                $dataSession =[
                    'ses_id' => $dataUser['id_user'],                
                    'ses_user' => $dataUser['nama_user'],                
                    'ses_username' => $dataUser['username'],
                    'enid' => sha1($dataUser['id_user'])
                ];
                session()->set($dataSession);

                ?>
                <script type="text/javascript">
                document.location = "<?php echo base_url('/admin/dashboard'); ?>";
                </script>
                <?php
            }
        }
    }
    
    public function logout_admin()
    {
        session()->remove('ses_id');
        session()->remove('ses_user');
        session()->remove('enid');
        session()->setFlashdata('info', 'Keluar dari Sistem!!');
        ?>
        <script>
            document.location = "<?= base_url('/admin/login'); ?>";
        </script>
    <?php
    }
}