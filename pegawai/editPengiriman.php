<?php 

if(! session_id()) session_start();
require_once '../init.php';

$pengiriman = new ModelPengiriman();

if(isset($_POST['resi'])){
    $resi = htmlentities( $_POST['resi'] );
    $newResi = htmlentities($_POST['newresi']);
    $timestampLocal = htmlentities( $_POST['timestamp']);
    $newJenisPengiriman = htmlentities( $_POST['jenis_pengiriman'] );
    $newTotalBerat = (float)htmlentities( $_POST['total_berat'] );
    $newTotalHarga =(float) htmlentities( $_POST['total_harga'] );
    $newIdPengirim = (int)htmlentities( $_POST['id_pengirim'] );
    $newIdKurir =(int) htmlentities( $_POST['id_kurir'] );
    
    $newIdPenerima = (int)htmlentities( $_POST['id_penerima'] );
    // var_dump($_POST);
    // die();
    $stat = $pengiriman->editById($resi, $newResi, $timestampLocal, $newJenisPengiriman, $newTotalBerat, $newTotalHarga, $newIdPengirim, $newIdKurir,$newIdPenerima);
    $errMsg = $pengiriman->getError();

    if ($stat > 0) {
        Flasher::setFlash('Data berhasil diubah', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
}

header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$newResi);
exit();

?>