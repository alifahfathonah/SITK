<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">			
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Siswa
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Data Master</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo site_url('calon_siswa') ?>">Siswa</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->

		<?php if($this->session->flashdata('pesan') == TRUE ) { ?>
		  <div class="row">
		    <div class="col-md-12">
		    	<div class="alert alert-success">
		    		<?php echo $this->session->flashdata('pesan') ?>
				</div>
		    </div>
		  </div>
		<?php } ?>

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
							<a class="btn btn-default" href="<?php echo site_url('calon_siswa/tambah_calon') ?>"><i class="fa fa-plus"></i> Tambah Data Calon Siswa</a>
						</div>
					</div>
						
					<div class="portlet-body flip-scroll">
						<table id="table" class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
								<tr>
									<th width="5%">No.</th>
									<th width="20%"><center>ID Calon</center></th>
									<th width="48%"><center>Nama Siswa</center></th>
									<th width="50%"><center>Action</center></th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach($calon as $siswa) { ?>
								<tr>
									<td><center><?php echo $no++."." ?></center></td>
									<td><center><?php echo $siswa->id_calon_siswa ?></center></td>
									<td><center><?php echo $siswa->nm_lengkap ?></center></td>
									<td> 
										<center>
											<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#Detail<?php echo $siswa->id_calon_siswa ?>" title="Detail"><i class="glyphicon glyphicon glyphicon-folder-open"></i> Detail</button>
											<a href="<?php echo site_url('calon_siswa/edit/').$siswa->id_calon_siswa ?>" class="btn btn-sm btn-warning" title="Ubah"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
											<button type="button" onclick="hapus('<?php echo $siswa->id_calon_siswa ?>')" class="btn btn-sm btn-danger" title="Hapus"><i class="glyphicon glyphicon-pencil"></i> Hapus</button>
										</center>
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

<?php foreach($calon as $siswa) { ?>
<!-- Modal Detail-->
<div class="modal fade" id="Detail<?php echo $siswa->id_calon_siswa ?>" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Siswa</h4>
			</div>
			<div class="modal-body">
				
				<div class="portlet-body form">
					<form class="form-horizontal">
						
						<div class="row">
							<div class="col-md-12">
								<table class="table table-responsive table-bordered" border="0">
					            	<tbody>
					            		<tr>
					                 		<td width="120px">ID Calon Siswa</td>
					                  		<td width="20px">:</td>
					                  		<td><b><?php echo $siswa->id_calon_siswa ?></b></td>
					                	</tr>
					                	<tr>
					                  		<td>Nama Lengkap</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->nm_lengkap ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Nama Panggilan</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->nm_panggilan ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Jenis Kelamin</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->jenis_kelamin ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Tempat Lahir</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->tempat_lahir ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Tanggal Lahir</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->tgl_lahir ?></td>
					                	</tr>
					                 	<tr>
					                  		<td>Alamat</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->alamat ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Nomor Telepon</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->no_telp ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Anak Keberapa</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->anak_ke ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Jumlah Saudara</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->jml_saudara ?></td>
					                	</tr> 
					                	<tr>
					                  		<td>Status Kandung</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->status_kandung ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Warga Negara</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->warga_negara ?></td>
					                	</tr>
					              </tbody>
					            </table>
							</div>
						</div>

						<div class="row">

				            <div class="col-md-6">
				            	<table class="table table-responsive table-bordered" border="0">
					            	<tbody>
					            		<tr>
					                 		<td colspan="3"><b><center>Data Ayah</center></b></td>
					                	</tr>
					                	<tr>
					                 		<td width="120px">Nama</td>
					                  		<td width="20px">:</td>
					                  		<td><b><?php echo $siswa->nm_ayah ?></b></td>
					                	</tr>
					                	<tr>
					                  		<td>Tempat Lahir</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->tempat_lahir_ayah ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Tanggal Lahir</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->tgl_lahir_ayah ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Agama</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->agama_ayah ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Pendidikan</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->pendidikan_ayah ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Pekerjaan</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->pekerjaan_ayah ?></td>
					                	</tr>
					                 	<tr>
					                  		<td>Penghasilan</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->penghasilan_ayah ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Alamat</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->alamat_ayah ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Kantor</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->kantor_ayah ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Nomor Telepon</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->no_telp_ayah ?></td>
					                	</tr> 
					              </tbody>
					            </table>	
				            </div>
				            <div class="col-md-6">
				            	<table class="table table-responsive table-bordered" border="0">
					            	<tbody>
					            		<tr>
					                 		<td colspan="3"><b><center>Data Ibu</center></b></td>
					                	</tr>
					            		<tr>
					                 		<td width="120px">Nama</td>
					                  		<td width="20px">:</td>
					                  		<td><b><?php echo $siswa->nm_ibu ?></b></td>
					                	</tr>
					                	<tr>
					                  		<td>Tempat Lahir</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->tempat_lahir_ibu ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Tanggal Lahir</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->tgl_lahir_ibu ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Agama</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->agama_ibu ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Pendidikan</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->pendidikan_ibu ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Pekerjaan</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->pekerjaan_ibu ?></td>
					                	</tr>
					                 	<tr>
					                  		<td>Penghasilan</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->penghasilan_ibu ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Alamat</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->alamat_ibu ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Kantor</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->kantor_ibu ?></td>
					                	</tr>
					                	<tr>
					                  		<td>Nomor Telepon</td>
					                  		<td>:</td>
					                  		<td><?php echo $siswa->no_telp_ibu ?></td>
					                	</tr> 
					              </tbody>
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
<?php } ?>

<script> 
	$(document).ready( function () {
    	$('#table').DataTable();
	} );

  window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); });
    $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
  }, 3000);

	function hapus(id)
	{ 
		if(confirm('Anda Yakin Ingin Menghapus Data Ini?'))
	    {
	       $(location).attr('href','<?php echo site_url('calon_siswa/hapus/')?>'+id);

	    }
}
</script>