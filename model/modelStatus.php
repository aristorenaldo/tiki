<?php 

class ModelStatus extends Model 
{
    private $table = "Status";//nama tabel
    
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

    public function add($id, $namaStatus, )
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:id, :nama_status)';
        $this->db->query($sql);
        $this->db->bind('id',$id);
        $this->db->bind('nama_status',$namaStatus);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE ID_status = :id";
        $this->db->query($sql);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editById($id, $newNamaStatus)
    {
        $sql = "UPDATE {$this->table} SET 
        nama_status = :nama_status  
        WHERE ID_status = :id;";
        $this->db->query($sql);
        
        $this->db->bind('nama_status',$newNamaStatus);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

}


?>