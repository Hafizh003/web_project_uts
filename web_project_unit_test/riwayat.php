<?php
// Tambahkan di atas atau di file terpisah
function cekLogin() {
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
        exit();
    }
}

// Panggil di sini:
cekLogin();


include 'config.php'; // atau sesuaikan dengan koneksi databasenya

// Ambil data riwayat berdasarkan email
function ambilRiwayatGabungan($conn, $email) {
    $query = "
        SELECT nama, tanggal, jam, keterangan, status FROM absensi WHERE email = ?
        UNION ALL
        SELECT nama, tanggal, jam, alasan AS keterangan, status FROM izin WHERE email = ?
        ORDER BY tanggal DESC, jam DESC
    ";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $email);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}


// Lalu panggil:
$email = $_SESSION['email'];
$result = ambilRiwayatGabungan($conn, $email);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Absen</title>
    <link rel="stylesheet" href="style.css">
    <style>
    table {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        border-collapse: collapse;
        background: #f9f9f9;
        font-size: 18px; /* perbesar teks */
    }

    th, td {
        padding: 14px 20px; /* perbesar ruang antar sel */
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #eee;
        font-size: 19px;
    }
</style>

</head>
<body>

<div class="box_user">
    <h1>Welcome, <span><?= $_SESSION['name']; ?></span></h1>
</div>

<div class="riwayat-container" style="text-align: center;">
<h2 style="text-align: center; ">Riwayat Absensi</h2>

<table>
    <tr>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Keterangan</th>
        <th>Status</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['tanggal']) ?></td>
            <td><?= htmlspecialchars($row['jam']) ?></td>
            <td><?= htmlspecialchars($row['keterangan']) ?></td>
            <td>
    <?php if ($row['status'] == 'Present'): ?>
        <span style="background-color: rgb(7, 122, 11); color: white; padding: 5px 10px; border-radius: 6px; display: inline-block; min-width: 100px; text-align: center;">
            <?= htmlspecialchars($row['status']) ?>
        </span>
    <?php elseif ($row['status'] == 'Izin'): ?>
        <span style="background-color: yellow; color: black; padding: 5px 10px; border-radius: 6px; display: inline-block; border: 2px solid  orange; min-width: 100px; text-align: center;">
            <?= htmlspecialchars($row['status']) ?>
        </span>
    <?php else: ?>
        <?= htmlspecialchars($row['status']) ?>
    <?php endif; ?>
</td>



        </tr>
    <?php endwhile; ?>
</table>
</div>

<button class="button_user_logout" onclick="window.location.href='logout.php'">Logout</button>

</body>
</html>
