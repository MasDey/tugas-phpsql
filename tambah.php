<?php
include 'koneksi.php';

if (isset($_POST["submit"])) {

    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];
    $semester = $_POST["semester"];
    $jeniskelamin = $_POST["jeniskelamin"];
    $komentar = $_POST["komentar"];

    mysqli_query($conn, "INSERT INTO `mahasiswa` VALUES ('','$nim','$nama','$jurusan','$semester','$jeniskelamin','$komentar')");

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data Disimpan'); document.location.href='index.php'; </script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan'); document.location.href='index.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            background: #feffde;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <h1 class=" text-center p-3">Input Data Mahasiswa</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" id="nim" autocomplete="off" placeholder="Isikan NIM" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="mb-3-" style="margin: 20px 0;">
                        <label class="form-label" for="jurusan">Jurusan</label>
                        <select class="form-select" name="jurusan" id="jurusan" aria-label="Default select example" required>
                            <option value="S1-Grafis">S1-Grafis</option>
                            <option value="S1-Teknik Informatika">S1-Teknik Informatika</option>
                            <option value="S1-Sistem Informasi">S1-Sistem Informasi</option>
                            <option value="S1-Akuntansi">S1-Akuntansi</option>
                        </select>
                    </div>

                    <div class="mb-3"><label for="semester" class="form-label">Semester </label>
                        <input type="text" name="semester" id="semester" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="l" value="Laki-Laki" required>
                        <label class="form-check-label" for="l">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="p" value="Perempuan" required>
                        <label class="form-check-label" for="p">Perempuan</label>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="komentar" class="form-label">Komentar</label>
                        <textarea class="form-control" id="komentar" rows="3" type="text" name="komentar" required autocomplete="off"></textarea>
                    </div>

                    <div class="mb-3">
                        <button name="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger"><a href="index.php">Batal</a></button>
                    </div>
                </div>
            </div>

        </div>
    </form>

</body>

</html>