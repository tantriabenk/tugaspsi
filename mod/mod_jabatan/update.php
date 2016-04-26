<?php
$id = $_GET['id'];
$tabel = array(
	'jabatan'
);
$fild = "*";
$where = "ID_Jabatan = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_jabatan/action.php?update" method="POST" class="form-horizontal form-label-left">

	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Nama Jabatan</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control" name="Nama_Jabatan" value="<?php echo $data['Nama_Jabatan']; ?>" id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="ln_solid"></div>

	<div class="form-group">
		<div class="col-md-9 col-md-offset-2">
			<a href="<?php echo "$_SERVER[PHP_SELF]?mod=jabatan"; ?>" class="btn btn-danger">Cancel</a>
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>

</form>
