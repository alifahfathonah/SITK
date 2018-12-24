<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		User
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
					<i class="fa fa-user"></i>
					<a href="<?php echo site_url('user') ?>">User</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->

		<div id="show_notif">
			 
		</div>

		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE TABLE PORTLET-->
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<button class="btn btn-default" onclick="tambahUser()"><i class="fa fa-plus"></i> Tambah Data User</button>
						</div>
					</div>
					
					<input type="hidden" name="username_session" value="<?php echo $this->session->username ?>">

					<div class="portlet-body flip-scroll">
						<table id="table" class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th width="5%"><center>No.</center></th>
								<th width="20%"><center>Username</center></th>
								<th width="30%"><center>Nama User</center></th>
								<th width="20%"><center>Email</center></th>
								<th width="30%"><center>Action</center></th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<!-- END SAMPLE TABLE PORTLET-->
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>
<!-- END CONTENT -->

<!-- Modal -->
<div class="modal fade" id="ModaltambahUser" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				

				<div class="portlet-body form">
					<form id="form" class="form-horizontal">
						<div class="form-body">				
						
							<div class="form-group">
								<label><b>Username</b></label>
								<input type="text" name="username" placeholder="Username" class="form-control">
								<span class="help-block" style="color: red" id="val_username">* Harus Diisi</span>
							</div>

							<div class="form-group">
								<label><b>Nama User</b></label>
								<input type="text" name="nm_user" placeholder="Nama User" class="form-control">
								<span class="help-block" style="color: red" id="val_nm_user">* Harus Diisi</span>
							</div>

							<div class="form-group">
								<label><b>Email</b></label>
								<input type="email" name="email" placeholder="Email" class="form-control">
								<span class="help-block" style="color: red" id="val_email">* Harus Diisi</span>
							</div>

							<div class="form-group">
								<label><b>Password</b></label>
								<input type="password" name="password" placeholder="Password" class="form-control">
								<span class="help-block" style="color: red" id="val_password">* Harus Diisi</span>
							</div>

							<div class="form-group">
								<label><b>Ulangi Password</b></label>
								<input type="password" name="repassword" placeholder="Ulangi Password" class="form-control">
								<span class="help-block" style="color: red" id="val_repassword">* Harus Diisi</span>
							</div>

							<div class="form-group">
								<label><b>Nama Guru</b></label>
								<div>
									<select class="form-control" name="id_guru">
										<option value="">-Pilih-</option>
										<?php foreach($guru as $key){ ?>
											<option value="<?php echo $key->id_guru ?>"><?php echo $key->nm_guru ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						
						</div>
					</form>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<button type="button" id="btn_simpan" onclick="simpan()" class="btn blue">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="ModalUpdateUser" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Data User</h4>
			</div>
			<div class="modal-body">
				

				<div class="portlet-body form">
					<form id="form_update" class="form-horizontal">
						<div class="form-body">				
						
							<div class="form-group">
								<label><b>Username</b></label>
								<input type="text" name="username_update" placeholder="Username" class="form-control">
								<span class="help-block" style="color: red" id="val_username_update">* Harus Diisi</span>
							</div>

							<input type="hidden" name="username_tmp">
							<input type="hidden" name="id_user_update">

							<div class="form-group">
								<label><b>Nama User</b></label>
								<input type="text" name="nm_user_update" placeholder="Nama User" class="form-control">
								<span class="help-block" style="color: red" id="val_nm_user_update">* Harus Diisi</span>
							</div>

							<div class="form-group">
								<label><b>Email</b></label>
								<input type="email" name="email_update" placeholder="Email" class="form-control">
								<span class="help-block" style="color: red" id="val_email_update">* Harus Diisi</span>
							</div>

							<div class="form-group" id="pass_hide">
								<label><b>Password</b></label>
								<input type="password" name="password_update" placeholder="Password" class="form-control">
							</div>

							<div class="form-group" id="pass_hide2">
								<label><b>Ulangi Password</b></label>
								<input type="password" name="repassword_update" placeholder="Ulangi Password" class="form-control">
							</div>

							<div class="form-group">
								<label><b>Nama Guru</b></label>
								<div>
									<select class="form-control" name="id_guru_update">
										<option value="">-Pilih-</option>
										<?php foreach($guru as $key){ ?>
											<option value="<?php echo $key->id_guru ?>"><?php echo $key->nm_guru ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						
						</div>
					</form>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<button type="button" id="btn_simpan" onclick="update()" class="btn blue">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function(){
		
	//datatables
	table = $('#table').DataTable({ 
	 
	    "processing": true, //Feature control the processing indicator.
	    "serverSide": true, //Feature control DataTables' server-side processing mode.
	    "order": [], //Initial no order.
	 
	    // Load data for the table's content from an Ajax source
	    "ajax": {
	        "url": "<?php echo site_url('user/user_list')?>",
	        "type": "POST"
	    },
	 
	    //Set column definition initialisation properties.
	    "columnDefs": [
	        { 
	            "targets": [ 0 ], //first column
	            "orderable": false, //set not orderable
	        },
	        { 
	            "targets": [ -1 ], //last column
	            "orderable": false, //set not orderable
	        },
	 
       ],
	 
    });

});

function tambahUser()
{
	$('#val_username').hide();
	$('#val_nm_user').hide(); 
	$('#val_email').hide();
	$('#val_password').hide();
	$('#val_repassword').hide();
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $.ajax({
        type : "GET",
        url  : "<?php echo base_url('user/getKode')?>",
        dataType : "JSON",
        success: function(data){
            $.each(data,function(id_user){
              $('#ModaltambahUser').modal('show');
              $('.modal-title').text('Tambah Data User');
            });
        }
	});
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function simpan()
{
	if($('[name="username"]').val() == "" || $('[name="nm_user"]').val() == "" || $('[name="email"]').val() == "" || $('[name="password"]').val() == "" || $('[name="repassword"]').val() == ""){
    	$('#val_username').show();
    	$('#val_nm_user').show();
    	$('#val_email').show();
    	$('#val_password').show();
    	$('#val_repassword').show();
    	return false;
    }

    if($('[name="password"]').val() != $('[name="repassword"]').val()){
    	alert('Password Tidak Sama');
    	return false;
    }

    $('#btn_simpan').text('saving...'); //change button text
    $('#btn_simpan').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('user/simpan')?>";
    } else {
        url = "<?php echo site_url('user/ubah')?>";
    }

    var username = $('[name="username"]').val();
    $.ajax({
        url : "<?php echo site_url('user/cari') ?>",
        type: "POST",
        data: {username:username},
        dataType: "JSON",
        success: function(data)
        {
        	if(data != null){
			    alert('Username Sudah Ada');
			    $('#btn_simpan').text('save'); //change button text
            	$('#btn_simpan').attr('disabled',false); //set button enable
			    return false;
        	} 

        	//cari email
        	var email = $('[name="email"]').val();
		    $.ajax({
		        url : "<?php echo site_url('user/cari_email') ?>",
		        type: "POST",
		        data: {email:email},
		        dataType: "JSON",
		        success: function(data)
		        {
		        	if(data != null){
					    alert('Email Sudah Ada');
					    $('#btn_simpan').text('save'); //change button text
		            	$('#btn_simpan').attr('disabled',false); //set button enable
					    return false;
		        	} 

		        	var formData = new FormData($('#form')[0]);
				    $.ajax({
				        url : url,
				        type: "POST",
				        data: formData,
				        contentType: false,
				        processData: false,
				        dataType: "JSON",
				        success: function(data)
				        {
				        	$('#ModaltambahUser').modal('hide');
                			reload_table();
                			notif('sukses');
                			$('#btn_simpan').text('save'); //change button text
				            $('#btn_simpan').attr('disabled',false); //set button enable 
				        },
				        error: function (jqXHR, textStatus, errorThrown)
				        {
				            alert('Error Adding / Update Data');
				            notif('gagal');
				            $('#btn_simpan').text('save'); //change button text
				            $('#btn_simpan').attr('disabled',false); //set button enable 
				        }
				    });

		        },
		        error: function (jqXHR, textStatus, errorThrown)
		        {
		            alert('Error Adding / Update Data');
		            notif('gagal');
		            $('#btn_simpan').text('save'); //change button text
		            $('#btn_simpan').attr('disabled',false); //set button enable 
		        }
		    });

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Adding / Update Data');
            notif('gagal');
            $('#btn_simpan').text('save'); //change button text
            $('#btn_simpan').attr('disabled',false); //set button enable 
        }
    });
}

function hapus_user(id)
{
    if(confirm('Anda Yakin Ingin Menghapus Data Ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('user/hapus')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#ModaltambahUser').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Deleting Data');
            }
        });

    }
}

