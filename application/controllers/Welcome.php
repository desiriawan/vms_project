<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_tamu_Model', 'daftar_tamu_Model');
    }

	public function index()
	{
		$data=[
			"judul" => "Beranda"
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('welcome_message');
		$this->load->view('templates/footer');
	}

	public function pengunjung()
	{
		$data=[
			"judul" => "Pengunjung"
		];
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('pengunjung');
		$this->load->view('templates/footer');
	}

	public function kunjungan()
	{
		$data=[
			"judul" => "Kunjungan"
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('kunjungan');
		$this->load->view('templates/footer');
	}

	function get_tamu()
    {
        $list = $this->daftar_tamu_Model->get_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();

            $row['NO']              = $no;
            $row['ID_TAMU']         = $field->id_tamu;
            $row['NIK']             = $field->nik;
            $row['NAMA']            = $field->nama;
            $row['FOTO']            = '<img src="data:image/png;base64, ' . $field->foto . '"/>';
            $row['FOTO_MODAL']      = 'data:image/png;base64, ' . $field->foto;
            $row['WAKTU_DATANG']    = $field->tanggal_masuk;
            $row['WAKTU_PULANG']    = $field->tanggal_keluar;
            $row['TTL']             = $field->ttl;
            $row['ALAMAT']          = $field->alamat;
            $row['AGAMA']           = $field->agama;
            $row['STATUS_KAWIN']    = $field->status_kawin;
            $row['PEKERJAAN']       = $field->pekerjaan;
            $row['KEWARGANEGARAAN'] = $field->kewarganegaraan;
            $row['STATUS']          = $field->status;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->daftar_tamu_Model->count_all(),
            "recordsFiltered" => $this->daftar_tamu_Model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ktp()
    {
        //Start Read EKTP
        $json = $this->input->post();
        $json = stripslashes($json);
        $json = json_decode(trim(file_get_contents('php://input')), true);

        file_put_contents("post.log", print_r($json, true));

        $data = [
            'nik'             => $json['nik'],
            'nama'            => $json['namaLengkap'],
            'ttl'             => $json['tempatLahir'] . ' / ' . $json['tanggalLahir'],
            'alamat'          => $json['namaProvinsi'] . ', ' . $json['namaKabupaten'] . ', ' . $json['namaKecamatan'] . ', ' . $json['namaKelurahan'] . ', ' . $json['alamat'] . ', RT ' . $json['nomorRt'] . ', RW ' . $json['nomorRw'] . ', ' . $json['kodePos'],
            'agama'           => $json['agama'],
            'status_kawin'    => $json['statusKawin'],
            'pekerjaan'       => $json['jenisPekerjaan'],
            'kewarganegaraan' => $json['kewarganegaraan'],
            'foto'            => $json['foto'],
            'tanggal_masuk'   => date('Y-m-d H:i:s'),
            'status'          => NULL,
        ];

        $this->daftar_tamu_Model->insertMembers($data);
        //End Read KTP

        require_once(APPPATH . 'views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'e0e1a2b25c2d08a9221b', //ganti dengan App_key pusher Anda
            '65d5c7f63e9bff18a634', //ganti dengan App_secret pusher Anda
            '1174317', //ganti dengan App_key pusher Anda
            $options
        );

        $data['message'] = 'success';
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    function update_tamu()
    {
        $tamu_id = $this->input->post('tamu_id', TRUE);

        $data = [
            'no_tamu'       => $this->input->post('no_tamu', TRUE),
            'tujuan'        => $this->input->post('tujuan', TRUE),
            'keperluan'     => $this->input->post('keperluan', TRUE),
            'no_hp'         => $this->input->post('no_hp', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'status'        => 'IN',
        ];

        $this->daftar_tamu_Model->update_tamu($tamu_id, $data);

        require_once(APPPATH . 'views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'e0e1a2b25c2d08a9221b', //ganti dengan App_key pusher Anda
            '65d5c7f63e9bff18a634', //ganti dengan App_secret pusher Anda
            '1174317', //ganti dengan App_key pusher Anda
            $options
        );

        $data['message'] = 'success';
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function keluar_tamu()
    {
        $tamu_id = $this->input->post('id_tamu', TRUE);

        $data = [
            'status'        => 'OUT',
            'tanggal_keluar'   => date('Y-m-d H:i:s'),
        ];

        $this->daftar_tamu_Model->update_tamu($tamu_id, $data);

        require_once(APPPATH . 'views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'e0e1a2b25c2d08a9221b', //ganti dengan App_key pusher Anda
            '65d5c7f63e9bff18a634', //ganti dengan App_secret pusher Anda
            '1174317', //ganti dengan App_key pusher Anda
            $options
        );

        $data['message'] = 'success';
        $pusher->trigger('my-channel', 'my-event', $data);


    }
}
