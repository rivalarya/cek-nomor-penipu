<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('m_tambah');
	}

	public function index()
	{
		$data['about'] = "./assets/img/about.png";
		$this->load->view('templates/header', $data);
		$this->load->view('index');
		$this->load->view('templates/footer');
	}

    public function cari($query)
    {
    	// $ko = "%".$query."%"; // ker tes hngkl
    	$ko = "%".$query;

		$this->session->set_userdata('nomor', $ko); // set session ker dipake di nomorditemukan

	if ($this->db->simple_query("SELECT * FROM pelapor where nomor_telepon LIKE '$ko'"))
		{
		    $hasil = $this->db->query("SELECT * FROM pelapor where nomor_telepon LIKE '$ko'");
		   
			echo json_encode($hasil->result_array());
		}
	else{
		      echo "Query failed!";
		}
			
    }

    public function cariBukti($id_bukti)
    {
    	
		// $id_bukti = $this->session->userdata('id_bukti');

		if ($this->db->simple_query("SELECT id_bukti FROM bukti where id_bukti LIKE '$id_bukti'"))
		{
		    $hasil = $this->db->query("SELECT bukti FROM bukti where id_bukti LIKE '$id_bukti'");
		   
			echo json_encode($hasil->result_array());
		}
	else{
		      echo "Query failed!";
		}
			
    }

	public function cekNomorSudahAdaAtauBelum($nomor)
	{
	    $this->m_tambah->nomorTeleponSudahAdaAtauBelum($nomor);
	}

}
