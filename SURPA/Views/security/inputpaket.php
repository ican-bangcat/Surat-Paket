<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: index.php?page=login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Paket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Views/css/last.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Tambahkan link ke CSS Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <main class="col-md-10">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Form Input Paket</h2>
                </div>
                <div class="card-body">
                    <form id="formPaketMasuk" method="post" action="index.php?page=insertpaket">
                        <div class="form-group">
                            <label for="noResi">No Resi</label>
                            <input type="text" name="no_resi" class="form-control" placeholder="No Resi" required>
                        </div>
                        <div class="form-group">
                            <label for="namaPemilik">Nama Pemilik Paket</label>
                            <input type="text" name="nama_penerima" id="namaPenerima" class="form-control" placeholder="Nama Pemilik Paket" required readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jenisPaket">Jenis Paket</label>
                                <select name="jenis" class="form-control" required>
                                    <option selected disabled>Pilih jenis Paket</option>
                                    <option value="surat">Surat</option>
                                    <option value="paket">Paket</option>
                                    <option value="berkas">Berkas</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ekspedisiPaket">Ekspedisi Paket</label>
                                <input type="text" name="ekspedisi" class="form-control" placeholder="Ekspedisi Paket" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggalMasuk">Tanggal Masuk</label>
                                <input type="datetime-local" name="tanggal_diterima" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="statusPaket">Status Paket</label>
                                <select name="status" class="form-control" required>
                                    <option selected disabled>Pilih status</option>
                                    <option value="belum diambil">Belum diambil</option>
                                    <option value="sudah diambil">Sudah diambil</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_security">Satpam Penerima Paket</label>
                            <select class="form-control" name="id_security" id="idSecurity" required>
                                <option selected disabled>Pilih Security Penerima Paket</option>
                                <?php foreach ($security as $item) : ?>
                                    <option value="<?= $item['id_security']; ?>"><?= $item['id_security']; ?> - <?= $item['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_penerima">ID Penerima</label>
                            <select name="id_penerima" id="idPenerima" class="form-control" required>
                                <option selected disabled>Pilih ID Penerima</option>
                                <?php foreach ($penerima as $item) : ?>
                                    <option value="<?= $item['id_penerima']; ?>"><?= $item['id_penerima']; ?> - <?= $item['nama_penerima']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelForm()">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        function cancelForm() {
            window.location.href = 'index.php?page=paketmasuk';
        }

        document.getElementById('idPenerima').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var namaPenerima = selectedOption.text.split(' - ')[1];
            document.getElementById('namaPenerima').value = namaPenerima;
        });
        document.getElementById('idSecurity').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var namaSatpam = selectedOption.text.split(' - ')[1];
            document.getElementById('nama').value = namaSatpam;
        });
    </script>
    <!-- Tambahkan script ke JS Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#idSecurity').select2();
            $('#idPenerima').select2();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
 

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>