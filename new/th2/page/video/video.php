 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <h1>
    VIDEO
    <small>it all starts here</small>
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Video</a></li>
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
     Tambah Video
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
        <tr bgcolor="#c7ecee">
         <td>JUDUL</td>
         <td>TANGGAL UPLOAD</td>
         <td >VIDEO</td>
         <td >KATEGORI</td>
         <?php if ($_SESSION['level'!=='santri']): ?>
           <td >Aksi</td>
         <?php endif ?>
        </tr>
       </thead>
       <tbody>
        <?php 
        include "koneksi.php";
        $sql=mysqli_query($koneksi, "SELECT * FROM video");
        while($data=mysqli_fetch_array($sql)){
         ?>

         <tr>
          <td width="120px"><?php echo $data['judul'] ?></td>
          <td width="80px"><?php echo $data['tgl_upload'] ?></td>
          <td ><div class="embed-responsive embed-responsive-16by9"><?php echo $data['video'] ?></div></td>
          <td width="80px"><?php echo $data['kategori'] ?></td>
          <?php if ($_SESSION['level'!=='santri']): ?>
            <td>
           <a href="?page=video&aksi=hapus&id=<?php echo $data['id_video']?>" class="btn btn-danger" aria-label="Delete" title="Hapus">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
           </a>
           <a href="?page=video&aksi=edit&id=<?php echo $data['id_video']?>" class="btn btn-primary" aria-label="edit" title="Hapus">
            <i class="fa fa-edit" aria-hidden="true"></i>
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
            <h4 class="modal-title">Tambah Link Video</h4>
           </div>

           <div class="modal-body">
            <div class="form-group">
             <label>Judul</label>
             <input type="text" name="judul" class="form-control">
            </div>
            <div class="form-group">
             <label>Link Video</label>
             <textarea name="video" class="form-control"><iframe width="560" height="315" src="https://www.youtube.com/embed/" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></textarea>
            </div>
             <div class="form-group">
             <label>Kategori</label>
             <select name="kategori" class="form-control">
               <option>--Kategori Video--</option>
               <option value="tilawah">Tilawah</option>
               <option value="Tartil">Tartil</option>
               <option value="qiraat">Qira'at</option>
             </select>
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
        $tgl_upload=date('Y-m-d');
        $video=$_POST['video'];
        $kategori=$_POST['kategori'];

     
         $sql=mysqli_query($koneksi, "INSERT INTO video VALUES (NULL,'$judul', '$tgl_upload','$video','$kategori')") or die (mysqli_error($koneksi));
         if ($sql) {
          echo "
          <script type='text/javascript'>
          setTimeout(function () { 
           swal({
            title: 'Berhasil di simpan',
            type: 'success',
            timer: 9000,
            showConfirmButton: false
            });  
            },10); 
            window.setTimeout(function(){ 
             window.location.replace('?page=video');
             } ,1000); 
             </script>
             ";
            }
           
          }
           ?>