<?php
include '../db/koneksi.php';
include '../sidebar.php';
?>
<div class="container">
  <h3>Data Sparepart</h3>
  <a href="../crud/sparepart-tambah.php" class="btn btn-success mb-2">Tambah</a>
  <table class="table table-bordered">
    <tr><th>No</th><th>Nama</th><th>Merk</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
    <?php
    $no=1;
    $data = $koneksi->query("SELECT * FROM sparepart");
    while($d=$data->fetch_assoc()):
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $d['nama'] ?></td>
      <td><?= $d['merk'] ?></td>
      <td><?= $d['harga'] ?></td>
      <td><?= $d['stok'] ?></td>
      <td>
        <a href="../crud/sparepart-edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="../crud/sparepart-hapus.php?id=<?= $d['id'] ?>" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
