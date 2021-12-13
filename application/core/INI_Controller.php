<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class INI_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->authenticated();
    }

    public function authenticated()
    {
        if ($this->uri->segment(1) != 'autentikasi' && $this->uri->segment(1) != '') {

            if (!$this->session->userdata('authenticated'))
                redirect('autentikasi');
        }
    }

    public function render_login($content, $data = NULL)
    {
        $data['contentnya'] = $this->load->view($content, $data, TRUE);

        $this->load->view('template/login/index', $data);
    }

    public function render_backend($content, $data = NULL)
    {

        $data['headernya'] = $this->load->view('template/log/header', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);

        $this->load->view('template/log/index', $data);
    }
}
