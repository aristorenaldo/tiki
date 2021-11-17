<?php 

if(! session_id()) session_start();
require_once 'init.php';

$barang = new ModelBarang();

// var_dump($_POST);
// die();

if(isset($_POST['resi'])){
    $newResi = htmlentities( $_POST['newresi'] );
    $newNama = htmlentities( $_POST['newnama'] );
    $newJenis = htmlentities( $_POST['newjenis'] );
    $newBerat = (int)htmlentities( $_POST['newberat'] );

    $resi = htmlentities( $_POST['resi'] );
    $nama = htmlentities( $_POST['nama'] );
    

    $stat = $barang->editById($resi, $nama, $newResi, $newNama, $newJenis, $newBerat);
    $errMsg = $barang->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Editted', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
}

header('Location: '.BASEURL.'/barang.php');
exit();

?>