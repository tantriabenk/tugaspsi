<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['no_pegawai'])){
	echo "<script>document.location.href='../../index.php';</script>";
}else{
	include_once "../../__class/db.php";
	$dbase = new db();
	$tabel = "tbl_departemen";
	$id = $_GET['id'];
	$where = "kode_departemen = '$id'";

	$dbase->delete($tabel, $where);
	echo "<script>document.location.href='../../main.php?mod=departemen';</script>";
}
?>
