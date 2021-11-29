<?php 
require_once '../view/layout/header.php';
require_once '../view/component/navbar.php'
?>

<div class="container-md pt-5">
    <h1 class="text-center"><a class="float-start" href="<?=BASEURL?>/pegawai"><i class="bi bi-arrow-left"></a></i> Halaman Pegawai</h1>
    <hr>

    <div class="container-fluid">
        <h2>Tambah Pengiriman</h2>
        <?php Flasher::flash(); ?>
        <hr>

        <form action="addPengiriman.php" method="post">
            <div class="row mb-1">
                <label for="inputResi" class="col-sm-2 col-form-label">Resi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="resi" id="inputResi">
                </div>
            </div>
            <div class="row mb-1">
                <label for="inputJenisPengiriman" class="col-sm-2 col-form-label">Jenis Pengiriman</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenis_pengiriman" id="inputJenisPengiriman" >
                </div>
            </div>
            <div class="row mb-1">
                <label for="inputTotalBerat" class="col-sm-2 col-form-label">Total Berat (kg)</label>
                <div class="col-sm-10">
                    <input type="number" step=0.01 class="form-control" name="total_berat" id="inputTotalBerat">
                </div>
            </div>
            <div class="row mb-1">
                <label for="inputTotalHarga" class="col-sm-2 col-form-label">Total Harga (Rp)</label>
                <div class="col-sm-10">
                    <input type="number" step=0.01 class="form-control" name="total_harga" id="inputTotalHarga">
                </div>
            </div>

            <div class="row mb-1">
                <label for="inputPengirim" class="col-sm-2 col-form-label">Pengirim</label>
                <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="id_pengirim">
                        <?php foreach($pilihanPengirim as $pengirimIdNama): ?>
                        <option value="<?=$pengirimIdNama['ID_pengirim']?>"><?=$pengirimIdNama['nama']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-1 d-flex align-items-center justify-content-end">
                    <button type="button" class="btn btn-secondary btn-sm my-auto" data-bs-toggle="modal" data-bs-target="#modalAdd" data-title="Pengirim">Tambah</button>
                </div>
            </div>

            <div class="row mb-1">
                <label for="inputPenerima" class="col-sm-2 col-form-label">Penerima</label>
                <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="id_penerima">
                        <?php foreach($pilihanPenerima as $penerimaIdNama): ?>
                        <option value="<?=$penerimaIdNama['ID_penerima']?>"><?=$penerimaIdNama['nama']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-1 d-flex align-items-center justify-content-end">
                    <button type="button" class="btn btn-secondary btn-sm my-auto" data-bs-toggle="modal" data-bs-target="#modalAdd" data-title="Penerima">Tambah</button>
                </div>
            </div>

            <div class="row mb-1">
                <label for="inputKurir" class="col-sm-2 col-form-label">Kurir</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_kurir">
                        <option value="" selected>NULL</option>
                        <?php foreach($pilihanKurir as $kurirIdNama): ?>
                        <option value="<?=$kurirIdNama['ID_kurir']?>"><?=$kurirIdNama['nama']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
           
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary" value="submit">Simpan</button>
                </div>
            </div>
        </form>   
    </div>
</div>

<div class="modal fade" id="modalAdd" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Pengirim</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="addPengirim.php" method="post">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">No. HP</label>
                        <input type="tel" name="no_hp" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Jalan</label>
                        <input type="text" name="jalan" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Kota/Kabupaten</label>
                        <input type="text" name="kota" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Provinsi</label>
                        <input type="text" name="provinsi" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Kodepos</label>
                        <input type="number" name="kodepos" class="form-control" required>
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