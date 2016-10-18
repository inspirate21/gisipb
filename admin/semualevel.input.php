<?php
require '../koneksi.php';


if(isset($_POST['hapus'])) {
		pg_query("DELETE FROM semualevel WHERE gid=".$_POST['hapus']);
} 
else {
		$gid = $_POST['id'];
		$nama_ruang	= $_POST['nama_ruang'];
		$levelpost	= $_POST['level'];
		$fakultas	= $_POST['fakultas'];
		$departemen	= $_POST['departemen'];
		$wing = $_POST['wing'];
		$geom = 'ST_GeomFromText(\''.$_POST['geom'].'\',21148)';

		//SL = semualevel L4 = level4
		/*
		$SL= pg_query("select * from semualevel Where gid='$gid'");

		$ambilatributSL = pg_fetch_array($SL);

		$levelSL= $ambilatributSL['level'];
		$geomSL= $ambilatributSL['geom'];

		$leveldb = "level$levelSL";

		$L4 = pg_query("select * from $leveldb Where geom='$geomSL'");

		$ambilatributL4 = pg_fetch_array($L4);

		$gidL4= $ambilatributL4['gid'];
		$geomL4= $ambilatributL4['geom'];
		*/
	
	
			if($gid == 0) {
				pg_query("insert into semualevel (nama_ruang, level, fakultas, departemen, wing, geom) values('$nama_ruang','$levelpost','$fakultas','$departemen','$wing',$geom)");
			// proses ubah data ipb
			} else {
				//pg_query("update $leveldb set nama_ruang='$nama_ruang', level='$levelpost', fakultas='$fakultas', departemen ='$departemen', wing ='$wing' where geom='$geomL4'");
				pg_query("update semualevel set nama_ruang='$nama_ruang', level='$levelpost', fakultas='$fakultas', departemen='$departemen', wing ='$wing', geom=$geom where gid='$gid'");
			}	
	}	
	



?>
