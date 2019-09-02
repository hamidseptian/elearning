<?php

require '../../koneksi.php';

$query = mysqli_query($koneksi,"SELECT * FROM nilai WHERE kode_upload='$_POST[id]' ");
$data = mysqli_fetch_assoc($query);
//print_r($data);
echo json_encode($data);