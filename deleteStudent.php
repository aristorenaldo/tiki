<?php 

if(! session_id()) session_start();
require_once 'init.php';

$student = new ModelStudent();

if(isset($_GET)){
    $deletedId = htmlentities($_GET['id']);
    $stat = $student->deleteById($deletedId);
    $msg = $student->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Deleted Successfully','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/student.php');
exit();
?>