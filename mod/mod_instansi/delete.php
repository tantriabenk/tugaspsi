<?php
session_start();
error_reporting(0);
//if(!isset($_SESSION['nip'])){
	//echo "<script>document.location.href='../../index.php';</script>";
//}else{
	include_once "../../__class/db.php";
	$dbase = new db();
	$tabel = "instansi";
	$id = $_GET['id'];
	$where = "ID_Instansi = '$id'";

	$dbase->delete($tabel, $where);
	echo "<script>document.location.href='../../main.php?mod=instansi';</script>";
//}
?>
