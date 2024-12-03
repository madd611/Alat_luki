<?php include("config.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Data Updated</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Load otomatis -->
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $('#sensorTableBody').load('load_sensor_data.php');
            }, 1000);
        });
    </script>
    <style>
        /* Custom styles for banner */
        .banner {
            background-image: url('images/latarbelakang1.jpg'); /* Ganti dengan path gambar banner Anda */
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100px; /* Tinggi banner */
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed; /* Menetapkan posisi tetap untuk banner */
            top: 0;
            left: 0;
            z-index: 1020; /* Z-index lebih tinggi dari konten lain */
        }
        .banner h1 {
            color: white; /* Warna teks di banner */
            text-align: center; /* Teks di tengah */
            padding: 10px; /* Padding untuk teks */
            background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi transparan untuk teks */
            width: 100%;
        }
        .container {
            margin-top: 180px; /* Untuk memberikan ruang di bawah banner */
        }
    </style>
</head>
<body>

<!-- Banner -->
<div class="banner">
    <h1>Data Updated</h1>
</div>

<!-- Navbar: Data Real Time & Data Updated -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-top: 100px;">
    <a class="navbar-brand" href="index.php">Home</a>
    <a class="navbar-brand" href="realtime.php">Data Realtime</a>
    <a class="navbar-brand" href="datatabel.php">Data Updated</a>
</nav>

<div class="container mt-4" style="text-align: center;">
    <div class="table-responsive">
        <!-- Tabel dengan zebra striping -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NOMOR</th>
                    <th scope="col">pH</th>
                    <th scope="col">SUHU</th>
                    <th scope="col">OKSIGEN</th>
                    <th scope="col">SALINITAS</th>
                    <th scope="col">KEKERUHAN</th>
                    <th scope="col">TANGGAL</th>
                </tr>
            </thead>
            <tbody id="sensorTableBody">
                <!-- Data tabel akan dimuat di sini oleh load_sensor_data.php -->
                <?php
                $sql = "SELECT * FROM monitoring ORDER BY tanggal DESC";
                $query = mysqli_query($db, $sql);
                $no = 1;
                while($value = mysqli_fetch_assoc($query)){
                    // Kondisi untuk memberikan kelas warna berdasarkan nilai pH
                    $phClass = '';
                    if($value['ph'] > 7) {
                        $phClass = 'table-success'; // Warna hijau untuk pH di atas 7
                    } elseif($value['ph'] < 7) {
                        $phClass = 'table-danger'; // Warna merah untuk pH di bawah 7
                    } else {
                        $phClass = 'table-warning'; // Warna kuning untuk pH netral (7)
                    }

                    // Alternatif pewarnaan manual untuk setiap baris
                    if($no % 2 == 0) {
                        echo "<tr class='{$phClass} table-primary'>"; // Tambahan warna biru muda untuk baris genap
                    } else {
                        echo "<tr class='{$phClass} table-secondary'>"; // Tambahan warna abu-abu untuk baris ganjil
                    }

                    echo "<td>".htmlspecialchars($no)."</td>";           
                    echo "<td>".htmlspecialchars($value['ph'])."</td>";            
                    echo "<td>".htmlspecialchars($value['suhu'])."</td>";            
                    echo "<td>".htmlspecialchars($value['oksigen'])."</td>";
                    echo "<td>".htmlspecialchars($value['salinitas'])."</td>";
                    echo "<td>".htmlspecialchars($value['keruh'])."</td>";
                    echo "<td>".htmlspecialchars($value['tanggal'])."</td>";                       
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
