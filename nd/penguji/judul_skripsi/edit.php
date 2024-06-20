<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nim = $_GET['nim'];
$query = mysqli_query($connection, "SELECT * FROM pengajuan_skripsi WHERE nim='$nim'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Status Judul Skripsi</h1>
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
                  <td><input class="form-control" type="text" name="nim" size="20" required value="<?= $row['nim'] ?>"
                      disabled></td>
                </tr>

                <!-- kok jadi hilang setelah di update padahal yang nim endak terpaksa pake input type hiden -->
                <tr>
                  <td>Nama Mahasiswa</td>
                  <td><input class="form-control" type="text" name="nama_mahasiswa" size="20" required
                      value="<?= $row['nama_mahasiswa'] ?>" disabled>
                    <input type="hidden" name="nama_mahasiswa" value="<?= $row['nama_mahasiswa'] ?>">
                  </td>
                </tr>

                <tr>
                  <td>Judul Skripsi</td>
                  <td><input class="form-control" type="text" name="judul_skripsi" size="20" required
                      value="<?= $row['judul_skripsi'] ?>" disabled>
                    <input type="hidden" name="judul_skripsi" value="<?= $row['judul_skripsi'] ?>">
                  </td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td><input class="form-control" type="date" name="tanggal" size="20" required
                      value="<?= $row['tanggal'] ?>"disabled>
                      <input type="hidden"  name="tanggal" value="<?= $row['tanggal'] ?>"></td>
                </tr>
                <tr>
                <tr>
                  <td>Prodi</td>
                  <td><input class="form-control" type="text" name="prodi" size="20" required
                      value="<?= $row['prodi'] ?>"disabled>
                      <input type="hidden"  name="prodi" value="<?= $row['prodi'] ?>"></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>
                    <select class="form-control" name="status" id="status" required>
                      <option value="Sedang Diproses" <?php if ($row['status'] == "Sedang Diproses") {
                        echo "selected";
                      } ?>>Sedang Diproses</option>
                      <option value="Disetujui" <?php if ($row['status'] == "Disetujui") {
                        echo "selected";
                      } ?>>Disetujui
                      </option>
                      <option value="Ditolak" <?php if ($row['status'] == "Ditolak") {
                        echo "selected";
                      } ?>>Ditolak</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Catatan</td>
                  <td><input class="form-control" type="text" name="catatan" size="20" required
                      value="<?= $row['catatan'] ?>"></td>
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