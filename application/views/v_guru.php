<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Guru
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
					<i class="fa fa-graduation-cap"></i>
					<a href="<?php echo site_url('guru') ?>">Guru</a>
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
							<button class="btn btn-default" onclick="tambahGuru()"><i class="fa fa-plus"></i> Tambah Data Guru</button>

						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<table id="table" class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
								<tr>
									<th width="5%"><center>No.</center></th>
									<th width="15%"><center>ID Guru</center></th>
									<th width="50%"><center>Nama Guru</center></th>
									<th width="40%"><center>Action</center></th>
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
<div class="modal fade" id="ModaltambahGuru" tabindex="-1" role="basic" aria-hidden="true">
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
								<label><b>ID Guru</b></label>
								<input type="text" name="id_guru" class="form-control" readonly>
							</div>
					
							<div class="form-group">
								<label><b>Nama Guru</b></label>
								<input type="text" name="nm_guru" placeholder="Nama Guru" class="form-control">
								<span class="help-block" style="color: red" id="val_nm">* Harus Diisi</span>
							</div>	

							<div class="form-group">
								<label><b>Tanggal Lahir</b></label>
								<input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control">
								<span class="help-block" style="color: red" id="val_lahir">* Harus Diisi</span>
							</div>	

							<div class="form-group">
								<label><b>Jenis Kelamin</b></label>
								<div>
									<select class="form-control" name="jenis_kelamin">
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label><b>Nomor Telepon</b></label>
								<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="no_telp" placeholder="Nomor Telepon" class="form-control">
								<span class="help-block" style="color: red" id="val_telp">* Harus Diisi</span>
							</div>

							<div class="form-group">
								<label><b>Alamat</b></label>
								<textarea class="form-control" rows="4" cols="5" name="alamat" width="800px" placeholder="Alamat..."></textarea>
								<span class="help-block" style="color: red" id="val_alamat">* Harus Diisi</span>
							</div>

							<div class="form-group" id="id_status_guru">
								<label><b>Status Mengajar</b></label>
								<div>
									<select class="form-control" name="status_guru">
										<option value="1">Aktif</option>
										<option value="0">Tidak Aktif</option>
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

<!-- Modal Detail-->
<div class="modal fade" id="ModalDetailGuru" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				
				<div class="portlet-body form">
					<form id="form" class="form-horizontal">
						<table class="table table-responsive table-bordered" border="0">
			            	<tbody>
			            		<tr>
			                 		<td width="120px">ID Guru</td>
			                  		<td width="20px">:</td>
			                  		<td><b><span id="id_guru_detail"></span></b></td>
			                	</tr>
			                	<tr>
			                  		<td>Nama Guru</td>
			                  		<td>:</td>
			                  		<td><span id="nm_guru_detail"></span></td>
			                	</tr>
			                	<tr>
			                  		<td>Tanggal Lahir</td>
			                  		<td>:</td>
			                  		<td><span id="tgl_lahir_detail"></span></td>
			                	</tr>
			                	<tr>
			                  		<td>Jenis Kelamin</td>
			                  		<td>:</td>
			                  		<td><span id="jenis_kelamin_detail"></span></td>
			                	</tr>
			                 	<tr>
			                  		<td>Nomor Telepon</td>
			                  		<td>:</td>
			                  		<td><span id="no_telp_detail"></span></td>
			                	</tr>
			                 	<tr>
			                  		<td>Alamat</td>
			                  		<td>:</td>
			                  		<td><span id="alamat_detail"></span></td>
			                	</tr> 
			                	<tr>
			                  		<td>Status</td>
			                  		<td>:</td>
			                  		<td><span id="status_guru"></span></td>
			                	</tr> 
			              </tbody>
			            </table>
					</form>
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
			</div>
		
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal detail -->
	
<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
$('.help-block').hide();
$(document).ready(function(){
	
	//datatables
	table = $('#table').DataTable({ 
	 
	    "processing": true, //Feature control the processing indicator.
	    "serverSide": true, //Feature control DataTables' server-side processing mode.
	    "order": [], //Initial no order.
	 
	    // Load data for the table's content from an Ajax source
	    "ajax": {
	        "url": "<?php echo site_url('guru/guru_list')?>",
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

function tambahGuru()
{
	save_method = 'add';
	$('#id_status_guru').hide();
    $('#form')[0].reset(); // reset form on modals
    $.ajax({
        type : "GET",
        url  : "<?php echo base_url('guru/getKode')?>",
        dataType : "JSON",
        success: function(data){
            $.each(data,function(id_guru){
              $('#ModaltambahGuru').modal('show');
              $('.modal-title').text('Tambah Data Guru');
              $('[name="id_guru"]').val(data.id_guru);
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
	if($('[name="nm_guru"]').val() == ""){
    	$('#val_nm').show();
    	return false;
    }

    if($('[name="tgl_lahir"]').val() == ""){
    	$('#val_lahir').show();
    	return false;
    }

    if($('[name="no_telp"]').val() == ""){
    	$('#val_telp').show();
    	return false;
    }

    $('#btn_simpan').text('saving...'); //change button text
    $('#btn_simpan').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('guru/simpan')?>";
    } else {
        url = "<?php echo site_url('guru/ubah')?>";
    }
    // ajax adding data to database
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
        	$('#id_status_guru').hide();
            $('#ModaltambahGuru').modal('hide');
            reload_table();
            $('#val_nm').hide();
            $('#val_lahir').hide();
            $('#val_telp').hide();
            $('#btn_simpan').text('save'); //change button text
            $('#btn_simpan').attr('disabled',false); //set button enable
            notif('sukses');
            setTimeout(function() {
              swal("Berhasil Disimpan", "", "success");
            }, 600); 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Adding / Update Data');
            notif('gagal');
            $('#val_nm').hide();
            $('#val_lahir').hide();
            $('#val_telp').hide();
            $('#btn_simpan').text('save'); //change button text
            $('#btn_simpan').attr('disabled',false); //set button enable 
        }
    });
}

function hapus_guru(id)
{
    if(confirm('Anda Yakin Ingin Menghapus Data Ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('guru/hapus')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#ModaltambahGuru').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Deleting Data');
            }
        });

    }
}

function ubah_guru(id)
{
	save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('guru/edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {	
        	$('#id_status_guru').show();
            $('[name="id_guru"]').val(data.id_guru);
            $('[name="nm_guru"]').val(data.nm_guru);
            $('[name="tgl_lahir"]').val(data.tgl_lahir); 
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="no_telp"]').val(data.no_telp);
            $('[name="alamat"]').val(data.alamat);
            $('[name="status_guru"]').val(data.status_guru);
            $('#ModaltambahGuru').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Data Guru'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
            $('#id_status_guru').hide();
        }
    });
}

function detail_guru(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('guru/detail')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#id_guru_detail').text(data.id_guru);
            $('#nm_guru_detail').text(data.nm_guru);
            $('#tgl_lahir_detail').text(data.tgl_lahir);
            $('#jenis_kelamin_detail').text(data.jenis_kelamin);
            $('#no_telp_detail').text(data.no_telp);
            $('#alamat_detail').text(data.alamat);

            if(data.status_guru == '1'){
            	$('#status_guru').text("Aktif"); 
            } else {
            	$('#status_guru').text("Tidak Aktif");
            }

            $('#ModalDetailGuru').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail Data Guru'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
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