<?php hakAkses(['admin']); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Stok Barang</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?=base_url();?>process/lap_stok_barang.php" method="post" target="_blank">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="kategori_barang">Kategori Barang</label>
                            <select name="kategori_barang" id="kategori_barang" class="form-control">
                                <option value="all">Semua Kategori</option>
                                <?php 
                                $kategoriQuery = mysqli_query($con, "SELECT * FROM kategori ORDER BY nama_kategori");
                                while($kategori = mysqli_fetch_array($kategoriQuery)):
                                ?>
                                <option value="<?= $kategori['idkategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 p-2">
                        <button type="submit" class="btn btn-info mt-4"><i class="fas fa-print"></i> Cetak Laporan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>NAMA BARANG</th>
                            <th>MEREK</th>
                            <th>KATEGORI</th>
                            <th>LOKASI PENYIMPANAN</th>
                            <th>STOK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n = 1;
                        $stokQuery = mysqli_query($con, 
                            "SELECT b.nama_barang, m.nama_merek, k.nama_kategori, b.lokasi, b.stok 
                             FROM barang b 
                             JOIN merek m ON m.idmerek = b.merek_id 
                             JOIN kategori k ON k.idkategori = b.kategori_id 
                             ORDER BY b.nama_barang ASC") or die(mysqli_error($con));
                        while($row = mysqli_fetch_array($stokQuery)):
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><?= $row['nama_merek']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['lokasi']; ?></td>
                            <td style="text-align: center;"><?= $row['stok']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
