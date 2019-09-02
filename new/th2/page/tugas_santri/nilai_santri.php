 <?php
include "koneksi.php";

$id=$_GET['kode_upload'];
$sql=mysqli_query($koneksi, "SELECT * FROM u_tugas where kode_upload='$id' ");
$tampil=mysqli_fetch_array($sql);

?>

  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			PENILAIAN TUGAS SANTRI
  			<small>Preview</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li><a href="#">Penilaian Tugas Santri</a></li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">

  		<!-- SELECT2 EXAMPLE -->
  		<div class="box box-default">
  			<div class="box-header with-border">
  				<h3 class="box-title">Penilaian Tugas Santri</h3>

  				<div class="box-tools pull-right">
  					<button type="button" class="btn btn-primary" data-widget="collapse"><i class="fa fa-minus"></i></button>
  					<button type="button" class="btn btn-primary" data-widget="remove"><i class="fa fa-remove"></i></button>
  				</div>
  			</div>
  			<!-- /.box-header -->
  			<div class="box-body">
  				<div class="row">
  					<form action="" method="post" enctype="multipart/form-data">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>KODE UPLOAD</label>
  								<input type="text" name="kode_upload" class="form-control" value="<?php echo $tampil['kode_upload'] ?>">
  							</div>
  							<div class="form-group">
  								<label>ID SANTRI</label>
  								<input type="text" name="nama_santri" class="form-control" value="<?php echo $tampil['id_santri'] ?>">
  							</div>
  							<div class="form-group">
  								<label>NAMA SANTRI</label>
  								<input type="text" name="nama_santri" class="form-control" value="<?php echo $tampil['nama_santri'] ?>">
  							</div>
  						</div>

  						<!-- /.col -->
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>BERIKAN RANK PENILAIAN</label>
  								<input type="text" name="nilai" class="form-control">
  							</div>
  							<div class="form-group">
  								<label>SARAN</label>
  								<textarea class="form-control" name="saran"></textarea>
  							</div>
  							<!-- /.form-group -->
  						</div>
  						<!-- /.col -->
  					</div>

  					<input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN DATA">
  				</form>
  				<!-- /.row -->
  			</div>
  		</div>
  		<!-- /.box -->
  	</div>
  	<!-- /.col (right) -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
</div>
	<?php 
	if (isset($_POST['simpan'])) {
		$kode_upload=$_POST['kode_upload'];
		$id_santri=$_POST['id_santri'];
		$nama_santri=$_POST['nama_santri'];
		$nilai=$_POST['nilai'];
		$saran=$_POST['saran'];

		$sql=mysqli_query($koneksi, "INSERT INTO nilai VALUES (NULL,'$kode_upload', '$nilai','$saran') ");
		$sql2=mysqli_query($koneksi, "Update u_tugas set status='diperiksa' where kode_upload='$kode_upload'  ");
		if ($sql) {
			echo "
<script type='text/javascript'>
		setTimeout(function () { 
			swal({
				title: 'Nilai Berhasil Simpan',
				type: 'success',
				timer: 1500,
				showConfirmButton: false
			});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('?page=tugas_santri');
		} ,700); 
	</script>";
					}

				}
				?>