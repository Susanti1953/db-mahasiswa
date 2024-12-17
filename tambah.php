<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_tinggal = $_POST['tempat_tinggal'];

    // Ambil ID terakhir untuk menentukan nomor urut
    $query = "SELECT id FROM mahasiswa ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $last_id = isset($row['id']) ? $row['id'] : 0;
    $next_id = $last_id + 1;
    $nim = "24010" . str_pad($next_id, 2, "0", STR_PAD_LEFT); // Format NIM

    // Simpan data ke database
    $query = "INSERT INTO mahasiswa (nim, nama, tanggal_lahir, tempat_tinggal) VALUES ('$nim', '$nama', '$tanggal_lahir', '$tempat_tinggal')";
    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Tambah Data</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                <h2>Tambah Data Mahasiswa</h2>
            </div>
            <div class="card-body">
                <form action="tambah.php" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_tinggal" class="form-label">Tempat Tinggal</label>
                        <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" placeholder="Masukkan Tempat Tinggal" required>
                    </div>
                    <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                    </a><button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
