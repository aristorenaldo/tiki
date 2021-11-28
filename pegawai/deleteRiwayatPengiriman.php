<?php 

if(! session_id()) session_start();
require_once '../init.php';

$riwayatpengiriman = new ModelRiwayatPengiriman();

if(isset($_GET['resi'])){
    $resi = htmlentities($_GET['resi']);
    $idStatus = htmlentities($_GET['id_status']);
    $stat = $riwayatpengiriman->deleteByResiId($resi, $idStatus);
    $msg = $riwayatpengiriman->getError();
    if ($stat > 0) {
        Flasher::setFlash('Riwayat Behasil Dihapus','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$resi);
exit();
?>