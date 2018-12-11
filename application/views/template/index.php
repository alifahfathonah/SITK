<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Halaman Dashboard
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
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
						<a class="dashboard-stat dashboard-stat-light blue-soft" href="<?php echo site_url('guru') ?>">
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
						<a class="dashboard-stat dashboard-stat-light red-soft" href="<?php echo site_url('kelas') ?>">
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
						<a class="dashboard-stat dashboard-stat-light green-soft" href="<?php echo site_url('jenis_pembayaran') ?>">
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