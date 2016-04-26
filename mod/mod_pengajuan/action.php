<?php
error_reporting(0);
include_once "../../__class/db.php";

$dbase = new db();
$tabel = "tbl_departemen";


$kodeDepartemen = strtoupper($_POST['kodeDepartemen']);
$namaDepartemen = ucwords($_POST['namaDepartemen']);


if(isset($_GET['add'])){
	$nilai = array(
		'kode_departemen' => $kodeDepartemen,
		'nama_departemen' => $namaDepartemen
	);
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=departemen';</script>";
}else if(isset($_GET['update'])){
	$id = $_POST['id'];
	$where = "kode_departemen = '$id'";
	$nilai = array(
		'kode_departemen' => $kodeDepartemen,
		'nama_departemen' => $namaDepartemen
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=departemen';</script>";
}
?>
