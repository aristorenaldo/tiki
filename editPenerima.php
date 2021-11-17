<?php 

if(! session_id()) session_start();
require_once 'init.php';

$penerima = new ModelPenerima();

if(isset($_POST)){
    $id = htmlentities( $_POST['id'] );
    $newNama = htmlentities( $_POST['nama'] );
    $newJalan = htmlentities( $_POST['jalan'] );
    $newKecamatan = htmlentities( $_POST['kecamatan'] );
    $newKota = htmlentities( $_POST['kota'] );
    $newProvinsi = htmlentities( $_POST['provinsi'] );
    $newKodepos =(int) htmlentities( $_POST['kodepos'] );
    $newNo_hp = htmlentities( $_POST['no_hp'] );

    $stat = $penerima->editById($id, $newNama, $newJalan, $newKecamatan, $newKota, $newProvinsi, $newKodepos, $newNo_hp);
    $errMsg = $penerima->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Editted', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
}

header('Location: '.BASEURL.'/penerima.php');
exit();

?>