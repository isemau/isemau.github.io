<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }



    public function index()
    {
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if( $this->form_validation->run() == false)
        {
        $masukkoTuSon['title'] = 'User Login';
        $this->load->view('auth/auth_header', $masukkoTuSon);
        $this->load->view('auth/login');
        $this->load->view('auth/auth_footer');
        } else 
        {
            //Validasi Login Sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $no_hp = $this->input->post('no_hp');
        $password =$this->input->post('password');

        //Ambil Data dari form dan kirimkan ke db & validasi
        $user = $this->db->get_where('makmur_pulsa_user', ['no_hp' => $no_hp])->row_array();
//Jika User Ada
        if($user){
            //Jika Usernya Aktif
            if($user['is_active'] == 1) {
                //Cek Password
                if(password_verify($password, $user['password'])){
                    $data = [
                        'no_hp' => $user['no_hp'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
        //INI MASIH ERROR DI VIDEO TUTOR KE 4 (MEMBUAT SISTEM LOGIN LENGKAP MENGGUNAKAN CODEIGNITER)
                    redirect ('landing');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah..!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Anda belum Tervalidasi..!!</div>');
                redirect('auth');  
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor Hp Belum Terdaftar.!</div>');
            redirect('auth');
        }

    }


    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama Member', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|trim|is_unique[makmur_pulsa_user.no_hp]', [
            'is_unique' => 'Nomor HP Sudah Terdaftar..!!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'min_length' => 'Password Minimal 3 Karakter',
            'matches' => 'Password Salah..!!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if( $this->form_validation->run() == false)
        {
        $RoboKuSon['title'] = 'User Registration';
        $this->load->view('auth/auth_header', $RoboKuSon);
        $this->load->view('auth/register');
        $this->load->view('auth/auth_footer');
        }else
        {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active'=> 1,
                'date_created' => time()
            ];
                $this->db->insert('makmur_pulsa_user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SELAMAT.!! Kode Validasi Akun akan dikirim ke <?= $no_hp($no_hp); ?></div>');
                redirect ('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terimakasih...!!</div>');
        redirect('auth');
    }
}