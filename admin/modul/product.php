<?php
switch(@$_GET[act]){
//tampil product
	default:
	echo "<h2>PRODUCT HP</h2>
	<form method=post action='?module=product&act=tambahproduct'>
	

		<input type=submit class='btn btn-primary' value='Tambah product'>
	</form>
	<table class='table'>
		<tr>
			<th scope='col'>No</th><th scope='col'>foto hp</th><th scope='col'>nama hp </th><th scope='col'>harga hp</th><th scope='col'>spesifikasi hp</th><th scope='col'>aksi</th>
		</tr>";
		$tampil=mysqli_query($koneksi,"select * from produk_hp order by id_hp asc");
		$no=1;
		while ($r=mysqli_fetch_array($tampil)) {
			echo "<tr>
			<td>$no</td>
			<td><img src='galeri/$r[foto_hp]' width='50'</td>
			<td>$r[nama_hp]</td>
			<td>$r[harga_hp]</td>
			<td>$r[spek_hp]</td>
			<td><a class='btn btn-primary' href=?module=product&act=editproduct&id=$r[id_hp]>Edit</a>
				<a class='btn btn-danger' href=\"aksi.php?module=product&act=hapus&id=$r[id_hp]\" onClick=\"return confirm('apakah anda benar akan menghapus product $r[id_hp]?')\">Hapus</a>
			</td></tr>";
			$no++;
		}
		echo "</table>";
		break;
//tambah product
		case "tambahproduct":
		echo "<h2>Tambah product</h2>
		<form method=post action='aksi.php?module=product&act=input' enctype='multipart/form-data'>
		<div class='col-md-5'>
			<input type='file' name='foto_hp'>
  				<div class='form-group'>
    				<input class='form-control' name='nama_hp' type='text' placeholder='nama hp'>
  				</div>
  				<div class='form-group'>
    				<input type='text' class='form-control' name='harga_hp' placeholder='harga hp'>
  				</div>
  				<div class='form-group'>
    				<input type='text' class='form-control' name='spek_hp' placeholder='spek hp'>
  				</div>
  				<input type='submit' class='btn btn-primary' name='submit' value='Simpan'>
  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
			</div>
					</form>";
					break;

//edit product
					case "editproduct":
					$edit=mysqli_query($koneksi,"select * from produk_hp where
						id_hp='$_GET[id]'");
					$r=mysqli_fetch_array($edit);
					echo "<h2>Edit Product</h2>
					<form method=post action='aksi.php?module=product&act=update' enctype='multipart/form-data'>
					<div class='col-md-5'>
					<input type='file' name='foto_hp'>
  				<div class='form-group'>
  					<input type=hidden name=id value='$r[id_hp]'>
    				<input class='form-control' name='nama_hp' type='text' value='$r[nama_hp]'>
  				</div>
  				<div class='form-group'>
    				<input type='text' class='form-control' name='spek_hp' value='$r[spek_hp]'>
  				</div>
  				<div class='form-group'>
    				<input type='text' class='form-control' name='harga_hp' value='$r[harga_hp]'>
  				</div>
  				<input type='submit' class='btn btn-primary' name='submit' value='Update'>
  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
			</div>
						</form>";
								break;
	}
	?> 