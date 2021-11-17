<?php 
if(! session_id()) session_start();
require_once 'init.php';

$student = new ModelStudent();

if(isset($_POST)){
    $id = htmlentities($_POST['id']);
    $result = $student->getById($id);
    $msg = $student->getError();
    echo json_encode($result);
}
exit();

?>