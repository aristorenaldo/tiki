<?php 
if(! session_id()) session_start();
require_once '../init.php';

$pengirim = new ModelPengirim();
$pilihanPengirim = $pengirim->getAllIdName();

$penerima = new ModelPenerima();
$pilihanPenerima = $penerima->getAllIdName();

$kurir = new ModelKurir();
$pilihanKurir  = $kurir->getAllIdName();

function addPengirimanControl()
{
    // var_dump($_POST);
    // return;
    if(isset($_POST['resi'])){
        $timestamp = DateTime::createFromFormat('U.u', number_format(microtime(true), 3, '.', ''));
        $timestampLocal = substr($timestamp->setTimeZone(new DateTimeZone('Asia/Ujung_pandang'))->format('Y-m-d H:i:s.u'), 0,-3);
        $resi = htmlentities( $_POST['resi'] );
        $newJenisPengiriman = htmlentities( $_POST['jenis_pengiriman'] );
        $newTotalBerat = (float) htmlentities( $_POST['total_berat'] );
        $newTotalHarga =(float) htmlentities( $_POST['total_harga'] );
        $newIdPengirim = (int)htmlentities( $_POST['id_pengirim'] );
        $newIdKurir = htmlentities( $_POST['id_kurir'] );
        $newIdPenerima = (int)htmlentities( $_POST['id_penerima'] );

        $pengiriman = new ModelPengiriman();

        $stat = $pengiriman->add($resi, $timestampLocal, $newJenisPengiriman, $newTotalBerat, $newTotalHarga, $newIdPengirim, $newIdKurir,$newIdPenerima);
        $errMsg = $pengiriman->getError();

        if ($stat > 0) {
            Flasher::setFlash('Data Pengiriman Berhasil Ditambahkan', 'Added','success');
            header('Location: '.BASEURL.'/pegawai');
            exit();
        }
        else{
            Flasher::setFlash($errMsg, 'Added','danger');
        }
    }
}

addPengirimanControl();

$title = 'Tambah Pengiriman';
require_once '../view/viewAddPengiriman.php';
?>

