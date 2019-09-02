 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <h1>
    DATA USER
    <small>it all starts here</small>
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data User</a></li>
   </ol>
  </section>

  <!-- Main content -->
  <section class="content">
   <!-- Default box -->
   <div class="box">
    <div class="box-header with-border">
     <button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#modal-default">
     </button>
     Tambah User
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
         <td>USERNAME</td>
         <td>NAMA</td>
         <td >LEVEL</td>
         <td>PASSWORD</td>
         <td >FOTO</td>
         <td >Aksi</td>
        </tr>
       </thead>
       <tbody>
        <?php 
        include "koneksi.php";
        $sql=mysqli_query($koneksi, "SELECT * FROM user");
        while($data=mysqli_fetch_array($sql)){
         ?>

         <tr>
          <td><?php echo $data['username'] ?></td>
          <td><?php echo $data['nama'] ?></td>
          <td><?php echo $data['level'] ?></td>
          <td><?php echo $data['pass'] ?></td>
          <td height="10px"><img  src="img/<?php echo $data['foto'] ?>" width="70px" height="40px"></td>
          <td>
           <a href="?page=user&aksi=hapus&id_user=<?php echo $data['id_user']?>" class="btn btn-danger" aria-label="Delete" title="Hapus">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
           </a>
           <a href="?page=user&aksi=edit&id_user=<?php echo $data['id_user']?>" class="btn btn-primary" aria-label="Delete" title="Edit">
            <i class="fa fa-edit" aria-hidden="true"></i>
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
            <h4 class="modal-title">Tambah Data user</h4>
           </div>

           <div class="modal-body">
            <div class="form-group">
             <label>Username</label>
             <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
             <label>Nama</label>
             <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
             <label>Level</label>
             <select name="level" class="form-control">
              <option value="admin">Admin</option>
              <option value="guru">Guru</option>
             </select>
            </div>
            <div class="form-group">
             <label>Password</label>
             <input type="text" name="pass" class="form-control">
            </div>
            <div class="form-group">
             <label>foto</label>
             <input type="file" name="foto" class="form-control">
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
        $username=$_POST['username'];
        $nama=$_POST['nama'];
        $pass=password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $level=$_POST['level'];

        $foto= $_FILES['foto']['name'];
        $lokasi=$_FILES['foto']['tmp_name'];
        $upload=move_uploaded_file($lokasi, "img/".$foto);

        if($upload){
         $sql=mysqli_query($koneksi, "INSERT INTO user VALUES (NULL,'$username', '$nama','$level','$pass', '$foto')") or die (mysqli_error($koneksi));
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
             window.location.replace('?page=user');
             } ,1000); 
             </script>
             ";
            }
           }
          }
           ?>