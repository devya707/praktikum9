<?php
include "koneksi.php";

// Ambil data kelas dari tabel kelas
$qkelas = "SELECT * FROM kelas";
$data_kelas = $conn->query($qkelas);

// Ambil data mahasiswa dari tabel mahasiswa
$qmahasiswa = "SELECT m.*, k.nama AS kelas FROM mahasiswa m 
                JOIN kelas k ON m.kelas_id = k.kelas_id";
$data_mahasiswa = $conn->query($qmahasiswa);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Mahasiswa</title>
</head>
<body>
<div class="container mt-5">
    <h2>Form Input Data Mahasiswa</h2>
    <form action="simpan_mahasiswa.php" method="POST">
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select class="form-control" id="kelas" name="kelas_id" required>
                <option value="">Pilih...</option>
                <?php foreach ($data_kelas as $kelas): ?>
                    <option value="<?= $kelas['kelas_id'] ?>"><?= $kelas['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <hr>

    <h2>Data Mahasiswa</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Kelas</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data_mahasiswa as $mahasiswa): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $mahasiswa['nama_lengkap'] ?></td>
                <td><?= $mahasiswa['alamat'] ?></td>
                <td><?= $mahasiswa['kelas'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
