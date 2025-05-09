<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $barang_id = $_POST['barang_id'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    // Ambil stok barang saat ini
    $stok_query = mysqli_query($con, "SELECT stok FROM barang WHERE id = '$barang_id'") or die(mysqli_error($con));
    $stok_data = mysqli_fetch_assoc($stok_query);
    $stok_saat_ini = $stok_data['stok'];

    if ($jumlah > $stok_saat_ini) {
        $_SESSION['error'] = 'Jumlah barang keluar melebihi stok yang tersedia!';
        header('Location:../?barang_keluar');
        exit();
    }

    // Jika valid, baru lakukan insert
    $insert = mysqli_query($con, "INSERT INTO barang_keluar (barang_id, jumlah, keterangan, tanggal) 
                                  VALUES ('$barang_id','$jumlah','$keterangan','$tanggal')") or die (mysqli_error($con));

    if($insert){
        // Kurangi stok
        $stok_baru = $stok_saat_ini - $jumlah;
        mysqli_query($con, "UPDATE barang SET stok = '$stok_baru' WHERE id = '$barang_id'");

        $_SESSION['success'] = 'Berhasil menambahkan data barang keluar';
    } else {
        $_SESSION['error'] = 'Gagal menambahkan data barang keluar';
    }

    header('Location:../?barang_keluar');
}
?>
