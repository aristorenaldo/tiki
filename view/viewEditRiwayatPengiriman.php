<?php 
require_once '../view/layout/header.php';
require_once '../view/component/navbar.php'
?>

<div class="container-md pt-5">
    <h1 class="text-center"><a class="float-start" href="<?=BASEURL?>/pegawai/detailPengiriman.php?resi=<?=$resi?>"><i class="bi bi-arrow-left"></a></i> Halaman Pegawai</h1>
    <hr>

    <div class="container-fluid">
        <?php Flasher::flash(); ?>

        <h2>Edit Riwayat Pengiriman</h2>

        <form action="editRiwayatPengiriman.php" method="post">
            <div class="row mb-1">
                <label class="col-sm-2 col-form-label">Resi</label>
                <div class="col-sm-10">
                    <input type="text" name="resi" id="inputResi" class="form-control" readonly value="<?=$resi?>">
                </div>
            </div>
            <input type="hidden" name="id_status" value="<?=$editData['ID_status']?>">
            <div class="row mb-1">
                <label class="col-sm-2 col-form-label">Timestamp</label>
                <div class="col-sm-10">
                    <input type="text" name="timestamp" id="inputTimestamp" class="form-control"value="<?=$editData['time_stamp']?>">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-select" name="newid_status">
                        <?php 
                        foreach($listStatus as $optionStatus): 
                            $selected = ($optionStatus['ID_status'] == $editData['ID_status']?'selected':'');
                        ?>
                        <option value="<?=$optionStatus['ID_status']?>" <?=$selected?>><?=$optionStatus['nama_status']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-2 col-form-label">Kab/Kota</label>
                <div class="col-sm-10">
                    <input type="text" name="kab_kota" id="inputKabKota" class="form-control"value="<?=$editData['kab_kota']?>">
                </div>
            </div>
            <div class="row">
                
                <div class="col-sm-10 offset-sm-2">
                    <input type="submit" class="btn btn-secondary"value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>

<?php 
require_once '../view/layout/footer.php';
?>