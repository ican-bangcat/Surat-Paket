<?php
include '../Core/Database.php';
session_start();

$db = new Database();
$conn = $db->getConnection();

//cek apakah sudah login
if (isset($_SESSION["login"])) {
    header("location: ../index.php?page=dashboard");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM security WHERE id_security = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] === hash('sha256', $password)) {
            $_SESSION['login'] = true;
            $_SESSION['namaSecurity'] = $row['nama'];
            // if (isset($_POST['remember'])) {
            //     setcookie('id', $row['id_security'], time() + (2 * 60 * 60));
            //     setcookie('nama', hash('sha256', $row['nama']), time() + (2 * 60 * 60));
            // }
            header("location: ../index.php?page=dashboard");
            exit;
        }
    }
    $_SESSION['error'] = true;
    header("location: ../index.php?page=login");
    exit;
}

//cek cookie
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


