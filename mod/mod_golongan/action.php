<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "golongan";
$nama_golongan = ucwords($_POST['NamaGolongan']);


if(isset($_GET['add'])){
	$nilai = array(
		'Nama_Golongan' => $nama_golongan
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$idg = $_POST['idg'];
	$where = "ID_Golongan = '$idg'";
	$nilai = array(
		'Nama_Golongan' => $nama_golongan
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$idg = $_POST['idg'];
	$where = "ID_Golongan = '$idg'";
	$dbase->delete($tabel, $where);
}
?>
