<?php 
require_once 'config/config.php';
// Core
require_once 'core/model.php';
require_once 'core/database.php';
require_once 'model/modelPengiriman.php';
require_once 'model/modelRiwayatPengiriman.php';
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$title = 'TIKI JNE'; 
if (empty($_GET['resi'])) {
    require_once 'view/viewNotFound.php';
    exit;
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

$resi = htmlentities($_GET['resi']);

$pengiriman = new ModelPengiriman();
$detailPengiriman = $pengiriman->getDetailPengirimPenerimaKurirByResi($resi);

$riwayatPengiriman = new ModelRiwayatPengiriman();
$listRiwayat = $riwayatPengiriman->getDetailByResi($resi);
$harga = rupiah($detailPengiriman['total_harga']);

$html='<html><head><style>'.file_get_contents('asset/css/print.css').'</style></head><body>';
$html .= '<h1 class="text-center">Tiki JNE</h1>';
$html .= '<h2 class="text-center">Resi : '.$resi.'</h2>';

$html .= '  <table>
                <tr>
                    <td style="width: 20%;">Jenis Pengiriman :</td>
                    <td style="width: 80%;">'.$detailPengiriman['jenis_pengiriman'].'</td>
                </tr>
                <tr>
                    <td style="width: 20%;">Total Berat :</td>
                    <td style="width: 80%;">'.$detailPengiriman['total_berat_kg'].' kg</td>
                </tr>
                <tr>
                    <td style="width: 20%;">Total Harga :</td>
                    <td style="width: 80%;">'.$harga.'</td>
                </tr>
            </table>';

$html .= '  <table class="mb-10" >
                <tr>
                    <th colspan="2" >Pengirim</th>
                    <th colspan="2" >Penerima</th>
                </tr>
                <tr>
                    <td style="width: 10%;">Nama :</td>
                    <td style="width: 40%;">'.$detailPengiriman['nama_pengirim'].' </td>
                    <td style="width: 10%;">Nama :</td>
                    <td style="width: 40%;">'.$detailPengiriman['nama_penerima'].' </td>
                </tr>
                <tr>
                    <td style="width: 10%;">Alamat :</td>
                    <td style="width: 40%;">'.$detailPengiriman['alamat_pengirim'].'</td>
                    <td style="width: 10%;">Alamat :</td>
                    <td style="width: 40%;">'.$detailPengiriman['alamat_penerima'].'</td>
                </tr>
                <tr>
                    <td style="width: 10%;">No. HP :</td>
                    <td style="width: 40%;">'.$detailPengiriman['no_hp_pengirim'].'</td>
                    <td style="width: 10%;">No. HP :</td>
                    <td style="width: 40%;">'.$detailPengiriman['no_hp_penerima'].'</td>
                </tr>
            </table>
            <h3>Riwayat Pengiriman</h3>
            <table class="border mb-10">
            <tr>
                <th>Timestamp</th>
                <th>Status</th>
                <th>Kabupaten/kota</th>
            </tr>';
foreach ($listRiwayat as $detailRiwayat) {
    $html .= '  <tr>
                    <td>'.$detailRiwayat['time_stamp'].'</td>
                    <td>'.$detailRiwayat['nama_status'].'</td>
                    <td>'.$detailRiwayat['kab_kota'].'</td>
                </tr>';
}                
$html .= '  </table>';
$html .= '  <table style="width: 50%;">
                <tr>
                    <th colspan="2" >Kurir</th>
                </tr>
                <tr>
                    <td style="width: 10%;">Nama :</td>
                    <td style="width: 40%;">'.$detailPengiriman['nama_kurir'].' </td>
                </tr>
                <tr>
                    <td style="width: 10%;">No. HP :</td>
                    <td style="width: 40%;">'.$detailPengiriman['no_hp_kurir'].' </td>
                </tr>
            </table>';
$html .= '</body></html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("resi_download.pdf", array("Attachment" => false));

?>