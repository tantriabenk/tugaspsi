<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "instansi";
$Nama_Instansi = ucwords($_POST['NamaInstansi']);


if(isset($_GET['add'])){
	$nilai = array(
		'Nama_Instansi' => $Nama_Instansi
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$idi = $_POST['idi'];
	$where = "ID_Instansi = '$idi'";
	$nilai = array(
		'Nama_Instansi' => $Nama_Instansi
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$idi = $_POST['idi'];
	$where = "ID_Instansi = '$idi'";
	$dbase->delete($tabel, $where);
}
?>
