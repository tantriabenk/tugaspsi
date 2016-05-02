<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel" style="text-align:center;">Hapus Jabatan</h3>
			</div>
			<div class="modal-body">
				<h4 style="text-align:center;">Apakah anda yakin menghapus?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" style="margin-bottom:5px;">Delete</button>
			</div>
		</div>
	</div>
</div>
<script>
function add(){
	$("#action").load("mod/mod_jabatan/form.php?insert");
}
function edit(id){
	$("#action").load("mod/mod_jabatan/form.php?update&id="+id);
}
function del(id){
	$("#action").load("mod/mod_jabatan/form.php?delete&id="+id);
}
function back(){
	$("#action").html("");
	$("#result").load("mod/mod_jabatan/select.php");
}
$(document).ready(function() {
	$("#result").load("mod/mod_jabatan/select.php");
});
</script>

<div class="x_panel">
	<div class="x_title">
		<h2>Manage Jabatan</h2>
			<a class="btn btn-sm btn-info" style="float:right;" onClick="add()">Tambah Jabatan</a></i>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<div id="action"></div>
		<div id="result"></div>
	</div>
</div>
