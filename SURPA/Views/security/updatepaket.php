<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: index.php?page=login");
    exit;
}
$securityModel = new Security_model();
$no_resi = isset($_GET['no_resi']) ? $_GET['no_resi'] : '';
$data = $securityModel->getAllDataByID($no_resi);

if (!$data) {
    echo "<script>
            alert('Data tidak ditemukan!');
            window.location.href = 'index.php?page=paketmasuk';
          </script>";
    exit;
}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="Views/css/last.css">
<link rel="stylesheet" href="Views/css/stylesss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<!-- <style>
    .form-group {
        margin-bottom: 1.5rem;
    }
</style> -->

<body>

    <main class="col-md-10">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Form Update Paket</h2>
                </div>
                <div class="card-body">
                    <form id="formPaketMasuk" method="post" action="index.php?page=updatepaket" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="noResi">No resi</label>
                            <input type="text" name="no_resi" class="form-control mb-3" value="<?php echo $data['no_resi']; ?>" required placeholder="No resi">
                        </div>
                        <div class="form-group">
                            <label for="namaPemilik">Nama Pemilik Paket</label>
                            <input type="text" name="nama_penerima" class="form-control mb-3" value="<?php echo $data['nama_penerima']; ?>" required placeholder="Nama Pemilik Paket">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="jenisPaket">Jenis Paket</label>
                                <select name="jenis" class="form-control mb-3" required>
                                    <?php $jenis = $data['jenis']; ?>
                                    <option selected value="" <?= $jenis == '' ? 'selected' : '' ?>>Pilih jenis Paket</option>
                                    <option value="surat" <?= $jenis == 'surat' ? 'selected' : '' ?>>Surat</option>
                                    <option value="paket" <?= $jenis == 'paket' ? 'selected' : '' ?>>Paket</option>
                                    <option value="berkas" <?= $jenis == 'berkas' ? 'selected' : '' ?>>Berkas</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ekspedisiPaket">Ekspedisi Paket</label>
                                <input type="text" name="ekspedisi" class="form-control mb-3" value="<?php echo $data['ekspedisi']; ?>" placeholder="Ekspedisi Paket" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggalMasuk">Tanggal Masuk</label>
                                <input type="datetime-local" name="tanggal_diterima" class="form-control mb-3" value="<?php echo $data['tanggal_diterima']; ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="statusPaket">Status Paket</label>
                                <select name="status" class="form-control mb-3">
                                    <?php $status = $data['status']; ?>
                                    <option selected value="" <?= $status == '' ? 'selected' : '' ?>>Pilih status</option>
                                    <option value="sudah diambil" <?= $status == 'sudah diambil' ? 'selected' : '' ?>>Sudah diambil</option>
                                    <option value="belum diambil" <?= $status == 'belum diambil' ? 'selected' : '' ?>>Belum diambil</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalMasuk">Tanggal Ambil</label>
                                <input type="datetime-local" name="tanggal_diambil" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_penerima">ID Penerima</label>
                                <input type="text" name="id_penerima" class="form-control mb-3" value="<?php echo $data['id_penerima']; ?>" placeholder="ID Penerima" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="id_security">Satpam Penerima Paket</label>
                            <select class="form-control mb-3" name="id_security" required>
                                <?php foreach ($security as $item) : ?>
                                    <option value="<?= $item['id_security']; ?>" <?= $item['id_security'] == $data['id_security'] ? 'selected' : ''; ?>>
                                        <?= $item['id_security']; ?> - <?= $item['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        </div>


                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary mr-2 simpanFooter" id="btnSimpan">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelForm()">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
    </div>
    </div>
    <script>
        function cancelForm() {
            window.location.href = 'index.php?page=paketmasuk';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>