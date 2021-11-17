<?php 

if(! session_id()) session_start();
require_once 'init.php';

$barang = new ModelBarang();

if(isset($_GET)){
    $deletedId = htmlentities($_GET['id']);
    $stat = $barang->deleteById($deletedId);
    $msg = $barang->getError();
    if ($stat > 0) {
        Flasher::setFlash('Record Deleted Successfully','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/barang.php');
exit();
?>