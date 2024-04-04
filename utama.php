<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeBazaar</title>
</head>
<body>
<?php
include 'koneksi.php';
$koneksi = mysqli_connect("localhost", "root", "", "motosewa_express");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<div id="kiri">
    <div id="judul">Selamat Datang di BikeBazaar</div>
    <div align="justify">
        <p>Anda dapat memesan kendaraan sepeda motor dari produk kami dengan kualitas yang terbaik, kami hanya menjual dan membeli serta anda dapat tukar tamba kendaraan anda mungkin andah sudah bosan dengan kendaraan anda dan ingin mengganti dengan produk-produk yang lain tetapi anda tidak cukup untuk biaya menggantinya maka disini tempatnya , kami menjamin kualitas produk kami jelas yang terbaik dan terawat. </p>
    </div>
    <div id="judul">Rekomendasi Dari Kami</div>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM motor ORDER BY kode_motor DESC LIMIT 3");
    while ($row = mysqli_fetch_array($query)) {
        echo "<div id='sub-barang'>
                <div class='jdl-brg'>$row[nama_motor]</div>
                <img src='Motor/$row[gambar]' width='100' class='gambar'><br><br><br><br><br><br><br>
                <div id='harga'><i>Harga Rp.$row[harga]</i><br>
                    <a href='pesan.php?kode_motor=$row[kode_motor]'><div  class='submitButton3'>Pesan Motor</div></a>
                    <a href='detail.php?kode_motor=$row[kode_motor]' onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\"><div  class='submitButton3'>Lihat Detail</div></a>
                </div>
            </div>";
    }
    ?>
    <br /><br />
    <p align="center">Ingin melihat semua koleksi produk kami...??? Silahkan cek ke : </p>
    <a href="produk.php">
        <div class="submitButton2">Produk Kami</div>
    </a>
</div>
<p></p>
</body>
</html>
