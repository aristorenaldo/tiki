<?php 

if(! session_id()) session_start();
require_once 'init.php';

$student = new ModelStudent();

if(isset($_POST)){
    $id = htmlentities($_POST["id"]);
    $newName = htmlentities($_POST["new_name"]) ;
    $newDeptName = htmlentities($_POST["new_dept_name"]);
    $newTotCred = (int)htmlentities($_POST["new_tot_cred"]);

    $stat = $student->editById($id, $newName, $newDeptName, $newTotCred);
    $msg = $student->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Edited Successfully','Edited','success');
    }
    else{
        Flasher::setFlash('ini','Edited','danger');
        die(var_dump($_POST['id']));
    }
}
header('Location: '.BASEURL.'/student.php');
exit();
?>