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

	public function cekNomorSudahAdaAtauBelum($nomor)
	{
	    $this->m_tambah->nomorTeleponSudahAdaAtauBelum($nomor);
	}

	public function tambah_data()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('nomor_telepon_pelaku');
        $alamat = $this->input->post('alamat');
        $foto = $_FILES['foto'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if($this->form_validation->run() == FALSE){
        }else{
            
            if(!$foto == ''){
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|jpeg|png';
    
                $this->load->library('upload', $config);
                if($this->upload->do_upload('foto')){
                    $foto = $this->upload->data('file_name');
                }else{
                    $foto = 'default.jpg';
                }
            }else{};
    
            $data = array(
                'id' => $id,
                'nama' => html_escape($nama),
                'kelas' => html_escape($kelas),
                'alamat' => html_escape($alamat),
                'foto' => $foto
            );
            $this->db->insert('siswa', $data);
            redirect('home');

        }
    }

}
