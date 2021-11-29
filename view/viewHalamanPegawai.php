<?php 
require_once '../view/layout/header.php';
require_once '../view/component/navbar.php'
?>
<div class="container-md pt-5">
    <h1 class="text-center">Halaman Pegawai</h1>
    <hr>
    <?php Flasher::flash(); ?>
    
    <div class="container-fluid">
        <h2>Pengiriman <a href="<?=BASEURL?>/pegawai/addPengiriman.php" class="btn btn-primary float-end">Tambah Pengiriman</a></h2>
        <div class="d-flex flex-column">
            <?php foreach($listResi as $resi): ?>
            <div class="border bg-light p-3">
                <p class="mb-0">Resi <strong><?=$resi['resi']?></strong><span class="badge bg-secondary float-end"><a class="text-light" href="<?=BASEURL?>/pegawai/detailPengiriman.php?resi=<?=$resi['resi']?>">detail</a></span><span class="badge bg-danger float-end mx-1"><a class="text-light" href="<?=BASEURL?>/pegawai/deletePengiriman.php?resi=<?=$resi['resi']?>" onclick="return confirm('Are you sure?');">delete</a></span></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>   
</div>

<?php 
require_once '../view/layout/footer.php';
?>