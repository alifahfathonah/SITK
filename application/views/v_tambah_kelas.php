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
					<a href="#">Data Kelas</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo site_url('pembentukan_kelas') ?>">Pembentukan Kelas</a>
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
								<form>
									<div class="form-group">
										<label class="control-label col-md-2">Nama Siswa
										</label>
											<div class="col-md-4">
												<select class="form-control select2me" name="options2">
													<option value="">Select...</option>
													<option value="Option 1">Option 1</option>
													<option value="Option 2">Option 2</option>
													<option value="Option 3">Option 3</option>
													<option value="Option 4">Option 4</option>
												</select>
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
</script>