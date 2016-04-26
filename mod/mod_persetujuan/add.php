<form action="mod/mod_departemen/action.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Kode Departemen</label></td>
			<td><input type="text" name="kodeDepartemen" class="login" size="" required /></td>
		</tr>
		<tr>
			<td><label>Nama Departemen</label></td>
			<td><input type="text" name="namaDepartemen" class="login" size="" required /></td>
		</tr>		
		<tr>
			<td></td>
			<td>
				<input type="submit" name="save" value="Simpan" class="btn btn-info" />
				<input type="reset" value="Batal" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>
