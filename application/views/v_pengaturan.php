<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Pengaturan
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="icon-wrench"></i>
					<a href="<?php echo site_url('pengaturan') ?>">Pengaturan</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE TABLE PORTLET-->
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
						<h4>Ubah Data Akun</h4>
						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<div class="portlet light">
							<div class="portlet-body form">
								<form id="form">
									<div class="form-body">
										<input type="hidden" id="id" value="<?php echo $this->session->id_user; ?>">
										<input type="hidden" name="username_session" value="<?php echo $this->session->username; ?>">
										<div class="form-group form-md-line-input">
											<input type="text" value="<?php echo $this->session->username; ?>" class="form-control" name="username" id="username" placeholder="Enter Your Username">
											<label for="form_control_1">Username</label>
										</div>
										<div class="form-group form-md-line-input">
											<input type="text" value="<?php echo $this->session->nm_admin; ?>" name="nm_admin" id="nm_admin" class="form-control" placeholder="Enter Your Name">
											<label for="form_control_1">Nama Lengkap</label>
										</div>
										<div class="form-group form-md-line-input">
											<input type="text" value="<?php echo $this->session->email; ?>" name="email" id="email" class="form-control" placeholder="Enter Your Email">
											<label for="form_control_1">Email</label>
										</div>
										<div class="form-group form-md-line-input">
											<input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
											<label for="form_control_1">Password</label>
											<span class="help-block">Kosongkan Password Bila Tidak Ingin Mengubah</span>
										</div>
										<div class="form-group form-md-line-input">
											<input type="password" class="form-control" name="repassword" id="repassword" placeholder="Enter Your Username">
											<label for="form_control_1">Ulangi Password</label>
											<span class="help-block">Kosongkan Password Bila Tidak Ingin Mengubah</span>
										</div>
										
									</div>
									<div class="form-actions noborder">
										<div class="row">
											<div class="col-md-6">
												<a href="<?php echo site_url('dashboard') ?>" type="button" class="btn default btn-block">Cancel</a>
											</div>	
											<div class="col-md-6">
												<button type="button" onclick="simpan()" id="btn_simpan" class="btn blue btn-block">Submit</button>
											</div>
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

    var username_session = $('[name="username_session"]').val();

    $.ajax({
        url : "<?php echo site_url('user/cari') ?>",
        type: "POST",
        data: {username:username},
        dataType: "JSON",
        success: function(data)
        {

        	if(username == username_session){
        		
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

        	} else {
        		if(data != null){
				    alert('Username Sudah Ada');
				    $('#btn_simpan').text('save'); //change button text
	            	$('#btn_simpan').attr('disabled',false); //set button enable
				    return false;
	        	} 

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