<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Jenis Pembayaran
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
					<i class="fa fa-tags"></i>
					<a href="<?php echo site_url('jenis_pembayaran') ?>">Jenis Pembayaran</a>
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
							<button class="btn btn-default" onclick="tambahJenis()"><i class="fa fa-plus"></i> Tambah Data Jenis Pembayaran</button>

						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<table id="table" class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
								<tr>
									<th width="5%"><center>No. </center></th>
									<th width="20%"><center>ID Jenis Pembayaran</center></th>
									<th width="50%"><center>Nama Jenis Pembayaran</center></th>
									<th width="50%"><center>Action</center></th>
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
<div class="modal fade" id="ModaltambahJenis" tabindex="-1" role="basic" aria-hidden="true">
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
								<label><b>ID Jenis Pembayaran</b></label>
								<input type="text" name="id_jenis" class="form-control" readonly>
							</div>
					
							<div class="form-group">
								<label><b>Nama Jenis Pembayaran</b></label>
								<input type="text" name="nm_jenis" placeholder="Nama Jenis Pembayaran" class="form-control">
								<span class="help-block" style="color: red">&nbsp *Harus Diisi </span>
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
	
<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
$(".help-block").hide();

$(document).ready(function(){
	
	//datatables
	table = $('#table').DataTable({ 
	 
	    "processing": true, //Feature control the processing indicator.
	    "serverSide": true, //Feature control DataTables' server-side processing mode.
	    "order": [], //Initial no order.
	 
	    // Load data for the table's content from an Ajax source
	    "ajax": {
	        "url": "<?php echo site_url('jenis_pembayaran/jenis_list')?>",
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

function tambahJenis()
{
	save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $.ajax({
        type : "GET",
        url  : "<?php echo base_url('jenis_pembayaran/getKode')?>",
        dataType : "JSON",
        success: function(data){
            $.each(data,function(id_jenis){
              $(".help-block").hide();
              $('#ModaltambahJenis').modal('show');
              $('.modal-title').text('Tambah Data Jenis Pembayaran');
              $('[name="id_jenis"]').val(data.id_jenis);
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
	var nm_jenis = $('[name="nm_jenis"]').val();
	if(nm_jenis == ""){
		$(".help-block").show();
		return false;		
	}

    $('#btn_simpan').text('saving...'); //change button text
    $('#btn_simpan').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('jenis_pembayaran/simpan')?>";
    } else {
        url = "<?php echo site_url('jenis_pembayaran/ubah')?>";
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
            $('#ModaltambahJenis').modal('hide');
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

function hapus_jenis(id)
{
    if(confirm('Anda Yakin Ingin Menghapus Data Ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('jenis_pembayaran/hapus')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#ModaltambahJenis').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Deleting Data');
            }
        });

    }
}

function ubah_jenis(id)
{
	save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('jenis_pembayaran/edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {	
        	$(".help-block").hide();
            $('[name="id_jenis"]').val(data.id_jenis);
            $('[name="nm_jenis"]').val(data.nm_jenis);
            $('#ModaltambahJenis').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Data Jenis Pembayaran'); // Set title to Bootstrap modal title
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