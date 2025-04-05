<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../all/style.css">
</head>

<body>
    <div class="absensi_page">
    <h2>Absen</h2>
    <form action="proses_absen.php" method="POST">

    <input class="input_absensi_nama"type="text" name="nama_absensi" placeholder="name" required>

    <input class="input_absensi_keterangan"type="text" name="keterangan_absensi" placeholder="keterangan" required>

    <button class="input_submit" type="submit" name="Submit">Submit</button>
    </form>
    <button class="button_user_logout" onclick="window.location.href='../all/logout.php'">Logout</button>
    </div>
</body>
</html>