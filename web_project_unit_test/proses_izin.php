<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "web_project_unit_test");

$nama = $_POST['nama'];
$alasan = $_POST['alasan'];
$email = $_SESSION['email']; // ambil email dari session
$status = "Izin";
$tanggal = date("Y-m-d");
$jam = date("H:i:s");

$query = "INSERT INTO izin (nama, alasan, status, tanggal, jam, email) 
          VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $koneksi->prepare($query);
$stmt->bind_param("ssssss", $nama, $alasan, $status, $tanggal, $jam, $email);
$stmt->execute();

header("Location: sukses.php");
?>
