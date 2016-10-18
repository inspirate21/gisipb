<?php
// panggil file koneksi.php
require '../koneksi.php';



// tangkap variabel kd_mhs
$gid = $_POST['id'];

// query untuk menampilkan semualevel berdasarkan kd_mhs
$data = pg_fetch_array(pg_query("
SELECT * FROM semualevel WHERE gid=".$gid
));
$data_geom = pg_fetch_array(pg_query("
SELECT ST_AsText(geom) as geometry FROM semualevel WHERE gid=".$gid
));

// jika kd_mhs > 0 / form ubah data
if($gid> 0 ) { 
	$nama_ruang = $data['nama_ruang'];
	$level = $data['level'];
	$fakultas = $data['fakultas'];
	$departemen = $data['departemen'];
	$wing = $data['wing'];
	$geom = $data_geom['geometry'];
	

//form tambah data
} else {
	$nama_ruang ="";
	$level ="";
	$fakultas ="";
	$departemen ="";
	$wing = "";
	$geom = "";
}

?>
<form class="form-horizontal" id="form-semualevel">
	<div class="control-group">
		<label class="control-label" for="nama_ruang">Nama Ruang</label>
		<div class="controls">
			<input type="text" id="nama_ruang" class="input-xlarge" name="nama_ruang" value="<?php echo $nama_ruang ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="level">Level</label>
		<div class="controls">
			<select style="width:285px;" id="level" name="level">
				<option value="<?php echo $data['level'];?>"><?php echo $data['level'];?></option>
				<?php
					$a=1;
					$b=$data['level'];
					while ( $a<= 6 ) 
					{
						if ($a!= $b) 
						{
							echo "<option value=$a>$a</option>";
						}
					$a++;
					}
					
					
					/*
					$query = pg_query("select distinct level from ipb");
					while($data = pg_fetch_array($query))
					{
						echo "<option value=$data[level]>$data[level]</option>";
					}
					*/
				?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="fakultas">Fakultas</label>
		<div class="controls">
			
			<select style="width:285px;" id="fakultas" name="fakultas">
				<?php
				$fak=$data['fakultas'];
				?>
				<option value="<?php echo $fak;?>"><?php echo $fak;?></option>
				<?php

					$query = pg_query("select distinct fakultas from ipb where fakultas != '$fak' ");
					while($data = pg_fetch_array($query))
					{
						//if ($data!=$fak)
						echo "<option value=$data[fakultas]>$data[fakultas]</option>";
						
					}
					
				?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="departemen">Departemen</label>
		<div class="controls">
			<input type="text" id="departemen" class="input-xlarge" name="departemen" value="<?php echo $departemen ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="wing">Wing</label>
		<div class="controls">
			<select style="width:285px;" id="wing" name="wing">
			<?php $dat = pg_fetch_array(pg_query("SELECT * FROM semualevel WHERE gid=".$gid)); ?>
				<option value="<?php echo $dat['wing'];?>"><?php echo $dat['wing'];?></option>			
				<?php
					$a=1;
					$b=$data['wing'];
					while ( $a<= 20 ) 
					{
						if ($a!= $b) 
							echo "<option value=$a>$a</option>";
					$a++;
					}
					
				?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="geom">Geometri</label>
		<div class="controls">
			<textarea style="width:270px; height:120px;" id="geom" name="geom"><?php echo $geom ?></textarea>
		</div>
	</div>
</form>


