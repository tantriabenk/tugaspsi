<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "jeniscuti";
$nama_jenis = ucwords($_POST['NamaJenisCuti']);


if(isset($_GET['add'])){
	$nilai = array(
		'NamaJenisCuti' => $nama_jenis
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$idj = $_POST['idj'];
	$where = "ID_JCuti = '$idj'";
	$nilai = array(
		'NamaJenisCuti' => $nama_jenis
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$idj = $_POST['idj'];
	$where = "ID_JCuti = '$idj'";
	$dbase->delete($tabel, $where);
}
?>
