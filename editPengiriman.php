<?php 

if(! session_id()) session_start();
require_once 'init.php';

$pengiriman = new ModelPengiriman();

if(isset($_POST)){
    $resi = htmlentities( $_POST['resi'] );
    $newHari = htmlentities( $_POST['hari'] );
    $newTanggal = htmlentities( $_POST['tanggal'] );
    $newJam = (double)htmlentities( $_POST['jam'] );
    $newJenisPengiriman = htmlentities( $_POST['jenis_pengiriman'] );
    $newTotalBerat = (int)htmlentities( $_POST['total_berat'] );
    $newTotalHarga =(int) htmlentities( $_POST['total_harga'] );
    $newIdPengirim = htmlentities( $_POST['id_pengirim'] );
    $newIdKurir = htmlentities( $_POST['id_kurir'] );
    $newIdPenerima = htmlentities( $_POST['id_penerima'] );

    $stat = $pengiriman->editById($resi, $newHari, $newTanggal, $newJam, $newJenisPengiriman, $newTotalBerat, $newTotalHarga, $newIdPengirim, $newIdKurir,$newIdPenerima);
    $errMsg = $pengiriman->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Editted', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
}

header('Location: '.BASEURL.'/pengiriman.php');
exit();

?>