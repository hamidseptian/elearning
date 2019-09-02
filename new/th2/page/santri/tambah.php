  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			TAMBAH DATA SANTRI
  			<small>Preview</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li><a href="#">Tambah Data Santri</a></li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">

  		<!-- SELECT2 EXAMPLE -->
  		<div class="box box-default">
  			<div class="box-header with-border">
  				<h3 class="box-title">Tambah Data Santri</h3>

  				<div class="box-tools pull-right">
  					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
  				</div>
  			</div>
  			<!-- /.box-header -->
  			<div class="box-body">
  				<div class="row">
  					<form action="" method="post" enctype="multipart/form-data">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>NIS/ID SANTRI</label>
  								<input type="text" name="id_santri" class="form-control">
  							</div>
  							<div class="form-group">
  								<label>Nama</label>
  								<input type="text" name="nama" class="form-control">
  							</div>
  							<div class="form-group">
  								<label>Tempat Dan Tanggal Lahir</label>
  								<div class="row">
  									<div class="col-lg-6">
  										<div class="input-group">
  											<input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir">
  										</div>
  										<!-- /input-group -->
  									</div>
  									<!-- /.col-lg-6 -->
  									<div class="col-lg-6">
  										<div class="input-group">
  											<input type="date" class="form-control" name="tgl_lahir">
  										</div>
  										<!-- /input-group -->
  									</div>
  									<!-- /.col-lg-6 -->
  								</div>
  								<div class="form-group">
  									<label>Jeni Kelamin</label>
  									<select name="jekel" class="form-control">
  										<option value="laki-laki">Laki-Laki</option>
  										<option value="perempuan">Perempuan</option>
  									</select>
  								</div>
  								<div class="form-group">
  									<label>Kelas</label>
  									<input type="text" name="kelas" class="form-control">
  								</div>
  								<div class="form-group">
  									<label>Nama Orang Tua</label>
  									<input type="text" name="nama_ortu" class="form-control">
  								</div>
  							</div>
  						</div>

  						<!-- /.col -->
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Alamat</label>
  								<textarea name="alamat" class="form-control"></textarea>
  							</div>
  							<div class="form-group">
  								<label>Nomor Hp Orang Tua</label>
  								<input type="number" name="no_hp" class="form-control">
  							</div>
  							<div class="form-group">
  								<label>Email Orang Tua</label>
  								<input type="email" name="email" class="form-control">
  							</div>
  							<div class="form-group">
  								<label>Password</label>
  								<input type="text" name="pass" class="form-control">
  							</div>
  							<div class="form-group">
  								<label>Foto</label>
  								<input type="file" name="foto" class="form-control">
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
include 'koneksi.php';
if (isset($_POST['simpan'])) {
	$id_santri=$_POST['id_santri'];
	$nama=$_POST['nama'];
	$tmp_lahir=$_POST['tmp_lahir'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$jekel=$_POST['jekel'];
	$kelas=$_POST['kelas'];
	$nama_ortu=$_POST['nama_ortu'];
	$alamat=$_POST['alamat'];
	$no_hp=$_POST['no_hp'];
	$email=$_POST['email'];
	$pass=password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$foto= $_FILES['foto']['name'];
	$lokasi=$_FILES['foto']['tmp_name'];
	$upload=move_uploaded_file($lokasi, "img/".$foto);

	if($upload){
		$sql=mysqli_query($koneksi, "INSERT INTO santri VALUES ('$id_santri','$nama', '$tmp_lahir','$tgl_lahir','$jekel','$kelas','$nama_ortu','$alamat', '$no_hp', '$email', '$pass', '$foto')") or die (mysqli_error($koneksi));
		if ($sql) {
			echo "

<script type='text/javascript'>
		setTimeout(function () { 
			swal({
				title: 'Berhasil di simpan',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('?page=santri');
		} ,900); 
	</script>";
		}else{
      alert('erro');
    }
	}
}
?>