<form method="POST">
	<div class="form-row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="alert alert-warning"><i class="icon icon-warning"></i> Saya tidak bertanggung jawab jika data disalah gunakan untuk kegiatan yang tidak benar !</div>
			</div>		
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Provinsi :</label>
				<select name="provinsi" class="form-control" required="">
					<option value="" disabled selected>Pilih</option>
					<option data-value="11" value='Aceh'>Aceh</option>
					<option data-value="12" value='Sumatera Utara'>Sumatera Utara</option>
					<option data-value="13" value='Sumatera Barat'>Sumatera Barat</option>
					<option data-value="14" value='Riau'>Riau</option>
					<option data-value="15" value='Jambi'>Jambi</option>
					<option data-value="16" value='Sumatera Selatan'>Sumatera Selatan</option>
					<option data-value="17" value='Bengkulu'>Bengkulu</option>
					<option data-value="18" value='Lampung'>Lampung</option>
					<option data-value="19" value='Kep. Bangka Belitung'>Kep. Bangka Belitung</option>
					<option data-value="21" value='Kep. Riau'>Kep. Riau</option>
					<option data-value="31" value='DKI Jakarta'>DKI Jakarta</option>
					<option data-value="32" value='Jawa Barat'>Jawa Barat</option>
					<option data-value="33" value='Jawa Tengah'>Jawa Tengah</option>
					<option data-value="34" value='Yogyakarta'>Yogyakarta</option>
					<option data-value="35" value='Jawa Timur'>Jawa Timur</option>
					<option data-value="36" value='Banten'>Banten</option>
					<option data-value="51" value='Bali'>Bali</option>
					<option data-value="52" value='Nusa Tenggara Barat'>Nusa Tenggara Barat</option>
					<option data-value="53" value='Nusa Tenggara Timur'>Nusa Tenggara Timur</option>
					<option data-value="61" value='Kalimantan Barat'>Kalimantan Barat</option>
					<option data-value="62" value='Kalimantan Tengah'>Kalimantan Tengah</option>
					<option data-value="63" value='Kalimantan Selatan'>Kalimantan Selatan</option>
					<option data-value="64" value='Kalimantan Timur'>Kalimantan Timur</option>
					<option data-value="71" value='Sulawesi Utara'>Sulawesi Utara</option>
					<option data-value="72" value='Sulawesi Tengah'>Sulawesi Tengah</option>
					<option data-value="73" value='Sulawesi Selatan'>Sulawesi Selatan</option>
					<option data-value="74" value='Sulawesi Tenggara'>Sulawesi Tenggara</option>
					<option data-value="75" value='Gorontalo'>Gorontalo</option>
					<option data-value="76" value='Sulawesi Barat'>Sulawesi Barat</option>
					<option data-value="81" value='Maluku'>Maluku</option>
					<option data-value="82" value='Maluku Utara'>Maluku Utara</option>
					<option data-value="91" value='Papua Barat'>Papua Barat</option>
					<option data-value="94" value='Papua'>Papua</option>
				</select>
				<input type="hidden" name="kabupaten">
			</div>
			<script type="text/javascript">
				$('select[name="provinsi"]').change(function(){					
					var element = $(this).find('option:selected'); 
					var dataval = element.attr("data-value"); 
					$.ajax({
						type: 'post',
						data: {'provinsi': dataval},
						url: 'nik',
						dataType: 'json',
						success: function(result){
							$('input[name="kabupaten"]').val(result.kabupaten);

							$('input[name="nik"]').val(result.nik);
							$('input[name="nama"]').val(result.nama);
							$('input[name="ttl"]').val(result.ttl);
							$('input[name="jk"]').val(result.jk);

							$('input[name="alamat"]').val(result.alamat);
							$('input[name="alamat_rwrt"]').val(result.alamat_rwrt);
							$('input[name="alamat_kel"]').val(result.alamat_kel);
							$('input[name="alamat_kec"]').val(result.alamat_kec);

							$('input[name="agama"]').val(result.agama);
							$('input[name="status_kwn"]').val(result.status_kwn);
							$('input[name="pekerjaan"]').val(result.pekerjaan);
							$('input[name="kewarganegaraan"]').val(result.kewarganegaraan);
						},
						error: function(result){
							alert('Request Status: ' + result.status + ' Status Text: ' + result.statusText + ' ' + result.responseText);
						}
					});
				});
			</script>
			<div class="form-group">
				<label>NIK :</label>
				<input onClick="this.select();" class="form-control" type="text" name="nik">
			</div>
			<div class="form-group">
				<label>Nama :</label>
				<input onClick="this.select();" class="form-control" type="text" name="nama">
			</div>
			<div class="form-group">
				<label>Tempat, Tanggal Lahir :</label>
				<input onClick="this.select();" class="form-control" type="text" name="ttl">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin :</label>
				<input onClick="this.select();" class="form-control" type="text" name="jk">
			</div>
			<div class="form-group">
				<label>Alamat :</label>
				<input onClick="this.select();" class="form-control" type="text" name="alamat">
			</div>	
			<div class="form-group">
				<label>RT/TW :</label>
				<input onClick="this.select();" class="form-control" type="text" name="alamat_rwrt">
			</div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Agama :</label>
				<input onClick="this.select();" class="form-control" type="text" name="agama">
			</div>
			<div class="form-group">
				<label>Status Perkawinan :</label>
				<input onClick="this.select();" class="form-control" type="text" name="status_kwn">
			</div>
			<div class="form-group">
				<label>Pekerjaan :</label>
				<input onClick="this.select();" class="form-control" type="text" name="pekerjaan">
			</div>
			<div class="form-group">
				<label>Kewarganegaraan :</label>
				<input onClick="this.select();" class="form-control" type="text" name="kewarganegaraan">
			</div>		
			<div class="form-group">
				<label>Foto : (insert URL with Size 160x210)</label>
				<input onClick="this.select();" class="form-control" type="url" value="" name="background">
			</div>
			<div class="form-group">
				<label>Kel/Desa :</label>
				<input onClick="this.select();" class="form-control" type="text" name="alamat_kel">
			</div>	
			<div class="form-group">
				<label>Kecamatan :</label>
				<input onClick="this.select();" class="form-control" type="text" name="alamat_kec">
			</div>	
		</div>
		<div class="form-group col-md-4">		
			<?php if (empty($_POST)): ?>
				<label>Preview :</label>
			<?php endif ?>
			<?php  include "execute.php";?>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label>Kode (menghilangkan watermark) :</label>
				<input onClick="this.select();" class="form-control" type="text" name="kode">
			</div>	
			<div class="form-group">
				<input class="waves-effect btn btn-primary" type="submit" value="Create" name="execute">
			</div>
		</div>
	</div>
</form>