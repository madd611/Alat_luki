<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS untuk gambar */
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Mengatur agar gambar dan teks berada dalam satu kolom */
            height: auto; /* Menyesuaikan tinggi gambar di sini */
            margin-top: 50px; /* Tambahkan margin atas */
        }
        .centered img {
            margin-bottom: 20px; /* Jarak antara gambar dan teks */
            max-width: 40%; /* Mengurangi ukuran maksimum gambar */
            height: auto;
        }
        .centered p {
            text-align: justify; /* Teks rata kiri kanan */
            margin: 0 auto; /* Rata kiri kanan */
            max-width: 80%; /* Lebar maksimum teks */
        }
        .bold-text {
            font-weight: bold; /* Membuat teks lebih tebal */
        }
        .banner {
            background-image: url('images/latarbelakang1.jpg');
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
        footer {
            background-color: #f8f9fa; /* Warna latar belakang footer */
            padding: 10px 0; /* Padding atas bawah pada footer */
            text-align: center; /* Teks di tengah pada footer */
        }
        @media (max-width: 768px) {
            .centered p {
                max-width: 100%; /* Lebar maksimum teks pada perangkat kecil */
            }
            .banner h1 {
                font-size: 1.5rem; /* Ukuran font lebih kecil untuk perangkat kecil */
            }
        }
    </style>
</head>
<body>
    <!-- Banner -->
    <div class="banner">
        <h1>SISTEM MONITORING KUALITAS AIR TAMBAK UDANG</h1>
    </div>

    <!-- Navbar: Data Real Time & Data Updated -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" style="top: 100px;">
        <div class="container">
            <div class="mx-auto d-flex">
                <!-- Tombol Data Real Time -->
                <a class="navbar-brand" href="realtime.php">Data Realtime</a>
                <!-- Tombol Data Updated -->
                <a class="navbar-brand" href="datatabel.php">Data Updated</a>
            </div>
        </div>
    </nav>

    <!-- Gambar dan Tulisan -->
    <div class="container centered" style="margin-top: 180px;"> <!-- Adjusted margin-top for content below fixed banner and navbar -->
        <h2 class="text-center" style="margin-top: 10px; margin-bottom: 10px;">Sekilas Tentang Saya</h2>
        <img src="images/Luki.jpg" alt="ARYA LUKITO ALKAFF" class="img-fluid">
        <p style="margin-top: 10px; font-weight: normal;">Tanggal Lahir: 24 April 1999</p>
        <p style="margin-bottom: 10px;">Hobby: BASKET</p>
        <p class="bold-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis lacus quis nisi bibendum, eu faucibus libero luctus. Proin nec magna nec urna volutpat malesuada nec at neque. Phasellus ut nibh fermentum, tempor velit vitae, faucibus eros. Fusce eget magna et nisl vestibulum laoreet. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis non libero sit amet libero placerat consequat. Integer eget justo at nisi bibendum fermentum. Vivamus vel congue velit, sed fermentum dui. Mauris at nisi a libero feugiat suscipit.</p>
    </div>

    <!-- Footer -->
    <footer>
        <h4>Arya Lukito Alkaff</h4>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
