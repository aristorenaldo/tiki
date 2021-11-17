<?php 
require_once 'view/layout/header.php';
require_once 'view/component/sidebar.php';
?>


<div class="container mx-auto">
    <!-- judul -->
    <div class="container-fluid">
        <h1 class="text-center">Riwayat Pengiriman</h1>
    </div>

    <div class="container-fluid">
        <?php 
            Flasher::flash();
        ?>
    </div>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRiwayatPengiriman">Tambah Riwayat</button>
    </div>

<!-- tabel  -->
    <div class="container mx-lg pt-3 scroll">
    
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm display nowrap" >
            <thead class="table-dark" >
                <tr>
                    <th scope="col">resi</th>
                    <th scope="col">id</th>
                    <th scope="col">time_stamp</th>
                    <th scope="col" >kota</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                <tr>
                    <?php foreach ($row as $data): ?>
                    <td><?=$data?></td>
                    <?php endforeach; ?>
                    <td class="fit">
                        <a class="badge bg-success showEditRiwayatPengiriman"  data-bs-toggle="modal" data-bs-target="#editRiwayatPengiriman">Edit</a>
                        <a class="badge bg-danger" href="<?=BASEURL?>/deleteRiwayatPengiriman.php?id=<?=$row["ID"]?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

</div>

<!-- Modal Add  -->
<div class="modal fade" id="addRiwayatPengiriman" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Riwayat Pengiriman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="addRiwayatPengiriman.php" method="post">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="id">Resi</label>
                        <input type="text" name="resi" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Id</label>
                        <input type="text" name="id" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="name">time_stamp</label>
                        <input type="text" name="time_stamp" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">kota</label>
                        <input type="number" name="kota" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer mb-3">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" class="btn btn-success" required>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="editRiwayatPengiriman" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Riwayat Pengiriman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="editRiwayatPengiriman.php" method="post" id="modalEdit">
                <div class="modal-body">
                    
                        <input type="hidden" name="id" value="">

                    <div class="form-group mb-3">
                        <label for="id">Resi</label>
                        <input type="text" name="resi" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Id</label>
                        <input type="text" name="id" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="name">time_stamp</label>
                        <input type="text" name="time_stamp" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">kota</label>
                        <input type="number" name="kota" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer mb-3">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" class="btn btn-success" required>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
require_once 'view/layout/footer.php';
?>