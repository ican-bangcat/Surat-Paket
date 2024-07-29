<?php
include_once 'Views/header.php';
include_once 'Models/Security_model.php';
require_once 'Core/Flasher.php';
class Security
{
    var $db;
    function __construct()
    {
        $this->db = new Security_model();
    }
    function index()
    {
        require_once 'Views/header.php';
        require_once 'Views/navbar.php';
        require_once 'Views/landingPage.php';
        require_once 'Views/footer.php';
    }

    function dashboard()
    {
        $jumlah_paket = $this->db->getPaketMasuk();
        $jumlah_paket_keluar = $this->db->getPaketKeluar();
        $jumlah_paket_sekarang = $this->db->getPaketSekarang();
        $paket = $this->db->getAllData();

        require 'Views/header.php';
        require 'Views/security/dashboard.php';
        require 'Views/footer.php';
    }
    function login()
    {
        require 'Views/header.php';
        require 'Views/viewLogin.php';
        require 'Views/footer.php';
    }
    function logout()
    {
        require 'Controllers/logout.php';
    }

    function cari()
    {
        $searchPerformed = false;
        $paket = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $paket = $this->db->getPaketPenerima();
            $searchPerformed = true; // Set parameter ini menjadi true jika pencarian dilakukan
        }

        $jumlah_paket_sekarang = $this->db->getPaketSekarang();
        require_once 'Views/header.php';
        require 'Views/mencari_paket.php';
        require_once 'Views/footer.php';
    }




    function paketMasuk()
    {
        $paket = $this->db->getAllPaketBelumDiambil();
        $jumlah_paket_sekarang = $this->db->getPaketSekarang();
        require_once 'Views/header.php';

        require 'Views/security/paketmasuk.php';
        require_once 'Views/footer.php';
    }

    function tambahPaket($data)
    {
        $this->db->tambahData($data);
        $paket = $this->db->getAllData();
        $jumlah_paket_sekarang = $this->db->getPaketSekarang();
        require_once 'Views/header.php';
        require 'Views/security/paketmasuk.php';
        require_once 'Views/footer.php';
    }


    function formInsert()
    {
        $penerima = $this->db->getAllPenerimaSimple(); // Ambil data penerima
        $security = $this->db->getAllSecurity(); // Ambil data security
        require_once 'Views/header.php';
        require 'Views/security/inputpaket.php';
        require_once 'Views/footer.php';
    }

    function paketKeluar()
    {
        $paket = $this->db->getAllPaketDiambil();
        $jumlah_paket_sekarang = $this->db->getPaketKeluar();
        require_once 'Views/header.php';
        require 'Views/security/paketkeluar.php';
        require_once 'Views/footer.php';
    }

    function penerima()
    {
        $penerima = $this->db->getAllPenerima();
        $jumlah_penerima = $this->db->getJumlahPenerima();
        require_once 'Views/header.php';
        require 'Views/security/penerima.php';
        require_once 'Views/footer.php';
    }
    function viewUpdatePaket()
    {
        $no_resi = $_GET['no_resi'];
        $data = $this->db->getAllDataByID($no_resi);
        $security = $this->db->getAllSecurity();
        require_once 'Views/header.php';
        require_once 'Views/security/updatepaket.php';
        require_once 'Views/footer.php';

        // if (isset($_GET['no_resi'])) {

        //     if ($data) {

        //         echo "<script>
        //                 alert('Data tidak ditemukan!');
        //                 window.location.href = 'index.php?page=paketmasuk';
        //               </script>";
        //     }
        // } else {
        //     echo "<script>
        //             alert('No resi tidak diberikan!');
        //             window.location.href = 'index.php?page=paketmasuk';
        //           </script>";
        // }
    }
    function updatePaket($data, $no_resi)
    {
        $this->db->updatePaket($data, $no_resi);
    }
    //Penerima
    function formPenerima()
    {
        require_once 'Views/header.php';
        require_once 'Views/security/inputpenerima.php';
        require_once 'Views/footer.php';
    }

    function tambahPenerima($data)
    {
        $this->db->tambahPenerima($data);

        require_once 'Views/header.php';
        require_once 'Views/security/penerima.php';
        require_once 'Views/footer.php';
    }
    function viewUpdatePenerima()
    {
        $id_penerima = $_GET['id_penerima'];
        $data = $this->db->getAllDataByID($id_penerima);
        require_once 'Views/header.php';
        require_once 'Views/security/updatepenerima.php';
        require_once 'Views/footer.php';
    }
    function updatePenerima($data, $id_penerima)
    {
        $this->db->updatePenerima($data, $id_penerima);
    }
    function hapusPaket()
    {
        $id = $_GET['no_resi'];
        $this->db->hapusPaket($id);
    }
    function hapusPenerima()
    {
        $id = $_GET['id_penerima'];
        $this->db->hapusPenerima($id);
    }
    function historyPaket()
    {
        $history = $this->db->getAllHistory();
        $jumlah_paket_dihapus = $this->db->getJumlahHistory();
        require_once 'Views/header.php';
        require 'Views/security/historyPaket.php';
        require_once 'Views/footer.php';
    }
    function historyPemilik()
    {
        $history = $this->db->getHistoryPemilik();
        $jumlah_penerima_dihapus = $this->db->getJumlahHistoryPenerima();
        require_once 'Views/header.php';
        require 'Views/security/historyPenerima.php';
        require_once 'Views/footer.php';
    }
}
