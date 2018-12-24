<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Calon Siswa
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="fa fa-database"></i>
					<a href="#">Data Master</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="fa fa-users"></i>
					<a href="<?php echo site_url('calon_siswa') ?>">Penerimaan Murid Baru</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="fa fa-plus"></i>
					<a href="<?php echo site_url('calon_siswa/tambah_calon') ?>">Tambah Calon Siswa</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE TABLE PORTLET-->
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
						<h4><i class="fa fa-users"></i> Data Calon Siswa</h4>
						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<div class="portlet light">
							<div class="portlet-body form">
								<form method="POST" action="<?php echo site_url('calon_siswa/simpan') ?>" >
									<div class="row">

										<div class="col-md-6">
										
											<div class="form-body">
												

												<div class="row">
													<div class="col-md-5">
														<div class="form-group form-md-line-input">
															<input type="text" id="datepicker1" name="thn_ajar1" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Input Tahun Ajaran" required>
															<label for="form_control_1">Tahun Ajaran</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group form-md-line-input">
															<label for="form_control_1"><b>/</b></label>
														</div>
													</div>
													<div class="col-md-5">
														<div class="form-group form-md-line-input">
															<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="datepicker2" required name="thn_ajar2" class="form-control" placeholder="Input Tahun Ajaran">
														</div>
													</div>
												</div>
												
												<div class="form-group form-md-line-input">
													<input type="text" name="id_formulir" class="form-control" placeholder="Nomor Kwitansi Formulir (Optional)">
													<label for="form_control_1">Nomor Kwitansi Formulir</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="text" name="nm_lengkap" class="form-control" placeholder="Input Nama Lengkap">
													<label for="form_control_1">Nama Lengkap</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="text" name="nm_panggilan" class="form-control" placeholder="Input Nama Panggilan">
													<label for="form_control_1">Nama Panggilan</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="text" name="tempat_lahir" class="form-control" placeholder="Input Tempat Lahir">
													<label for="form_control_1">Tempat Lahir</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="date" name="tgl_lahir" class="form-control" placeholder="Input Tanggal Lahir">
													<label for="form_control_1">Tanggal Lahir</label>
												</div>
												<div class="form-group form-md-line-input">
													<textarea class="form-control" name="alamat" rows="4" cols="5" placeholder="Input Alamat..."></textarea>
													<label for="form_control_1">Alamat</label>
												</div>
											</div>
						
										</div>
									
										<div class="col-md-6">
											<div class="form-body">
												<div class="form-group form-md-line-input">
													<input type="text" name="no_telp" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Nomor Telepon">
													<label for="form_control_1">Nomor Telepon</label>
												</div>
												<div class="form-group form-md-line-input has-info">
													<select name="jenis_kelamin" class="form-control" id="form_control_1">
														<option value="">-pilih-</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
													<label for="form_control_1">Jenis Kelamin</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="number" name="anak_ke" min="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Anak Keberapa">
													<label for="form_control_1">Anak Keberapa</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="number" name="jml_saudara" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Jumlah Saudara">
													<label for="form_control_1">Jumlah Saudara</label>
												</div>
												<div class="form-group form-md-line-input has-info">
													<select name="status_kandung" class="form-control">
														<option value="">-pilih-</option>
														<option value="Kandung">Kandung</option>
														<option value="Yatim">Yatim</option>
														<option value="Piatu">Piatu</option>
														<option value="Yatim Piatu">Yatim Piatu</option>
													</select>
													<label for="form_control_1">Status Anak</label>
												</div>
												<div class="form-group form-md-line-input">
													<input name="warga_negara" type="text" class="form-control" placeholder="Input Warga Negara">
													<label for="form_control_1">Warga Negara</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="text" name="agama" class="form-control" placeholder="Input Agama">
													<label for="form_control_1">Agama</label>
												</div>
											</div>
										</div>

									</div>
									
									<hr>

									<div class="row">
										<div class="col-md-6">
											<!-- BEGIN SAMPLE TABLE PORTLET-->
											<div class="portlet box blue">
												<div class="portlet-title">
													<div class="caption">
													<h4><i class="fa fa-asterisk"></i> Ayah Kandung/Tiri/Angkat atau Wali</h4>
													</div>
												</div>
													
												<div class="portlet-body flip-scroll">
													<div class="portlet light">
														<div class="portlet-body form">
															<div class="row">

																<div class="col-md-12">
																	
																	<div class="form-body">
																		<div class="form-group form-md-line-input">
																			<input name="nm_ayah" type="text" class="form-control" placeholder="Input Nama Lengkap">
																			<label for="form_control_1">Nama Lengkap</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input name="tempat_lahir_ayah" type="text" class="form-control" placeholder="Input Tempat Lahir">
																			<label for="form_control_1">Tempat Lahir</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input name="tgl_lahir_ayah" type="date" class="form-control" placeholder="Input Tanggal Lahir">
																			<label for="form_control_1">Tanggal Lahir</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input name="agama_ayah" type="text" class="form-control" placeholder="Input Agama">
																			<label for="form_control_1">Agama</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input name="pendidikan_ayah" type="text" class="form-control" placeholder="Input Tempat Lahir">
																			<label for="form_control_1">Pendidikan Tertinggi</label>
																		</div>

																		<div class="form-group form-md-line-input has-green">
																			<select name="pekerjaan_ayah" class="form-control">
																				<option value="">-pilih-</option>
																				<option value="Karyawan">Karyawan</option>
																				<option value="Swasta">Swasta</option>
																				<option value="Wiraswasta">Wiraswasta</option>
																				<option value="PNS">PNS</option>
																			</select>
																			<label for="form_control_1">Pekerjaan</label>
																		</div>

																		<div class="form-group form-md-line-input has-green">
																			<select name="penghasilan_ayah" class="form-control">
																				<option value="">-pilih-</option>
																				<option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
																				<option value="> 2.000.000 - 3.000.000">> 2.000.000 - 3.000.000</option>
																				<option value="> 3.000.000 - 5.000.000">> 3.000.000 - 5.000.000</option>
																				<option value="> 5.000.000">> 5.000.000</option>
																			</select>
																			<label for="form_control_1">Penghasilan</label>
																		</div>																		

																		<div class="form-group form-md-line-input">
																			<input type="text" name="no_telp_ayah" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Nomor Telepon">
																			<label for="form_control_1">Nomor Telepon</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<textarea name="alamat_ayah" class="form-control" rows="4" cols="5" placeholder="Input Alamat..."></textarea>
																			<label for="form_control_1">Alamat</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<textarea name="kantor_ayah" class="form-control" rows="4" cols="5" placeholder="Input Alamat Kantor..."></textarea>
																			<label for="form_control_1">Kantor</label>
																		</div>
																	</div>
													
																</div>
															</div>
														</div>
													</div>		
												</div>
											</div>
											<!-- END SAMPLE TABLE PORTLET-->		
										</div>
										<div class="col-md-6">
											<!-- BEGIN SAMPLE TABLE PORTLET-->
											<div class="portlet box blue">
												<div class="portlet-title">
													<div class="caption">
													<h4><i class="fa fa-asterisk"></i> Ibu Kandung/Tiri/Angkat atau Wali</h4>
													</div>
												</div>
													
												<div class="portlet-body flip-scroll">
													<div class="portlet light">
														<div class="portlet-body form">
															<div class="row">

																<div class="col-md-12">
																	
																	<div class="form-body">
																		<div class="form-group form-md-line-input">
																			<input type="text" name="nm_ibu" class="form-control" placeholder="Input Nama Lengkap">
																			<label for="form_control_1">Nama Lengkap</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" name="tempat_lahir_ibu" class="form-control" placeholder="Input Tempat Lahir">
																			<label for="form_control_1">Tempat Lahir</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="date" name="tgl_lahir_ibu" class="form-control" placeholder="Input Tanggal Lahir">
																			<label for="form_control_1">Tanggal Lahir</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" name="agama_ibu" class="form-control" placeholder="Input Agama">
																			<label for="form_control_1">Agama</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" name="pendidikan_ibu" class="form-control" placeholder="Input Tempat Lahir">
																			<label for="form_control_1">Pendidikan Tertinggi</label>
																		</div>

																		<div class="form-group form-md-line-input has-green">
																			<select name="pekerjaan_ibu" class="form-control">
																				<option value="">-pilih-</option>
																				<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
																				<option value="Swasta">Swasta</option>
																				<option value="Wiraswasta">Wiraswasta</option>
																				<option value="PNS">PNS</option>
																			</select>
																			<label for="form_control_1">Pekerjaan</label>
																		</div>

																		<div class="form-group form-md-line-input has-green">
																			<select name="penghasilan_ibu" class="form-control">
																				<option value="">-pilih-</option>
																				<option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
																				<option value="> 2.000.000 - 3.000.000">> 2.000.000 - 3.000.000</option>
																				<option value="> 3.000.000 - 5.000.000">> 3.000.000 - 5.000.000</option>
																				<option value="> 5.000.000">> 5.000.000</option>
																			</select>
																			<label for="form_control_1">Penghasilan</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<input type="text" name="no_telp_ibu" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Nomor Telepon">
																			<label for="form_control_1">Nomor Telepon</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<textarea name="alamat_ibu" class="form-control" rows="4" cols="5" placeholder="Input Alamat..."></textarea>
																			<label for="form_control_1">Alamat</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<textarea name="kantor_ibu" class="form-control" rows="4" cols="5" placeholder="Input Alamat Kantor..."></textarea>
																			<label for="form_control_1">Kantor</label>
																		</div>
																	</div>
													
																</div>
															</div>
														</div>
													</div>		
												</div>
											</div>
											<!-- END SAMPLE TABLE PORTLET-->
										</div>
									</div>

									<hr>

									<div class="row">
										<div class="col-md-6">
											<a href="<?php echo site_url('calon_siswa') ?>" class="btn default btn-block">Kembali</a>
										</div>
										<div class="col-md-6">
											<button type="submit" id="btn_simpan" class="btn blue btn-block">Save</button>
										</div>
									</div>
								
								</form>
							</div>
						</div>		
					</div>
				</div>
				<!-- END SAMPLE TABLE PORTLET-->
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>
<!-- END CONTENT -->
<!-- 
<script type="text/javascript">
function simpan()
{
	$('#btn_simpan').text('saving...'); //change button text
    $('#btn_simpan').attr('disabled',true); //set button disable 
}
</script> -->

<script type="text/javascript">

var currentTime = new Date();
var current_year = currentTime.getFullYear();
var next_year = currentTime.getFullYear()+1;

$('[name="thn_ajar1"]').val(current_year);
$('[name="thn_ajar2"]').val(next_year);
 
</script>