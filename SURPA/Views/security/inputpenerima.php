<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: index.php?page=dashboard");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="Views/css/inputpenerima.css">

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row box-area shadow">
            <div class="col-md-6 left-box d-flex justify-content-center align-items-center flex-column">
                <div class="featured-image mb-3">
                    <img src="Views/assets/tofu.png" class="img-fluid medium-image animated-image">
                </div>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Form Input Penerima</h2>
                        <p>Silahkan inputkan data penerima</p>
                    </div>
                    <!-- FORM INPUT PENERIMA -->
                    <form id="penerimaForm" action="index.php?page=insertpenerima" method="POST" onsubmit="showSuccessModal(event)">
                        <div class="input-group mb-3">
                            <input type="text" name="id_penerima" class="form-control form-control-lg bg-light fs-6" placeholder="ID Penerima/NIM/NIP" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="nama_penerima" class="form-control form-control-lg bg-light fs-6" placeholder="Nama Penerima" required>
                        </div>
                        <div class="input-group mb-3 d-flex justify-content-between">
                            <button type="submit" class="btn btn-lg btn-primary" onclick="showConfirmation()">Kirim</button>
                            <button type="button" class="btn btn-lg btn-secondary" onclick="cancelForm()">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah data sudah benar?
                    <ul>
                        <li><strong>ID Penerima:</strong> <span id="confirmIdPenerima"></span></li>
                        <li><strong>Nama Penerima:</strong> <span id="confirmNamaPenerima"></span></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sukses -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Data berhasil diinput!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+Dj0BXQ0IBIBhuxG1esLLsErIcPb8" crossorigin="anonymous"></script>
    <script src="Views/js/scriptinputp.js"></script>
    <script>
        function cancelForm() {
            window.location.href = 'index.php?page=dashboard';
        }
    </script>
</body>
