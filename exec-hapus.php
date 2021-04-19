<?php
include 'koneksi.php';

$idhapus = $_GET["idhapus"];
$result = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $idhapus");

if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data Terhapus'); document.location.href='index.php'; </script>";
} else {
    echo "<script>alert('Data Gagal Dihapus'); document.location.href='index.php'; </script>";
}
