<?php 
include '../assets/header.php';
include '../../koneksi.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <?php
              $pengirim=$_GET['kd'];
            ?>
            <div>
                            <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" style="height: 400px" id="chat">
                
              </div>
              <!--/.direct-chat-messages-->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="input-group">
                  <input id="msg" type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-btn">
                    <form enctype="multipart/form-data" method="POST">
                    <button class="btn btn-primary btn-flat"><span class="fa fa-picture-o"></span></button>
                    <input type="file" name="file" onchange="upload(this)">
                    <input type="hidden" name="pengirim" value="admin" >
                    <input type="hidden" name="penerima" value="<?php echo $pengirim;?>">
                  </form>
                  </span>
                      <span class="input-group-btn">
                        <input type="button" class="btn btn-primary btn-flat" value="Send" onclick="send()">
                      </span>
                </div>
            </div>
            <style type="text/css">
.input-group-btn input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
    <script>
    function upload(input){
        var xhr = new XMLHttpRequest();
        xhr.upload.onprogress = function(e) {
            console.log(e.loaded, e.total)
        }
        xhr.upload.onload = function(e) {
            console.log('file upload')
        }

        xhr.open("POST", "sendpicture.php", true);
        xhr.send(new FormData(input.parentElement));
    }
    </script>
          </div>
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
  function scrolldown() {
    $("#chat").scrollTop($("#chat")[0].scrollHeight);
  }
</script>
<script type="text/javascript">
    $(document).ready(function(){
    //setInterval memberikan delay pada saat data akan di tampilkan
    setInterval(function(){
                //Metode load digunakan untuk menampilkan data
      $('#chat').load("text.php?kd=<?php echo $pengirim;?>");
    }, 3000);
  });
</script>
<script type="text/javascript">
  function send() {
  var msg=document.getElementById("msg").value;
  var pengirim='admin';
  var penerima='<?php echo $pengirim;?>';

  var httpr=new XMLHttpRequest();
  httpr.open("POST","send.php",true);
  httpr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  // httpr.onreadystatechange=function() {
  //  if (httpr.readyState==4 && httpr.status==200) {
  //    document.getElementById('response').innerHTML=httpr.responseText;
  //  }
  // }
  httpr.send("msg="+msg+"&pengirim="+pengirim+"&penerima="+penerima);
  document.getElementById("msg").value="";
  scrolldown();

}
</script>
<?php 
include '../assets/footer.php';
?>