<?php 
class ModelRiwayatPengiriman extends Model 
{
    private $table = 'barang';

    public function getAll()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function add($resi, $id, $time_stamp, $kota)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:resi, :id, :time_stamp, :kota)';
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->bind('id',$id);
        $this->db->bind('time_stamp',$time_stamp);
        $this->db->bind('kota',$kota);

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

    public function editById($resi, $id, $time_stamp, $kota)
    {
        $sql = "UPDATE {$this->table} SET 
        Resi = :resi, 
        Id = :id, 
        Time_stamp = :time_stamp,
        Kota = :kota,
        WHERE Id = :id;";
        $this->db->query($sql);
        
        $this->db->bind('resi',$resi);
        $this->db->bind('id',$id);
        $this->db->bind('time_stamp',$time_stamp);
        $this->db->bind('kota',$kota);


        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>