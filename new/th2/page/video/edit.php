  <?php 
  include 'koneksi.php';
  $id=$_GET['id'];
  $sql=$koneksi->query("SELECT * FROM video where id_video='$id'");
  $tampil=mysqli_fetch_array($sql);
  ?>
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  		Edit Video
  			<small>Preview</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li><a href="#">Edit Video</a></li>
  		</ol>
  	</section>
  	<!-- Main content -->
  	<section class="content">

  		<!-- SELECT2 EXAMPLE -->
  		<div class="box box-default">
  			<div class="box-header with-border">
  				<h3 class="box-title">Edit Video</h3>

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
  								<label>ID VIDEO</label>
  								<input type="text" name="id_video" class="form-control" value="<?php echo $tampil['id_video'] ?>" disabled>
  							</div>
  							<div class="form-group">
  								<label>Judul</label>
  								<input type="text" name="judul" class="form-control" value="<?php echo $tampil['judul'] ?>">
  							</div>
                <div class="form-group">
                  <label>Link Video</label>
                  <textarea class="form-control" name="video"><?php echo $tampil['video']; ?></textarea>
                </div>
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
  $judul=$_POST['judul'];
  $video=$_POST['video'];
  $tgl_upload=date('Y-m-d');

  $sql=mysqli_query($koneksi, "UPDATE video SET judul='$judul', tgl_upload='$tgl_upload', video='$video' where id_video='$id_video' ");
  if ($sql) {
    echo "
<script type='text/javascript'>
    setTimeout(function () { 
      swal({
        title: 'Berhasil di diubah',
        type: 'success',
        timer: 1000,
        showConfirmButton: false
      });  
    },10); 
    window.setTimeout(function(){ 
      window.location.replace('?page=video');
    } ,1000); 
  </script>";
  }
}
 ?>