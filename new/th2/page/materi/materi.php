 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      MATERI
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Materi</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
       <?php if ($_SESSION['level']!=='santri'): ?>
         <button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#modal-default">
       </button>
       Tambah Materi

       <?php endif ?>
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
            <tr bgcolor="#c7ecee" align="center">
              <td>TEMA</td>
              <td>MATERI</td>
              <?php if ($_SESSION['level']!=='santri'): ?>
                <td >Aksi</td>
              <?php endif ?>
              
            </tr>
          </thead>
          <tbody>
            <?php 
            include "koneksi.php";
            $sql=mysqli_query($koneksi, "SELECT * FROM materi");
            while($data=mysqli_fetch_array($sql)){
              ?>

              <tr>
                <td><?php echo $data['judul'] ?></td>
                <td align="center">Lihat Materi <a href="?page=materi&aksi=l_materi&id=<?php echo $data['id_materi'] ?>" class="fa fa-file-pdf-o btn btn-success" title="LIHAT MATERI" ></a>
                  <?php if ($_SESSION['level']!=='santri'): ?>
                    <td>
                    <a href="?page=materi&aksi=hapus&id=<?php echo $data['id_materi']?>" class="btn btn-danger" aria-label="Delete" title="Hapus">
                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                  </td>
                  <?php endif ?>
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
              <h4 class="modal-title">Tambah Materi Baru</h4>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control">
              </div>
              <div class="form-group">
                <label>Materi</label>
                <input type="file" name="materi" class="form-control">
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
    include 'koneksi.php';
    if (isset($_POST['simpan'])) {
      $judul=$_POST['judul'];

      $materi= $_FILES['materi']['name'];
      $lokasi=$_FILES['materi']['tmp_name'];
      $upload=move_uploaded_file($lokasi, "img/".$materi);
      if($upload){
        $sql=mysqli_query($koneksi, "INSERT INTO materi VALUES (NULL,'$judul', '$materi')") or die (mysqli_error($koneksi));
        if ($sql) {
          echo "
          <script type='text/javascript'>
          setTimeout(function () { 
            swal({
              title: 'Data Berhasil Ditambahkan',
              type: 'success',
              timer: 11000,
              showConfirmButton: false
              });  
              },10); 
              window.setTimeout(function(){ 
                window.location.replace('?page=materi');
                } ,2000); 
                </script>";
              }
            }
          }
          ?>