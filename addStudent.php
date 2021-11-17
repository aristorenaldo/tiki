<?php 

if(! session_id()) session_start();
require_once 'init.php';

$student = new ModelStudent();


if(isset($_POST)){
    $newID = htmlentities($_POST["id"]) ;
    $newName = htmlentities($_POST["name"]) ;
    $newDeptName = htmlentities($_POST["dept_name"]);
    $newTotCred = (int)htmlentities($_POST["tot_cred"]) ;

    $stat = $student->add($newID,$newName,$newDeptName,$newTotCred);
    $msg = $student->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Added Successfully','Added','success');
    }
    else{
        Flasher::setFlash($msg,'Added','danger');
    }
}
header('Location: '.BASEURL.'/student.php');
   
   
    exit();
?>