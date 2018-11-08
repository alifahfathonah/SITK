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
					<a href="#">Data Master</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo site_url('calon_siswa') ?>">Calon Siswa</a>
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
								<form id="form">
									<div class="row">

										<div class="col-md-6">
										
											<div class="form-body">
												<div class="form-group form-md-line-input">
													<input type="text" class="form-control" placeholder="Input Nama Lengkap">
													<label for="form_control_1">Nama Lengkap</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="text" class="form-control" placeholder="Input Nama Panggilan">
													<label for="form_control_1">Nama Panggilan</label>
												</div>
												<div class="form-group form-md-line-input has-info">
													<select class="form-control" id="form_control_1">
														<option>-pilih-</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
													<label for="form_control_1">Dropdown sample</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="text" class="form-control" placeholder="Input Tempat Lahir">
													<label for="form_control_1">Tempat Lahir</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="date" class="form-control" placeholder="Input Tanggal Lahir">
													<label for="form_control_1">Tanggal Lahir</label>
												</div>
												<div class="form-group form-md-line-input">
													<textarea class="form-control" rows="4" cols="5" placeholder="Input Alamat..."></textarea>
													<label for="form_control_1">Alamat</label>
												</div>
											</div>
						
										</div>
									
										<div class="col-md-6">
											<div class="form-body">
												<div class="form-group form-md-line-input">
													<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Nomor Telepon">
													<label for="form_control_1">Nomor Telepon</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Anak Keberapa">
													<label for="form_control_1">Anak Keberapa</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Jumlah Saudara">
													<label for="form_control_1">Jumlah Saudara</label>
												</div>
												<div class="form-group form-md-line-input has-info">
													<select class="form-control">
														<option>-pilih-</option>
														<option value="Kandung">Kandung</option>
														<option value="Yatim">Yatim</option>
														<option value="Piatu">Piatu</option>
														<option value="Yatim Piatu">Yatim Piatu</option>
													</select>
													<label for="form_control_1">Status Anak</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="password" class="form-control" placeholder="Input Warga Negara">
													<label for="form_control_1">Warga Negara</label>
												</div>
												<div class="form-group form-md-line-input">
													<input type="text" class="form-control" placeholder="Input Agama">
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
																			<input type="text" class="form-control" placeholder="Input Nama Lengkap">
																			<label for="form_control_1">Nama Lengkap</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" class="form-control" placeholder="Input Tempat Lahir">
																			<label for="form_control_1">Tempat Lahir</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="date" class="form-control" placeholder="Input Tanggal Lahir">
																			<label for="form_control_1">Tanggal Lahir</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" class="form-control" placeholder="Input Agama">
																			<label for="form_control_1">Agama</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" class="form-control" placeholder="Input Tempat Lahir">
																			<label for="form_control_1">Pendidikan Tertinggi</label>
																		</div>

																		<div class="form-group form-md-checkboxes">
																			<label>Pekerjaan</label>
																			<div class="md-checkbox-inline">
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox1" class="md-check">
																					<label for="checkbox6">
																					<span></span>	
																					<span class="check"></span>
																					<span class="box"></span>
																					Karyawan</label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox2" class="md-check">
																					<label for="checkbox7">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					Swasta </label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox3" class="md-check">
																					<label for="checkbox8">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					PNS </label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox4" class="md-check">
																					<label for="checkbox8">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					Wiraswasta </label>
																				</div>
																			</div>
																		</div>

																		<br>

																		<div class="form-group form-md-checkboxes">
																			<label>Penghasilan</label>
																			<div class="md-checkbox-inline">
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox5" class="md-check">
																					<label for="checkbox6">
																					<span></span>	
																					<span class="check"></span>
																					<span class="box"></span>
																					1 - 2 Juta</label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox6" class="md-check">
																					<label for="checkbox7">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					>2 - 3 Juta </label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox7" class="md-check">
																					<label for="checkbox8">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					>3 - 5 Juta </label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox8" class="md-check">
																					<label for="checkbox8">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					>5 Juta </label>
																				</div>
																			</div>
																		</div>

																		<br>

																		<div class="form-group form-md-line-input">
																			<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Nomor Telepon">
																			<label for="form_control_1">Nomor Telepon</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<textarea class="form-control" rows="4" cols="5" placeholder="Input Alamat..."></textarea>
																			<label for="form_control_1">Alamat</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<textarea class="form-control" rows="4" cols="5" placeholder="Input Alamat Kantor..."></textarea>
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
																			<input type="text" class="form-control" placeholder="Input Nama Lengkap">
																			<label for="form_control_1">Nama Lengkap</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" class="form-control" placeholder="Input Tempat Lahir">
																			<label for="form_control_1">Tempat Lahir</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="date" class="form-control" placeholder="Input Tanggal Lahir">
																			<label for="form_control_1">Tanggal Lahir</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" class="form-control" placeholder="Input Agama">
																			<label for="form_control_1">Agama</label>
																		</div>
																		<div class="form-group form-md-line-input">
																			<input type="text" class="form-control" placeholder="Input Tempat Lahir">
																			<label for="form_control_1">Pendidikan Tertinggi</label>
																		</div>

																		<div class="form-group form-md-checkboxes">
																			<label>Pekerjaan</label>
																			<div class="md-checkbox-inline">
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox1" class="md-check">
																					<label for="checkbox6">
																					<span></span>	
																					<span class="check"></span>
																					<span class="box"></span>
																					Ibu rumah tangga</label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox2" class="md-check">
																					<label for="checkbox7">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					Swasta </label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox3" class="md-check">
																					<label for="checkbox8">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					PNS </label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox4" class="md-check">
																					<label for="checkbox8">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					Wiraswasta </label>
																				</div>
																			</div>
																		</div>

																		<br>

																		<div class="form-group form-md-checkboxes">
																			<label>Penghasilan</label>
																			<div class="md-checkbox-inline">
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox5" class="md-check">
																					<label for="checkbox6">
																					<span></span>	
																					<span class="check"></span>
																					<span class="box"></span>
																					1 - 2 Juta</label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox6" class="md-check">
																					<label for="checkbox7">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					>2 - 3 Juta </label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox7" class="md-check">
																					<label for="checkbox8">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					>3 - 5 Juta </label>
																				</div>
																				<div class="md-checkbox">
																					<input type="checkbox" id="checkbox8" class="md-check">
																					<label for="checkbox8">
																					<span></span>
																					<span class="check"></span>
																					<span class="box"></span>
																					>5 Juta </label>
																				</div>
																			</div>
																		</div>

																		<br>

																		<div class="form-group form-md-line-input">
																			<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Input Nomor Telepon">
																			<label for="form_control_1">Nomor Telepon</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<textarea class="form-control" rows="4" cols="5" placeholder="Input Alamat..."></textarea>
																			<label for="form_control_1">Alamat</label>
																		</div>

																		<div class="form-group form-md-line-input">
																			<textarea class="form-control" rows="4" cols="5" placeholder="Input Alamat Kantor..."></textarea>
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
											<button type="button" class="btn default btn-block">Kembali</button>
										</div>
										<div class="col-md-6">
											<button type="button" id="btn_simpan" onclick="simpan()" class="btn blue btn-block">Save</button>
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
	
