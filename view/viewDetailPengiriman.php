<?php 
require_once '../view/layout/header.php';
require_once '../view/component/navbar.php'
?>

<div class="container-md pt-5">
    <h1 class="text-center"><a class="float-start" href="<?=BASEURL?>/pegawai"><i class="bi bi-arrow-left"></a></i> Halaman Pegawai</h1>
    <hr>
    <div class="container-fluid">

        <?php Flasher::flash(); ?>

        <h2>Detail Pengiriman</h2>
        
        <form action="editPengiriman.php" method="post">
            <input type="hidden" name="resi" value="<?=$detail['resi']?>">
            <div class="row mb-1">
                <label for="inputResi" class="col-sm-2 col-form-label">Resi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="newresi" id="inputResi" value="<?=$detail['resi']?>">
                </div>
            </div>
            <div class="row mb-1">
                <label for="inputWaktuPembuatan" class="col-sm-2 col-form-label">Waktu pembuatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="timestamp" id="inputWaktuPembuatan" value="<?=$detail['waktu_pembuatan']?>" >
                </div>
            </div>
            <div class="row mb-1">
                <label for="inputJenisPengiriman" class="col-sm-2 col-form-label">Jenis Pengiriman</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenis_pengiriman" id="inputJenisPengiriman" value="<?=$detail['jenis_pengiriman']?>">
                </div>
            </div>
            <div class="row mb-1">
                <label for="inputTotalBerat" class="col-sm-2 col-form-label">Total Berat (kg)</label>
                <div class="col-sm-9 ">
                    <input type="number" step=0.01 class="form-control" name="total_berat" id="inputTotalBerat value" value="<?=$detail['total_berat_kg']?>">
                </div>
                <div class="col-sm-1 d-flex align-items-center justify-content-end">
                    <a class="btn btn-secondary btn-sm" href="<?=BASEURL?>/pegawai/updateTotBerat.php?resi=<?=urlencode($detail['resi'])?>">Perbarui</a>
                </div>
            </div>
            <div class="row mb-1">
                <label for="inputTotalHarga" class="col-sm-2 col-form-label">Total Harga (Rp)</label>
                <div class="col-sm-10">
                    <input type="number" step=0.01 class="form-control" name="total_harga" id="inputTotalHarga" value="<?=$detail['total_harga']?>">
                </div>
            </div>

            <div class="row mb-1">
                <label for="inputPengirim" class="col-sm-2 col-form-label">Pengirim</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_pengirim">
                        <?php 
                        foreach($pilihanPengirim as $pengirimIdNama): 
                            $selected = ($pengirimIdNama['ID_pengirim'] == $detail['ID_pengirim']?'selected':'');
                        ?>
                        <option value="<?=$pengirimIdNama['ID_pengirim']?>" <?=$selected?>><?=$pengirimIdNama['nama']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-1">
                <label for="inputPenerima" class="col-sm-2 col-form-label">Penerima</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_penerima">
                        <?php 
                        foreach($pilihanPenerima as $penerimaIdNama): 
                            $selected = ($penerimaIdNama['ID_penerima'] == $detail['ID_penerima']?'selected':'');
                        ?>
                        <option value="<?=$penerimaIdNama['ID_penerima']?>" <?=$selected?>><?=$penerimaIdNama['nama']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-1">
                <label for="inputKurir" class="col-sm-2 col-form-label">Kurir</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_kurir">
                        <option value="" selected>NULL</option>
                        <?php 
                        foreach($pilihanKurir as $kurirIdNama): 
                            $selected = ($kurirIdNama['ID_kurir'] == $detail['ID_kurir']?'selected':'');
                        ?>
                        <option value="<?=$kurirIdNama['ID_kurir']?>" <?=$selected?>><?=$kurirIdNama['nama']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
           
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-secondary" value="submit">Ubah Data</button>
                </div>
            </div>
        </form>

        <hr>
        <h3>Riwayat Pengiriman</h3>
        <table class="table table-bordered">
            <thead>
                <th scope="col">Timestamp</th>
                <th scope="col">Status</th>
                <th scope="col">Kabupaten / Kota</th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach($listRiwayat as $riwayat): ?>
                <tr>
                    <td><?=$riwayat['time_stamp']?></td>
                    <td><?=$riwayat['nama_status']?></td>
                    <td><?=$riwayat['kab_kota']?></td>
                    <td>
                        <a class="badge bg-danger" href="<?=BASEURL?>/pegawai/deleteRiwayatPengiriman.php?resi=<?=urlencode($riwayat['resi'])?>&id_status=<?=urlencode($riwayat['ID_status']) ?>" onclick="return confirm('Are you sure?');">Delete</a>
                        <a class="badge bg-secondary" href="<?=BASEURL?>/pegawai/editRiwayatPengiriman.php?resi=<?=urlencode($riwayat['resi'])?>&id_status=<?=urlencode($riwayat['ID_status']) ?>">Update</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddRiwayat">Tambah Riwayat</button>
        <hr>

        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h3 class="accordion-header" id="detailPengirimHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#detailPengirimBody" aria-expanded="false" aria-controls="detailPengirimBody">
                        Pengirim
                    </button>
                </h3>
                <div id="detailPengirimBody" class="accordion-collapse collapse" aria-labelledby="detailPengirimHeading">
                    <div class="accordion-body">

                        <form action="editPengirim.php" method="post">
                            <input type="hidden" name="resi" value="<?=$detail['resi']?>">
                            <input type="hidden" name="id" value="<?=$detailPengirim['ID_pengirim']?>">
                            <div class="row mb-1">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="inputNama" value="<?=$detailPengirim['nama']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputJalan" class="col-sm-2 col-form-label">Jalan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jalan" id="inputJalan" value="<?=$detailPengirim['jalan']?>" >
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputKecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kecamatan" id="inputKecamatan" value="<?=$detailPengirim['kecamatan']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputKota" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kota" id="inputKota" value="<?=$detailPengirim['kab_kota']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputProvinsi" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="provinsi" id="inputProvinsi" value="<?=$detailPengirim['provinsi']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputKodepos" class="col-sm-2 col-form-label">Kodepos</label>
                                <div class="col-sm-10">
                                    <input type="number" step=0.01 class="form-control" name="kodepos" id="inputKodepos" value="<?=$detailPengirim['kode_pos']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputNoHp" class="col-sm-2 col-form-label">No. HP</label>
                                <div class="col-sm-10">
                                    <input type="text" step=0.01 class="form-control" name="no_hp" id="inputNoHp" value="<?=$detailPengirim['no_hp']?>">
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-secondary" value="submit">Ubah Data</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="detailPenerimaHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#detailPenerimaBody" aria-expanded="false" aria-controls="detailPenerimaBody">
                        Penerima
                    </button>
                </h3>
                <div id="detailPenerimaBody" class="accordion-collapse collapse" aria-labelledby="detailPenerimaHeading">
                    <div class="accordion-body">
                       
                        <form action="editPenerima.php" method="post">
                            <input type="hidden" name="resi" value="<?=$detail['resi']?>">
                            <input type="hidden" name="id" value="<?=$detailPenerima['ID_penerima']?>">
                            <div class="row mb-1">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="inputNama" value="<?=$detailPenerima['nama']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputJalan" class="col-sm-2 col-form-label">Jalan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jalan" id="inputJalan" value="<?=$detailPenerima['jalan']?>" >
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputKecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kecamatan" id="inputKecamatan" value="<?=$detailPenerima['kecamatan']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputKota" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kota" id="inputKota" value="<?=$detailPenerima['kab_kota']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputProvinsi" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="provinsi" id="inputProvinsi" value="<?=$detailPenerima['provinsi']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputKodepos" class="col-sm-2 col-form-label">Kodepos</label>
                                <div class="col-sm-10">
                                    <input type="number" step=0.01 class="form-control" name="kodepos" id="inputKodepos" value="<?=$detailPenerima['kode_pos']?>">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputNoHp" class="col-sm-2 col-form-label">No. HP</label>
                                <div class="col-sm-10">
                                    <input type="text" step=0.01 class="form-control" name="no_hp" id="inputNoHp" value="<?=$detailPenerima['no_hp']?>">
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-secondary" value="submit">Ubah Data</button>
                                </div>
                            </div>
                        </form> 

                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h3 class="accordion-header" id="detailKurirHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#detailKurirBody" aria-expanded="false" aria-controls="detailKurirBody">
                        Kurir
                    </button>
                </h3>
                <div id="detailKurirBody" class="accordion-collapse collapse" aria-labelledby="detailKurirHeading">
                    <div class="accordion-body">
                        <div class="row mb-1">
                            <div class="col-sm-2">Nama :</div>
                            <div class="col-sm-10"><?=$detailKurir['nama']?></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-2">No. HP :</div>
                            <div class="col-sm-10"><?=$detailKurir['no_hp']?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">Lokasi :</div>
                            <div class="col-sm-10"><?=$detailKurir['lokasi']?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header" id="detailBarangHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#detailBarangBody" aria-expanded="false" aria-controls="detailBarangBody">
                        Barang
                    </button>
                </h3>
                <div id="detailBarangBody" class="accordion-collapse collapse" aria-labelledby="detailBarangHeading">
                    <div class="accordion-body">
                        <div class="container-fluid px-5">
                            <table class="table">
                                <thead>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Berat (kg)</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php foreach($listBarang as $dataBarang): ?>
                                    <tr>
                                        <td><?=$dataBarang['nama']?></td>
                                        <td><?=$dataBarang['jenis']?></td>
                                        <td><?=$dataBarang['berat_kg']?></td>
                                        <td>
                                            <a class="badge bg-danger" href="<?=BASEURL?>/pegawai/deleteBarang.php?resi=<?=urlencode($resi)?>&nama=<?=urlencode($dataBarang['nama']) ?>" onclick="return confirm('Are you sure?');">Delete</a>
                                            <a class="badge bg-secondary" href="<?=BASEURL?>/pegawai/editBarang.php?resi=<?=urlencode($resi)?>&nama=<?=urlencode($dataBarang['nama']) ?>">Update</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBarang">Tambah Barang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<!-- Modal Add Riwayat -->
<div class="modal fade" id="modalAddRiwayat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Riwayat Pengiriman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="addRiwayatPengiriman.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="resi" class="form-control" value="<?=$detail['resi']?>">
                    
                    <div class="form-group mb-3">
                        <label for="name">ID status</label>
                        <select class="form-select" aria-label="Default select example" name="id">
                            <?php foreach($listStatus as $status): ?>
                            <option value="<?=$status['ID_status']?>"><?=$status['nama_status']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Kab/Kota</label>
                        <input type="text" name="kota" class="form-control" required>
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

<!-- Modal Add Barang -->
<div class="modal fade" id="addBarang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="addBarang.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="resi" value="<?=$resi?>">
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="name">Jenis</label>
                        <input type="text" name="jenis" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Berat (kg)</label>
                        <input type="number" step="0.01" name="berat" class="form-control" required>
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