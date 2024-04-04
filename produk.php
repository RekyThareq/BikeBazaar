<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/highslide.css">
<link rel="shortcut icon" href="images/motor.png">
<script src="js/utilities.js" defer></script>
<script src="js/highslide-with-html.js" defer></script>
<script src="js/slideshow.js" defer></script>
<script>
    const hs = {
        graphicsDir: 'http://localhost/cm/images/',
        outlineType: 'rounded-white',
        wrapperClassName: 'draggable-header'
    };
</script>
<title>BikeBazaar</title>
</head>
<body>
<?php
include('koneksi.php');
?>
<div id="wrapper">
    <!-- #header -->
    <div id="header">
        <img src="Images/bgr.jpg" alt="" width="850" height="130">
        <strong>
            <marquee direction="left">
                <font color="#FF0000" size="2">
                    <?php
                    $h = date('G');
                    if ($h < 11) {
                        echo 'Selamat Pagi ! - ';
                    } elseif ($h < 15) {
                        echo 'Selamat Siang ! - ';
                    } elseif ($h < 19) {
                        echo 'Selamat Sore ! - ';
                    } else {
                        echo 'Selamat Malam ! - ';
                    }
                    ?>
                    <script>
                        const dtNow = new Date();
                        const dtMonth = dtNow.getMonth();
                        const dtYear = dtNow.getFullYear();
                        let dtMonthNow;
                        switch (dtMonth) {
                            case 0:
                                dtMonthNow = "Januari";
                                break;
                            case 1:
                                dtMonthNow = "Februari";
                                break;
                            case 2:
                                dtMonthNow = "Maret";
                                break;
                            case 3:
                                dtMonthNow = "April";
                                break;
                            case 4:
                                dtMonthNow = "Mei";
                                break;
                            case 5:
                                dtMonthNow = "Juni";
                                break;
                            case 6:
                                dtMonthNow = "Juli";
                                break;
                            case 7:
                                dtMonthNow = "Agustus";
                                break;
                            case 8:
                                dtMonthNow = "September";
                                break;
                            case 9:
                                dtMonthNow = "Oktober";
                                break;
                            case 10:
                                dtMonthNow = "November";
                                break;
                            case 11:
                                dtMonthNow = "Desember";
                                break;
                        }
                        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                        const dtDay = days[dtNow.getDay()];
                        const dtDate = dtNow.getDate();
                        document.write(dtDay + ", " + dtDate + " " + dtMonthNow + " " + dtYear);
                    </script>
                </font>
            </marquee>
        </strong>
    </div>
    <marquee behavior="alternate"></marquee>
    <!-- #menu -->
    <table width="242" height="30" border="0" align="right">
    </table>
    <div id="menu">
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="index.php?page=profil">Profil</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="index.php?page=kontak">Contact Us</a></li>
            <li><a href="admin.php">Login Admin</a></li>
        </ul>
    </div>
    <!-- #sidebar -->
    <div id="sidebar">
        <?php if (empty($_SESSION['namamember'])) : ?>
            <div id="judul">Member Log In</div>
            <div id="widget">
                <form method="post" action="log_konsumen.php">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input name="txt_user" type="text" class="input" id="txt_user" size="23"/></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" name="txt_pass" class="input" size="23" id="txt_pass"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" value="Masuk" class="submitButton"/>
                                <input type="reset" value="Hapus" class="submitButton"/>
                            </td>
                        </tr>
                    </table>
                </form>
                <a href="index.php?page=registrasi"><div class="submitButton2">Gak Punya Akun? Daftar Akun Baru</div></a>
            </div>
        <?php else : ?>
            <div id="judul">Selamat Datang</div>
            <div id="widget">
                <?php
                $d = date('d');
                $m = date('m');
                $y = date('Y');
                ?>
                <img src="images/user-icon.jpg" class="gambar2"/>
                Halo "<b><?php echo $_SESSION['nama']; ?></b>"<br/>
                Login Tanggal : <?php echo "$d-$m-$y"; ?><br/><br/><br/><br/><br/>
                <a href="logout.php"><div class="submitButton2">Keluar</div></a>
            </div>
        <?php endif; ?>
        <div id="judul">Hubungi Kami di :</div>
        <div id="widget">
            <table width="238" height="72" border="0">
                <tr>
                    <td width="73" rowspan="2">
                        <a href="https://wa.me/6281290476752" target="browser">
                            <img src="Images/wa.png" width="69" height="66"/>
                        </a>
                    </td>
                    <td width="155" valign="top"><div align="center">FACEBOOK</div></td>
                </tr>
                <tr>
                    <td valign="top">
                        <div align="center">
                            <h3>BikeBazaar</h3>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- #content -->
    <div id="content">
        <div id="kiri">
            <div id="judul">Katalog Koleksi Produk Kami</div>
            <?php
            $pdo = new PDO("mysql:host=localhost;dbname=motosewa_express", "root", "");
            $batas = 6;
            $paging = $_GET['paging'] ?? 1;
            $posisi = ($paging - 1) * $batas;
            $stmt = $pdo->query("SELECT * FROM motor ORDER BY kode_motor DESC LIMIT $posisi,$batas");
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $r) {
                echo "<div align='center' id='sub-barang'><div class='jdl-brg'>$r[nama_motor]</div><img src='Motor/$r[gambar]' width='100' class='gambar'><br><br><br><br><br><br><br><div id='harga'><i>Harga Rp.$r[harga]</i><br>
                    <a href='pesan.php?kode_motor=$r[kode_motor]'><div  class='submitButton3'>Pesan Motor</div></a><a href='detail.php?kode_motor=$r[kode_motor]' onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\"><div  class='submitButton3'>Lihat Detail</div></a>
                </div></div>";
            }
            echo "<tr><td colspan='2' valign='top' align='center'>";
            $stmt2 = $pdo->query("SELECT * FROM motor");
            $jumlah_data = $stmt2->rowCount();
            $jumlah_halaman = ceil($jumlah_data / $batas);
            echo "<div id='paging'>";
            $back = $paging - 1;
            if (1 != $paging) {
                echo "<div id='kotak-paging'><a href='produk.php?paging=$back'><b>Back</b></a></div>";
            } else {
                echo "<div id='kotak-paging'>Back</div>";
            }

            $next = $paging + 1;
            if ($paging != $jumlah_halaman) {
                echo " <div id='kotak-paging'><a href='produk.php?paging=$next'>  <b>Next</b></a></div>";
            } else {
                echo "<div id='kotak-paging'>Next</div>";
            }
            echo "</div>";
            ?>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <!-- #footer -->
    <div id="footer">Copyright &copy; 2024 by: <a href="index.php">BikeBazaar</a></div>
</div>
</body>
</html>
