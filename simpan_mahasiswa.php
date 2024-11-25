<?php
include "koneksi.php";

$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$kelas_id = $_POST['kelas_id'];

$sql = "INSERT INTO mahasiswa (nama_lengkap, alamat, kelas_id) 
        VALUES ('$nama_lengkap', '$alamat', $kelas_id)";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
    exit();
}
?>
