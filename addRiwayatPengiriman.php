<?php 

if(! session_id()) session_start();
require_once 'init.php';

$riwayatpengiriman = new ModelRiwayatPengiriman();

if (isset($_POST['resi'])) {
    $timestamp = DateTime::createFromFormat('U.u', number_format(microtime(true), 3, '.', ''));
    $timestampLocal = substr($timestamp->setTimeZone(new DateTimeZone('Asia/Ujung_pandang'))->format('Y-m-d H:i:s.u'), 0,-3);

    $resi = htmlentities( $_POST['resi'] );
    $newId = htmlentities( $_POST['id'] );
    $newKota = htmlentities( $_POST['kota'] );

    $stat = $riwayatpengiriman->add($resi, $newId, $timestampLocal, $newKota);
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