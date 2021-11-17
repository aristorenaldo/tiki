<?php 

if(! session_id()) session_start();
require_once 'init.php';

$barang = new ModelBarang();

if (isset($_POST['resi'])) {
    $resi = htmlentities( $_POST['resi'] );
    $newNama = htmlentities( $_POST['nama'] );
    $newJenis = htmlentities( $_POST['jenis'] );
    $newBerat = (int)htmlentities( $_POST['berat'] );
    
    $stat = $barang->add($resi, $newNama, $newJenis, $newBerat);
    $errMsg = $barang->getError();


    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Added', 'Added','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Added','danger');
    }

}
header('Location: '.BASEURL.'/barang.php');
exit();

?>