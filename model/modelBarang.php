
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

    public function getByResi($resi)
    {
        $sql = "SELECT * FROM {$this->table} WHERE resi = :resi";
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->execute();

        return $this->db->resultSet();
    }

    public function getByResiNama($resi, $nama)
    {
        $sql = "SELECT * FROM {$this->table} WHERE resi = :resi AND nama = :nama";
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->bind('nama',$nama);
        $this->db->execute();

        return $this->db->single();
    }

    public function getTotalBeratByResi($resi) 
    {
        $sql = "SELECT SUM(berat_kg) AS total_berat FROM {$this->table} WHERE resi = :resi";
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->execute();

        return $this->db->resultSet();
    }

    public function add($resi, $nama, $jenis, $berat)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:nama, :resi, :jenis, :berat)';
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->bind('nama',$nama);
        $this->db->bind('jenis',$jenis);
        $this->db->bind('berat',$berat);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteById($nama, $resi)
    {
        $sql = "DELETE FROM {$this->table} WHERE nama = :nama AND resi= :resi";
        $this->db->query($sql);
        $this->db->bind('nama',$nama);
        $this->db->bind('resi',$resi);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editById($resi, $nama, $newResi,  $newNama, $newJenis, $newBerat)
    {
        $sql = "UPDATE {$this->table} SET 
        nama = :newnama,
        resi = :newresi, 
        jenis = :newjenis,
        berat_kg = :newberat
        WHERE nama = :nama AND resi= :resi;";
        $this->db->query($sql);
        
        $this->db->bind('newresi',$newResi);
        $this->db->bind('newnama',$newNama);
        $this->db->bind('newjenis',$newJenis);
        $this->db->bind('newberat',$newBerat);
        $this->db->bind('nama',$nama);
        $this->db->bind('resi',$resi);

        $this->db->execute();

        return $this->db->rowCount();
    }

}

?>