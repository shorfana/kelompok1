<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Login extends MY_Controller
{
function __construct()
{
parent::__construct();
// $this->load->model('Dbs');
$this->load->library('form_validation');
// $this->load->library('form_validation');

}

public function index()
{
  if($this->session->userdata("username")){
    redirect('admin');
  }else{
    $this->load->view('login');

  }
}


public function register(){

$this->load->view('register');

}

public function registertrial(){

$this->load->view('registertrial');

}
//
// public function logout(){
// $this->session->sess_destroy();
// redirect(base_url()."login");
// }
// public function login_act(){
//     $username=$this->input->post('username');
//     $password=$this->input->post('password');
//
//     $where=array(
//     'username' => $username,
//     'password' => sha1($password)
//
//     );
//       if($this->Dbs->cek_login("admin",$where)->num_rows()>0){// cek ke tabel user
//     $nama = $this->Dbs->getUserId($username);
//     $data_session = array(
//     'username' => $username,
//     'nama'=>  $nama->nama,
//     'user' => 'admin',
//     );
//     // var_dump($data_session); die;
//
//
//     $this->session->set_userdata($data_session);
//
//     redirect(base_url("admin"));
//   }else{
//     echo "<script type='text/javascript'>alert('Username atau password Salah!!!'); document.location='http://localhost/ProjectTravel/login' </script>";
//
//     }
// }
//
// function login_agen(){
//   $username=$this->input->post('username');
//   $password=$this->input->post('password');
//
//   $where=array(
//   'username' => $username,
//   'password' => sha1($password)
//
//   );
//
//   if($this->Dbs->cek_login("agen",$where)->num_rows()>0){
//     $nama = $this->Dbs->getUserIdagen($username);
//     $data_session = array(
//     'username' => $username,
//     'nama'=>  $nama->nama,
//     'user' => 'agen',
//     );
//     $this->session->set_userdata($data_session);
//
//     redirect(base_url("agen"));
//   }else{
//     echo "<script type='text/javascript'>alert('Username atau password Salah!!!'); document.location='http://localhost/ProjectTravel/login/loginagen' </script>";
//
//     }
//
// }
//
// function loginagen(){
//
//
//
//
//           $this->load->view('login/loginagen');//melempar data dari view
//
//
//
// }
//
//
// function lupapass(){
//           $this->load->view('login/forgotpass');//melempar data dari view
// }
//
//     function lupa_password_act(){
//       $email = $this->input->post('email');
//       $data = array(
//         'email' => $email
//       );
//       $data_email = $this->Dbs->cek_login("admin",$data);
//       // var_dump($email);die;
//
//       if ($data_email->num_rows()>0) {
//         $this->kirimEmail($email);
//         echo "<script type='text/javascript'>alert('Email Berhasil terkirim, Cek email'); document.location='http://localhost/ProjectTravel/login' </script>";
//       }else{
//         echo "<script type='text/javascript'>alert('Email Tidak terdaftar atau email salah'); document.location='http://localhost/ProjectTravel/login/lupapass' </script>";
//       }
// }
//
// function reset_password($code){
//       $data = array(
//         'kode' => $code
//       );
//       $this->load->view('resetpass',$data);
//     }
//
//     function reset_password_act(){
//           $password = $this->input->post('password');
//           $kode = $this->input->post('kode');
//           $data_password = array(
//             'password' => sha1($password)
//           );
//            // var_dump($kode);die;
//
//           if($this->Dbs->resetpasswordUser($data_password,'admin','forgotten_password_code',$kode)){
//             echo "<script type='text/javascript'>alert('Password Berhasil DI reset'); document.location='http://localhost/ProjectTravel/login' </script>";
//         }else {
//           echo "<script type='text/javascript'>alert('Password gagal di reset'); document.location='http://localhost/ProjectTravel/login' </script>";
//         }}
//
//
// function kirimEmail($emailtujuan){
//       $pass="129FAasdsk25kwBjakjDlff";
//       $panjang='8';
//       $len=strlen($pass);
//       $start=$len-$panjang;
//       $xx=rand('0',$start);
//       $yy=str_shuffle($pass);
//       $randomString=substr($yy, $xx, $panjang);
//       $data = array(
//         'forgotten_password_code' => $randomString,
//       );
//       //update ke kolom forgoten
//       $this->Dbs->ubahpasswordUser($data,'admin','email',$emailtujuan);
//       $link=base_url()."login/reset_password/".$randomString;
//       //ekseksusi kirim email berdasarkan params
//       //isi email berupa link
//       $config['protocol'] = 'smtp';
//       $config['smtp_host'] = 'ssl://smtp.gmail.com';
//       $config['smtp_port'] = '465';
//       $config['smtp_user'] = 'dreamworldbdg@gmail.com';
//       $config['smtp_pass'] = 'Indonesia1'; //ini pake akun pass google email
//       $config['mailtype'] = 'html';
//       $config['charset'] = 'iso-8859-1';
//       $config['wordwrap'] = 'TRUE';
//       $config['newline'] = "\r\n";
//       $this->load->library('email', $config);
//       $this->email->initialize($config);
//       $this->email->from('erzihutama@gmail.com');
//       $this->email->to($emailtujuan);
//       $this->email->subject('Reset Password');
//       $this->email->message('Silahkan klik link berikut untuk mereset password anda '.$link);
//       $this->email->set_mailtype('html');
//       $this->email->send();
//    }



public function _rules()
{
$this->form_validation->set_rules('nama', 'nama', 'trim|required');
$this->form_validation->set_rules('email', 'email', 'trim|required');
$this->form_validation->set_rules('username', 'username', 'trim|required');
$this->form_validation->set_rules('password', 'password', 'trim|required');
$this->form_validation->set_rules('id_user', 'id_user', 'trim');
$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

}

}
