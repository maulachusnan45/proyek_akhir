<?php
session_start();
require_once '../helper/connection.php';

$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$judul_skripsi = $_POST['judul_skripsi'];
$tanggal = $_POST['tanggal'];
$prodi = $_POST['prodi'];
$query = mysqli_query($connection, "UPDATE pengajuan_skripsi SET nama_mahasiswa = '$nama_mahasiswa', judul_skripsi = '$judul_skripsi', tanggal ='$tanggal' ,prodi='$prodi' WHERE nim = '$nim'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
