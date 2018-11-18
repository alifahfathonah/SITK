<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Pembayaran
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Data Transaksi</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo site_url('pembayaran') ?>">Pembayaran</a>
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
							<button class="btn btn-default" onclick="tambahPembayaran()"><i class="fa fa-plus"></i> Tambah Data Pembayaran</button>
						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<table id="table" class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
								<tr>
									<th width="20%"><center>ID Bayar</center></th>
									<th width="50%"><center>Tanggal Bayar</center></th>
									<th width="50%"><center>Status</center></th>
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
<div class="modal fade" id="ModaltambahPembayaran" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				
				<div class="portlet-body form">
					<form id="form" class="form-horizontal">
						<div class="form-body">				
							<!-- <div class="form-group">
								<label><b>ID Bayar</b></label>
								<input type="text" name="id_bayar" class="form-control" readonly>
							</div> -->

							<div class="form-group">
								<label><b>ID Daftar</b></label>
									<div class="input-group">
										<input type="text" name="id_daftar" placeholder="Input ID Daftar" class="form-control">
										<span class="input-group-btn">
											<button class="btn blue" onclick="Cari()" type="button"><i class="fa fa-search"></i> Search</button>
										</span>
									</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label><b>Nama Siswa</b></label>
										<input type="text" name="nm_lengkap" placeholder="Nama Siswa" class="form-control" readonly>
									</div>

									<div class="col-md-6">
										<label><b>Tahun Ajaran</b></label>
										<input type="text" name="thn_ajar" placeholder="Tahun Ajaran" class="form-control" readonly>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label><b>Ayah Kandung/Tiri/Angkat atau Wali</b></label>
										<input type="text" name="nm_ayah" placeholder="Ayah Kandung/Tiri/Angkat atau Wali" class="form-control" readonly>
									</div>

									<div class="col-md-6">
										<label><b>Ibu Kandung/Tiri/Angkat atau Wali</b></label>
										<input type="text" name="nm_ibu" placeholder="Ayah Kandung/Tiri/Angkat atau Wali" class="form-control" readonly>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label><b>Jenis Pembayaran</b></label>
								<div>
									<select class="form-control" name="id_daftar">
										<?php foreach($jenis_pembayaran as $jenis) { ?>
											<option value="<?php echo $jenis->id_jenis?>"><?php echo $jenis->nm_jenis ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label><b>Jumlah Bayar</b></label>
								<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="nominal_bayar" placeholder="Jumlah Bayar" class="form-control">
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
	        "url": "<?php echo site_url('pembayaran/pembayaran_list')?>",
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

function Cari()
{
	var id_daftar = $('[name="id_daftar"]').val();
	if(id_daftar == ""){
		alert('ID Daftar Tidak Boleh Kosong');
		return false;
	}

	$.ajax({
        url : "<?php echo site_url('pembayaran/id_daftar')?>",
        type: "POST",
        dataType: "JSON",
        data: {id_daftar: id_daftar},
        success: function(data)
        {	

        	if(data == null){
        		alert('Data Tidak Ditemukan');
        		$('[name="nm_lengkap"]').val("");
	        	$('[name="thn_ajar"]').val("");
	        	$('[name="nm_ayah"]').val("");
	        	$('[name="nm_ibu"]').val("");
        		return false;
        	} else {
           		$('[name="nm_lengkap"]').val(data.nm_lengkap);
	        	$('[name="thn_ajar"]').val(data.thn_ajar);
	        	$('[name="nm_ayah"]').val(data.nm_ayah);
	        	$('[name="nm_ibu"]').val(data.nm_ibu);
        	}

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
        }
    });
}

function tambahPembayaran()
{
	save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $.ajax({
        type : "GET",
        url  : "<?php echo base_url('pembayaran/getKode')?>",
        dataType : "JSON",
        success: function(data){
            $.each(data,function(id_bayar){
              $('#ModaltambahPembayaran').modal('show');
              $('.modal-title').text('Tambah Data Pembayaran');
              $('[name="id_bayar"]').val(data.id_bayar);
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
    $('#btn_simpan').text('saving...'); //change button text
    $('#btn_simpan').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('pembayaran/simpan')?>";
    } else {
        url = "<?php echo site_url('pembayaran/ubah')?>";
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
            $('#ModaltambahPembayaran').modal('hide');
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

function hapus_pembayaran(id)
{
    if(confirm('Anda Yakin Ingin Menghapus Data Ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('pembayaran/hapus')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#ModaltambahPembayaran').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Deleting Data');
            }
        });

    }
}

function ubah_pembayaran(id)
{
	save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('pembayaran/edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {	

            $('[name="id_bayar"]').val(data.id_guru);
            $('[name="jml_bayar"]').val(data.nm_guru);
            $('[name="id_daftar"]').val(data.alamat);
            $('#ModaltambahGuru').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Data Pembayaran'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
        }
    });
}

function detail_pembayaran(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('pembayaran/edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
        	// 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
        }
    });
}

</script>