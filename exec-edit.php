<?php
include 'koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$semester = $_POST['semester'];
$jeniskelamin = $_POST['jeniskelamin'];
$komentar = $_POST['komentar'];

$query = "UPDATE `mahasiswa` SET 
                    `id`='$id',
                    `nim`='$nim',
                    `nama`='$nama',
                    `jurusan`='$jurusan',
                    `semester`='$semester',
                    `jeniskelamin`='$jeniskelamin',
                    `komentar`='$komentar' WHERE `id`='$id'";
mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data Diupdate'); document.location.href='index.php'; </script>";
} else {
    echo "Update Data Gagal";
    echo mysqli_error($conn);
}
