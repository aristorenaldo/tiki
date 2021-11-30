<?php 

if(! session_id()) session_start();
require_once '../init.php';



if(!empty($_GET['resi'])){
    $resi = htmlentities($_GET['resi']);

    $pengiriman = new ModelPengiriman();
    $barang = new ModelBarang();

    $totalBerat = $barang->getTotalBeratByResi($resi);
    // var_dump($totalBerat[0]['total_berat']);
    // die;
    $stat = $pengiriman->updateTotalBeratByResi($resi, $totalBerat[0]['total_berat']);

    if ($stat > 0) {
        Flasher::setFlash('Berhasil Diperbarui','Deleted','success');
    }
    else{
        Flasher::setFlash($msg,'Deleted','danger');
    }
}
header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$resi);
exit();
?>