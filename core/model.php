<?php 
class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getError()
    {
        $msg = $this->db->errorInfo();
        return $msg[2];
    }

}

?>