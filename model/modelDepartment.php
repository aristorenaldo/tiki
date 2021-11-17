<?php 

class ModelDepartment extends Model
{
    private $table = 'department';

    public function getAll()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
}

?>