<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "jabatan";
$NamaJabatan = ucwords($_POST['NamaJabatan']);


if(isset($_GET['add'])){
	$nilai = array(
		'Nama_Jabatan' => $NamaJabatan
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$idj = $_POST['idj'];
	$where = "ID_Jabatan = '$idj'";
	$nilai = array(
		'Nama_Jabatan' => $NamaJabatan
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$idj = $_POST['idj'];
	$where = "ID_Jabatan = '$idj'";
	$dbase->delete($tabel, $where);
}
?>
