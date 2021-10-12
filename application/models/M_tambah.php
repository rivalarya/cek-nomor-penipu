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

    public function cekNomor($nomor)
    {
         if ($this->db->simple_query("SELECT nomor_telepon FROM nomor WHERE nomor_telepon = $nomor"))
            {
                $nomor_telepon_pelaku = $this->db->query("SELECT id FROM nomor WHERE nomor_telepon = $nomor");
                return;
            }
            else{
                $data = array(
                'nomor_telepon' => $nomor
                 );
                $this->db->insert("nomor", $data);
                $nomor_telepon_pelaku = $this->input->post('nomor_telepon_pelaku');
                return;
            } 
    }
    
       
}