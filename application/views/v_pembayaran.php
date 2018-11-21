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
									<th width="15%"><center>ID Bayar</center></th>
									<th width="30%"><center>Status</center></th>
									<th width="100%"><center>Action</center></th>
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
				<h4 class="modal-title">Tambah Data Pembayaran</h4>
			</div>
			<div class="modal-body">
				
				<div class="portlet-body form">
					<form id="form" class="form-horizontal">
						<div class="form-body">				
							<!-- <div class="form-group"> -->
								<!-- <label><b>ID Bayar</b></label> -->
								<input type="hidden" name="id_bayar" class="form-control" readonly>
							<!-- </div> -->

							<div class="form-group" id="search">
								<label><b>ID Daftar</b></label>
									<div class="input-group">
										<input type="text" name="id_daftar" placeholder="Input ID Daftar" class="form-control">
										<span class="input-group-btn">
											<button class="btn blue" id="search" onclick="Cari()" type="button"><i class="fa fa-search"></i> Search</button>
										</span>
									</div>
							</div>

							<div class="form-group" id="id_daftar_edit">
								<label><b>ID Daftar</b></label>
								<input type="text" name="id_daftar_edit" placeholder="ID Daftar" class="form-control" readonly>
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

							<div class="form-group" id="jml_bayar">
								<label><b>Jumlah Sudah Bayar</b></label>
								<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly name="jml_bayar" placeholder="Jumlah Bayar" class="form-control">
							</div>

							<div class="form-group">
								<label><b>Jenis Pembayaran</b></label>
								<div>
									<select class="form-control" name="jenis_pembayaran">
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

<!-- Modal Detail-->
<div class="modal fade" id="ModalDetailPembayaran" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal_title_detail"></h4>
			</div>
			<div class="modal-body">
				
				<div class="portlet-body form">
					<form class="form-horizontal">
						
						<div class="row">
							<div class="col-md-12">
								<table class="table table-responsive table-bordered" border="0">
					            	<tbody>
					            		<tr>
					                 		<td width="120px">ID Pendaftaran</td>
					                  		<td width="20px">:</td>
					                  		<td><b id="id_calon"></b></td>
					                	</tr>
					                	<tr>
					                  		<td>Nama Siswa</td>
					                  		<td>:</td>
					                  		<td id="nm_siswa"></td>
					                	</tr>
					                	<tr>
					                  		<td>Tahun Ajaran</td>
					                  		<td>:</td>
					                  		<td id="thn_ajar"></td>
					                	</tr>
					                	<tr>
					                  		<td>Status</td>
					                  		<td>:</td>
					                  		<td id="status"></td>
					                	</tr>
					              </tbody>
					            </table>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<table class="table table-responsive table-bordered" border="0">
					            	<thead>
					            		<th><center>Tanggal Bayar</center></th>
					            		<th><center>Jumlah Bayar</center></th>
					            	</thead>
					            	<tbody id="show_data">
					            	</tbody>
					            	<tfoot>
					            		<td><center><b>Total</b></center></td>
					            		<td><center><b id="tfoot"></b></center></td>
					            	</tfoot>
					            </table>
							</div>
						</div>
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

$('#search').show();
$('#id_daftar_edit').hide();
$('#jml_bayar').hide();

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
	        	$('#btn_simpan').attr('disabled',true); //set button enable
        		return false;
        	} else {
           		$('[name="nm_lengkap"]').val(data.nm_lengkap);
	        	$('[name="thn_ajar"]').val(data.thn_ajar);
	        	$('[name="nm_ayah"]').val(data.nm_ayah);
	        	$('[name="nm_ibu"]').val(data.nm_ibu);
	        	$('#btn_simpan').attr('disabled',false); //set button enable
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
	$('#btn_simpan').attr('disabled',true); //set button enable
	save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $.ajax({
        type : "GET",
        url  : "<?php echo base_url('pembayaran/getKode')?>",
        dataType : "JSON",
        success: function(data){
            $.each(data,function(id_bayar){
              	$('#search').show();
              	$('#jml_bayar').hide();
              	$('#id_daftar_edit').hide();
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
        	$('[name="id_bayar"]').val(id);
        	$('#search').hide();
        	$('#id_daftar_edit').show();
        	$('[name="id_daftar_edit"]').val(data.id_daftar);
        	$('[name="nm_lengkap"]').val(data.nm_lengkap);
	        $('[name="thn_ajar"]').val(data.thn_ajar);
	       	$('[name="nm_ayah"]').val(data.nm_ayah);
	       	$('[name="nm_ibu"]').val(data.nm_ibu);
	       	$('[name="jenis_pembayaran"]').val(data.id_jenis);
	       	$('#jml_bayar').show();
	       	$('[name="jml_bayar"]').val(data.jml_bayar);
            $('#ModaltambahPembayaran').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Data Pembayaran'+' / '+id); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
        }
    });
}

function cetak_pembayaran(id)
{
	if(confirm('Anda Yakin Ingin Mencetak Pembayaran '+id+' ?'))
    {
    	$.ajax({
	        url : "<?php echo site_url('pembayaran/cetak')?>",
	        type: "POST",
	        data: {id_bayar:id},
	        dataType: "JSON",
	        success: function(data)
	        {
				 // window.location = "<?php  echo site_url('calon_siswa'); ?>";
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error Adding / Update Data');
	        }
	    });
    }
}

function detail_pembayaran(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('pembayaran/detail')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
        	$('#ModalDetailPembayaran').modal('show'); 
        		var html = '';
                var i;
                no = 1;
                for(i=0; i<data.length; i++){

                    var har = data[i].jml_bayar;
                    var reverse = har.toString().split('').reverse().join(''),
                        ribuan  = reverse.match(/\d{1,3}/g);
                        ribuan  = ribuan.join('.').split('').reverse().join('');

                    html += 
                    '<tr>'+
                        '<td align="center">'+data[i].tgl_bayar+'</td>'+
                        '<td align="center">'+ribuan+'</td>'+
                    '</tr>';

                }
   
                $('#show_data').html(html);

                var angka = data[0].total;
                var reverse = angka.toString().split('').reverse().join(''),
                    total  = reverse.match(/\d{1,3}/g);
                    total  = total.join('.').split('').reverse().join('');

                $('#tfoot').html(total);
                $('#id_calon').html(data[0].id_daftar);
                $('#nm_siswa').html(data[0].nm_lengkap);
                $('#status').html(data[0].status);
                $('#thn_ajar').html(data[0].thn_ajar);
                $('#modal_title_detail').text('Detail Pembayaran'+' / '+id);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Get Data From Ajax');
        }
    });
}

</script>