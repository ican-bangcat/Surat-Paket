<?php 
session_start();
if (isset($_SESSION["login"])) {
    header("location: index.php?page=dashboard");
    exit;
}
?>
<link rel="stylesheet" href="Views/css/styles.css">
<body>
    <main>
        <section class="hero">
            <div class="content">
                <h1>Sistem Pengelolaan Paket
                    Politeknik Caltex Riau
                </h1>
                <p>Silahkan Check paket anda di sini !!</p>
                <a href="index.php?page=caripaket" class="search-btn">CARI PAKET</a>
            </div>
            <div class="image">
                <img src="Views/assets/Desain tanpa judul (8).png" alt="Packages">
            </div>
        </section>
    </main>