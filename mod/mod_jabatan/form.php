<?php
include_once "../../config.php";
$nm_jabatan = "";
if(isset($_GET['insert'])){
	$nm_jabatan = "";
	$id = "";
}else if(isset($_GET['update']) or isset($_GET['delete'])){
	$id = $_GET['id'];
	$tabel = array(
		'jabatan'
	);
	$fild = "*";
	$where = "ID_Jabatan = '$id'";
	foreach($dbase->select($tabel, $fild, $where) as $data){}
	$nm_jabatan = $data['Nama_Jabatan'];
}
?>
<form action="" method="POST" class="form-horizontal form-label-left">

	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Nama Jabatan</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control" name="Nama_Jabatan" id="nama_jabatan" value="<?php echo $nm_jabatan; ?>" id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="ln_solid"></div>

	<div class="form-group">
		<div class="col-md-9 col-md-offset-2">
			<button type="button" onClick="back()" class="btn btn-danger">Cancel</button>
			<input type="hidden" name="id" id="id_jabatan" value="<?php echo $id; ?>" />
			<?php if(isset($_GET['update'])){ ?>
			<button type="button" id="update" class="btn btn-primary">Update</button>
			<?php }else if(isset($_GET['insert'])){ ?>
			<button type="button" id="insert" class="btn btn-primary">Update</button>
			<?php }else{ ?>
			<button type="button" id="delete" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-primary">Delete</button>
			<?php } ?>
		</div>
	</div>
</form>
<script>
$('#insert').click(function(){
	var nama_jabatan = $('#nama_jabatan').val();
	var datas="nama_jabatan="+nama_jabatan;

	$.ajax({
		type: "POST",
		url: "mod/mod_jabatan/action.php?add",
		data: datas
	}).done(function(data){
		back();
	})

})

$('#update').click(function(){
	var nama_jabatan = $('#nama_jabatan').val();
	var id_jabatan = $('#id_jabatan').val();
	var datas="nama_jabatan="+nama_jabatan+"&id_jabatan="+id_jabatan;

	$.ajax({
		type: "POST",
		url: "mod/mod_jabatan/action.php?update",
		data: datas
	}).done(function(data){
		back();
	})
})

$('#delete').click(function(){
	var id_jabatan = $('#id_jabatan').val();
	var datas="id_jabatan="+id_jabatan;

	$.ajax({
		type: "POST",
		url: "mod/mod_jabatan/action.php?delete",
		data: datas
	}).done(function(data){
		back();
	})

})
</script>
