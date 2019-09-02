<?php
$pengirim=$_GET['id'];
$query="SELECT * from chatting WHERE pengirim='$pengirim' or penerima='$penerima' order by id";
$tampil=mysqli_query($kon,$query) or die(mysqli_error());
mysqli_query($kon,"UPDATE `chat` SET `status`='yes' where pengirim='$pengirim' or penerima='$pengirim'");
?>
<?php while($data=mysqli_fetch_array($tampil)){ ?>
  <!-- Message. Default to the left -->
  <?php if ($data['pengirim']!=$pengirim) { ?>
    <div class="direct-chat-msg right">
      <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-right"><?php echo $data['namaguru']; ?></span>
        <span class="direct-chat-timestamp pull-left"><?php echo $data['waktu']; ?></span>
      </div>
      <!-- /.direct-chat-info -->
      <img class="direct-chat-img" src="img/6.jpeg" alt="Message User Image"><!-- /.direct-chat-img -->
      <div class="direct-chat-text">
        <?php 
        if (strpos($data['chat'], 'img') !== false){
          $kalimat = $data['chat'];
          $sub_kalimat = substr($kalimat,4);
          echo '<img src="img/'.$sub_kalimat.'" style="max-width: 300px;">';
        }else{
          echo $data['chat'];
        }
        ?>
      </div>
      <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->
  <?php }else{ ?>
    <div class="direct-chat-msg">
      <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-left"><?php echo $data['nama']; ?></span>
        <span class="direct-chat-timestamp pull-right"><?php echo $data['waktu']; ?></span>
      </div>
      <!-- /.direct-chat-info -->
      <img class="direct-chat-img" src="img/user.png" alt="Message User Image"><!-- /.direct-chat-img -->
      <div class="direct-chat-text">
        <?php 
        if (strpos($data['chat'], 'img') !== false){
          $kalimat = $data['chat'];
          $sub_kalimat = substr($kalimat,4);
          echo '<img src="img/'.$sub_kalimat.'" style="max-width: 300px;">';
        }else{
          echo $data['chat'];
        }
        ?>
      </div>
      <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->
  <?php } ?>
<?php } ?>
