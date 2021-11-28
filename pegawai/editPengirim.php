<?php 

if(! session_id()) session_start();
require_once '../init.php';

$pengirim = new ModelPengirim();

if(isset($_POST['nama'])){
    $resi = htmlentities( $_POST['resi'] );
    $id = htmlentities( $_POST['id'] ); 
    $newNama = htmlentities( $_POST['nama'] );
    $newJalan = htmlentities( $_POST['jalan'] );
    $newKecamatan = htmlentities( $_POST['kecamatan'] );
    $newKota = htmlentities( $_POST['kota'] );
    $newProvinsi = htmlentities( $_POST['provinsi'] );
    $newKodepos =(int) htmlentities( $_POST['kodepos'] );
    $newNo_hp = htmlentities( $_POST['no_hp'] );

    $stat = $pengirim->editById($id, $newNama, $newJalan, $newKecamatan, $newKota, $newProvinsi, $newKodepos, $newNo_hp);
    $errMsg = $pengirim->getError();

    if ($stat > 0) {
        Flasher::setFlash('Data Berhasil Diubah', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
}

header('Location: '.BASEURL.'/pegawai/detailPengiriman.php?resi='.$resi);
exit();

?>