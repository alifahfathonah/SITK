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
		Halaman Dashboard
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN DASHBOARD STATS -->
				<div class="row">
					<div class="col-md-4">
						<a class="dashboard-stat dashboard-stat-light blue-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-graduation-cap"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $this->Model->jumlah('guru') ?>
							</div>
							<div class="desc">
								 Data Guru
							</div>
						</div>
						</a>
					</div>
					<div class="col-md-4">
						<a class="dashboard-stat dashboard-stat-light red-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-institution"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $this->Model->jumlah('kelas') ?>
							</div>
							<div class="desc">
								 Data Kelas
							</div>
						</div>
						</a>
					</div>
					<div class="col-md-4">
						<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-tags"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $this->Model->jumlah('jenis_pembayaran') ?>
							</div>
							<div class="desc">
								 Data Jenis Pembayaran
							</div>
						</div>
						</a>
					</div>
				</div>
				<!-- END DASHBOARD STATS -->
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>
<!-- END CONTENT -->