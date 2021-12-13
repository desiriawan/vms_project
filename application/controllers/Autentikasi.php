<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentikasi extends INI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
    }

    public function index()
    {
        if ($this->session->userdata('authenticated'))
            redirect('welcome/index');


        $this->render_login('login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->UserModel->get($username);

        if (empty($user)) {
            $this->session->set_flashdata('message', 'Username tidak ditemukan');
            redirect('autentikasi');
        } else {
            if ($password == $user->password) {
                $session = array(
                    'authenticated' => true,
                    'username' => $user->username,
                    'nama' => $user->nama,
                    'sebagai' => $user->sebagai
                );

                $this->session->set_userdata($session);
                redirect('welcome/index');
            } else {
                $this->session->set_flashdata('message', 'Password salah');
                redirect('autentikasi');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('autentikasi');
    }
}
