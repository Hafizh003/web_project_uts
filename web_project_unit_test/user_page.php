<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body >

    <div class="box_user">
        <h1> Welcome, <span><?= $_SESSION['name']; ?></span> </h1>
        <!-- <p> This is <span>user</span> page</p> -->
    </div>
    <button class="button_user_logout" onclick="window.location.href='logout.php'">Logout</button>

    <div class="button_user_menu">
    <div class="menu-box">
        <button class="menu-button" onclick="window.location.href='absen.php'">Absen</button>
        <button class="menu-button" onclick="window.location.href='izin.php'">Izin</button>
        <button class="menu-button" onclick="window.location.href='riwayat.php'">Riwayat</button>
    </div>
</div>

</body>
</html>