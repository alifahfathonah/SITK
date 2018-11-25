<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Pembentukan Kelas
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="fa fa-institution"></i>
					<a href="#">Data Kelas</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="fa fa-asterisk"></i>
					<a href="<?php echo site_url('pembentukan_kelas') ?>">Pembentukan Kelas</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<i class="fa fa-plus"></i>
					<a href="<?php echo site_url('pembentukan_kelas/tambah_kelas') ?>">Tambah Kelas Baru</a>
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
							<h4><i class="fa fa-users"></i> Tambah Kelas Baru</h4>
						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<div class="portlet light">
							<div class="portlet-body form">
								<form id="form">
									<div class="row">
										<div class="col-md-2">
											<div class="form-group form-md-line-input">
												<input type="text" id="datepicker1" name="thn_ajar1" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Tahun Ajaran" required>
											</div>
										</div>
										<div class="col-md-1">
											<div class="form-group form-md-line-input">
												<center><label for="form_control_1"><b>/</b></label></center>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group form-md-line-input">
												<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="datepicker2" required name="thn_ajar2" class="form-control" placeholder="Tahun Ajaran">
											</div>
										</div>
									</div>

									<div class="form-group form-md-line-input has-info" id="umur">
										<select class="form-control" name="umur">
											<option value="">-Pilih-</option>
											<option value="6">Umur 6 Tahun</option>
											<option value="5">Umur 5 Tahun</option>
											<option value="4">Umur 4 Tahun</option>
											<option value="3">Umur 3 Tahun</option>
										</select>
										<label for="form_control_1">Umur Murid</label>
									</div>

									<div class="form-group form-md-line-input has-info">
										<select class="form-control" name="kelas">
											<?php foreach($kelas as $kls){ ?>
												<option value="<?php echo $kls->id_kelas ?>"><?php echo ucwords($kls->nm_kelas) ?></option>
											<?php } ?>
										</select>
										<label for="form_control_1">Kelas</label>
									</div>

									<div class="form-group form-md-line-input has-info">
										<select class="form-control" name="guru">
											<?php foreach($guru as $gr){ ?>
												<option value="<?php echo $gr->id_guru ?>"><?php echo ucwords($gr->nm_guru) ?></option>
											<?php } ?>
										</select>
										<label for="form_control_1">Guru</label>
									</div>

									<div class="row">
										<div class="col-md-4">
											<button type="button" data-toggle="modal" onclick="tambahKelas()" class="btn btn-block btn-primary"><i class="fa fa-gears"></i> Proses</button>	
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

<!-- Modal -->
<div class="modal fade" id="tambahKelas" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Pembentukan Kelas Baru</h4>
			</div>
			<div class="modal-body">
				
				<div class="portlet-body form">
					<form id="form" class="form-horizontal">
						<div class="form-body">				
							<table class="table table-bordered">
								<thead>
									<th width="15%"><center>No.</center></th>
									<th width="75%"><center>Nama</center></th>
								</thead>
								<tbody id="isi"></tbody>
							</table>

							<hr>

							<table>
								<thead>
									<th width="15%">Nama Guru</th>
									<th width="5%"><center>:</center></th>
									<th width="75%" id="guru_pilih"></th>
								</thead>
								<thead>
									<th width="15%">Kelas</th>
									<th width="5%"><center>:</center></th>
									<th width="75%" id="kelas_pilih"></th>
								</thead>
							</table>
							
						</div>
					</form>
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<button type="button" id="btn_simpan" onclick="simpan()" class="btn blue">Buat Kelas</button>
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

var currentTime = new Date();
var current_year = currentTime.getFullYear();
var next_year = currentTime.getFullYear()+1;

$('[name="thn_ajar1"]').val(current_year);
$('[name="thn_ajar2"]').val(next_year);

function tambahKelas()
{

	if($('[name="umur"]').val() == ""){
		$("#umur").removeClass("has-info");
		$("#umur").addClass('has-error');
		$('[name="umur"]').focus()
		return false;
	}

	var guru = $('[name="guru"]').val();
	var kelas = $('[name="kelas"]').val();
	// ajax adding data to database
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : "<?php echo site_url('pembentukan_kelas/get_murid') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
    		$('#tambahKelas').modal('show');
    		var html = '';
            var i;
            no = 1;
            for(i=0; i<data.length; i++){
                html += 
                '<tr>'+
                	'<td align="center">'+no++ +'.</td>'+
                    '<td>'+data[i].nm_lengkap+'</td>'+
                '</tr>';
            }

            //get guru
            $.ajax({
		        url : "<?php echo site_url('pembentukan_kelas/get_guru') ?>",
		        type: "POST",
		        data: {guru:guru},
		        dataType: "JSON",
		        success: function(data)
		        {
		        	$('#guru_pilih').text(data.nm_guru);
		        }
		    });

            //get kelas
            $.ajax({
		        url : "<?php echo site_url('pembentukan_kelas/get_kelas') ?>",
		        type: "POST",
		        data: {kelas:kelas},
		        dataType: "JSON",
		        success: function(data)
		        {
		        	$('#kelas_pilih').text(data.nm_kelas);
		        }
		    });
   			
            $('#isi').html(html);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Adding / Update Data');
        }
    });
	
}

function simpan()
{
	if(confirm('Anda Yakin Ingin Memproses Data Ini?'))
	{
		// ajax adding data to database
	    var formData = new FormData($('#form')[0]);
	    $.ajax({
	        url : "<?php echo site_url('pembentukan_kelas/simpan')?>",
	        type: "POST",
	        data: formData,
	        contentType: false,
	        processData: false,
	        dataType: "JSON",
	        success: function(data)
	        {
	            $('#tambahKelas').modal('hide');
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
}

</script>