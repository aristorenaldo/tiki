<?php 
class ModelBarang extends Model 
{
    private $table = 'barang';

    public function getAll()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function add($resi, $nama, $jenis, $berat)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:resi, :nama, :jenis, :berat)';
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->bind('nama',$nama);
        $this->db->bind('jenis',$jenis);
        $this->db->bind('berat',$berat);

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

    public function editById($resi, $nama, $jenis, $berat)
    {
        $sql = "UPDATE {$this->table} SET 
        Resi = :resi, 
        Nama = :nama, 
        Jenis = :Jenis,
        Berat = :berat,
        WHERE Resi = :resi;";
        $this->db->query($sql);
        
        $this->db->bind('resi',$resi);
        $this->db->bind('nama',$nama);
        $this->db->bind('jenis',$jenis);
        $this->db->bind('berat',$berat);


        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>