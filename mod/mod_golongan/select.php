	<table id="datatable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Golongan</th>
				<th>Aksi</th>
			</tr>
		</thead>


		<tbody>
			<?php
			//post data
			$table = array(
				'golongan'
			);
			$fild = "*";
			$where = "";
			$no = 1;
			foreach($dbase->select($table, $fild, $where) as $data){
		  ?>
			<tr>
				<td> <?php echo $no++; ?> </td>
				<td> <?php echo $data['Nama_Golongan']; ?> </td>
				<td>
					<a href="<?php echo "$_SERVER[PHP_SELF]?mod=golongan&act=update&id=$data[ID_Golongan]"; ?>" size="10" class="btn btn-small btn-success" title="Update Data"><i class="fa fa-edit"> </i></a>

					<!--tombol delete-->
					<a href="<?php echo "mod/mod_golongan/delete.php?id=$data[ID_Golongan]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small" title="Delete Data"><i class="fa fa-trash"> </i></a>
				</td>
			</tr>
			<?php
			}
			?>

		</tbody>
	</table>