<script type="text/javascript">

var save_method; //for save method string
var base_url = '<?php echo base_url();?>';
	
function simpan()
{
    $('#btn_simpan').text('saving...'); //change button text
    $('#btn_simpan').attr('disabled',true); //set button disable 

    var password = $('#password').val();
    var repassword = $('#repassword').val();

    if(password != repassword){
    	alert('Password Tidak Sama');
    	$('#password').val("");
    	$('#repassword').val("");
    	$('#btn_simpan').text('save'); //change button text
        $('#btn_simpan').attr('disabled',false); //set button enable    
    	return false;
    }

    // ajax adding data to database

    var username = $('#username').val();
    var nm_admin = $('#nm_admin').val();
    var email = $('#email').val();
    var id_admin = $('#id').val();

    $.ajax({
        url : "<?php echo site_url('pengaturan/ubah')?>",
        type: "POST",
        data: {username:username, nm_admin:nm_admin, email:email, password:password, id_admin:id_admin},
        dataType: "JSON",
        success: function(data)
        {
            $('#btn_simpan').text('save'); //change button text
            $('#btn_simpan').attr('disabled',false); //set button enable 
            alert("Data Berhasi Diubah");
            window.location.href = "<?php echo site_url('login/logout') ?>";
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Adding / Update Data');
            $('#btn_simpan').text('save'); //change button text
            $('#btn_simpan').attr('disabled',false); //set button enable 
        }
    });
}

</script>