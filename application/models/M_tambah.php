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

    public function tambahTabelBukti($id, $id_bukti, $bukti)
    {
       
        $data = array(
            'id' => $id,
            'id_bukti' => $id_bukti,
            'bukti' => $bukti
        );
        $this->db->insert('bukti', $data);
    }

    public function tambahTabelpelapor($id, $nama, $nomor_telepon_pelaku, $tgl_kejadian,$keterangan,$id_bukti)
    {       
        $data = array(
            'id' => $id,
            'nama_pelapor' => html_escape($nama),
            'nomor_telepon' => html_escape($nomor_telepon_pelaku),
            'tgl_kejadian' => $tgl_kejadian,
            'keterangan' => html_escape($keterangan),
            'id_bukti' => $id_bukti
        );
        $this->db->insert('pelapor', $data);
    }
    
       
}