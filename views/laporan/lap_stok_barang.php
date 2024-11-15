<?php
// session_start();
include ('../config/conn.php');
include ('../config/function.php');
?>
<html>

<head>
    <style>
    h2 {
        padding: 0px;
        margin: 0px;
        font-size: 18pt;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 11pt;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
    }
    </style>
    <title>View Laporan Stok Barang</title>
</head>

<body>
    <?php
    // Query data stok barang
    $query = mysqli_query($con,"SELECT x.*, x1.nama_merek, x2.nama_kategori FROM barang x 
                                JOIN merek x1 ON x1.idmerek = x.merek_id 
                                JOIN kategori x2 ON x2.idkategori = x.kategori_id 
                                ORDER BY x.idbarang DESC") 
                                or die(mysqli_error($con));
    ?>
    <div style="text-align: center; margin-top: 20px;">
        <h2>LAPORAN STOK BARANG RPTRA CIBUBUR BERSERI</h2>
        <a href="cetak_laporan_stok_barang.php" target="_blank" style="text-decoration: none; color: white;">
            <button style="padding: 10px 20px; font-size: 14pt; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">
                Cetak Laporan
            </button>
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th width="5%">NO</th>
                <th>NAMA BARANG</th>
                <th>MEREK</th>
                <th>KATEGORI</th>
                <th>KETERANGAN</th>
                <th>STOK</th>
            </tr>
        </thead>
        <tbody>
            <?php $n=1; while($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $n++; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['nama_merek']; ?></td>
                <td><?= $row['nama_kategori']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['stok']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>
