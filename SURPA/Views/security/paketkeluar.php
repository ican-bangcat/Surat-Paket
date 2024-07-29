<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: index.php?page=login");
    exit;
}

// Get the current page from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Views/css/dashboard.css">
<link rel="stylesheet" href="Views/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2 sidebar d-flex flex-column" id="sidebar">
                <div class="logo text-center py-4">
                    <img src="Views/assets/Salinan LOGO RESMI PCR - RGB .png" alt="Politeknik Caltex Riau" class="img-fluid">
                </div>
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
                                    <i class="fa fa-history" aria-hidden="true"></i>&nbsp;History Penerima
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
                    <a class="d-block py-2 px-3 text-dark bg-white d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#helpModal">
                        <i class="bi bi-question-circle-fill"></i>&nbsp;Help
                    </a>
                    <a id="logoutLink" class="d-block py-2 px-3 text-dark bg-white d-flex align-items-center" href="index.php?page=logout">
                        <i class="fas fa-sign-out-alt mr-2"></i>&nbsp;Log out
                    </a>
                </div>
            </aside>
            <main class="col-md-10 ml-sm-auto px-4 main-content">
                <button class="btn btn-primary my-3 d-md-none" id="toggleSidebar">☰</button>
                <!-- Card Total Paket Keluar -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Paket Keluar</h5>
                        <p class="card-text" id="totalPaketMasuk"><?php echo $jumlah_paket_sekarang[0]['total']; ?></p>
                    </div>
                </div>
                <!-- <div class="search-container">
                    <form action="index.php?page=paketkeluar" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari nama penerima atau nomor resi paket anda" name="carikeluar" id="carikeluar" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="tombolCari"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div> -->
                <div class="mt-4">
                    <?php if (!empty($paket)) : ?>
                        <div class="table-responsive" style="max-height: 30em; overflow-y: auto;">
                            <table id="myTable" class="table table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penerima</th>
                                        <th>No Resi</th>
                                        <th>Ekspedisi</th>
                                        <th>Jenis</th>
                                        <th>Waktu Diterima</th>
                                        <th>Waktu Diserahkan</th>
                                        <th>Status</th>
                                        <th>Security Penerima</th>
                                        <th>Aksi</th>
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
                                            <td><?php echo date('Y-m-d H:i', strtotime($data['tanggal_diterima'])); ?></td>
                                            <td><?php echo date('Y-m-d H:i', strtotime($data['tanggal_diambil'])); ?></td>
                                            <td><?php echo $data['status']; ?></td>
                                            <td><?php echo $data['id_security']; ?></td>
                                            <td>
                                                <button class="btn btn-warning" onclick="document.location='index.php?page=formupdate&no_resi=<?php echo $data['no_resi']; ?>'"><i class="bi bi-pencil-square"></i></button>
                                                <button class="btn btn-danger" onclick="confirmDeletion('<?php echo $data['no_resi']; ?>')">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                            </td>
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
                    <h5 class="modal-title" id="helpModalLabel">Cara Memakai Halaman Input Data Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="Views/assets/loke.png" alt="Cara Memakai Halaman Input Data Paket" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QBmGUHWQw4Unj0QY9cbgE+cxNiiVEcp4PITjUEbiJ3os7aWRILpDZkGB3ANuWy4F" crossorigin="anonymous"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JS -->
    <script src="Views/js/dashboard.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleSidebar = document.getElementById('toggleSidebar');
            var sidebar = document.getElementById('sidebar');

            toggleSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });
        });

        function confirmDeletion(noResi) {
            if (confirm("apakah kamu yakin ingin menghapus data ini?")) {
                window.location.href = 'index.php?page=hapusPaket&no_resi=' + noResi;
            }
        }
    </script>
</body>