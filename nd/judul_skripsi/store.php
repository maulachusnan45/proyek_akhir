<?php
session_start();
require_once '../helper/connection.php';

$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$judul_skripsi = $_POST['judul_skripsi'];
$tanggal = $_POST['tanggal'];
$prodi = $_POST['prodi'];
$status = $_POST['status'];
$query = mysqli_query($connection, "insert into pengajuan_skripsi(nim, nama_mahasiswa,judul_skripsi,tanggal,prodi,status) value('$nim', '$nama_mahasiswa','$judul_skripsi','$tanggal','$prodi','Sedang Diproses')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
