<?php 
class ModelPengiriman extends Model 
{
    private $table = 'pengiriman';

    public function getAll()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function add($resi, $hari, $tanggal, $jam, $jenis_pengiriman, $total_berat, $total_harga, $id_pengirim,$id_kurir,$id_penerima)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:resi, :hari, :tanggal, :jam, :jenis_pengiriman, :total_berat, :total_harga ,:id_pengirim,:id_kurir,:id_penerima)';
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->bind('hari',$hari);
        $this->db->bind('tanggal',$tanggal);
        $this->db->bind('jam',$jam);
        $this->db->bind('jenis_pengiriman',$jenis_pengiriman);
        $this->db->bind('total_berat',$total_berat);
        $this->db->bind('total_harga',$total_harga);
        $this->db->bind('id_pengirim',$id_pengirim);
        $this->db->bind('id_kurir',$id_kurir);
        $this->db->bind('id_penerima',$id_penerima);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE Resi = :resi";
        $this->db->query($sql);
        $this->db->bind('resi',$resi);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editById($resi, $newHari, $newTanggal, $newJam, $newJenisPengiriman, $newTotalBerat, $newTotalHarga, $newIdPengirim, $newIdKurir,$newIdPenerima)
    {
        $sql = "UPDATE {$this->table} SET 
        Resi = :resi, 
        Hari = :hari, 
        Jam = :jam,
        JenisPengiriman = :jenispengiriman,
        TotalBerat = :totalberat,
        TotalHarga = :totalHarga,
        ID_Pengirim = :id_pengirim,
        ID_Kurir = id_kurir,
        ID_Penerima = id_penerima,
        WHERE resi = :resi;";
        $this->db->query($sql);
        
        $this->db->bind('nama',$newHari);
        $this->db->bind('tanggal',$newTanggal);
        $this->db->bind('jam',$newJam);
        $this->db->bind('pengiriman',$newJenisPengiriman);
        $this->db->bind('total_berat',$newTotalBerat);
        $this->db->bind('total_harga',$newTotalHarga);
        $this->db->bind('id_pengirim',$newIdPengirim);
        $this->db->bind('id_kurir',$newIdKurir);
        $this->db->bind('id_penerima',$newIdPenerima);
        $this->db->bind('resi',$resi);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>