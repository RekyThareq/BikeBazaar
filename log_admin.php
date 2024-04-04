<?php
include "koneksi.php";

$user = $_POST['txt_user'];
$pass = md5($_POST['txt_pass']); // Untuk tujuan demonstrasi, tetapi disarankan menggunakan metode enkripsi yang lebih aman seperti bcrypt atau Argon2

// Perhatikan penggunaan parameterized query untuk mencegah serangan SQL injection
$login = "SELECT * FROM admin WHERE user_name=? AND password=?";
$stmt = mysqli_prepare($conn, $login);

// Bind parameter
mysqli_stmt_bind_param($stmt, "ss", $user, $pass);

// Eksekusi statement
mysqli_stmt_execute($stmt);

// Mendapatkan hasil
$result = mysqli_stmt_get_result($stmt);

// Mendapatkan jumlah baris yang ditemukan
$ketemu = mysqli_num_rows($result);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  // Ambil baris hasil query
  $r = mysqli_fetch_array($result);
  
  session_start();
  $_SESSION['adm'] = $r['user_name']; // Sesuaikan dengan kolom yang sesuai dalam database

  header("Location: admin/index.php");
  exit;
}
else {
?>
  <script type="text/javascript">
    alert("Password dan Username tidak Valid...!!!");
  </script>
<?php
  header("Location: admin.php");
  exit;
}

// Jangan lupa menutup statement dan koneksi mysqli setelah selesai digunakan
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
