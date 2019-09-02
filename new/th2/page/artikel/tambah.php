 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ARTIKEL
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Artikel</a></li>
    </ol>
  </section>
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Artikel</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <form action="" method="post" >
            <div class="col-md-6">
              <div class="form-group">
                <label>JUDUL</label>
                <input type="text" name="judul" class="form-control">
              </div>
              <div class="form-group">
                <label>DESKRIPSI</label>
                <textarea id="ckeditor" name="deskripsi" class="form-control"></textarea>
              </div>
            </div>
            <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN DATA">
          </form>
          <!-- /.col -->
        </div>


        <!-- /.row -->
      </div>
    </div>
  </div>
</section>
</div>
<?php 
if (isset($_POST['simpan'])) {
  $judul=$_POST['judul'];
  $deskripsi=$_POST['deskripsi'];
  $tgl_upload=date('Y-m-d');

  $sql=mysqli_query($koneksi, "INSERT into artikel VALUES (null, '$judul', '$deskripsi', '$tgl_upload')") or die(mysqli_error($koneksi));
  if ($sql) {
    echo "

    <script type='text/javascript'>
    setTimeout(function () { 
      swal({
        title: 'Berhasil di simpan',
        type: 'success',
        timer: 8000,
        showConfirmButton: false
        });  
        },10); 
        window.setTimeout(function(){ 
          window.location.replace('?page=artikel');
          } ,900); 
          </script>";

        }
      }
      ?>
