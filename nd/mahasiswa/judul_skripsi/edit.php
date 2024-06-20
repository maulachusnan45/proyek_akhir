<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nim = $_GET['nim'];
$query = mysqli_query($connection, "SELECT * FROM pengajuan_skripsi WHERE nim='$nim'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Matakuliah</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
              ?>
              <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>NIM</td>
                  <td><input class="form-control" type="text" name="nim" size="20" required value="<?= $row['nim'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Mahasiswa</td>
                  <td><input class="form-control" type="text" name="nama_mahasiswa" size="20" required value="<?= $row['nama_mahasiswa'] ?>"></td>
                </tr>

                <tr>
                  <td>Judul Skripsi</td>
                  <td><input class="form-control" type="text" name="judul_skripsi" size="20" required value="<?= $row['judul_skripsi'] ?>"></td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td><input class="form-control" type="date" name="tanggal" size="20" required value="<?= $row['tanggal'] ?>"></td>
                </tr>
                <tr>
                <tr>
                  <td>Prodi</td>
                  <td><input class="form-control" type="text" name="prodi" size="20" required value="<?= $row['prodi'] ?>"></td>
                </tr>
                <td>
                  <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                  <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                <td>
                  </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>