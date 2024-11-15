<?php
include ('../config/conn.php');
include ('../config/function.php');

$kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : '';

function get_kategori_name($kategori_id) {
    global $con;
    $query = mysqli_query($con, "SELECT nama_kategori FROM kategori WHERE idkategori = '$kategori_id'");
    $result = mysqli_fetch_assoc($query);
    return $result['nama_kategori'] ?? 'Kategori Tidak Ditemukan';
}


$query = mysqli_query($con, "SELECT x.*, x1.nama_barang, x2.nama_merek, x3.nama_kategori 
    FROM barang_masuk x 
    JOIN barang x1 ON x1.idbarang = x.barang_id 
    JOIN merek x2 ON x2.idmerek = x1.merek_id 
    JOIN kategori x3 ON x3.idkategori = x1.kategori_id 
    WHERE x1.kategori_id = '$kategori_id'
    ORDER BY x.idbarang_masuk DESC") or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Barang Masuk Berdasarkan Kategori</title>
    <style>
        h2 { padding: 0; margin: 0; font-size: 14pt; }
        h4 { font-size: 12pt; }
        table { border-collapse: collapse; border: 1px solid #000; font-size: 11pt; width: 100%; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
    </style>
</head>
<body>
    <div style="text-align:center; margin-top:5%;">
        <h2>LAPORAN BARANG MASUK</h2>
        <h4>Kategori: <?= htmlspecialchars(get_kategori_name($kategori_id)); ?></h4>
        <hr style="border-color:black;">
        <table>
            <thead>
                <tr>
                    <th width="20">NO</th>
                    <th>TGL</th>
                    <th>NAMA BARANG</th>
                    <th>MEREK</th>
                    <th>KATEGORI</th>
                    <th>KETERANGAN</th>
                    <th>JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                <?php $n=1; while($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td><?= $n++; ?></td>
                    <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                    <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($row['nama_merek']); ?></td>
                    <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
                    <td><?= htmlspecialchars($row['keterangan']); ?></td>
                    <td><?= htmlspecialchars($row['jumlah']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<script>
window.print();
</script>
