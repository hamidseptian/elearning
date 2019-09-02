 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>TUGAS SANTRI
 			<small>it all starts here</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li><a href="#">Tugas Santri</a></li>
 		</ol>
 	</section>

 	<!-- Main content -->
 	<section class="content">
 		<!-- Default box -->
 		<div class="box box-success">
 			<div class="box-header with-border">
 				<button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#modal-default">
 				</button>
 				Upload Tugas
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
 								<td>KODE UPLOAD</td>
 								<td>ID SANTRI</td>
 								<td>NAMA SANTRI</td>
 								<td>AUDIO</td>
 								<td>STATUS</td>
 								<td>AKSI</td>
 							</tr>
 						</thead>
 						<tbody>
 							<?php 
 							include "koneksi.php";
 							$sql=mysqli_query($koneksi, "SELECT * FROM u_tugas where id_santri='$_SESSION[id_santri]' ");
 							while($data=mysqli_fetch_array($sql)){
 								?>

 								<tr>
 									<td><?php echo $data['kode_upload'] ?></td>
 									<td><?php echo $data['id_santri'] ?></td>
 									<td><?php echo $data['nama_santri'] ?></td>
 									<td>
 										<audio controls><source src="img/<?php echo $data['audio'] ?>" type="audio/mpeg"></audio>
 										</td>
 										<td><?php 	
 										if ($data['status'] =='diperiksa') {
 											?>
 											<a href="javascript:void(0)" onclick="sNilai('<?php echo $data['kode_upload'] ?>')" class="btn succes" aria-label="Delete" title="LIHAT NILAI">
 												<i class="fa fa-pencil" aria-hidden="true">Lihat Nilai</i>
 											</a>
 											<?php
 										}
 										?>
 									</td>
 									<td align="center">
 										<?php 
 										if ($data['status']=='belum diperiksa') {
 											?>
 											
 											<a href="?page=u_tugas&aksi=hapus&id=<?php echo $data['kode_upload']?>" class="btn btn-danger" aria-label="Delete" title="Hapus">
 												<i class="fa fa-trash-o" aria-hidden="true"></i>
 											</a>
 											<?php
 										}else{
 											?>
 											<a href="#" class="btn btn-default" aria-label="Delete" title="Hapus">
 												<i class="fa fa-check-o" aria-hidden="true"></i>
 											</a>
 											
 										<?php } ?>
 									</td>
 								</tr>
 							<?php } ?>
 						</tbody>
 					</table>
 				</div>
 				<script type="text/javascript">
 					function sNilai(id){
 						$.ajax({
 							type:'POST',
 							data: 'id='+id,
 							dataType: 'JSON',
 							url:'page/u_tugas/pop-up-per-nilai.php',
 							success:function(data){
 								swal("Nilai anda adalah \n"+data.nilai+"\nSARAN GURU:"+'\n'+data.saran);
 							},
 							error: function(){
 								alert('errr');
 							}
 						})
 					}
 				</script>
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
						<h4 class="modal-title">Upload Tugas</h4>
					</div>

					<div class="modal-body">
						
						<div class="form-group">
							<label>Nama Tugas Baru</label>
							<?php 
							$sql=mysqli_query($koneksi, "SELECT * FROM tugas where ket='on' ");
							$data=mysqli_fetch_array($sql);
							?>
							<select name="nama_tugas" class="form-control">

								<option value="<?php echo $data['id_tugas'] ?>"><?php echo $data['nama_tugas'] ?></option>
							</select>
						</div>
						<div class="form-group">
							<label>ID SANTRI</label>
							<input type="text" name="id_santri" class="form-control" value="<?php echo $_SESSION[id_santri]; ?>" />
						</div>
						<div class="form-group">
							<label>NAMA SANTRI</label>
							<input type="text" name="nama_santri" class="form-control" value="<?php echo $_SESSION['nama']; ?>" />
						</div>
						<div class="form-group">
							<label>UPLOAD AUDIO</label>
							<input type="file" name="audio" class="form-control"  />
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
				//$kode_upload=$_POST['kode_upload'];
		$id_tugas=$_POST['nama_tugas'];
		$id_santri=$_POST['id_santri'];
		$nama_santri=$_POST['nama_santri'];
		$audio=$_POST['audio'];

		$audio= $_FILES['audio']['name'];
		$lokasi=$_FILES['audio']['tmp_name'];
		$upload=move_uploaded_file($lokasi, "img/".$audio);

		if($upload){
			$sql=mysqli_query($koneksi, "INSERT INTO u_tugas VALUES (NULL, '$id_tugas', '$id_santri', '$nama_santri', '$audio','belum diperiksa')") or die (mysqli_error($koneksi));
			if ($sql) {
				?>
				<script type='text/javascript'>
					setTimeout(function () { 
						swal({
							title: 'Berhasil di upload',
							type: 'success',
							timer: 10000,
							showConfirmButton: true
						});  
					},10); 
					window.setTimeout(function(){ 
						window.location.replace('?page=u_tugas');
					} ,2000); 
				</script>";
				<?php
			}
		}
	}
	?>