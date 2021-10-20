<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

    public function __construct()
	{
	    parent::__construct();
	    $this->load->model('m_tambah');
	}

	public function index()
	{
        $data['about'] = "./assets/img/about.png";
		$this->load->view('templates/header', $data);
		$this->load->view('tambah', );
		$this->load->view('templates/footer');
	}

	public function tambah_data()
    {
        $id_bukti = time();
        // $this->session->set_userdata('id_bukti', $id_bukti); // set session ker dipake di nomorditemukan ker neang foto

        $id = $this->input->post('id');
        if($this->input->post('nama') == ''){
            $nama = 'Tanpa nama';
        }else{
            $nama = $this->input->post('nama');
        }
        $tgl_kejadian = $this->input->post('tgl_kejadian');
        // $this->m_tambah->cekNomor($this->input->post('nomor_telepon_pelaku'));
        $nomor_telepon_pelaku = $this->input->post('nomor_telepon_pelaku');
        $keterangan = $this->input->post('keterangan');

        $this->form_validation->set_rules('nomor_telepon_pelaku', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('tgl_kejadian', 'Tanggal Kejadian', 'required');
        if($this->form_validation->run() == false){
        	$this->load->view('templates/header');
			$this->load->view('tambah');
			$this->load->view('templates/footer');
        }else{

        if($_FILES['bukti1'] != null && $_FILES['bukti2'] == null && $_FILES['bukti3'] == null){
            $gmbr = 1;
        }else if($_FILES['bukti1'] != null && $_FILES['bukti2'] != null && $_FILES['bukti3'] == null){
            $gmbr = 2;
        }else if ($_FILES['bukti1'] != null && $_FILES['bukti2'] != null && $_FILES['bukti3'] != null){
            $gmbr = 3;
        }else {
            echo "Ada kesalahan, silahkan refresh halaman lalu masukan data dengan benar.";
        }
        // echo $gmbr;

        for($i=1;$i<=$gmbr;$i++){
            $bukti = $_FILES["bukti$i"];         
                if(!$bukti == ''){
                    $config['upload_path'] = './assets/img/bukti';
                    $config['allowed_types'] = 'jpeg|JPEG|JPG|jpg|png|PNG';
                    $config['encrypt_name'] = TRUE;
        
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload("bukti$i")){
                        $bukti = $this->upload->data('file_name');
                    }else{           
                        $this->session->set_flashdata('pesan','Bukti Harus Berupa Gambar!');
                        redirect(base_url("home/tambah"));
                    }
                }
            
                $this->m_tambah->tambahTabelBukti($id,$id_bukti, $bukti);
            }
            $this->m_tambah->tambahTabelpelapor($id, $nama, $nomor_telepon_pelaku, $tgl_kejadian,$keterangan,$id_bukti);
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!'); 
            redirect('home');

        }
    }

}
