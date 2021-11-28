<?php 

if(! session_id()) session_start();
require_once '../init.php';

$pengiriman = new ModelPengiriman();

if(isset($_GET)){
    $deletedId = htmlentities($_GET['resi']);
    $stat = $pengiriman->deleteById($deletedId);
    $msg = $pengiriman->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Deleted Successfully','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/admin/pengiriman.php');
exit();
?>