function ubah_user(id)
{
	$('.help-block').hide();
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
   
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('user/edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

        	if(data.username == $('[name="username_session"]').val()){
        		$('#pass_hide').hide();
        		$('#pass_hide2').hide();
        	} else {
        		$('#pass_hide').show();
        		$('#pass_hide2').show();
        	}

            $('#ModalUpdateUser').modal('show'); // show bootstrap modal when complete loaded
        	$('[name="id_user_update"]').val(data.id_user);
        	$('[name="username_update"]').val(data.username);
        	$('[name="username_tmp"]').val(data.username);
        	$('[name="nm_user_update"]').val(data.nm_user);
        	$('[name="email_update"]').val(data.email);
        	$('[name="id_guru_update"]').val(data.id_guru);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
        }
    });
}

function update()
{	
	if($('[name="username_update"]').val() == "" || $('[name="nm_user_update"]').val() == "" || $('[name="email_update"]').val() == ""){
    	$('#val_username_update').show();
    	$('#val_nm_user_update').show();
    	$('#val_email_update').show();
    	return false;
    }

    if($('[name="password_update"]').val() != $('[name="repassword_update"]').val()){
    	alert('Password Tidak Sama');
    	return false;
    }

    $('#btn_simpan').text('saving...'); //change button text
    $('#btn_simpan').attr('disabled',true); //set button disable 
    var url;
    url = "<?php echo site_url('user/ubah')?>";

    var username = $('[name="username_update"]').val();
    var username_tmp = $('[name="username_tmp"]').val();
    $.ajax({
        url : "<?php echo site_url('user/cari') ?>",
        type: "POST",
        data: {username:username},
        dataType: "JSON",
        success: function(data)
        {

   			if(username == username_tmp){
				
   				var formData = new FormData($('#form_update')[0]);
			    $.ajax({
			        url : url,
			        type: "POST",
			        data: formData,
			        contentType: false,
			        processData: false,
			        dataType: "JSON",
			        success: function(data)
			        {
			            $('#ModalUpdateUser').modal('hide');
			            reload_table();
			            notif('sukses');
			            $('#btn_simpan').text('save'); //change button text
			            $('#btn_simpan').attr('disabled',false); //set button enable 
			        },
			        error: function (jqXHR, textStatus, errorThrown)
			        {
			            alert('Error Adding / Update Data');
			            notif('gagal');
			            $('#btn_simpan').text('save'); //change button text
			            $('#btn_simpan').attr('disabled',false); //set button enable 
			        }
			    });

   			} else {
   				$.ajax({
			        url : "<?php echo site_url('user/cari') ?>",
			        type: "POST",
			        data: {username:username},
			        dataType: "JSON",
			        success: function(data)
			        {
			        	if(data != null){
			        		alert('Username Sudah Ada');
			        		return false;
			        	} else {
			        		var formData = new FormData($('#form_update')[0]);
						    $.ajax({
						        url : url,
						        type: "POST",
						        data: formData,
						        contentType: false,
						        processData: false,
						        dataType: "JSON",
						        success: function(data)
						        {
						            $('#ModalUpdateUser').modal('hide');
						            reload_table();
						            notif('sukses');
						            $('#btn_simpan').text('save'); //change button text
						            $('#btn_simpan').attr('disabled',false); //set button enable 
						        },
						        error: function (jqXHR, textStatus, errorThrown)
						        {
						            alert('Error Adding / Update Data');
						            notif('gagal');
						            $('#btn_simpan').text('save'); //change button text
						            $('#btn_simpan').attr('disabled',false); //set button enable 
						        }
						    });
			        	}
			        }
			    });
   			}

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Adding / Update Data');
          	notif('gagal');
            $('#btn_simpan').text('save'); //change button text
            $('#btn_simpan').attr('disabled',false); //set button enable 
        }
    });
}

function notif(status)
{
	var html = '';

    if(status == 'sukses'){
    	var data = "Sukses ! Data Berhasil Disimpan"
    
    	html += 
   		'<div class="note note-success note-bordered">'+
        	'<p>'+data+'</p>'+
       	'</div>';

    } else {
    	var data = "Gagal ! Data Tidak Berhasil Disimpan"
    
    	html += 
   		'<div class="note note-danger note-bordered">'+
        	'<p>'+data+'</p>'+
       	'</div>';
    }
                
        $('#show_notif').html(html);

    window.setTimeout(function() {
	    $(".note-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); });
	    $(".note-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
	}, 3000); 
}

</script>