<!--Nanda Aditya Putra
205150207111047-->

<?php 
class ModelPenerima extends Model 
{
    private $table = 'Penerima';

    public function getColumnName()
    {
        $sql = "SELECT COLUMN_NAME
        from INFORMATION_SCHEMA.COLUMNS
        where TABLE_NAME='{$this->table}'";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultSet();

    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getAllIdName()
    {
        $this->db->query('SELECT ID_penerima, nama FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getById($id)
    {   
        $sql = "SELECT * FROM {$this->table} WHERE ID_penerima = :id";
        $this->db->query($sql);
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->single();
    }

    public function add( $nama, $jalan, $kecamatan, $kota, $provinsi, $kodepos, $noHp)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES ( :nama, :jalan, :kecamatan, :kota, :provinsi, :kodepos, :no_hp)';
        $this->db->query($sql);
        $this->db->bind('nama',$nama);
        $this->db->bind('jalan',$jalan);
        $this->db->bind('kecamatan',$kecamatan);
        $this->db->bind('kota',$kota);
        $this->db->bind('provinsi',$provinsi);
        $this->db->bind('kodepos',$kodepos, PDO::PARAM_STR);
        $this->db->bind('no_hp',$noHp);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE ID_penerima = :id";
        $this->db->query($sql);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editById($id, $newNama, $newJalan, $newKecamatan, $newKota, $newProvinsi, $newKodepos, $newNoHp)
    {
        $sql = "UPDATE {$this->table} SET 
        nama = :nama, 
        jalan = :jalan, 
        kecamatan = :kecamatan,
        kab_kota = :kota,
        provinsi = :provinsi,
        kode_pos = :kodepos,
        no_hp = :no_hp
        WHERE ID_penerima = :id;";
        $this->db->query($sql);
        
        $this->db->bind('nama',$newNama);
        $this->db->bind('jalan',$newJalan);
        $this->db->bind('kecamatan',$newKecamatan);
        $this->db->bind('kota',$newKota);
        $this->db->bind('provinsi',$newProvinsi);
        $this->db->bind('kodepos',$newKodepos, PDO::PARAM_STR);
        $this->db->bind('no_hp',$newNoHp);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>
