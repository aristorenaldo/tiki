<!--Andrew Salim (205150207111048)-->


<?php 
require_once '../view/layout/header.php';
require_once '../view/component/navbar.php';
require_once '../view/component/sidebar.php';
?>


<div class="container mx-auto">
    <!-- judul -->
    <div class="container-fluid">
        <h1 class="text-center">Kurir</h1>
    </div>

    <div class="container-fluid">
        <?php 
            Flasher::flash();
        ?>
    </div>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd" data-title="Status" >Tambah Status</button>
    </div>

<!-- tabel  -->
    <div class="container mx-lg pt-3 scroll">
    
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm display nowrap" >
            <thead class="table-dark" >
                <tr>
                    <?php foreach($colName as $value): ?>
                    <th scope="col"><?=$value['COLUMN_NAME'] ?></th>
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
                        <a class="badge bg-success showEdit"  data-bs-toggle="modal" data-bs-target="#modalEdit">Edit</a>
                        <a class="badge bg-danger" href="<?=BASEURL?>/admin/deleteStatus.php?id=<?=$row["ID_status"]?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add  -->
<div class="modal fade" id="modalAdd" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="addStatus.php" method="post" >
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="id">ID Status</label>
                        <input type="text" name="id" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Nama Status</label>
                        <input type="text" name="nama_status" class="form-control" required>
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
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="editStatus.php" method="post" id="formEdit">
                <div class="modal-body">
                    
                        <input type="hidden" name="id" value="">
                    
                    <div class="form-group mb-3">
                        <label for="name">Nama Status</label>
                        <input type="text" name="nama_status" class="form-control" required>
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
require_once '../view/layout/footer.php';
?>
