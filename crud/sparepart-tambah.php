<?php
include '../db/koneksi.php';
include '../sidebar.php';
?>
<div class="container mt-4">
  <h3>Tambah Sparepart</h3>
  <form method="post">
    <input name="nama" class="form-control mb-2" placeholder="Nama" required>
    <input name="merk" class="form-control mb-2" placeholder="Merk" required>
    <input name="harga" type="number" class="form-control mb-2" placeholder="Harga" required>
    <input name="stok" type="number" class="form-control mb-2" placeholder="Stok" required>
    <button class="btn btn-success" name="simpan">Simpan</button>
  </form>
</div>
<?php
if (isset($_POST['simpan'])) {
  $stmt = $koneksi->prepare("INSERT INTO sparepart (nama, merk, harga, stok) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssii", $_POST['nama'], $_POST['merk'], $_POST['harga'], $_POST['stok']);
  $stmt->execute();
  echo "<script>location.href='../pages/sparepart.php';</script>";
}
?>
