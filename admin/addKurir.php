<?php 

if(! session_id()) session_start();
require_once '../init.php';

$kurir = new ModelKurir();

if (isset($_POST)) {
    $newId = htmlentities( $_POST['id'] );
    $newNama = htmlentities( $_POST['nama'] );
    $newNo_hp = htmlentities( $_POST['no_hp'] );
    $newLokasi = htmlentities( $_POST['lokasi'] );
    
    $stat = $kurir->add($newId, $newNama, $newNo_hp, $newLokasi);
    $errMsg = $kurir->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Added', 'Added','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Added','danger');
    }
}
header('Location: '.BASEURL.'/admin/kurir.php');
exit();

?>