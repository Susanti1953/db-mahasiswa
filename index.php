<?php
include 'koneksi.php';

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Data Mahasiswa</title>
    <!-- Tambahkan Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Data Mahasiswa Stikom Muhammadiyah batam</h1>
    <div class="d-flex justify-content-between mb-3">
        <a href="tambah.php" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Tambah Data
        </a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Tinggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $query = "SELECT * FROM mahasiswa ORDER BY nama ASC";
            $result = mysqli_query($conn, $query);
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$row['nim']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['tanggal_lahir']}</td>";
                echo "<td>{$row['tempat_tinggal']}</td>";
                echo "<td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm mt-2'>
                            <i class='fas fa-edit'></i> Edit
                        </a>
                        <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm mt-1' onclick='return confirm(\"Yakin ingin menghapus data ini?\");'>
                            <i class='fas fa-trash-alt'></i> Hapus
                        </a>
                      </td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>


<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
