<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Laporan Penerimaan Murid Baru
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Data Laporan</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo site_url('laporan_pmb') ?>">Laporan Penerimaan Murid Baru</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->

		<?php if($this->session->flashdata('pesanGagal') == TRUE ) { ?>
		  <div class="row">
		    <div class="col-md-12">
		    	<div class="alert alert-danger">
					<?php echo $this->session->flashdata('pesanGagal') ?>
				</div>
		    </div>
		  </div>
		<?php } ?>

		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE TABLE PORTLET-->
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<h4>Input Tahun Ajaran</h4>
						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<div class="portlet light">
							<div class="portlet-body form">
								<form method="POST" action="<?php echo site_url('laporan_pmb/cetak') ?>">
									<div class="form-body">
										
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

										<div class="row">
											<div class="col-md-5">
												<button type="submit" id="btn_simpan" class="btn btn-block btn-danger"><i class="fa fa-print"></i> Cetak</button>
											</div>
										</div>		

									</div>
								</form>		
							</div>							
						</div>
					</div>		
				</div>
			</div>
			<!-- END SAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE CONTENT-->
</div>
<!-- END CONTENT -->

<script> 

window.setTimeout(function() {
	$(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); });
    $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
}, 3000);

</script>