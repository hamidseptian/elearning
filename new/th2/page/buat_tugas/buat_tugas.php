 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>BUAT TUGAS
 			<small>it all starts here</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li><a href="#">Buat Tugas</a></li>
 		</ol>
 	</section>

 	<!-- Main content -->
 	<section class="content">
 		<!-- Default box -->
 		<div class="box">
 			<div class="box-header with-border">
 				<button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#modal-default">
 				</button>
 				Buat Tugas Baru
 				<div class="box-tools pull-right">
 					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
 					title="Collapse">
 					<i class="fa fa-minus"></i></button>
 					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
 						<i class="fa fa-times"></i></button>
 					</div>
 				</div>
 				<div class="box-body">
 					<table id="table" class="table table-bordered table-striped" style="width: 100%" >
 						<thead>
 							<tr bgcolor="#c7ecee">
 								<td>NAMA TUGAS</td>
 								<td>KETERANGAN</td>
 							</tr>
 						</thead>
 						<tbody>
 							<?php 
 							include "koneksi.php";
 							$sql=mysqli_query($koneksi, "SELECT * FROM tugas");
 							while($data=mysqli_fetch_array($sql)){
 								?>

 								<tr>
 									<td><?php echo $data['nama_tugas'] ?></td>
 									<td><?php echo $data['ket'] ?>
 									<?php if ($data['sembunyi_data']=='T'): ?>
 										<?php if ($data['ket']=='on'): ?>
 											<a href="?page=buat_tugas&aksi=edit&id=<?php echo $data['id_tugas'] ?>" onclick="return confirm('ar u sua')" class="fa fa-eye btn btn-success"  title="ON" ></a>
 											<?php else: ?>
 												<a href="javascript:void(0)" class="fa fa-eye btn btn-danger"  title="OFF" ></a>
 												Tugas Tidak Aktif
 												<?php
 											endif; ?>


 										<?php endif ?>
 										<a href="?page=tugas&aksi=edit&id_user=<?php echo $data['id_user']?>" class="btn btn-primary" aria-label="Delete" title="Hapus">
 											<i class="fa fa-trash-o" aria-hidden="true"></i>
 										</a>
 									</td>
 								</tr>
 							<?php } ?>
 						</tbody>
 					</table>
 				</div>
 				<div class="clear-fix">

 				</div>
 				<!-- /.box-body -->
<!--         <div class="box-footer">
          Footer
      </div> -->
      <!-- /.box-footer-->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><?php echo date('Y') ?></span></button>
						<h4 class="modal-title">Tambah Tugas</h4>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<label>Nama Tugas Baru</label>
							<input type="text" name="nama_tugas" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Kembali</button>
						<input type="submit" name="simpan" value="SIMPAN DATA" class="btn  btn-primary">
					</div>
				</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php 
	if (isset($_POST['simpan'])) {
		$nama_tugas=$_POST['nama_tugas'];

		$sql=mysqli_query($koneksi, "INSERT INTO tugas VALUES (NULL,'$nama_tugas', 'on', 'T')");

		if ($sql) {
			echo "
			<script type='text/javascript'>
			setTimeout(function () { 
				swal({
					title: 'Berhasil di simpan',
					type: 'success',
					timer: 1500,
					showConfirmButton: false
					});  
					},10); 
					window.setTimeout(function(){ 
						window.location.replace('?page=buat_tugas');
						} ,700); 
						</script>";
					}
				}
				?>