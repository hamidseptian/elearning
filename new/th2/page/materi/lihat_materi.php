 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      BACA MATERI
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="?page=materi">Materi</a></li>
    </ol>
  </section>

  <?php 
  include "koneksi.php";
  $id=$_GET['id'];
  $sql=mysqli_query($koneksi, "SELECT * FROM materi where id_materi='$id' ");
  while($data=mysqli_fetch_array($sql)){
   ?>
   <section>

     <div class="box">
      <div class="box-header with-border">
        <a href="?page=materi" class="btn btn-success">Lihat Daftar Materi</a>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
          <div class="pdf-viewer-area mg-b-15">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <div class="pdf-single-pro">
                    <div class="embed-responsive embed-responsive-16by9"><a class="media" href="img/<?php echo $data['materi'] ?>"></a></div>
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>


</div>