<?php 

if(! session_id()) session_start();
require_once '../init.php';

$riwayatpengiriman = new modelRiwayatPengiriman();

$resi='';
// var_dump($_POST);
if(isset($_POST['resi']) && isset($_POST['id_status'])){
    $resi = htmlentities( $_POST['resi'] );
    $idStatus = htmlentities( $_POST['id_status'] );
    $newIdStatus = htmlentities( $_POST['newid_status'] );
    $newTimestamp = htmlentities( $_POST['timestamp'] );
    $newKota = htmlentities( $_POST['kab_kota'] );
    
    $stat = $riwayatpengiriman->editById($resi, $idStatus, $resi, $newIdStatus, $newTimestamp, $newKota);
    $errMsg = $riwayatpengiriman->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Editted', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
    header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$resi);
    exit;
}
//Pengecekan data get resi dan id status saat pertama kali halaman dibuka
if($_GET['resi'] != ''  && $_GET['id_status'] != ''){
    $status = new ModelStatus();
    $listStatus  = $status->getAll();
    
    $resi = htmlentities($_GET['resi']);
    $idStatus = htmlentities($_GET['id_status']);
    $title = 'Edit Riwayat Pengiriman';
    $editData = $riwayatpengiriman->getByResiIdStatus($resi, $idStatus);
    // var_dump($editData);
    require_once '../view/viewEditRiwayatPengiriman.php';
    exit;
}


header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$resi);
exit();

?>