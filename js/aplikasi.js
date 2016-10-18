(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		
		// deklarasikan variabel
		var gid = 0;
		var main = "semualevel.data.php";
		
		// tampilkan data semualevel dari berkas semualevel.data.php 
		// ke dalam <div id="data-semualevel"></div>
		$("#data-semualevel").load(main);
		
		// ketika tombol ubah/tambah di tekan
		$('.ubah, .tambah').live("click", function(){
			
			var url = "semualevel.form.php";
			// ambil nilai id dari tombol ubah
			gid = this.id;
			
			if(gid != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Ruangan IPB");
			} else {
				// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Data Ruangan IPB");
			}

			$.post(url, {id: gid} ,function(data) {
				// tampilkan semualevel.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});
		
		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "semualevel.input.php";
			// ambil nilai id dari tombol hapus
			gid = this.id;
			
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin menghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: gid} ,function() {
					// tampilkan data semualevel yang sudah di perbaharui
					// ke dalam <div id="data-semualevel"></div>
					$("#data-semualevel").load(main);
				});
			}
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-semualevel").bind("click", function(event) {
			var url = "semualevel.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_nama_ruang = $('input:text[name=nama_ruang]').val();
			var v_level = $('select[name=level]').val();
			var v_fakultas = $('select[name=fakultas]').val();
			var v_departemen = $('input:text[name=departemen]').val();
			var v_wing = $('select[name=wing]').val();
			var v_geom = $('textarea[name=geom]').val();
			
			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {nama_ruang: v_nama_ruang, level: v_level, fakultas: v_fakultas, departemen: v_departemen, wing: v_wing, geom: v_geom, id: gid} ,function() {
				// tampilkan data semualevel yang sudah di perbaharui
				// ke dalam <div id="data-semualevel"></div>
				$("#data-semualevel").load(main);

				// sembunyikan modal dialog
				$('#dialog-semualevel').modal('hide');
				
				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data IPB");
			});
		});
	});
}) (jQuery);
