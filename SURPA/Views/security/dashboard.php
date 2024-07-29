<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: index.php?page=login");
    exit;
}
// if (isset($_COOKIE['id']) && isset($_COOKIE['nama'])) {
//     $id = $_COOKIE['id'];
//     $nama = $_COOKIE['nama'];

//     // ambil nama berdasarkan id
//     $result = mysqli_query($conn, "SELECT nama FROM security WHERE id_security = '$id'");
//     $row = mysqli_fetch_assoc($result);

//     // cek cookie dan nama
//     if ($nama === hash('sha256', $row['nama'])) {
//         $_SESSION['login'] = true;
//     }
// }
?>

    <link rel="stylesheet" href="Views/css/dashboard.css">
    <link rel="stylesheet" href="Views/css/style.css">
    <link rel="stylesheet" href="Views/css/status.css">
    <link rel="stylesheet" href="Views/css/lastesa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="Views/assets/Salinan LOGO RESMI PCR - RGB .png" alt="Politeknik Caltex Riau">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link disabled"><i class="bi bi-person-circle"></i>&nbsp;<?php echo $_SESSION['namaSecurity']; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2 sidebar d-flex flex-column" id="sidebar">
                <nav class="nav flex-column flex-grow-1">
                    <a class="nav-link d-flex align-items-center <?php echo $current_page == '' || $current_page == 'dashboard' ? 'active' : ''; ?>" href="index.php?page=dashboard" data-bs-toggle="collapse" data-bs-target="#dashboardMenu" aria-expanded="false">
                        <i class="bi bi-speedometer2 mr-2"></i>&nbsp;Pusat Informasi
                    </a>
                    <div class="collapse <?php echo $current_page == 'satpam' || $current_page == 'dashboard' || $current_page == 'penerima' ? 'show' : ''; ?>" id="dashboardMenu">
                        <ul class="list-unstyled">
                            <li>
                                <a class="nav-link d-flex align-items-center <?php echo $current_page == 'dashboard' ? 'active' : ''; ?>" href="index.php?page=dashboard">
                                    <i class="bi bi-bar-chart-line-fill mr-2"></i>&nbsp;Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center <?php echo $current_page == 'penerima' ? 'active' : ''; ?>" href="index.php?page=penerima">
                                    <i class="bi bi-person-fill"></i>&nbsp;Penerima
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link d-flex align-items-center <?php echo $current_page == 'paketmasuk' || $current_page == 'paketkeluar' ? 'active' : ''; ?>" href="#menu" data-bs-toggle="collapse" data-bs-target="#menuItems" aria-expanded="false">
                        <i class="bi bi-folder-fill mr-2"></i>&nbsp;Menu
                    </a>
                    <div class="collapse <?php echo $current_page == 'paketmasuk' || $current_page == 'paketkeluar' ? 'show' : ''; ?>" id="menuItems">
                        <ul class="list-unstyled">
                            <li>
                                <a class="nav-link d-flex align-items-center <?php echo $current_page == 'paketmasuk' ? 'active' : ''; ?>" href="index.php?page=paketmasuk">
                                    <i class="bi bi-box-seam-fill"></i>&nbsp;Paket Masuk
                                </a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center <?php echo $current_page == 'paketkeluar' ? 'active' : ''; ?>" href="index.php?page=paketkeluar">
                                    <i class="bi bi-box-seam-fill"></i>&nbsp;Paket Keluar
                                </a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center <?php echo $current_page == 'history' ? 'active' : ''; ?>" href="index.php?page=history">
                                    <i class="fa fa-history" aria-hidden="true"></i>&nbsp;History Paket
                                </a>
                            </li>
                            
                            <li>
                                <a class="nav-link d-flex align-items-center <?php echo $current_page == 'historyPenerima' ? 'active' : ''; ?>" href="index.php?page=historyPemilik">
                                <i class="bi bi-person-dash-fill"></i>&nbsp;History Penerima
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="settings mt-auto py-4">
                    <a class="d-block py-2 px-3 text-dark bg-white d-flex align-items-center" href="#helpModal" data-bs-toggle="modal">
                        <i class="bi bi-question-circle-fill"></i>&nbsp;Help
                    </a>
                    <a id="logoutLink" class="d-block py-2 px-3 text-dark bg-white d-flex align-items-center" href="index.php?page=logout">
                        <i class="fas fa-sign-out-alt mr-2"></i>&nbsp;Log out
                    </a>
                </div>
            </aside>
            <main class="col-md-10 ml-sm-auto px-4 main-content">
                <button class="btn btn-primary my-3 d-md-none" id="toggleSidebar">☰</button>
                <div class="d-flex justify-content-between mb-4">
                    <div class="card text-center shadow-sm flex-fill mx-2 bg-info text-white selectable-card" data-card="masuk">
                        <div class="card-body">
                            <i class="bi bi-box-arrow-in-down display-4"></i>
                            <h5 class="card-title">Paket Masuk</h5>
                            <p class="card-text count"><a href="index.php?page=paketmasuk"></a><?php echo $jumlah_paket[0]['total']; ?></p>
                        </div>
                    </div>
                    <div class="card text-center shadow-sm flex-fill mx-2 bg-success text-white selectable-card" data-card="sekarang">
                        <div class="card-body">
                            <i class="bi bi-box2-fill display-4"></i>
                            <h5 class="card-title">Paket Sekarang</h5>
                            <p class="card-text count"><?php echo $jumlah_paket_sekarang[0]['total']; ?></p>
                        </div>
                    </div>
                    <div class="card text-center shadow-sm flex-fill mx-2 bg-danger text-white selectable-card" data-card="keluar">
                        <div class="card-body">
                            <i class="bi bi-box-arrow-up display-4"></i>
                            <h5 class="card-title">Paket Keluar</h5>
                            <p class="card-text count"><?php echo $jumlah_paket_keluar[0]['total']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- <div class="search-container">
                    <form action="index.php?page=dashboard" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari nama penerima atau nomor resi paket anda" name="keyword" id="keyword" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="tombolCari"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div> -->
                <div class="mt-4">
                    <?php if (!empty($paket)) : ?>
                        <div class="table-responsive" style="max-height: 30em; overflow-y: auto;">
                            <table id="myTable" class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penerima</th>
                                        <th>No Resi</th>
                                        <th>Ekspedisi</th>
                                        <th>Jenis</th>
                                        <th>Waktu Diterima</th>
                                        <th>Waktu Diserahkan</th>
                                        <th class="status-header">Status</th>
                                        <th>Security</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($paket as $index => $data) : ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $data['nama_penerima']; ?></td>
                                            <td><?php echo $data['no_resi']; ?></td>
                                            <td><?php echo $data['ekspedisi']; ?></td>
                                            <td><?php echo $data['jenis']; ?></td>
                                            <td><?php echo $data['tanggal_diterima']; ?></td>
                                            <td><?php echo $data['tanggal_diambil'] ? $data['tanggal_diambil'] : 'Belum diambil'; ?></td>
                                            <td class="status-header">
                                                <?php if ($data['status'] == 'sudah diambil') : ?>
                                                    <button type="button" class="btn btn-picked-up"><?php echo $data['status']; ?></button>
                                                <?php else : ?>
                                                    <button type="button" class="btn btn-pending"><?php echo $data['status']; ?></button>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $data['id_security']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-primary" role="alert">
                            Paket tidak ditemukan.
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Help Modal -->
    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="helpModalLabel">Help</h5>
                </div>
                <div class="modal-body text-center">
                    <img src="Views/assets/tora.png" alt="Help Image" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-QTB4FQuFSKFfu2qNwOTyjPBELN2sUwDz7mq7u7m5dBsaJMR5CMIdJAIjqwXRd3aE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-g/Z9x6i5UABlIhRoMxUsg7rb67SpD+pE4z42S6kqjFYW6ST2ilM1lUOXNkOsF5Jv" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="Views/js/script.js"></script>
</body>
<!-- </html> -->
