<?php
if(! session_id()) session_start();
require_once 'init.php';

$status = new ModelStatus();

if(isset($_GET)){
    $deletedId = htmlentities($_GET['id']);
    $stat = $status->deleteById($deletedId);
    $msg = $status->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Deleted Successfully','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/status.php');
exit();
?>