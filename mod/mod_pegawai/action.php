<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "pegawai";
$NamaPegawai = ucwords($_POST['NamaPegawai']);
$NoTelpon = $_POST['NoTelpon'];
$Alamat = $_POST['Alamat'];
$TanggalLahir = $_POST['TanggalLahir'];
$JenisKelamin = $_POST['JenisKelamin'];
$Golongan = $_POST['Golongan'];
$Instansi = $_POST['Instansi'];
$Jabatan = $_POST['Jabatan'];
$Pass = md5($_POST['pass']);

if(isset($_GET['add'])){
	$NoPegawai = $dbase->getNip($TanggalLahir, $JenisKelamin);
	$nilai = array(
		'NIP' => $NoPegawai,
		'Nama' => $NamaPegawai,
		'Alamat' => $Alamat,
		'Phone' => $NoTelpon,
		'Jenis_Kelamin' => $JenisKelamin,
		'Tanggal_Lahir' => $TanggalLahir,
		'password' => $Pass,
		'ID_Golongan' => $Golongan,
		'ID_Instansi' => $Instansi,
		'ID_Jabatan' => $Jabatan
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$nip = $_POST['nip'];
	$NoPegawai = $dbase->getNipOnUpdate($TanggalLahir, $JenisKelamin, $nip);
	$where = "NIP = '$nip'";
	$nilai = array(
		'NIP' => $NoPegawai,
		'Nama' => $NamaPegawai,
		'Alamat' => $Alamat,
		'Phone' => $NoTelpon,
		'Jenis_Kelamin' => $JenisKelamin,
		'Tanggal_Lahir' => $TanggalLahir,
		'ID_Golongan' => $Golongan,
		'ID_Instansi' => $Instansi,
		'ID_Jabatan' => $Jabatan
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$nip = $_POST['nip'];
	$where = "NIP = '$nip'";
	$dbase->delete($tabel, $where);
}
?>
