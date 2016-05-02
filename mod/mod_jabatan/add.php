<form action="" method="POST" class="form-horizontal form-label-left">
	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Nama Jabatan</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control" id="nama_jabatan" name="Nama_Jabatan" value="" id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="ln_solid"></div>

	<div class="form-group">
		<div class="col-md-9 col-md-offset-2">
			<button type="button" onClick="back()" class="btn btn-danger">Cancel</button>
			<button type="button" id="insert" class="btn btn-primary">Save</button>
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
</script>
