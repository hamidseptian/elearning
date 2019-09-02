  <?php 
  include 'koneksi.php';
  $id_user=$_GET['id_user'];
  $sql=$koneksi->query("SELECT * FROM user where id_user='$id_user'");
  $tampil=$sql->fetch_assoc();
  $level=$tampil['level'];
  ?>
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			EDIT DATA User
  			<small>Preview</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li><a href="#">Edit Data User</a></li>
  		</ol>
  	</section>
  	<!-- Main content -->
  	<section class="content">

  		<!-- SELECT2 EXAMPLE -->
  		<div class="box box-default">
  			<div class="box-header with-border">
  				<h3 class="box-title">Edit Data User</h3>

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
  								<label>ID User</label>
  								<input type="text" name="id_user" class="form-control" value="<?php echo $tampil['id_user'] ?>" readonly>
  							</div>
  							<div class="form-group">
  								<label>Username</label>
  								<input type="text" name="username" class="form-control" value="<?php echo $tampil['username'] ?>">
  							</div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $tampil['nama'] ?>">
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select name="level" class="form-control">
                    <option value="admin" <?php if($level == 'admin') {echo "selected" ;} ?>>Admin</option>
                    <option value="guru" <?php if($level == 'guru') {echo "selected" ;} ?>>Guru</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                <label>Password</label>
                <input type="text" name="pass" class="form-control" value="<?php echo $tampil['pass'] ?>">
              </div>
              <div class="form-group">
                <label>Foto Saat Ini </label><br>
                <img src="img/<?php echo $tampil['foto'] ?>" width="50px" height="50px">
              </div>
              <input type="hidden" name="foto_lama" value="<?php echo $tampil['foto'] ?>">
              <div class="form-group">
                <label>Ganbti Foto</label>
                <input type="file" name="foto" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN DATA">
        </form>
      </div>
    </div>
  </div>
</div>
</section>
</div>

<?php 
if (isset($_POST['simpan'])) {
 $id_user=$_POST['id_user'];
 $username=$_POST['username'];
 $nama=$_POST['nama'];
 $level=$_POST['level'];
 $pass=$_POST['pass'];
 $foto_lama=$_POST['foto_lama'];

 $foto=$_FILES['foto']['name'];
 $lokasi=$_FILES['foto']['tmp_name'];


 if (!empty($lokasi)) {
  $upload=move_uploaded_file($lokasi, "img/".$foto);

  
  $sql = mysqli_query($koneksi, "UPDATE user SET username='$username', nama='$nama', level='$level', pass='$pass', foto='$foto' where id_user='$id_user' ") or die(mysqli_error($koneksi));
  
  unlink('img/'.$foto_lama);
  if ($sql) {
   ?>
   <script type="text/javascript">
    alert('berhasil ubah');
    window.location.href='?page=user';
  </script>

  <?php
}

}
else{
  $sql = mysqli_query($koneksi, "UPDATE user SET username='$username', nama='$nama', level='$level', pass='$pass' where id_user='$id_user' ") or die(mysqli_error($koneksi));
  if ($sql) {
   ?>
   <script type="text/javascript">
    alert('diubah');
    window.location.href='?page=user';
  </script>
  <?php
}
else{
 alert('error');
}
}

}
?>