<?php 
require_once 'view/layout/header.php';
require_once 'view/component/sidebar.php';
?>


<div class="container mx-auto">
    <!-- judul -->
    <div class="container-fluid">
        <h1 class="text-center">Pengiriman</h1>
    </div>

    <div class="container-fluid">
        <?php 
            Flasher::flash();
        ?>
    </div>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPengiriman">Tambah Pengiriman</button>
    </div>

<!-- tabel  -->
    <div class="container mx-lg pt-3 scroll">
    
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm display nowrap" >
            <thead class="table-dark" >
                <tr>
                    <?php foreach(array_keys($result[0]) as $col): ?>
                        <th><?=$col ?></th>
                    <?php endforeach; ?>
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
                        <a class="badge bg-success showEdit"  data-bs-toggle="modal" data-bs-target="#editPengiriman">Edit</a>
                        <a class="badge bg-danger" href="<?=BASEURL?>/deletePengiriman.php?resi=<?=$row["resi"]?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

</div>

<!-- Modal Add  -->
<div class="modal fade" id="addPengiriman" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Pengiriman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="addPengiriman.php" method="post">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="id">resi</label>
                        <input type="text" name="resi" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Jenis Pengiriman</label>
                        <input type="text" name="jenis_pengiriman" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Total_berat</label>
                        <input type="number" step=0.01 name="total_berat" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Total_harga</label>
                        <input type="number" name="total_harga" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">ID Pengirim</label>
                        <input type="text" name="id_pengirim" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">ID Kurir</label>
                        <input type="text" name="id_kurir" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">ID Penerima</label>
                        <input type="text" name="id_penerima" class="form-control" required>
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
<div class="modal fade" id="editPengiriman" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Pengiriman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="editPengiriman.php" method="post" id="formEdit">
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="id">resi</label>
                        <input type="text" name="newresi" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Timestamp</label>
                        <input type="text" name="timestamp" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Jenis Pengiriman</label>
                        <input type="text" name="jenis_pengiriman" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Total_berat</label>
                        <input type="number" name="total_berat"  step=0.01  class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Total_harga</label>
                        <input type="number" name="total_harga" step=0.01 class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">ID Pengirim</label>
                        <input type="text" name="id_pengirim" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">ID Kurir</label>
                        <input type="text" name="id_kurir" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">ID Penerima</label>
                        <input type="text" name="id_penerima" class="form-control" required>
                    </div>
                    <input type="hidden" name="resi" value="">
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