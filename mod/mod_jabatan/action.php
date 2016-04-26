<?php
error_reporting(0);
include_once "../../__class/db.php";

$dbase = new db();
$tabel = "jabatan";


$Nama_Jabatan = ucwords($_POST['Nama_Jabatan']);


if(isset($_GET['add'])){
	$nilai = array(
		'Nama_Jabatan' => $Nama_Jabatan
	);
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=jabatan';</script>";
}else if(isset($_GET['update'])){
	$id = $_POST['id'];
	$where = "ID_Jabatan = '$id'";
	$nilai = array(
		'Nama_Jabatan' => $Nama_Jabatan
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=jabatan';</script>";
}
?>
