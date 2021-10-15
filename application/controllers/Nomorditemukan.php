<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nomorditemukan extends CI_Controller {

	public function index()
	{
        $sesi = $this->session->userdata('nomor');
		if($sesi == null)
			redirect('home');

        $data['tes'] = $this->session->userdata('nomor');
		$data['about'] = "./assets/img/about.png";
		$this->load->view('templates/header', $data);
		$this->load->view('nomor_ditemukan');
		$this->load->view('templates/footer');
	}

	public function cari()
    {
		//kode ieu disalin di contoler home
		$no = $this->session->userdata('nomor');
		if ($this->db->simple_query("SELECT * FROM pelapor where nomor_telepon LIKE '$no'"))
			{
				$hasil = $this->db->query("SELECT * FROM pelapor where nomor_telepon LIKE '$no'");
			
				echo json_encode($hasil->result_array());
			}
		else{
				echo "Query failed!";
			}
			
    }
}
