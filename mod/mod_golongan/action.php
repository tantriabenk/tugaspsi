<?php
error_reporting(0);
include_once "../../__class/db.php";

$dbase = new db();
$tabel = "golongan";


$Nama_Golongan = ucwords($_POST['Nama_Golongan']);


if(isset($_GET['add'])){
	$nilai = array(
		'Nama_Golongan' => $Nama_Golongan
	);
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=golongan';</script>";
}else if(isset($_GET['update'])){
	$id = $_POST['id'];
	$where = "ID_Golongan = '$id'";
	$nilai = array(
		'Nama_Golongan' => $Nama_Golongan
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=golongan';</script>";
}
?>
