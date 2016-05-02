<?php include_once "../../config.php"; ?>
<?php include_once "../../TopResource.php"; ?>
<table id="datatable" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Jabatan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		//post data
		$table = array(
			'jabatan'
		);
		$fild = "*";
		$where = "";
		$no = 1;
		foreach($dbase->select($table, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['Nama_Jabatan']; ?> </td>
			<td>
				<!--<a href="<?php echo "$_SERVER[PHP_SELF]?mod=jabatan&act=update&id=$data[ID_Jabatan]"; ?>" size="10" class="btn btn-small btn-success" title="Update Data"><i class="fa fa-edit"> </i></a>-->

				<a onClick="edit(<?php echo $data['ID_Jabatan'] ?>)" class="btn btn-small btn-success" title="Update Data"><i class="fa fa-edit"> </i></a>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-danger btn-small" data-toggle="modal" data-target="#myModal">
				  <i class="fa fa-trash"> </i>
				</button>

				<!--<a onClick="del(<?php echo $data['ID_Jabatan'] ?>)" class="btn btn-small btn-danger" title="Delete Data"><i class="fa fa-trash"> </i></a>-->
			</td>
		</tr>
		<?php
		}
		?>

	</tbody>
</table>
<?php include_once "../../BottomResource.php"; ?>
