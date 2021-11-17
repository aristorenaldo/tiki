<?php 

if(! session_id()) session_start();
require_once 'init.php';

$penerima = new ModelPenerima();

if(isset($_GET)){
    $deletedId = htmlentities($_GET['id']);
    $stat = $penerima->deleteById($deletedId);
    $msg = $penerima->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Deleted Successfully','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/penerima.php');
exit();
?>