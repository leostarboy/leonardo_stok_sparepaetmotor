<?php
include '../db/koneksi.php';
include '../sidebar.php';
?>
<div class="container">
  <h3>Transaksi Stok</h3>
  <form method="post">
    <select name="sparepart_id" class="form-control mb-2" required>
      <option value="">Pilih Sparepart</option>
      <?php
      $data = $koneksi->query("SELECT * FROM sparepart");
      while($d=$data->fetch_assoc()):
      ?>
        <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
      <?php endwhile; ?>
    </select>
    <select name="tipe" class="form-control mb-2" required>
      <option value="masuk">Stok Masuk</option>
      <option value="keluar">Stok Keluar</option>
    </select>
    <input name="jumlah" type="number" class="form-control mb-2" placeholder="Jumlah" required>
    <input name="tanggal" type="date" class="form-control mb-2" required>
    <button name="simpan" class="btn btn-primary">Simpan</button>
  </form>
</div>
<?php
if (isset($_POST['simpan'])) {
  $id = intval($_POST['sparepart_id']);
  $tipe = $_POST['tipe'];
  $jumlah = intval($_POST['jumlah']);
  $tanggal = $_POST['tanggal'];

  // Dapatkan stok sekarang
  $get = $koneksi->query("SELECT stok FROM sparepart WHERE id=$id")->fetch_assoc();
  $stok = $get['stok'];
  $stok = ($tipe == 'masuk') ? $stok + $jumlah : $stok - $jumlah;
  if ($stok < 0) { $stok = 0; }
  $koneksi->query("UPDATE sparepart SET stok=$stok WHERE id=$id");

  // Simpan transaksi
  $stmt = $koneksi->prepare("INSERT INTO transaksi (sparepart_id, tipe, jumlah, tanggal) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isis", $id, $tipe, $jumlah, $tanggal);
  $stmt->execute();

  echo "<script>alert('Transaksi berhasil'); location.href='transaksi.php';</script>";
}
?>
