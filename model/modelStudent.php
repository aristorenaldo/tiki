<?php 

class ModelStudent extends Model
{
    private $table = 'student';

    public function getAll()
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getById($id)  
    {
        $this->db->query('SELECT * FROM '. $this->table.' WHERE ID = :id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->single();
    }

    public function add($id, $name, $deptName, $totCred)
    {   
        $this->db->query("INSERT INTO {$this->table} VALUES (:ID, :name, :dept_name, :tot_cred)");
        $this->db->bind('ID', $id);
        $this->db->bind('name', $name);
        $this->db->bind('dept_name', $deptName);
        $this->db->bind('tot_cred', $totCred);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editById($id, $newName, $newDeptName, $newTotCred)
    {
        $this->db->query("UPDATE {$this->table} SET 
            name = :new_name, 
            dept_name = :new_dept_name, 
            tot_cred = :new_tot_cred 
            WHERE ID = :id;");
        $this->db->bind('new_name', $newName);
        $this->db->bind('new_dept_name', $newDeptName);
        $this->db->bind('new_tot_cred', $newTotCred);
        $this->db->bind('id',$id);
   
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteById($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE ID = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getError()
    {
        $err = $this->db->errorInfo();
        return $err[2];
    }

}
?>