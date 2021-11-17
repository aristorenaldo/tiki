<?php 

if(! session_id()) session_start();
require_once 'init.php';

$penerima = new ModelPenerima();

$kurir = new ModelKurir();

if (isset($_POST)) {
    $id = htmlentities( $_POST['id'] );
    $newNama = htmlentities( $_POST['nama'] );
    $newNo_hp = htmlentities( $_POST['no_hp'] );
    $newLokasi = htmlentities( $_POST['lokasi'] );
    
    $stat = $kurir->editById($id, $newNama, $newNo_hp, $newLokasi);
    $errMsg = $kurir->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Editted', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
}

header('Location: '.BASEURL.'/kurir.php');
exit();
?>