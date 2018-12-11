<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Pembagian Kelas
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
					<a href="<?php echo site_url('pembagian_kelas') ?>">Pembagian Kelas</a>
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
							<a href="<?php echo site_url('pembagian_kelas/tambah_kelas') ?>" class="btn btn-default"><i class="fa fa-plus"></i> Bentuk Kelas Baru</a>
						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<table id="table" class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th width="10%"><center>No.</center></th>
								<th width="20%"><center>Tahun Ajaran</center></th>
								<th width="20%"><center>Kelas</center></th>
								<th width="20%"><center>Umur</center></th>
								<th width="30%"><center>Action</center></th>
							</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach($kelas as $kls){ ?>
									<tr>
										<td align="center"><?php echo $no++."." ?></td>
										<td align="center"><?php echo $kls->thn_ajar ?></td>
										<td align="center"><?php echo $kls->nm_kelas ?></td>
										<td align="center"><?php echo $kls->umur ?> Tahun</td>
										<td align="center">
											<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail<?php echo $kls->id_kelas ?>" title="Detail" ><i class="glyphicon glyphicon glyphicon-folder-open"></i> Detail</button>
										</td>
									</tr>
								<?php } ?>
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

<!-- Modal Detail-->
<?php foreach($kelas as $kls) { ?>
<div class="modal fade" id="detail<?php echo $kls->id_kelas ?>" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				
				<div class="portlet-body form">
					<form id="form" class="form-horizontal">
						<table class="table table-responsive table-bordered" border="0">
			            	<thead>
			            		<th width="50px"><center>No.</center></th>
			            		<th><center>Nama Mahasiswa</center></th>
			            	</thead>
			            	<tbody>
			            		<?php $detail_kelas = $this->db->query("SELECT * FROM siswa WHERE status_siswa = '1' AND id_kelas = '$kls->id_kelas'")->result(); $no=1; ?>
			            		<?php foreach($detail_kelas as $dtl) { ?>
				            		<tr>
				            			<td align="center"><?php echo $no++."." ?></td>
				            			<td><?php echo $dtl->nm_siswa ?></td>
				            		</tr>
			                	<?php } ?>
			              </tbody>
			            </table>

			            <hr>
			            <?php $details = $this->db->query("
			            	SELECT nm_kelas,nm_guru FROM kelas 
			            		JOIN siswa ON siswa.id_kelas = kelas.id_kelas 
			            		JOIN guru ON siswa.id_guru = guru.id_guru 
			            	WHERE kelas.id_kelas = '$kls->id_kelas'")->row();
			            ?>
							<table>
								<thead>
									<th width="15%">Nama Guru</th>
									<th width="5%"><center>:</center></th>
									<th width="75%"><?php echo $details->nm_guru ?></th>
								</thead>
								<thead>
									<th width="15%">Kelas</th>
									<th width="5%"><center>:</center></th>
									<th width="75%"><?php echo $details->nm_kelas ?></th>
								</thead>
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
<?php } ?>

<script type="text/javascript">
$(document).ready( function () {
	$('#table').DataTable();
});
</script>