<?php
if(! session_id()) session_start();
require_once 'init.php';

$kurir = new ModelKurir();

if(isset($_GET)){
    $deletedId = htmlentities($_GET['id']);
    $stat = $kurir->deleteById($deletedId);
    $msg = $kurir->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Deleted Successfully','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/kurir.php');
exit();
?>