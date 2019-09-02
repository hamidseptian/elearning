<?php 
include "koneksi.php";
@$page=$_GET['page'];
@$aksi=$_GET['aksi'];

if ($page=='santri') {
	if ($aksi=="") {
		include "page/santri/santri.php";
	}
	if ($aksi=='tambah') {
		include "page/santri/tambah.php";
	}
	if ($aksi=='hapus') {
		include "page/santri/hapus.php";
	}
	if ($aksi=='edit') {
		include "page/santri/edit.php";
	}
}
if ($page=='user') {
	if ($aksi=="") {
		include "page/user/user.php";
	}
	if ($aksi=='tambah') {
		include "page/user/tambah.php";
	}
	if ($aksi=='hapus') {
		include "page/user/hapus.php";
	}
	if ($aksi=='edit') {
		include "page/user/edit.php";
	}
}
if ($page=='artikel') {
	if ($aksi=="") {
		include "page/artikel/artikel.php";
	}
	if ($aksi=='tambah') {
		include "page/artikel/tambah.php";
	}
	if ($aksi=='hapus') {
		include "page/artikel/hapus.php";
	}
	if ($aksi=='edit') {
		include "page/artikel/edit.php";
	}
}
if ($page=='video') {
	if ($aksi=="") {
		include "page/video/video.php";
	}
	if ($aksi=='tambah') {
		include "page/video/tambah.php";
	}
	if ($aksi=='hapus') {
		include "page/video/hapus.php";
	}
	if ($aksi=='edit') {
		include "page/video/edit.php";
	}
	if ($aksi=='cari_video') {
		include "page/video/cari_video.php";
	}
}
if ($page=='buat_tugas') {
	if ($aksi=="") {
		include "page/buat_tugas/buat_tugas.php";
	}
	if ($aksi=='tambah') {
		include "page/buat_tugas/tambah.php";
	}
	if ($aksi=='hapus') {
		include "page/buat_tugas/hapus.php";
	}
	if ($aksi=='edit') {
		include "page/buat_tugas/edit.php";
	}
}
if ($page=='tugas_santri') {
	if ($aksi=="") {
		include "page/tugas_santri/tugas_santri.php";
	}
	if ($aksi=='nilai_santri') {
		include "page/tugas_santri/nilai_santri.php";
	}
}
if ($page=='materi') {
	if ($aksi=="") {
		include "page/materi/materi.php";
	}
	if ($aksi=='tambah') {
		include "page/materi/tambah.php";
	}
	if ($aksi=='hapus') {
		include "page/materi/hapus.php";
	}
	if ($aksi=='edit') {
		include "page/materi/edit.php";
	}
	if ($aksi=='l_materi') {
		include "page/materi/lihat_materi.php";
	}
}
if ($page=='u_tugas') {
	if ($aksi=="") {
		include "page/u_tugas/tugas.php";
	}
	if ($aksi=='hapus') {
		include "page/u_tugas/hapus.php";
	}
}
if ($page=='nilaipersantri') {
	include "page/nilai/nilaipersantri.php";
}
if ($page=='nilaisemua') {
	include "page/nilai/nilaisemua.php";
}
if ($page=='forum') {
	if ($aksi=="") {
		include "page/forum/forum.php";
	}
}

if ($page=='chat') {
	if ($aksi=="") {
		include "page/chat/chat.php";
	}
	if ($aksi=='chatting') {
		include "page/chat/chatting.php";
	}
}
 ?>