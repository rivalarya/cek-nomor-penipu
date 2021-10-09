<?php 

class M_tambah extends CI_Model{
    
    public function nomorTeleponSudahAdaAtauBelum($nomor)
    {
    	 if ($this->db->simple_query("SELECT nomor_telepon FROM pelapor WHERE nomor_telepon = $nomor"))
            {
                echo "Nomor sudah ada";
            }
            else{
                  return $kelas = $this->input->post('nomor_telepon_pelaku');
            } 
    }  

    public function ganti($kelas)
    {
         if ($this->db->simple_query("SELECT nomor_telepon FROM pelapor WHERE nomor_telepon = $kelas"))
            {
                echo "Nomor Sudah Ada";
            }
            else{
                  $kelas = $this->input->post('nomor_telepon_pelaku');
            } 
    }
    
       
}