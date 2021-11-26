<?php 

if(! session_id()) session_start();
require_once 'init.php';

$pengiriman = new ModelPengiriman();

if (isset($_POST['resi'])) {
    $timestamp = DateTime::createFromFormat('U.u', number_format(microtime(true), 3, '.', ''));
    $timestampLocal = substr($timestamp->setTimeZone(new DateTimeZone('Asia/Ujung_pandang'))->format('Y-m-d H:i:s.u'), 0,-3);

    $resi = htmlentities( $_POST['resi'] );
    $newJenisPengiriman = htmlentities( $_POST['jenis_pengiriman'] );
    $newTotalBerat = (float) htmlentities( $_POST['total_berat'] );
    $newTotalHarga =(float) htmlentities( $_POST['total_harga'] );
    $newIdPengirim = htmlentities( $_POST['id_pengirim'] );
    $newIdKurir = htmlentities( $_POST['id_kurir'] );
    $newIdPenerima = htmlentities( $_POST['id_penerima'] );

    $stat = $pengiriman->add($resi, $timestampLocal, $newJenisPengiriman, $newTotalBerat, $newTotalHarga, $newIdPengirim, $newIdKurir,$newIdPenerima);
    $errMsg = $pengiriman->getError();


    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Added', 'Added','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Added','danger');
    }

}
header('Location: '.BASEURL.'/pengiriman.php');
exit();

?>