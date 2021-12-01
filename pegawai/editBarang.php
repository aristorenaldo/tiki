<?php 

if(! session_id()) session_start();
require_once '../init.php';

$barang = new ModelBarang();

$resi='';
// var_dump($_POST);
if(!empty($_POST['resi']) && !empty($_POST['nama'])){
    $resi = htmlentities( $_POST['resi'] );
    $nama = htmlentities( $_POST['nama'] );
    $newNama = htmlentities( $_POST['newnama'] );
    $jenis = htmlentities( $_POST['jenis'] );
    $berat = htmlentities( $_POST['berat'] );
    
    $stat = $barang->editById($resi, $nama, $resi, $newNama, $jenis, $berat);
    $errMsg = $barang->getError();

    if ($stat > 0) {
        Flasher::setFlash('Data Berhasil Diubah', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
    header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$resi);
    exit;
}
//Pengecekan data get resi dan id status saat pertama kali halaman dibuka
if(!empty($_GET['resi']) && !empty($_GET['nama'])){

    $nama = htmlentities($_GET['nama']);
    $resi = htmlentities($_GET['resi']);
    $title = 'Edit Barang';
    $editData = $barang->getByResiNama($resi,$nama);
    // var_dump($editData);
    require_once '../view/viewEditBarang.php';
    exit;
}


header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$resi);
exit();

?>