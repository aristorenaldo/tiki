<?php 
require_once '../view/layout/header.php';
require_once '../view/component/navbar.php';
require_once '../view/component/sidebar.php';
?>


<div class="container mx-auto">
    <!-- judul -->
    <div class="container-fluid">
        <h1 class="text-center">Barang</h1>
    </div>

    <div class="container-fluid">
        <?php 
            Flasher::flash();
        ?>
    </div>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBarang">Tambah Barang</button>
    </div>

<!-- tabel  -->
    <div class="container mx-lg pt-3 scroll">
    
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm display nowrap" >
            <thead class="table-dark" >
                <tr>
                    <th scope="col">nama</th>
                    <th scope="col">resi</th>
                    <th scope="col">jenis</th>
                    <th scope="col" >berat (kg)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                <tr>
                    <?php foreach ($row as $data): ?>
                    <?php 
                    if (is_float($data)) $data = (String)round($data,2)    
                    ?>
                    <td><?=$data?></td>
                    <?php endforeach; ?>
                    <td class="fit">
                        <a class="badge bg-success showEdit"  data-bs-toggle="modal" data-bs-target="#editBarang">Edit</a>
                        <a class="badge bg-danger" href="<?=BASEURL?>/deleteBarang.php?nama=<?=urlencode($row['nama'])?>&resi=<?=urlencode($row['resi']) ?>" onclick="return confirm('Are you sure?');">Delete</a>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

</div>

<!-- Modal Add  -->
<div class="modal fade" id="addBarang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="addBarang.php" method="post">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="id">Resi</label>
                        <input type="text" name="resi" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="name">jenis</label>
                        <input type="text" name="jenis" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">berat</label>
                        <input type="number" name="berat" class="form-control" required>
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
<div class="modal fade" id="editBarang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="editBarang.php" method="post" id="formEdit">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="newnama" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id">Resi</label>
                        <input type="text" name="newresi" class="form-control" required>
                    </div>    

                    
                    
                    <div class="form-group mb-3">
                        <label for="name">Jenis</label>
                        <input type="text" name="newjenis" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">berat</label>
                        <input type="number" name="newberat" class="form-control" required>
                    </div>

                    <input type="hidden" name="nama" value="">
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
require_once '../view/layout/footer.php';
?>