<?php 

if(! session_id()) session_start();
require_once '../init.php';

$riwayatpengiriman = new modelRiwayatPengiriman();

if(isset($_POST)){
    $resi = htmlentities( $_POST['resi'] );
    $idStatus = htmlentities( $_POST['id'] );
    $newResi = htmlentities( $_POST['newresi'] );
    $newIdStatus = htmlentities( $_POST['newid'] );
    $newTimestamp = htmlentities( $_POST['timestamp'] );
    $newKota = htmlentities( $_POST['kota'] );
    

    $stat = $riwayatpengiriman->editById($resi, $idStatus, $newResi, $newIdStatus, $newTimestamp, $newKota);
    $errMsg = $riwayatpengiriman->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Editted', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
}

header('Location: '.BASEURL.'/admin/riwayatpengiriman.php');
exit();

?>