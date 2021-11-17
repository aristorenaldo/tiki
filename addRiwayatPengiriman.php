<?php 

if(! session_id()) session_start();
require_once 'init.php';

$riwayatpengiriman = new ModelRiwayatPengiriman();

if (isset($_POST)) {
    $resi = htmlentities( $_POST['resi'] );
    $newId = htmlentities( $_POST['id'] );
    $newTimeStamp = htmlentities( $_POST['time_stamp'] );
    $newKota = htmlentities( $_POST['kota'] );
    

    $stat = $riwayatpengiriman->editById($resi, $newId, $newTimeStamp, $newKota);
    $errMsg = $riwayatpengiriman->getError();


    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Added', 'Added','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Added','danger');
    }

}
header('Location: '.BASEURL.'/riwayatpengiriman.php');
exit();

?>