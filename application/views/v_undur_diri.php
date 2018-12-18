<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Pengunduran Diri Murid 
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="fa fa-university"></i>
					<a href="#">Data Kelas</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="fa fa-user"></i>
					<a href="<?php echo site_url('pengunduran_diri') ?>">Pengunduran Diri Murid</a>
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
							<button class="btn btn-default" data-toggle="modal" onclick="tambahSiswa()"><i class="fa fa-plus"></i> Tambah Data Pengunduran</button>

						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<table id="table" class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
								<tr>
									<th width="8%"><center>No.</center></th>
									<th width="15%"><center>Nomor Induk</center></th>
									<th width="20%"><center>Tanggal Pengunduran</center></th>
									<th width="40%"><center>Nama Siswa</center></th>
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
<div class="modal fade" id="ModaltambahSiswa" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Pengunduran</h4>
			</div>
			<div class="modal-body">
				
				<div class="portlet-body form">
					<form id="form_undur" class="form-horizontal">
						<div class="form-body">				
							<!-- <div class="form-group"> -->
								<!-- <label><b>ID Pengunduran</b></label> -->
								<input type="hidden" value="<?php echo $id_undur_diri ?>" name="id_undur_diri" class="form-control" readonly>
							<!-- </div> -->

							<div class="form-group" id="search">
								<label><b>Nomor Induk</b></label>
									<div class="input-group">
										<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="no_induk" placeholder="Input Nomor Induk" class="form-control">
										<span class="input-group-btn">
											<button class="btn blue" id="search" onclick="Cari()" type="button"><i class="fa fa-search"></i> Search</button>
										</span>
									</div>
							</div>
						
							<input type="hidden" name="no_induk_id">

							<div class="form-group">
								<label><b>Nama Siswa</b></label>
								<input type="text" name="nm_siswa" placeholder="Nama Siswa" readonly class="form-control">
							</div>	

							<div class="form-group">
								<label><b>Alasan</b></label>
								<textarea class="form-control" rows="4" cols="5" name="alasan" width="800px" placeholder="Alasan..."></textarea>
							</div>
						</div>
					
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<button type="button" onclick="simpan()" id="btn_simpan" class="btn blue">Save</button>
			</div>
		
		</div>
		<!-- /.modal-content -->
		</form>
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Detail-->
<div class="modal fade" id="ModalDetailSiswa" tabindex="-1" role="basic" aria-hidden="true">
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
			                 		<td width="120px">Nomor Induk</td>
			                  		<td width="20px">:</td>
			                  		<td><b><span id="no_induk_detail"></span></b></td>
			                	</tr>
			                	<tr>
			                  		<td>Nama Siswa</td>
			                  		<td>:</td>
			                  		<td><span id="nm_siswa_detail"></span></td>
			                	</tr>
			                	<tr>
			                  		<td>Tanggal Lahir</td>
			                  		<td>:</td>
			                  		<td><span id="tgl_lahir_detail"></span></td>
			                	</tr>
			                	<tr>
			                  		<td>Umur</td>
			                  		<td>:</td>
			                  		<td><span id="umur_detail"></span></td>
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
			                  		<td>Alasan</td>
			                  		<td>:</td>
			                  		<td><span id="alasan_detail"></span></td>
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

$(document).ready(function(){
	
	//datatables
	table = $('#table').DataTable({ 
	 
	    "processing": true, //Feature control the processing indicator.
	    "serverSide": true, //Feature control DataTables' server-side processing mode.
	    "order": [], //Initial no order.
	 
	    // Load data for the table's content from an Ajax source
	    "ajax": {
	        "url": "<?php echo site_url('pengunduran_diri/undur_list')?>",
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


function tambahSiswa()
{
	$('#form_undur')[0].reset(); // reset form on modals
	$('#ModaltambahSiswa').modal('show');
    $('#btn_simpan').attr('disabled',true); //set button enable 	
}

function Cari()
{
	var no_induk = $('[name="no_induk"]').val();
	if(no_induk == ""){
		alert('ID Daftar Tidak Boleh Kosong');
		return false;
	}

	$.ajax({
        url : "<?php echo site_url('pengunduran_diri/no_induk')?>",
        type: "POST",
        dataType: "JSON",
        data: {no_induk: no_induk},
        success: function(data)
        {	

        	if(data == null){
        		alert('Data Tidak Ditemukan');
        		$('[name="nm_siswa"]').val("");
	        	$('#btn_simpan').attr('disabled',true); //set button enable
        		return false;
        	} else {
        		$('[name="no_induk_id"]').val(data.no_induk);
           		$('[name="nm_siswa"]').val(data.nm_siswa);
	        	$('#btn_simpan').attr('disabled',false); //set button enable
        	}

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
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

    var no_induk = $('[name="no_induk_id"]').val();
    var nm_siswa = $('[name="nm_siswa"]').val();
    var alasan = $('[name="alasan"]').val();

    // ajax adding data to database
    $.ajax({
        url : "<?php echo site_url('pengunduran_diri/simpan')?>",
        type: "POST",
        data: {no_induk:no_induk, nm_siswa:nm_siswa,alasan:alasan},
        dataType: "JSON",
        success: function(data)
        {	
        	$('#ModaltambahSiswa').modal('hide');
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

function detail_siswa(id)
{
    $('#form')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('pengunduran_diri/detail')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#no_induk_detail').text(data.no_induk);
            $('#nm_siswa_detail').text(data.nm_siswa);
            $('#umur_detail').text(data.umur+' Tahun');
            $('#tgl_lahir_detail').text(data.tgl_lahir);
            $('#jenis_kelamin_detail').text(data.jenis_kelamin);
            $('#no_telp_detail').text(data.no_telp);
            $('#alamat_detail').text(data.alamat);
            $('#alasan_detail').text(data.alasan);
            $('#ModalDetailSiswa').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail Data Siswa'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
        }
    });
}
</script>