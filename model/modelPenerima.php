<?php 
class ModelPenerima extends Model 
{
    private $table = 'penerima';

    public function getAll()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function add($id, $nama, $jalan, $kecamatan, $kota, $provinsi, $kodepos, $noHp)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:id, :nama, :jalan, :kecamatan, :kota, :provinsi, :kodepos ,:no_hp)';
        $this->db->query($sql);
        $this->db->bind('id',$id);
        $this->db->bind('nama',$nama);
        $this->db->bind('jalan',$jalan);
        $this->db->bind('kecamatan',$kecamatan);
        $this->db->bind('kota',$kota);
        $this->db->bind('provinsi',$provinsi);
        $this->db->bind('kodepos',$kodepos);
        $this->db->bind('no_hp',$noHp);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE ID = :id";
        $this->db->query($sql);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editById($id, $newNama, $newJalan, $newKecamatan, $newKota, $newProvinsi, $newKodepos, $newNoHp)
    {
        $sql = "UPDATE {$this->table} SET 
        Nama = :nama, 
        Jalan = :jalan, 
        Kecamatan = :kecamatan,
        Kota = :kota,
        Provinsi = :provinsi,
        Kodepos = :kodepos,
        No_hp = :no_hp
        WHERE ID = :id;";
        $this->db->query($sql);
        
        $this->db->bind('nama',$newNama);
        $this->db->bind('jalan',$newJalan);
        $this->db->bind('kecamatan',$newKecamatan);
        $this->db->bind('kota',$newKota);
        $this->db->bind('provinsi',$newProvinsi);
        $this->db->bind('kodepos',$newKodepos);
        $this->db->bind('no_hp',$newNoHp);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>