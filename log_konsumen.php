<?php
include "koneksi.php";
$pass = $_POST['txt_pass'] ?? '';
$user = $_POST['txt_user'] ?? '';
$login = sprintf("SELECT * FROM konsumen WHERE user='%s' AND pass='%s'", 
    mysqli_real_escape_string($koneksi, $user), 
    mysqli_real_escape_string($koneksi, $pass)
);
$cek_lagi = mysqli_query($koneksi, $login);
$ketemu = mysqli_num_rows($cek_lagi);

// Apabila username dan password ditemukan
if ($ketemu > 0) {
    session_start();
    $r = mysqli_fetch_assoc($cek_lagi);
    $_SESSION['namamember'] = $r['user'];
    $_SESSION['nama'] = $r['nama'];
    echo "<script>window.location.href='index.php';</script>";
    exit;
} else {
    echo "<script>alert('Password dan Username tidak Valid...!!!');</script>";
    echo "<script>window.location.href='index.php';</script>";
    exit;
}
?>
