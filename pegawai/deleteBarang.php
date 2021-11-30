<?php 

if(! session_id()) session_start();
require_once '../init.php';

$barang = new ModelBarang();
// var_dump($_GET);
// die();

if(!empty($_GET['resi'])){
    $deletedResi = htmlentities($_GET['resi']);
    $deletedNama = htmlentities($_GET['nama']);
    $stat = $barang->deleteById($deletedNama,$deletedResi);
    $msg = $barang->getError();
    if ($stat > 0) {
        Flasher::setFlash('Barang Berhasil Dihapus','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$deletedResi);
exit();
?>