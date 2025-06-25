<?php
include '../db/koneksi.php';
include '../sidebar.php';
?>
<div class="container py-4">
  <h3>Laporan Transaksi</h3>

  <!-- Tombol “Cetak PDF”  -->
  <button onclick="window.print()" class="btn btn-outline-primary mb-3">
    <i class="bi bi-printer"></i> Cetak PDF
  </button>

  <table class="table table-bordered">
    <tr>
      <th>No</th><th>Sparepart</th><th>Tipe</th><th>Jumlah</th><th>Tanggal</th>
    </tr>
    <?php
    $no = 1;
    $data = $koneksi->query("
      SELECT t.*, s.nama
      FROM transaksi t
      JOIN sparepart s ON t.sparepart_id = s.id
      ORDER BY t.id DESC
    ");
    while ($d = $data->fetch_assoc()):
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $d['nama'] ?></td>
      <td><?= ucfirst($d['tipe']) ?></td>
      <td><?= $d['jumlah'] ?></td>
      <td><?= $d['tanggal'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

<!-- CSS khusus mode cetak  -->
<style>
  /* Sembunyikan tombol saat dicetak */
  @media print {
    .btn { display: none !important; }
    body { margin: 10mm; }         /* margin default PDF */
  }
</style>
