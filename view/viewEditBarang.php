<?php 
require_once '../view/layout/header.php';
require_once '../view/component/navbar.php'
?>

<div class="container-md pt-5">
    <h1 class="text-center"><a class="float-start" href="<?=BASEURL?>/pegawai/detailPengiriman.php?resi=<?=$resi?>"><i class="bi bi-arrow-left"></a></i> Halaman Pegawai</h1>
    <hr>

    <div class="container-fluid">
        <?php Flasher::flash(); ?>

        <form action="editBarang.php" method="post">
            <input type="hidden" name="nama" value="<?=$editData['nama']?>">
            <div class="row mb-1">
                <label class="col-sm-2 col-form-label">Resi</label>
                <div class="col-sm-10">
                    <input type="text" name="resi" id="inputResi" class="form-control" readonly value="<?=$resi?>">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="newnama" id="inputNama" class="form-control"value="<?=$editData['nama']?>">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-10">
                    <input type="text" name="jenis" id="inputJenis" class="form-control"value="<?=$editData['jenis']?>">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-2 col-form-label">Berat (kg)</label>
                <div class="col-sm-10">
                    <input type="number" name="berat" id="inputBerat" step="0.01" class="form-control"value="<?=$editData['berat_kg']?>">
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