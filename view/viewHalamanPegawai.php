<?php 
require_once 'view/layout/header.php';
require_once 'view/component/navbar.php'
?>
<div class="container-md pt-5">
    <h1 class="text-center">Halaman Pegawai</h1>
    <hr>
    
    <div class="container-fluid">
        <h2>Pengiriman</h2>
        <div class="d-flex flex-column">
            <?php foreach($listResi as $resi): ?>
            <div class="border bg-light p-3">
                <p class="mb-0">Resi <strong><?=$resi['resi']?></strong><span class="badge bg-secondary float-end"><a class="text-light" href="">detail</a></span></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>   
</div>

<?php 
require_once 'view/layout/footer.php';
?>