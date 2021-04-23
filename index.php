<?php
include 'koneksi.php';

$datamhs = mysqli_query($conn, "SELECT*FROM mahasiswa");

if (isset($_POST["cari"])) {
    $keyword = $_POST["tuliscari"];
    $hasilcari = mysqli_query($conn, "SELECT*FROM mahasiswa WHERE
    nim LIKE '%$keyword%' OR
    nama LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' ");
    $datamhs = $hasilcari;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="permak.css">
</head>

<body>
    <div class="container">
        <h1 class="p-3 text-center">Data Mahasiswa</h1>
        <form action="" method="POST">
            <div class="row pt-3 pb-3">
                <div class=" col-6">
                    <input type="text" name="tuliscari" autofocus placeholder="Masukkan Kata Kunci Pencarian" autocomplete="off" class="form-control">
                </div>
                <div class="col">
                    <button type="submit" name="cari" class="btn btn-success">Cari</button>
                </div>
            </div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th>Jenis Kelamin</th>
                    <th>Komentar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($datamhs)) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["nim"] ?></td>
                        <td><?= $row["nama"] ?></td>
                        <td><?= $row["jurusan"] ?></td>
                        <td><?= $row["semester"] ?></td>
                        <td><?= $row["jeniskelamin"] ?></td>
                        <td><?= $row["komentar"] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning">
                                <a href="edit.php?idedit=<?= $row["id"]; ?>">Edit</a></button>
                            <button type="button" class="btn btn-danger">
                                <a href="exec-hapus.php?idhapus=<?= $row["id"]; ?>" onclick="return confirm('Yakin Hapus Data ini?')" ;>Hapus</a></button>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary"><a href="tambah.php">Tambah</a></button>
    </div>
</body>
</html>
