<?php
error_reporting(0);
include "koneksi.php";

$user = $_POST['username'];
$pass = $_POST['password'];

// pastikan username dan password adalah berupa huruf atau angka.

$cek_lagi=pg_query("SELECT * FROM admin WHERE username='$user' AND password='$pass'");
$ketemu=pg_num_rows($cek_lagi);
$r=pg_fetch_array($cek_lagi);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['namauser']     = $r['username'];
  $_SESSION['passuser']     = $r['password'];
  
  echo "<div id='sukses' class='alert alert-info'><strong>BERHASIL...</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div><script>window.location ='admin/'</script>";
  
}
else{

  echo "<div id='gagal' class='alert alert-danger'>Mohon maaf username & password anda salah<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
}

?>
