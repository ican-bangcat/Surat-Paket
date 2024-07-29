<?php

require_once 'Controllers/security.php';
$security = new Security();

if (!isset($_GET['page'])) {
    $security->index();
} else if (isset($_GET['page']) && $_GET['page'] == "login") {
    $security->login();
} else if (isset($_GET['page']) && $_GET['page'] == "logout") {
    $security->logout();
} else if (isset($_GET['page']) && $_GET['page'] == "dashboard") {
    $security->dashboard();
} else if (isset($_GET['page']) && $_GET['page'] == "caripaket") {
    $security->cari();
} else if (isset($_GET['page']) && $_GET['page'] == "landingpage") {
    $security->index();
} else if (isset($_GET['page']) && $_GET['page'] == "paketmasuk") {
    $security->paketMasuk();
} else if (isset($_GET['page']) && $_GET['page'] == "forminsert") {
    $security->formInsert();
} else if (isset($_GET['page']) && $_GET['page'] == "insertpaket") {
    $data = [
        'no_resi' => $_POST['no_resi'],
        'nama_penerima' => $_POST['nama_penerima'],
        'ekspedisi' => $_POST['ekspedisi'],
        'jenis' => $_POST['jenis'],
        'status' => $_POST['status'],
        'tanggal_diterima' => $_POST['tanggal_diterima'],
        'id_security' => $_POST['id_security'],
        'id_penerima' => $_POST['id_penerima']
    ];

    $security->tambahPaket($data);
} else if (isset($_GET['page']) && $_GET['page'] == "paketkeluar") {
    $security->paketKeluar();
} else if (isset($_GET['page']) && $_GET['page'] == "penerima") {
    $security->penerima();
} else if (isset($_GET['page']) && $_GET['page'] == "formupdate") {
    $security->viewUpdatePaket();
} else if (isset($_GET['page']) && $_GET['page'] == "updatepaket") {
    $data = [
        'no_resi' => $_POST['no_resi'],
        'nama_penerima' => $_POST['nama_penerima'],
        'ekspedisi' => $_POST['ekspedisi'],
        'jenis' => $_POST['jenis'],
        'status' => $_POST['status'],
        'tanggal_diterima' => $_POST['tanggal_diterima'],
        'tanggal_diambil' => $_POST['tanggal_diambil'],
        'id_security' => $_POST['id_security'],
        'id_penerima' => $_POST['id_penerima']
    ];
    $security->updatePaket($data, $data['no_resi']);
} else if (isset($_GET['page']) && $_GET['page'] == "formpenerima") {
    $security->formPenerima();
} else if (isset($_GET['page']) && $_GET['page'] == "insertpenerima") {
    $data = [
        'id_penerima' => $_POST['id_penerima'],
        'nama_penerima' => $_POST['nama_penerima']
    ];
    $security->tambahPenerima($data);
} else if (isset($_GET['page']) && $_GET['page'] == "formUpdatePenerima") {
    
    $security->viewUpdatePenerima();
} else if (isset($_GET['page']) && $_GET['page'] == "updatepenerima") {
    $data = [
        'id_penerima' => $_POST['id_penerima'],
        'nama_penerima' => $_POST['nama_penerima']
    ];
    $security->updatePenerima($data,$data['id_penerima']);
} else if (isset($_GET['page']) && $_GET['page'] == "hapusPaket") {
    
    $security->hapusPaket();
}else if (isset($_GET['page']) && $_GET['page'] == "hapusPenerima") {
    
    $security->hapusPenerima();
}else if (isset($_GET['page']) && $_GET['page'] == "history") {
    
    $security->historyPaket();
}else if (isset($_GET['page']) && $_GET['page'] == "historyPemilik") {
    
    $security->historyPemilik();
}
