<?php 

if(! session_id()) session_start();
require_once 'init.php';

$riwayatpengiriman = new ModelRiwayatPengiriman();

if(isset($_GET)){
    $deletedId = htmlentities($_GET['id']);
    $stat = $riwayatpengiriman->deleteById($deletedId);
    $msg = $riwayatpengiriman->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Deleted Successfully','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/riwayatpengiriman.php');
exit();
?>