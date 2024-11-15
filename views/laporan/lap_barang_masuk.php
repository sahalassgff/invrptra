    <?php hakAkses(['admin']); ?>
    <!-- Mulai Konten Halaman -->
    <div class="container-fluid" id="laporan-page">

        <!-- Judul Halaman -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cetak Laporan Barang Masuk</h1>
        </div>

        <!-- Formulir Filter Tanggal -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="<?=base_url();?>process/lap_barang_masuk.php" method="post" target="_blank">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
                                    value="<?=date('Y-m-d');?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                                    value="<?=date('Y-m-d');?>">
                            </div>
                        </div>
                        <div class="col-md-2 p-2">
                            <button type="submit" class="btn btn-info mt-4"><i class="fas fa-print"></i> Cetak
                                Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Laporan Per Ruangan -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cetak Laporan Barang Masuk Per Kategori Area</h1>
        </div>

        <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Form untuk memilih kategori dan mencetak laporan -->
            <form action="<?= base_url(); ?>process/cetak_barang_masuk_perkategori.php" method="post" target="_blank">
                <div class="row align-items-center">
                    <!-- Dropdown Kategori -->
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="kategori_id">Kategori Barang</label>
                            <select name="kategori_id" id="kategori_id" class="form-control select2" style="width:100%;" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?= list_kategori(); ?>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Tombol Cetak Laporan -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-info mt-2"><i class="fas fa-print"></i> Cetak Laporan</button>
                    </div>
                </div>
            </form>
        </div> 
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Barang Masuk Seluruh</h1>
        </div>

        <!-- Tabel Barang Masuk -->
        <div class="card shadow mb-4" id="barang-masuk">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20">NO</th>
                                <th>TANGGAL</th>
                                <th>NAMA BARANG</th>
                                <th>MEREK</th>
                                <th>KATEGORI</th>
                                <th>LOKASI PENYIMPANAN</th>
                                <th>JUMLAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $n=1;
                            $query = mysqli_query($con,"SELECT x.*,x1.nama_barang,x2.nama_merek,x3.nama_kategori FROM barang_masuk x JOIN barang x1 ON x1.idbarang=x.barang_id JOIN merek x2 ON x2.idmerek=x1.merek_id JOIN kategori x3 ON x3.idkategori=x1.kategori_id ORDER BY x.idbarang_masuk DESC")or die(mysqli_error($con));
                            while($row = mysqli_fetch_array($query)):
                            ?>
                            <tr>
                                <td><?= $n++; ?></td>
                                <td><?= date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['nama_merek']; ?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td style="text-align: center;"><?= $row['jumlah']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Tambahkan CSS untuk Efek Fade-In -->
    <style>
        /* Animasi Fade-In */
        #laporan-page {
            animation: fadeIn 1.5s ease-in-out;
        }
        #barang-masuk {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <!-- Pastikan untuk menambahkan JS untuk Inisialisasi Tabel -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "ordering": false,
                "paging": true,
                "info": false
            });
        });
    </script>

