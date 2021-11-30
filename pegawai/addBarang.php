<?php 

if(! session_id()) session_start();
require_once '../init.php';

$barang = new ModelBarang();

if (!empty($_POST['resi'])) {
    $resi = htmlentities( $_POST['resi'] );
    $newNama = htmlentities( $_POST['nama'] );
    $newJenis = htmlentities( $_POST['jenis'] );
    $newBerat = (float)htmlentities( $_POST['berat'] );
    
    $stat = $barang->add($resi, $newNama, $newJenis, $newBerat);
    $errMsg = $barang->getError();


    if ($stat > 0) {
        Flasher::setFlash('Barang Berhasil Ditambahkan', 'Added','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Added','danger');
    }

}
header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$resi);
exit();

?>