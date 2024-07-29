<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

//hapus cookie
setcookie('id', '', time() - 10800);
setcookie('nama', '', time() - 10800);

header("location: index.php?page=landingpage");
exit;
