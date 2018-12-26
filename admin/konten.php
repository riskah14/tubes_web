<?php
include "../include/koneksi.php";
include "../include/konversi_tgl.php";
//bagian home admin
if ($_GET['module']=='home') {
	echo "<h2><center>Halaman Utama<br></h2>
	<p class=welcome><center>TOKO HP <b>$_SESSION[namauser]</b><br>
		Silakan klik menu pilihan disebelah kiri untuk mengelola konten
		website<br> Terima Kasih</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p class=jam align=right>Login Hari ini: ";
			echo tgl_indo(date("Ymd"));
			echo " | ";
			echo date("H:i:s");
			echo "</p>";
		}
//bagian profil
		elseif ($_GET['module']=='profil') {
			include "modul/profil.php";
		}
//bagian product
		elseif ($_GET['module']=='product') {
			include "modul/product.php";
		}
// Apabila modul tidak ditemukan
		else{
			echo "<p><b>MODUL BELUM ADA</b></p>";
		}
		?>