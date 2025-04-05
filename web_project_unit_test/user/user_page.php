<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../all/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../all/style.css">
    <style>
        .profile-panel {
            position: fixed;
            top: 0;
            left: -400px;
            width: 350px;
            height: 100vh;
            background-color: #fff;
            box-shadow: 2px 0 20px rgba(0,0,0,0.7);
            padding: 40px 30px;
            transition: left 0.3s ease;
            z-index: 999;
            display: flex;
            flex-direction: column;
            color: #000;
            font-family: "Poppins", sans-serif;
        }

        .profile-panel.active {
            left: 0;
        }

        .profile-panel h2 {
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #000;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            text-align: left;
        }

        .profile-info {
            flex-grow: 1;
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }

        .profile-info p {
            font-size: 16px;
            margin-bottom: 15px;
            color: #333;
        }

        .profile-info p strong {
            color: #000;
        }

        .close-profile {
            padding: 12px;
            background-color: #000;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 500;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .close-profile:hover {
            background-color: #333;
        }

        .profile-button {
            position: absolute;
            top: 30px;
            right: 180px;
            width: 100px;
            padding: 10px;
            border-radius: px;
            background-color: #000;
            color: white;
            cursor: pointer;
            z-index: 2;
            text-align: center;
            transition: background 0.3s ease;
        }

        .profile-button:hover {
            background-color: #333;
        }

        .box_user h1 {
            color: #000;
        }

        .box_user span {
            color: red;
        }
    </style>
</head>
<body>

    <div class="box_user">
        <h1>Welcome, <span><?= $_SESSION['name']; ?></span></h1>
    </div>

    <button class="button_user_logout" onclick="window.location.href='logout.php'">Logout</button>
    <button class="profile-button" onclick="toggleProfile()">Profil</button>

    <!-- Menu tetap seperti sebelumnya -->
    <div class="button_user_menu">
        <div class="menu-box">
            <button class="menu-button" onclick="window.location.href='absen.php'">Absen</button>
            <button class="menu-button" onclick="window.location.href='izin.php'">Izin</button>
            <button class="menu-button" onclick="window.location.href='riwayat.php'">Riwayat</button>
        </div>
    </div>

    <!-- Panel Profil -->
    <div class="profile-panel" id="profilePanel">
        <h2>Profil Saya</h2>
        <div class="profile-info">
            <p><strong>Nama:</strong> <?= $_SESSION['name']; ?></p>
            <p><strong>Email:</strong> <?= $_SESSION['email']; ?></p>
            <p><strong>Role:</strong> <?= $_SESSION['role']; ?></p>
        </div>
        <button class="close-profile" onclick="toggleProfile()">Tutup</button>
    </div>

    <script>
        function toggleProfile() {
            const panel = document.getElementById('profilePanel');
            panel.classList.toggle('active');
        }
    </script>

</body>
</html>
