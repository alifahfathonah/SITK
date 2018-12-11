<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start ">
					<a href="<?php echo site_url('dashboard') ?>">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class="fa fa-database"></i>
						<span class="title">Data Master</span>
						<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo site_url('calon_siswa') ?>">
							<i class="fa fa-users"></i>
							Penerimaan Murid Baru</a>
						</li>
						<li>
							<a href="<?php echo site_url('guru') ?>">
							<i class="fa fa-graduation-cap"></i>
							Guru</a>
						</li>
						<li>
							<a href="<?php echo site_url('kelas') ?>">
							<i class="fa fa-institution"></i>
							Kelas</a>
						</li>
						<li>
							<a href="<?php echo site_url('jenis_pembayaran') ?>">
							<i class="fa fa-tags"></i>
							Jenis Pembayaran</a>
						</li>
						<?php if($this->session->id_guru == null){ ?>
							<li>
								<a href="<?php echo site_url('user') ?>">
								<i class="fa fa-user"></i>
								User</a>
							</li>
						<?php } ?>
					</ul>
				</li>

				<li>
					<a href="javascript:;">
						<i class="fa fa-money"></i>
						<span class="title">Data Transaksi</span>
						<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo site_url('pembayaran') ?>">
							<i class="fa fa-dollar"></i>
							Pembayaran</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:;">
						<i class="fa fa-university"></i>
						<span class="title">Data Kelas</span>
						<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo site_url('pembagian_kelas') ?>">
							<i class="fa fa-asterisk"></i>
							Pembagian Kelas</a>
						</li>
						<li>
							<a href="<?php echo site_url('pengunduran_diri') ?>">
							<i class="fa fa-user"></i>
							Pengunduran Diri Murid</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:;">
						<i class="fa fa-file"></i>
						<span class="title">Data Laporan</span>
						<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo site_url('laporan_pmb') ?>">
							<i class="fa fa-file-pdf-o"></i>
							Laporan PMB</a>
						</li>
						<li>
							<a href="<?php echo site_url('laporan_pembayaran') ?>">
							<i class="fa fa-file-pdf-o"></i>
							Laporan Pembayaran</a>
						</li>
						<li>
							<a href="<?php echo site_url('laporan_siswa') ?>">
							<i class="fa fa-file-pdf-o"></i>
							Laporan Siswa</a>
						</li>
						<li>
							<a href="<?php echo site_url('laporan_kelas') ?>">
							<i class="fa fa-file-pdf-o"></i>
							Laporan Kelas</a>
						</li>
					</ul>
				</li>
					
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->