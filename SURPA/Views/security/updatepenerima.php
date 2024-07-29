<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: index.php?page=dashboard");
    exit;
}


$securityModel = new Security_model();
$id_penerima = isset($_GET['id_penerima']) ? $_GET['id_penerima'] : '';
$data = $securityModel->getAllDataByIDPenerima($id_penerima);

if (!$data) {
    echo "<script>
            alert('Data tidak ditemukan!');
            window.location.href = 'index.php?page=paketmasuk';
          </script>";
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="Views/css/inputpenerima.css">

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-light shadow box-area">
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="Views/assets/tofu.png" class="img-fluid" style="width: 180px;">
                </div>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Form Update Penerima </h2>
                        <p>Silahkan update data penerima</p>
                    </div>
                    <!-- FORM UPDATE PENERIMA -->
                    <form action="index.php?page=updatepenerima" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" name="id_penerima" class="form-control form-control-lg bg-light fs-6" value="<?php echo $data['id_penerima']; ?>" required placeholder="ID Penerima">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="nama_penerima" class="form-control form-control-lg bg-light fs-6" value="<?php echo $data['nama_penerima']; ?>" required placeholder="Nama Penerima">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" name="kirim" class="btn btn-lg btn-primary w-100 fs-6">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
