<?php 
include '../assets/header.php';
include '../../koneksi.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Chat</h3>
            </div>
            <!-- /.box-header -->
<?php
$query="SELECT * from chat order by waktu desc";
$tampil=mysqli_query($kon,$query) or die(mysqli_error());
?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 200px">Action</th>
                  <th style="width: 300px">Member</th>
                  <th style="width: 300px">Chat</th>
                  <th style="width: 200px">Waktu</th>
                </tr>
                </thead>
                <tbody>
<?php while($data=mysqli_fetch_array($tampil)){ ?>
                <tr>
                  <td><center><div><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Chat" href="chating.php?kd=<?php echo $data['pengirim'];?>"><span class="glyphicon glyphicon-comment"></span></a>
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus" href="delete.php?kd=<?php echo $data['pengirim'];?>"><span class="glyphicon glyphicon-trash"></a>
                    </center></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['chat']; ?></td>
                  <td><?php echo $data['waktu']; ?></td>
                </tr>
<?php
}
?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
include '../assets/footer.php';
?>