<?php
error_reporting(0);
include_once "../../__class/db.php";

$dbase = new db();
$tabel = "jeniscuti";


$NamaJenisCuti = ucwords($_POST['NamaJenisCuti']);


if(isset($_GET['add'])){
	$nilai = array(
		'NamaJenisCuti' => $NamaJenisCuti
	);
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=jenis_cuti';</script>";
}else if(isset($_GET['update'])){
	$id = $_POST['id'];
	$where = "ID_JCuti = '$id'";
	$nilai = array(
		'NamaJenisCuti' => $NamaJenisCuti
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=jenis_cuti';</script>";
}
?>
