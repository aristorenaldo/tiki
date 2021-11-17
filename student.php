<?php 
if(! session_id()) session_start();

require_once 'init.php';

header('Location: '.BASEURL.'/penerima.php');
exit();
$student = new ModelStudent();
// var_dump($student);
$result = $student->getAll();
// var_dump($result);
$department = new ModelDepartment();
$departments = $department->getAll();

$title = 'Student';

require_once 'view/viewStudent.php';
exit();
?>