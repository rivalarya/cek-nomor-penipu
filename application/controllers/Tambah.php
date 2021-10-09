<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

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

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('tambah');
		$this->load->view('templates/footer');
	}

	public function tambah_data()
    {
        $id = $this->input->post('id');
        if($this->input->post('nama') == ''){
            $nama = 'Tanpa nama';
        }else{
            $nama = $this->input->post('nama');
        }
        $tgl_kejadian = $this->input->post('tgl_kejadian');
        $nomor_telepon_pelaku = $this->input->post('nomor_telepon_pelaku');
        $keterangan = $this->input->post('keterangan');
        $bukti = $_FILES['bukti'];

        $this->form_validation->set_rules('nomor_telepon_pelaku', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('tgl_kejadian', 'Tanggal Kejadian', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if($this->form_validation->run() == false){
        	$this->load->view('templates/header');
			$this->load->view('tambah');
			$this->load->view('templates/footer');
        }else{
            
            if(!$bukti == ''){
                $config['upload_path'] = './assets/img/bukti';
                $config['allowed_types'] = 'jpg|jpeg|png';
    
                $this->load->library('upload', $config);
                if($this->upload->do_upload('bukti')){
                    $bukti = $this->upload->data('file_name');
                }
            }
    
            $data = array(
                'id' => $id,
                'nama_pelapor' => html_escape($nama),
                'nomor_telepon' => html_escape($nomor_telepon_pelaku),
                'tgl_kejadian' => $tgl_kejadian,
                'keterangan' => html_escape($keterangan),
                'bukti' => $bukti
            );
            $this->db->insert('pelapor', $data);
            redirect('home');

        }
    }

}
