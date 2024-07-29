<?php
include 'Core/Database.php';
class Security_model extends Database
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }



    function getAllData()
    {

        if (isset($_POST['keyword']) && $_POST !== "") {
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM paket
                      WHERE nama_penerima LIKE '%$keyword%' OR no_resi LIKE '%$keyword%'";
            $data = $this->db->execute($query);
            return $data;
        } else {
            $query = "SELECT * FROM PAKET ORDER BY tanggal_diterima DESC";
            $data = $this->db->execute($query);
            return $data;
        }
    }
    function getAllDataByID($id)
    {

        $id = $this->db->getConnection()->real_escape_string($id);
        $query = "SELECT * FROM paket WHERE no_resi='$id'";
        $data = $this->db->execute($query);
        return isset($data[0]) ? $data[0] : null;
    }
    function getAllDataByIDPenerima($id)
    {

        $id = $this->db->getConnection()->real_escape_string($id);
        $query = "SELECT * FROM penerima WHERE id_penerima='$id'";
        $data = $this->db->execute($query);
        return isset($data[0]) ? $data[0] : null;
    }
    function getAllPaketBelumDiambil()
    {
        if (isset($_POST['carimasuk']) && $_POST['carimasuk'] !== "") {
            $keyword = $_POST['carimasuk'];
            $query = "SELECT no_resi,nama_penerima,  ekspedisi, jenis,tanggal_diterima, status, id_security 
                      FROM paket 
                      WHERE (nama_penerima LIKE '%$keyword%' OR no_resi LIKE '%$keyword%') 
                      AND tanggal_diambil IS NULL 
                      ORDER BY tanggal_diterima DESC";
            $data = $this->db->execute($query);
            return $data;
        } else {
            $query = "SELECT * FROM PAKET 
                      WHERE tanggal_diambil IS NULL
                      ORDER BY tanggal_diterima DESC";
            $data = $this->db->execute($query);
            return $data;
        }
    }


    function getPaketMasuk()
    {
        $query = "SELECT COUNT(*) AS total FROM PAKET";
        $data = $this->db->execute($query);
        return $data;
    }
    function getPaketKeluar()
    {
        $query = "SELECT COUNT(*) AS total FROM PAKET WHERE tanggal_diambil IS NOT NULL";
        $data = $this->db->execute($query);
        return $data;
    }
    function getPaketSekarang()
    {
        $query = "SELECT COUNT(*) AS total FROM PAKET WHERE tanggal_diambil IS NULL";
        $data = $this->db->execute($query);
        return $data;
    }



    function getPaketPenerima()
    {
        // $keyword = $_POST['keywordd'];
        // $query = "  SELECT nama_penerima, no_resi, ekspedisi, jenis, tanggal_diterima, status, id_security
        //             FROM paket
        //             WHERE nama_penerima = '$keyword' OR no_resi = '$keyword'";
        // $data = $this->db->execute($query);
        // return $data;
        if (isset($_POST['keywordd']) && $_POST['keywordd'] !== "") {
            $keyword = $_POST['keywordd'];
            $query = "SELECT * FROM paket WHERE nama_penerima LIKE '%$keyword%' OR no_resi LIKE '%$keyword%'";
            $data = $this->db->execute($query);
            return $data;
        }
        return [];
    }

    function getAllPaketDiambil()
    {
        if (isset($_POST['carikeluar']) && $_POST['carikeluar'] !== "") {
            $keyword = $_POST['carikeluar'];
            $query = "SELECT * FROM PAKET 
                      WHERE tanggal_diambil IS NOT NULL 
                      AND (nama_penerima LIKE '%$keyword%' OR no_resi LIKE '%$keyword%')
                      ORDER BY tanggal_diambil DESC";
            $data = $this->db->execute($query);
            return $data;
        } else {
            $query = "SELECT * FROM PAKET WHERE tanggal_diambil IS NOT NULL  ORDER BY tanggal_diambil DESC";
            $data = $this->db->execute($query);
            return $data;
        }
    }

    function tambahData($data)
    {
        // Define columns
        $col = ['no_resi', 'nama_penerima', 'ekspedisi', 'jenis', 'status', 'tanggal_diterima', 'id_security', 'id_penerima'];
        $status = $this->db->insert('paket', $col, $data);
        if ($status) {
            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Data Berhasil ditambahkan!',
                icon: 'success'
            }).then(function() {
                window.location.href = 'index.php?page=paketmasuk';
            });
        </script>";
        } else {
            echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Data Gagal ditambahakan!',
                icon: 'error'
            }).then(function() {
                window.location.href = 'index.php?page=insertpaket';
            });
        </script>";
        }
    }

    // if($status){
    //     Flasher::setFlash('berhasil', 'ditambahkan','success');
    //     header('Location: index.php?page=paketmasuk');
    //     exit;
    // }else{
    //     Flasher::setFlash('gagal', 'ditambahkan','danger');
    //     header('Location: index.php?page=paketmasuk');
    // }

    // if ($status) {
    //     $_SESSION['status'] = 'Sukses';
    //     $_SESSION['message'] = 'Data berhasil disimpan.';
    // } else {
    //     $_SESSION['status'] = 'Gagal';
    //     $_SESSION['message'] = 'Data gagal disimpan.';
    // }

    // Display SweetAlert message
    // if (isset($_SESSION['status'])) {
    //     // echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    //     echo "<script>
    //         Swal.fire({
    //           title: '" . $_SESSION['status'] . "!',
    //           text: '" . $_SESSION['message'] . "',
    //           icon: '" . strtolower($_SESSION['status']) . "',
    //           confirmButtonText: 'OK'
    //         }).then((result) => {
    //           if (result.isConfirmed) {
    //             window.location.href = 'index.php?page=paketmasuk';
    //           }
    //         });
    //       </script>";
    //     unset($_SESSION['status']);
    //     unset($_SESSION['message']);
    // } else {
    //     header('Location: index.php?page=paketmasuk');
    // }



    // function tambahData($data)
    // {
    //     $col = ['no_resi', 'nama_penerima', 'ekspedisi', 'jenis', 'status', 'tanggal_diterima', 'id_security', 'id_penerima'];
    //     $status = $this->db->insert('paket', $col, $data);
    //     return $status;
    // }


    function getAllPenerima()
    {
        if (isset($_POST['caripenerima']) && $_POST['caripenerima'] !== "") {
            $keyword = $_POST['caripenerima'];
            $query =    "SELECT * FROM penerima 
                         WHERE  nama_penerima LIKE '%$keyword%'";
            $data = $this->db->execute($query);
            return $data;
        } else {
            $query = "SELECT * FROM penerima";
            $data = $this->db->execute($query);
            return $data;
        }
    }
    function updatePaket($data, $no_resi)
    {
        $where = "no_resi='" . $no_resi . "'";
        $col = [
            'no_resi' => $data['no_resi'],
            'nama_penerima' => $data['nama_penerima'],
            'ekspedisi' => $data['ekspedisi'],
            'jenis' => $data['jenis'],
            'status' => $data['status'],
            'tanggal_diterima' => $data['tanggal_diterima'],
            'tanggal_diambil' => $data['tanggal_diambil'],
            'id_security' => $data['id_security'],
            'id_penerima' => $data['id_penerima']
        ];
        $status = $this->db->update('paket', $col, $where);
        if ($status) {
            echo "<script>
            alert('Data Berhasil DiUpdate!');
            window.location.href = 'index.php?page=paketkeluar';
            </script>";
        } else {
            echo "<script>
            alert('Data Gagal DiUpdate!');
           window.location.href = 'index.php?page=paketmasuk';
            </script>";
        }
    }

    function updatePenerima($data, $id_penerima)
    {
        $where = "id_penerima='" . $id_penerima . "'";
        $col = [
            'id_penerima' => $data['id_penerima'],
            'nama_penerima' => $data['nama_penerima']
        ];
        $status = $this->db->update('penerima', $col, $where);
        if ($status) {
            echo "<script>
            alert('Data Berhasil DiUpdate!');
            window.location.href = 'index.php?page=penerima';
            </script>";
        } else {
            echo "<script>
            alert('Data Gagal DiUpdate!');
           window.location.href = 'index.php?page=penerima';
            </script>";
        }
    }

    function tambahPenerima($data)
    {
        $col = ['id_penerima', 'nama_penerima']; // define columns 
        $status = $this->db->insert('penerima', $col, $data);
        if ($status) {
            echo "<script>
            alert('Data Berhasil ditambahkan!'); 
            window.location.href = 'index.php?page=penerima';
        </script>";
        } else {
            echo "<script>
            alert('Data Gagal ditambahakan!');
            window.location.href = 'index.php?page=penerima';
        </script>";
        }
    }

    function hapusPaket($id)
    {
        // echo $query;
        $where = "no_resi='" . $id . "'";
        $status = $this->db->delete('paket', $where);
        if ($status) {
            echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location.href = 'index.php?page=history';
            </script>";
        } else {
            echo "<script>
            alert('Data Gagal Dihapus!');
            </script>";
        }
    }
    function hapusPenerima($id)
    {
        // echo $query;
        $where = "id_penerima='" . $id . "'";
        $status = $this->db->delete('penerima', $where);
        if ($status) {
            echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location.href = 'index.php?page=penerima';
            </script>";
        } else {
            echo "<script>
            alert('Data Gagal Dihapus!');
            </script>";
        }
    }
    function getAllPenerimaSimple()
    {
        $query = "SELECT id_penerima, nama_penerima FROM penerima";
        $data = $this->db->execute($query);
        return $data;
    }
    function getAllSecurity()
    {
        $query = "SELECT id_security, nama FROM security";
        $data = $this->db->execute($query);
        return $data;
    }
    function getAllHistory()
    {
        if (isset($_POST['cariHistory']) && $_POST['cariHistory'] !== "") {
            $keyword = $_POST['cariHistory'];

            // Escaping the keyword to prevent SQL injection
            $keyword = mysqli_real_escape_string($this->db->getConnection(), $keyword);

            $query = "SELECT * FROM histpaket 
            WHERE 
                no_resi LIKE '%$keyword%' OR 
                nama_penerima LIKE '%$keyword%' OR 
                ekspedisi LIKE '%$keyword%' OR 
                jenis LIKE '%$keyword%' OR 
                status LIKE '%$keyword%' OR 
                tanggal_diterima LIKE '%$keyword%' OR 
                tanggal_diambil LIKE '%$keyword%' OR 
                id_security LIKE '%$keyword%' OR 
                id_penerima LIKE '%$keyword%' OR 
                tanggal_dihapus LIKE '%$keyword%'
            ORDER BY tanggal_dihapus DESC";

            $data = $this->db->execute($query);
            return $data;
        } else {
            $query = "SELECT * FROM histpaket ORDER BY tanggal_dihapus DESC";
            $data = $this->db->execute($query);
            return $data;
        }
    }
    function getJumlahHistory()
    {
        $query = "SELECT COUNT(*) AS total FROM histpaket ";
        $data = $this->db->execute($query);
        return $data;
    }
    function getHistoryPemilik()
    {
        $query = "SELECT * FROM histpenerima ORDER BY tanggal_dihapus DESC";
        $data = $this->db->execute($query);
        return $data;
    }
    function getJumlahHistoryPenerima()
    {
        $query = "SELECT COUNT(*) AS total FROM histpenerima ";
        $data = $this->db->execute($query);
        return $data;
    }
    function getJumlahPenerima()
    {
        $query = "SELECT COUNT(*) AS total FROM penerima ";
        $data = $this->db->execute($query);
        return $data;
    }
}
