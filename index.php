<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeBazaar</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/highslide.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="images/motor.png">
    <script type="text/javascript" src="js/utilities.js" defer></script>
    <script type="text/javascript" src="js/highslide-with-html.js" defer></script>
    <script type="text/javascript" src="js/slideshow.js" defer></script>
    <script type="text/javascript">
        const hs = {
            graphicsDir: 'http://localhost/cm/images/',
            outlineType: 'rounded-white',
            wrapperClassName: 'draggable-header'
        };
    </script>
</head>
<body>
<?php
include 'koneksi.php';
?>
<div id="wrapper">
    <div id="header">
        <img src="Images/bgr.jpg" alt="" width="850" height="130">
        <strong>
            <marquee direction="left">
                <font color="#FF0000" size="2">
                    <?php
                    $hour = date('G');
                    if ($hour < 11) {
                        echo 'Selamat Pagi ! - ';
                    } elseif ($hour < 15) {
                        echo 'Selamat Siang ! - ';
                    } elseif ($hour < 19) {
                        echo 'Selamat Sore ! - ';
                    } else {
                        echo 'Selamat Malam ! - ';
                    }
                    ?>
                </font>
            </marquee>
            <script>
                const dtNow = new Date();
                const dtMonthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                const dtDayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                const dtMonthNow = dtMonthNames[dtNow.getMonth()];
                const dtDay = dtDayNames[dtNow.getDay()];
                const dtDate = dtNow.getDate();
                const dtYear = dtNow.getFullYear();
                document.write(dtDay + ", " + dtDate + " " + dtMonthNow + " " + dtYear + " ");
            </script>
        </strong>
    </div>
    <marquee behavior="alternate"></marquee>
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
    <div id="sidebar">
        <?php if (empty($_SESSION['namamember'])) : ?>
            <div id="judul">Member Log In</div>
            <div id="widget">
                <form method="post" action="log_konsumen.php">
                    <table width="228" align="center">
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
                            <td><input type="submit" value="Masuk" class="submitButton"/>
                                <input type="reset" value="Hapus" class="submitButton"/></td>
                        </tr>
                    </table>
                </form>
                <a href="index.php?page=registrasi">
                    <div class="submitButton2">Gak Punya Akun? Daftar Akun Baru</div>
                </a>
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
        <div id="judul">Hubungi kami di :</div>
        <div id="widget">
            <table width="238" height="72" border="0">
                <tr>
                    <td width="73" rowspan="2">
                        <a href="https://wa.me/6281290476752" target="browser">
                            <img src="Images/wa.png" width="69" height="66"/>
                        </a>
                    </td>
                    <td width="155" valign="top">
                        <div align="center">WhatsApp</div>
                    </td>
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
    <div id="content">
        <p>
            <?php //DISINI UNTUK SET HALAMAN PHP
            $page = ($_GET['page'] ?? "main");
            switch ($page) {
                case 'profil':
                    include "profil.php";
                    break;
                case 'kontak' :
                    include "kontak.php";
                    break;
                case 'registrasi' :
                    include "registrasi.php";
                    break;
                case 'pesan' :
                    include "pesan.php";
                    break;
                case 'detail' :
                    include "detail.php";
                    break;
                case 'lihat_pesanan' :
                    include "lihat_pesanan.php";
                    break;
                case 'main' :
                default :
                    include 'utama.php';
            }
            ?>
        </p>
        <p>&nbsp;</p>
    </div>
    <div id="footer">Copyright &copy; 2024 by: <a href="index.php">BikeBazaar</a></div>
</div>
</body>
</html>
