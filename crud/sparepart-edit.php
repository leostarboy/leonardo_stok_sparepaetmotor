<?php
include '../db/koneksi.php';
include '../sidebar.php';
$id = intval($_GET['id']);
$data = $koneksi->query("SELECT * FROM sparepart WHERE id=$id")->fetch_assoc();
?>
<div class="container mt-4">
  <h3>Edit Sparepart</h3>
  <form method="post">
    <input name="nama" value="<?= $data['nama'] ?>" class="form-control mb-2" required>
    <input name="merk" value="<?= $data['merk'] ?>" class="form-control mb-2" required>
    <input name="harga" type="number" value="<?= $data['harga'] ?>" class="form-control mb-2" required>
    <input name="stok" type="number" value="<?= $data['stok'] ?>" class="form-control mb-2" required>
    <button class="btn btn-primary" name="simpan">Update</button>
  </form>
</div>
<?php
if (isset($_POST['simpan'])) {
  $stmt = $koneksi->prepare("UPDATE sparepart SET nama=?, merk=?, harga=?, stok=? WHERE id=?");
  $stmt->bind_param("ssiii", $_POST['nama'], $_POST['merk'], $_POST['harga'], $_POST['stok'], $id);
  $stmt->execute();
  echo "<script>location.href='../pages/sparepart.php';</script>";
}
?>
