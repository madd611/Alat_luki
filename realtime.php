<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Realtime Monitoring</title>

    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <!-- load otomatis -->
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $('#cekph').load("cekph.php");
                $('#cekdo').load("cekdo.php");
                $('#cekec').load("cekec.php");
                $('#ceksuhu').load("ceksuhu.php");
                $('#cekkeruh').load("cekkeruh.php");
            }, 1000);
        });
    </script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 1rem;
        }
        .navbar-brand {
            font-size: 1.2rem; /* Increase the font size of navbar links */
        }
        .banner {
            background-color: #343a40; /* Darker background for the banner */
            color: white;
            padding: 20px 0;
            margin-bottom: 1rem;
        }
        .banner h1 {
            font-size: 2.5rem;
            margin: 0;
        }
        .banner h2 {
            font-size: 1.5rem;
            margin-top: 0.5rem;
        }
        .row {
            margin-top: 2rem;
        }
        
        /* Card Styles */
        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }
        .card-body {
            padding: 2rem;
        }

        /* Card Colors */
        .card-header.pH {
            background-color: #e74c3c; /* Red */
        }
        .card-header.oksigen {
            background-color: #f39c12; /* Orange */
        }
        .card-header.ec {
            background-color: #3498db; /* Blue */
        }
        .card-header.suhu {
            background-color: #2ecc71; /* Green */
        }
        .card-header.level {
            background-color: #9b59b6; /* Purple */
        }

        /* Card hover effects */
        .card:hover {
            transform: scale(1.05); /* Slightly enlarge card on hover */
            transition: transform 0.2s; /* Smooth scaling */
        }

        @media (max-width: 576px) {
            .banner h1 {
                font-size: 2rem; /* Smaller heading on mobile */
            }
            .banner h2 {
                font-size: 1.2rem; /* Smaller subheading on mobile */
            }
            .card-body {
                padding: 1rem; /* Less padding on mobile */
            }
        }
    </style>
</head>
<body>

<!-- Banner -->
<div class="banner text-center">
    <h1>ARYA LUKITO ALKAFF</h1>
    <h2>Realtime Monitoring Kualitas Air Tambak Udang Berbasis IoT</h2>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <!-- Tombol Data Real Time -->
    <a class="navbar-brand" href="index.php">Home</a>
    <a class="navbar-brand" href="realtime.php">Data Realtime</a>
    <a class="navbar-brand" href="datatabel.php">Data Updated</a>
</nav>

<div class="container text-center">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header pH">
                    pH
                </div>
                <div class="card-body bg-light">
                    <h1><span id="cekph">0</span></h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header oksigen">
                    Suhu
                </div>
                <div class="card-body bg-light">
                    <h1><span id="ceksuhu">0</span></h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header ec">
                    Oksigen
                </div>
                <div class="card-body bg-light">
                    <h1><span id="cekdo">0</span></h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header suhu">
                    Salinitas
                </div>
                <div class="card-body bg-light">
                    <h1><span id="cekec">0</span></h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header level">
                    Kekeruhan
                </div>
                <div class="card-body bg-light">
                    <h1><span id="cekkeruh">0</span></h1>
                </div>
            </div>
        </div>

        
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
