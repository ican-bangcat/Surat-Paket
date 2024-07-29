
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Views/css/lastes.css">
    <title>Tabel Pencarian Paket</title>


<body>
    <nav>
        <div class="logo">
            <img src="Views/assets/Salinan LOGO RESMI PCR - RGB .png" alt="Politeknik Caltex Riau" class="logo-image">
        </div>
        <button class="login-btn" onclick="window.location.href='index.php?page=landingpage'">KEMBALI</button>
    </nav>

    <main class="container mt-4">
        <div class="row mb-3 text-center">
            <img src="Views/assets/tori.png" alt="Paket Gambar" class="img-fluid package-image small">
        </div>
        <br>
        <div class="search-container">
            <form action="index.php?page=caripaket" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari nama penerima atau nomor resi paket anda" name="keywordd" id="keywordd" autocomplete="off">
                    <button class="btn cari-btn" type="submit" id="tombolCari"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <div class="table-section">
            <?php if ($searchPerformed) : ?> <!-- Hanya tampilkan pesan ini jika pencarian dilakukan -->
                <?php if (!empty($paket)) : ?>
                    <table id="myTable" class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Penerima</th>
                                <th>No Resi</th>
                                <th>Ekspedisi</th>
                                <th>Jenis</th>
                                <th>Waktu Diterima</th>
                                <th>Waktu Diserahkan</th>
                                <th align="center">Status</th>
                                <th>ID Security</th>
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
                <?php else : ?>
                    <div class="alert alert-primary" role="alert">
                        Paket tidak ditemukan.
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
