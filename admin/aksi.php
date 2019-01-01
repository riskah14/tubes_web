<?php
include "../include/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];
//$id=$_GET['id'];
//delete data dalam database
if ($module=='product' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from produk_hp where
		id_hp='$_GET[id]'");
	header('location:server.php?module=product');
}

elseif ($module=='product' and $act=='input')
{
$set = true;
$msg = "";
//tentukan variabel file yg diupload dan tipe file
$tipe_file	= $_FILES['foto_hp']['type'];
$lokasi_file = $_FILES['foto_hp']['tmp_name'];
$nama_file	= $_FILES['foto_hp']['name'];
$save_file =move_uploaded_file($lokasi_file,"galeri/$nama_file");

if(empty($lokasi_file))
{
$set=false;
$msg= $msg.'Upload gagal, Anda Lupa Mengambil Gambar..';
}
else
{
//tentukan tipe file harus image 
if ($tipe_file != "image/gif" and
$tipe_file != "image/jpeg" and
$tipe_file != "image/jpg" and
$tipe_file != "image/pjpeg" and
$tipe_file != "image/png")
{
$set=false;
$msg= $msg. 'Upload gagal, tipe file harus image..';
}
else
{
isset($save_file);
}
//replace di server 
if($save_file)
{
chmod("galeri/$nama_file", 0777);
}
else
{
$msg = $msg.'Upload Image gagal..';
$set =	false;
}
}
if($set)
{
$nm_hp=$_POST['nama_hp'];
$harga_hp=$_POST['harga_hp'];
$spek_hp=$_POST['spek_hp'];

$sql=mysqli_query($koneksi,"insert into produk_hp (foto_hp,nama_hp,harga_hp,spek_hp)values('$nama_file','$nm_hp','$harga_hp','$spek_hp')");
$msg= $msg.'sukses mengupload';
print "<meta http-equiv=\"refresh\" content=\"1;URL=server.php?module=product\">";
}
echo "$msg";
}

//Update galeri
elseif ($module=='product' and $act=='update')
{
$set = true;
$msg = "";

//tentukan variabel file yg diupload dan tipe file
$tipe_file	= $_FILES['foto_hp']['type'];
$lokasi_file = $_FILES['foto_hp']['tmp_name'];
$nama_file	= $_FILES['foto_hp']['name'];
$save_file =move_uploaded_file($lokasi_file,"galeri/$nama_file");

if(empty($lokasi_file))
{
isset($set);
}
else
{
//tentukan tipe file harus image 
	if ($tipe_file != "image/gif" and
$tipe_file != "image/jpeg" and
$tipe_file != "image/jpg" and
$tipe_file != "image/pjpeg" and
$tipe_file != "image/png")
{
$set=false;
$msg= $msg. 'Upload gagal, tipe file harus image..';
}
else
{
$unlink=mysqli_query($koneksi, "select * from produk_hp where id_hp='$_POST[id]'");
$CekLink=mysqli_fetch_array($unlink); 
if(!empty($CekLink['foto_hp']));
{
unlink("galeri/$CekLink[foto_hp]");
}
isset($save_file);
}
//replace di server 
if($save_file)
{
chmod("galeri/$nama_file", 0777);
}
else
{
$msg = $msg.'Upload Image gagal..';
$set =	false;
}
}
if($set)
{
$id_hp=$_POST['id'];
$nama_hp=$_POST['nama_hp'];
$harga_hp=$_POST['harga_hp'];
$spek_hp=$_POST['spek_hp'];

if(empty($lokasi_file))
{
mysqli_query($koneksi, "update produk_hp set nama_hp='$nama_hp', harga_hp='$harga_hp', spek_hp='$spek_hp' where id_hp='$id_hp'");}
else{mysqli_query($koneksi, "update produk_hp set foto_hp='$nama_file',nama_hp='$nama_hp', harga_hp='$harga_hp', spek_hp='$spek_hp'  where id_hp='$id_hp'");
}
$msg= $msg.'Update Galeri Sukses..'; print "<meta http-equiv=\"refresh\"
content=\"1;URL=server.php?module=product\">";
}
echo "$msg";
}		

?>