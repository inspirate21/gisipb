<?php
// panggil berkas koneksi.php
require 'koneksi.php';



?>

<table id="example" class="table table-condensed table-bordered table-hover" cellpadding="0" cellspacing="0">
<thead>

<!--
	<select class="pull-right" onChange="document.location.href=this.options[this.selectedIndex].value;">

		<option value="0" selected>Semua Level</option>
		<option value="Level1.php">Level 1</option>
		<option value="Level2.php">Level 2</option>
		<option value="Level3.php">Level 3</option>
		<option value="Level4.php">Level 4</option>
		<option value="Level5.php">Level 5</option>
		<option value="Level6.php">Level 6</option>

	</select>
 -->

	<tr>
		<th>#</th>
		<th>Nama Ruang</th>
		<th>Level</th>
		<th>Fakultas</th>
		<th>Departemen</th>
		<th>Wing</th>
	</tr>
</thead>


				<thead>

	
	<th>
		<!-- <input style="width:20px" autocomplete='off' class='filter'  placeholder=' #' data-col='no'/>  -->
	</th>
	<th>
		<input style="width:250px" autocomplete='off' class='filter'  placeholder='                  Nama Ruang' data-col='Nama Ruang'/>
	</th>
	<th>
		<input style="width:50px" autocomplete='off' class='filter'  placeholder='  Level' data-col='level'/>
	</th>
	<th>
		<input style="width:250px" autocomplete='off' class='filter'  placeholder='                     Fakultas' data-col='fakultas'/>
	</th>
	<th>
		<input style="width:120px" autocomplete='off' class='filter'  placeholder='  Departemen' data-col='departemen'/>
	</th>
	<th>
		<input style="width:50px" autocomplete='off' class='filter'  placeholder='  Wing' data-col='wing'/>
	</th>
</thead>


<tbody>
	<?php 
		$i = 1;
		$query = pg_query("select * from semualevel where nama_ruang is not null  order by departemen");
		
		// tampilkan data semualevel selama masih ada
		while($data = pg_fetch_array($query)) {
			
	?>
	<tr>
		<td data-label="No"><?php echo $i;?></td>
						<td data-label="Nama Ruang"><?php echo $data['nama_ruang'];?></td>
						<td data-label="Level"><?php echo $data['level'];?></td>
						<td data-label="Fakultas"><?php echo $data['fakultas'];?></td>
						<td data-label="Departemen"><?php echo $data['departemen'];?></td>
						<td data-label="Wing"><?php echo $data['wing'];?></td>
						
	</tr>
	<?php
		$i++;
		}
	?>
</tbody>
</table>

	  <script>
	  $(document).ready(function() {
		  $('.filter').multifilter();
    $('#example').DataTable();
} );
	  </script>
