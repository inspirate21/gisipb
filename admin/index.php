<?php 
// memanggil berkas koneksi.php
require '../koneksi.php'; 
session_start();
if (!isset($_SESSION['namauser']) || empty($_SESSION['namauser'])) {
    //Jika Username kosong makan akan redirect ke halaman login
    header('location:../');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistem Informasi Geografis Pencarian Ruang Kuliah IPB Darmaga</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="favicon.png"/>
	<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="../css/jquery.dataTables.css" rel="stylesheet" media="screen">

	<style>
 .thumbnail {
        height: 100%;
		display: table;
    }

    .thumbnail img {
        max-height: 100%;
        max-width: 100%;
        
    }
	</style>
</head>

<body>

<!--
<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<a style="padding-left: -10px;" class="brand" href="">Sistem Informasi Pencarian Ruang Kuliah IPB Dramaga</a>
			<form class="navbar-search pull-right">
				<input type="text" class="span2" placeholder="Login">
				<input type="text" class="span2" placeholder="Password">
				<input style="margin-bottom: 15px;" type="submit" value="Login" class="btn"/>
			</form>
		</div>
	</div>
</div>
-->

<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="" style="color:white">Sistem Informasi Geografis Pencarian Ruang Kuliah IPB Dramaga</a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li class="active"><a href="">Home</a></li>
			  <li><a href="../geografis">Peta Geografis</a></li>
			  <li><a href="logout.php">Logout</a></li>
     
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="container">
	<div class="row">
		
<div style="height:35px;"></div>
	<div style="height:25px; text-align: center;"> <h4> <a href="../geografis">Peta Geografis Kampus IPB Darmaga</a></h4> </div>
	<div class="col-xs-3" style="text-align: center;">
            <a href="../geografis">
                <img src="../images/ig.png">
            </a>
        </div>
		<h4 style="margin-top:10px; margin-left:30px">Data Ruang Kuliah di IPB 
			
			
				<a href="#dialog-semualevel" id="0" class="btn tambah" data-toggle="modal">
				<i class="icon-plus"></i> Tambah Data
				</a>
			
		</h4>

		<!-- tempat untuk menampilkan data mahasiswa -->
		<div id="data-semualevel"></div>
		
		<div style="height:15px;"></div>
		<div style="height:35px; " align="center"><h5>Copyright &copy; 2016 fahmitajuddin@gmail.com</h5></div>
	</div>
	

<!-- awal untuk modal dialog -->
<div id="dialog-semualevel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data Ruang Kuliah di IPB</h3>
	</div>
	<!-- tempat untuk menampilkan form modal semualevel -->
	<div class="modal-body"></div>
	<div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button id="simpan-semualevel" class="btn btn-success">Simpan</button>
	</div>
</div>
<!-- akhir kode modal dialog -->

</div>




<!-- memanggil berkas javascript yang dibutuhkan -->
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/aplikasi.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/multifilter.js"></script>
<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$.validator.setDefaults({
		submitHandler: function() { login(); },
	});
	
	$().ready(function() {
		// validate the comment form when it is submitted
		$("#loginF").validate();
	});
	
	function login(){  
		$("#loading").html('<div class="alert alert-block alert-success">Mohon Tunggu....</div>');  
		
		$.post('cek_login.php', $("form").serialize(), function(hasil){  
		$('form input[type="text"],form input[type="password"]').val('');
		$("#loading").html(hasil);
    });  
} 
</script>
		
	 


</body>
</html>
