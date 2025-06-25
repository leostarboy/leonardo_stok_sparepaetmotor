<?php
include '../db/koneksi.php';
$id = intval($_GET['id']);

// Cek apakah sparepart pernah dipakai transaksi
$cek = $koneksi->query("
    SELECT COUNT(*) AS jml
    FROM transaksi
    WHERE sparepart_id = $id
")->fetch_assoc();

if ($cek['jml'] > 0) {
  echo "<script>
          alert('Tidak bisa dihapus: sparepart sudah dipakai dalam transaksi.');
          history.back();
        </script>";
  exit;
}

// Aman – hapus sparepart
$koneksi->query("DELETE FROM sparepart WHERE id = $id");
header('Location: ../pages/sparepart.php');
?>
