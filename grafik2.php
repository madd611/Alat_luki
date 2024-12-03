<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Pemantauan Kualitas Air Tambak Udang</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .container {
            margin-top: 50px;
        }
        .chart-container {
            position: relative;
            height: 40vh; /* Use vh for responsiveness */
            width: 100%; /* Full width of the card */
        }
        canvas {
            height: 100% !important; /* Make canvas fit its container */
            width: 100% !important; /* Make canvas fit its container */
        }
        .card {
            margin-bottom: 30px; /* Add margin between cards */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php">Home</a>
    <a class="navbar-brand" href="realtime.php">Data Realtime</a>
    <a class="navbar-brand" href="datatabel.php">Data Updated</a>
    <a class="navbar-brand" href="grafik.php">Grafik Gabungan</a>
    <a class="navbar-brand" href="grafik2.php">Grafik</a>
</nav>

<!-- Judul -->
<div class="container text-center">
    <h2>Grafik Pemantauan Kualitas Air Tambak Udang</h2>
</div>

<!-- Grafik -->
<div class="container">
    <div class="row">
        <!-- Card untuk Grafik pH -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik pH</h5>
                    <div class="chart-container">
                        <canvas id="phChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card untuk Grafik Oksigen -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Oksigen Terlarut</h5>
                    <div class="chart-container">
                        <canvas id="oksigenChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Card untuk Grafik Suhu -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Suhu (°C)</h5>
                    <div class="chart-container">
                        <canvas id="suhuChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card untuk Grafik Salinitas -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Salinitas Air</h5>
                    <div class="chart-container">
                        <canvas id="salinitasChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Card untuk Grafik Kekeruhan -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Kekeruhan Air</h5>
                    <div class="chart-container">
                        <canvas id="keruhChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ambil data dari database menggunakan PHP dan kirim ke JavaScript -->
<?php
    // Ambil data dari tabel monitoring
    $sql = "SELECT ph, suhu, oksigen, salinitas, keruh, tanggal FROM monitoring ORDER BY tanggal DESC LIMIT 20";
    $query = mysqli_query($db, $sql);

    // Inisialisasi array kosong
    $ph = [];
    $suhu = [];
    $oksigen = [];
    $salinitas= [];
    $keruh = [];
    $tanggal = [];

    // Loop data dari query
    while ($row = mysqli_fetch_assoc($query)) {
        $ph[] = $row['ph'];
        $suhu[] = $row['suhu'];
        $oksigen[] = $row['oksigen'];
        $salinitas[] = $row['salinitas'];
        $keruh[] = $row['keruh'];
        $tanggal[] = $row['tanggal'];
    }
?>

<script>
    // Mengambil data dari PHP ke JavaScript
    var phData = <?php echo json_encode($ph); ?>;
    var suhuData = <?php echo json_encode($suhu); ?>;
    var oksigenData = <?php echo json_encode($oksigen); ?>;
    var salinitasData = <?php echo json_encode($salinitas); ?>;
    var keruhData = <?php echo json_encode($keruh); ?>;
    var tanggalData = <?php echo json_encode($tanggal); ?>;

    // Konfigurasi Grafik pH
    var ctxPh = document.getElementById('phChart').getContext('2d');
    var phChart = new Chart(ctxPh, {
        type: 'line',
        data: {
            labels: tanggalData.reverse(),
            datasets: [{
                label: 'pH',
                data: phData.reverse(),
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Menjaga aspek rasio
            title: {
                display: true,
                text: 'Grafik pH Air'
            }
        }
    });

    // Konfigurasi Grafik Oksigen
    var ctxOksigen = document.getElementById('oksigenChart').getContext('2d');
    var oksigenChart = new Chart(ctxOksigen, {
        type: 'line',
        data: {
            labels: tanggalData.reverse(),
            datasets: [{
                label: 'Oksigen Terlarut',
                data: oksigenData.reverse(),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Grafik Oksigen Terlarut'
            }
        }
    });

    // Konfigurasi Grafik Suhu
    var ctxSuhu = document.getElementById('suhuChart').getContext('2d');
    var suhuChart = new Chart(ctxSuhu, {
        type: 'line',
        data: {
            labels: tanggalData.reverse(),
            datasets: [{
                label: 'Suhu (°C)',
                data: suhuData.reverse(),
                borderColor: 'rgba(255, 206, 86, 1)',
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Grafik Suhu Air'
            }
        }
    });

    // Konfigurasi Grafik Salinitas
    var ctxSalinitas = document.getElementById('salinitasChart').getContext('2d');
    var salinitasChart = new Chart(ctxSalinitas, {
        type: 'line',
        data: {
            labels: tanggalData.reverse(),
            datasets: [{
                label: 'Salinitas Air',
                data: salinitasData.reverse(),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Grafik Salinitas Air'
            }
        }
    });

    // Konfigurasi Grafik Kekeruhan
    var ctxKeruh = document.getElementById('keruhChart').getContext('2d');
    var keruhChart = new Chart(ctxKeruh, {
        type: 'line',
        data: {
            labels: tanggalData.reverse(),
            datasets: [{
                label: 'Kekeruhan Air',
                data: keruhData.reverse(),
                borderColor: 'rgba(153, 102, 255, 1)',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Grafik Kekeruhan Air'
            }
        }
    });
</script>

</body>
</html>
