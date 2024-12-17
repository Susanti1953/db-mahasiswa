<?php
include 'koneksi.php';

// Ambil data mahasiswa berdasarkan ID
$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Proses update data
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_tinggal = $_POST['tempat_tinggal'];

    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', tanggal_lahir = '$tanggal_lahir', tempat_tinggal = '$tempat_tinggal' WHERE id = $id";
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
    <title>Edit Data</title>
</head>
<body>
<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-secondary text-white text-center">
                <h2>Edit Data Mahasiswa</h2>
            </div>
            <div class="card-body">
                <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data['nim']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_tinggal" class="form-label">Tempat Tinggal</label>
                        <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" value="<?php echo $data['tempat_tinggal']; ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
             
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
