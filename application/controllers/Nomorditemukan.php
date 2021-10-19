<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nomorditemukan extends CI_Controller {

	public function index()
	{
        $sesi = $this->session->userdata('nomor');
		if($sesi == null) redirect('home');
		
		$data['about'] = "./assets/img/about.png";
		$this->load->view('templates/header', $data);
		$this->load->view('nomor_ditemukan');
		$this->load->view('templates/footer');
	}

	public function cari()
    {
		//kode ieu disalin di contoler home
		$no = $this->session->userdata('nomor');
		if ($this->db->simple_query("SELECT * FROM pelapor WHERE nomor_telepon LIKE '$no'"))
			{
				$hasil = $this->db->query("SELECT * FROM pelapor WHERE nomor_telepon LIKE '$no' ORDER BY `pelapor`.`tgl_kejadian` DESC");
			
				echo json_encode($hasil->result_array());
			}
		else{
				echo "Query failed!";
			}
			
    }

	public function cariSelengkapnya($id_bukti)
    {
		if ($this->db->simple_query("SELECT bukti FROM bukti where id_bukti LIKE '$id_bukti'"))
			{
				$hasil = $this->db->query("SELECT bukti FROM bukti where id_bukti LIKE '$id_bukti'");
			
				echo json_encode($hasil->result_array());
			}
		else{
				echo "Query failed!";
			}
			
    }
}
