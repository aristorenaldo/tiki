<?php 
class ModelRiwayatPengiriman extends Model 
{
    private $table = 'riwayat_pengiriman';

    public function getAll()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getDetailByResi($resi)
    {   
        $sql= "SELECT * FROM {$this->table} p 
                JOIN Status s ON p.ID_status = s.ID_status
                WHERE p.resi = :resi
                ORDER BY p.time_stamp ASC;";
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function add($resi, $idStatus, $timestamp, $kota)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:time_stamp, :id, :resi, :kota)';
        $this->db->query($sql);
        $this->db->bind('resi',$resi);
        $this->db->bind('id',$idStatus);
        $this->db->bind('time_stamp',$timestamp);
        $this->db->bind('kota',$kota);

        $this->db->execute();

        return $this->db->rowCount();
    }

    
    public function deleteByResiId($resi, $idStatus)
    {
        $sql = "DELETE FROM {$this->table} WHERE resi = :resi AND ID_status = :id;";
        $this->db->query($sql);

        $this->db->bind('resi', $resi);
        $this->db->bind('id',$idStatus);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editById( $resi, $idStatus, $newResi, $newIdStatus, $newTimestamp, $newKota)
    {
        $sql = "UPDATE {$this->table} SET 
        time_stamp = :new_time_stamp,
        ID_status = :new_id, 
        resi = :new_resi,      
        kab_kota = :new_kota
        WHERE resi = :resi AND ID_status = :id";
        $this->db->query($sql);
        
        $this->db->bind('new_resi',$newResi);
        $this->db->bind('new_id',$newIdStatus);
        $this->db->bind('new_time_stamp',$newTimestamp);
        $this->db->bind('new_kota',$newKota);

        $this->db->bind('resi',$resi);
        $this->db->bind('id', $idStatus);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>