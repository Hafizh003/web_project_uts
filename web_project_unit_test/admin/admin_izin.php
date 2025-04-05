<?php
$koneksi = new mysqli("localhost", "root", "", "web_project_unit_test");

$search = $_GET['search'] ?? '';
$query = "SELECT * FROM izin WHERE nama LIKE '%$search%' ORDER BY waktu_izin DESC";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Izin</title>
    <style>
        table { border-collapse: collapse; width: 90%; margin: auto; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f0f0f0; }
        input[type="text"] { padding: 8px; width: 300px; margin: 20px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Data Izin Peserta</h2>

    <form method="GET" style="text-align:center;">
        <input type="text" name="search" placeholder="Cari nama..." value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alasan</th>
            <th>Waktu Izin</th>
        </tr>
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".htmlspecialchars($row['nama'])."</td>";
            echo "<td>".htmlspecialchars($row['alasan'])."</td>";
            echo "<td>".$row['waktu_izin']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
