<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['daftar']) && $_POST['daftar'] == "DAFTAR") {
    $user = $_POST['txt_user'];
    $pass = $_POST['txt_pass'];
    $nama = $_POST['txt_nama'];
    $jk = $_POST['jenkel'];
    $pekerjaan = $_POST['txt_pekerjaan'];
    $alamat = $_POST['txt_alamat'];
    $kota = $_POST['txt_kota'];
    $provinsi = $_POST['txt_provinsi'];
    $kode_pos = $_POST['txt_kdpos'];
    $no_tlp = $_POST['txt_notel'];
    $email = $_POST['txt_email'];
    $no_rekening = $_POST['txt_norek'];
    $nama_bank = $_POST['txt_bank'];

    if (empty($user) || empty($pass) || empty($no_rekening) || empty($alamat) || empty($no_tlp)) {
        echo "<script>alert('Data Harap Dilengkapi');</script>";
        echo "<script>window.location='index.php?page=registrasi';</script>";
        exit;
    } else {
        $host = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db = "motosewa_express";
        $conn_db = mysqli_connect($host, $user_db, $pass_db, $db);

        if (!$conn_db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $cek_daftar_query = "SELECT * FROM konsumen WHERE nama='$nama' AND user='$user'";
        $cek_daftar_result = mysqli_query($conn_db, $cek_daftar_query);

        if (mysqli_num_rows($cek_daftar_result) > 0) {
            echo "<script>alert('User Name Sudah Ada ! Silakan ulangi lagi');</script>";
            echo "<script>window.location='index.php?page=registrasi';</script>";
            exit;
        } else {
            $cek_daftar = mysqli_num_rows(mysqli_query($conn_db, 'SELECT * FROM konsumen'));
            $id_konsumen = $cek_daftar + 1;
            $tambah = "INSERT INTO konsumen VALUES(null, '$user', '$pass', '$nama', '$jk', '$pekerjaan', '$alamat', '$kota', '$provinsi', '$kode_pos', '$no_tlp', '$email', '$no_rekening', '$nama_bank')";
            $kueri_tbh = mysqli_query($conn_db, $tambah);

            if ($kueri_tbh) {
                echo "<script>alert('Data Berhasil Disimpan, Sekarang Anda Bisa Login');</script>";
                echo "<script>window.location='index.php';</script>";
            } else {
                echo "<script>alert('Data Gagal disimpan ! Silakan ulangi lagi');</script>";
                echo "<script>window.location='index.php?page=registrasi';</script>";
            }
        }
        mysqli_close($conn_db);
    }
}
?>
