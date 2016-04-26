<?php
error_reporting(0);
include_once "../../__class/db.php";

$dbase = new db();
$tabel = "instansi";


$Nama_Instansi = ucwords($_POST['Nama_Instansi']);


if(isset($_GET['add'])){
	$nilai = array(
		'Nama_Instansi' => $Nama_Instansi
	);
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=instansi';</script>";
}else if(isset($_GET['update'])){
	$id = $_POST['id'];
	$where = "ID_Instansi = '$id'";
	$nilai = array(
		'Nama_Instansi' => $Nama_Instansi
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=instansi';</script>";
}
?>
