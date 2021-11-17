<?php 

if(! session_id()) session_start();
require_once 'init.php';

$pengirim = new ModelPengirim();

if(isset($_GET)){
    $deletedId = htmlentities($_GET['id']);
    $stat = $pengirim->deleteById($deletedId);
    $msg = $pengirim->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Deleted Successfully','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/pengirim.php');
exit();
?>