<?php
$id = $_GET['id'];
$tabel = array(
	'tbl_departemen'
);
$fild = "*";
$where = "kode_departemen = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_departemen/action.php?update" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Kode Departemen</label></td>
			<td><input type="text" name="kodeDepartemen" class="login" size="" value="<?php echo $data['kode_departemen'] ?>" required /></td>
		</tr>
		<tr>
			<td><label>Nama Departemen</label></td>
			<td><input type="text" name="namaDepartemen" class="login" size="" value="<?php echo $data['nama_departemen'] ?>" required /></td>
		</tr>

		<tr>
			<td></td>
			<td>

				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>
