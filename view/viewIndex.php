<?php 
require_once 'view/layout/header.php'; 
require_once 'view/component/navbar.php';
?>

<div class="container-md pt-5">
    <h1 class="text-center">Tiki JNE</h1>
    
    <form class="row g-3t" action="" method="get">
        <label class="col-8 col-form-label-lg">Cek Resi</label>
        <div class="col-3">
            <input type="text" class="form-control" name="resi" placeholder="Masukan Resi">
        </div>
        <div class="col-1">
            <input class="btn btn-primary float-end" type="submit" value="Cari">
        </div>
    </form>
    <hr>

    <?php 
        if($listRiwayat != '') require_once 'view/component/riwayatPengirimanTable.php';
    ?>
    
</div>

<?php require_once 'view/layout/footer.php'; ?>