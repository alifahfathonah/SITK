<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						 Widget settings form goes here
					</div>
					<div class="modal-footer">
						<button type="button" class="btn blue">Save changes</button>
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Kelas
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
					<i class="fa fa-institution"></i>
					<a href="<?php echo site_url('kelas') ?>">Kelas</a>
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
							<button class="btn btn-default" onclick="tambahKelas()"><i class="fa fa-plus"></i> Tambah Data Kelas</button>
						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<table id="table" class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th width="20%"><center>ID Kelas</center></th>
								<th width="50%"><center>Nama</center></th>
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
<div class="modal fade" id="ModaltambahKelas" tabindex="-1" role="basic" aria-hidden="true">
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
								<label><b>ID Kelas</b></label>
								<input type="text" name="id_kelas" class="form-control" readonly>
							</div>
						
							<div class="form-group">
								<label><b>Nama Kelas</b></label>
								<input type="text" name="nm_kelas" placeholder="Nama Kelas" class="form-control">
								<span class="help-block" style="color: red" id="val_kls">* Harus Diisi</span>
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

$(document).ready(function(){
		
	//datatables
	table = $('#table').DataTable({ 
	 
	    "processing": true, //Feature control the processing indicator.
	    "serverSide": true, //Feature control DataTables' server-side processing mode.
	    "order": [], //Initial no order.
	 
	    // Load data for the table's content from an Ajax source
	    "ajax": {
	        "url": "<?php echo site_url('kelas/kelas_list')?>",
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

function tambahKelas()
{
	$('#val_kls').hide();
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $.ajax({
        type : "GET",
        url  : "<?php echo base_url('kelas/getKode')?>",
        dataType : "JSON",
        success: function(data){
            $.each(data,function(id_kelas){
              $('#ModaltambahKelas').modal('show');
              $('.modal-title').text('Tambah Data Kelas');
              $('[name="id_kelas"]').val(data.id_kelas);
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
	$('#val_kls').hide();
	if($('[name="nm_kelas"]').val() == ""){
    	$('#val_kls').show();
    	return false;
    }

    $('#btn_simpan').text('saving...'); //change button text
    $('#btn_simpan').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('kelas/simpan')?>";
    } else {
        url = "<?php echo site_url('kelas/ubah')?>";
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
            $('#ModaltambahKelas').modal('hide');
            reload_table();
            $('#btn_simpan').text('save'); //change button text
            $('#btn_simpan').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Adding / Update Data');
            $('#btn_simpan').text('save'); //change button text
            $('#btn_simpan').attr('disabled',false); //set button enable 
        }
    });
}

function hapus_kelas(id)
{
    if(confirm('Anda Yakin Ingin Menghapus Data Ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('kelas/hapus')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#ModaltambahKelas').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Deleting Data');
            }
        });

    }
}

function ubah_kelas(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
   
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('kelas/edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_kelas"]').val(data.id_kelas);
            $('[name="nm_kelas"]').val(data.nm_kelas);
            $('#ModaltambahKelas').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Data Kelas'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
        }
    });
}

</script>