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

    public function getAllResi()
    {
        $this->db->query('SELECT resi FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function add($resi, $timestamp, $jenis_pengiriman, $total_berat, $total_harga, $id_pengirim,$id_kurir,$id_penerima)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:resi, :time_stamp, :jenis_pengiriman, :total_berat, :total_harga ,:id_pengirim,:id_kurir,:id_penerima)';
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->bind('time_stamp',$timestamp);
        $this->db->bind('jenis_pengiriman',$jenis_pengiriman);
        $this->db->bind('total_berat',$total_berat);
        $this->db->bind('total_harga',$total_harga);
        $this->db->bind('id_pengirim',$id_pengirim);
        $this->db->bind('id_kurir',$id_kurir);
        $this->db->bind('id_penerima',$id_penerima);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteById($resi)
    {
        $sql = "DELETE FROM {$this->table} WHERE Resi = :resi";
        $this->db->query($sql);
        $this->db->bind('resi',$resi);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editById($resi, $newResi, $timestamp, $newJenisPengiriman, $newTotalBerat, $newTotalHarga, $newIdPengirim, $newIdKurir,$newIdPenerima)
    {
        $sql = "UPDATE {$this->table} SET
        resi = :new_resi, 
        waktu_pembuatan = :time_stamp,
        jenis_pengiriman = :jenis_pengiriman,
        total_berat_kg = :total_berat,
        total_harga = :total_harga,
        ID_pengirim = :id_pengirim,
        ID_kurir = :id_kurir,
        ID_penerima = :id_penerima
        WHERE resi = :resi;";
        $this->db->query($sql);
        
        $this->db->bind('new_resi', $newResi);
        $this->db->bind('time_stamp', $timestamp);
        $this->db->bind('jenis_pengiriman',$newJenisPengiriman);
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