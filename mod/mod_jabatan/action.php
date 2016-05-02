<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "jabatan";
$Nama_Jabatan = ucwords($_POST['nama_jabatan']);


if(isset($_GET['add'])){
	$nilai = array(
		'Nama_Jabatan' => $Nama_Jabatan
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$id = $_POST['id_jabatan'];
	$where = "ID_Jabatan = '$id'";
	$nilai = array(
		'Nama_Jabatan' => $Nama_Jabatan
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$id = $_POST['id_jabatan'];
	$where = "ID_Jabatan = '$id'";
	$dbase->delete($tabel, $where);
}
?>
