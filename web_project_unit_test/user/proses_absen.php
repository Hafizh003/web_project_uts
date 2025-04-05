<?php
session_start(); // Penting! Supaya bisa ambil email dari session
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_absensi'];
    $keterangan = $_POST['keterangan_absensi'];
    $status = "Present";

    // Ambil email dari session login
    $email = $_SESSION['email'];

    // Waktu sekarang untuk kolom tanggal dan jam
    $tanggal = date('Y-m-d');
    $jam = date('H:i:s');

    $query = "INSERT INTO absensi (nama, email, tanggal, jam, keterangan, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $nama, $email, $tanggal, $jam, $keterangan, $status);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo "Absensi berhasil dikirim!";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Metode tidak diperbolehkan.";
}

header("Location: sukses.php");
exit();
?>
