  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>FORUM DISKUSI
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Buat Tugas</a></li>
      </ol>
    </section>

    <div class="col-md-6">
      <!-- Box Comment -->
      <div class="box box-success">
        <div class="box-header" >
          <i class="fa fa-comments-o"></i>

          <h3 class="box-title" >FORUM</h3>

          <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
            <div class="btn-group" data-toggle="btn-toggle">
              <?php echo date('d-M-Y') ?>
            </div>
          </div>
        </div>
        <div class="box-body chat" id="chat-box">
          <?php 
          $sql=mysqli_query($koneksi, "SELECT * from forum");
          while ($tampil=mysqli_fetch_array($sql)) {
            ?>
          <div class="item">
            <img src="img/<?php echo $tampil['foto'] ?>" alt="user image" class="offline">
            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i><?php echo $tampil['tgl'] ?></small>
                <?php echo $tampil['pengirim'] ?>
              </a>
              <?php echo $tampil['balasan'] ?>
            </p>
          </div>
        <?php } ?>
        </div>
        <!-- /.chat -->
        <div class="box-footer">
          <form method="post" action="">
          <div class="input-group">
            <input type="text" placeholder="Tulis Pesan..." class="form-control" name="balasan">

            <div class="input-group-btn">
              <input type="submit" name="simpan" class="btn btn-success" value="KIRIM">
            </div>
          </div>
          </form>
        </div>
      </div>
      <!-- /.box -->
    </div>

<?php 
if (isset($_POST['simpan'])) {
  $balasan=$_POST['balasan'];
  $tgl=date('Y-m-d');

  $sql=mysqli_query($koneksi, "INSERT into forum values (NULL, '$tgl', '$balasan', '$_SESSION[nama]', '$_SESSION[foto]')");
  if ($sql) {
    echo "
    <script type='text/javascript'>
    setTimeout(function () { 
      swal({
        title: 'PESAN TERKIRIM',
        type: 'success',
        timer: 9000,
        showConfirmButton: true
        });  
        },10); 
        window.setTimeout(function(){ 
          window.location.replace('?page=forum');
          } ,1000); 
          </script>";
        }
      }
      ?>

    <!-- PERATURAN -->

    <div class="col-md-6">
      <!-- Box Comment -->
      <div class="box box-widget">
        <div class="box-header with-border">

          <span class="btn btn-success">PERATURAN DI FORUM DISKUSI</span><br>
          <span class="description"><?php echo date('d-M-Y') ?></span>

          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- post text -->
            <p>1. Berkomentarlah dengan sopan</p>

            <p>2. Jika ada pertanyaan, silahkan bertanya dengan secara lengkap dan jelas</p>
            <p>3. Semua pertanyaan yang ditanyakan langsung kepada guru akan dijawa di forum ini</p>
            <p>4. Ucapkan Salam</p>

          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>