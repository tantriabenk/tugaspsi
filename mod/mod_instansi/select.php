<?php include_once "../../config.php"; ?>
<?php include_once "../../TopResource.php"; ?>
<table id="datatable" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Instansi</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		//post data
		$table = array(
			'instansi'
		);
		$fild = "*";
		$where = "";
		$no = 1;
		foreach($dbase->select($table, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['Nama_Instansi']; ?> </td>
			<td>
				<a data-toggle="modal" data-target="#ubah<?php echo $data['ID_Instansi']; ?>" class="btn btn-small btn-success" title="Ubah Data"><i class="fa fa-edit"> </i></a>
				<?php
					$checkInstansi = $dbase->checkMasterInstansi($data['ID_Instansi']);
					if($checkInstansi==0){
				?>
				<a data-toggle="modal" data-target="#hapus<?php echo $data['ID_Instansi']; ?>" class="btn btn-small btn-danger" title="Hapus Data"><i class="fa fa-trash"> </i></a>
				<?php
					}
				?>
			</td>
		</tr>

		<div style="clear:both"></div>

		<!-- Modal Ubah Data -->
		<div class="modal fade" id="ubah<?php echo $data['ID_Instansi']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ubah">Ubah Data Instansi</h4>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Nama Instansi</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="text" class="form-control" name="NamaInstansi" id="NamaInstansi<?php echo $data['ID_Instansi'] ?>" required value="<?php echo $data['Nama_Instansi']; ?>" >
								</div>
							</div><br/><br/>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="idi" id="idi<?php echo $data['ID_Instansi'] ?>" value="<?php echo $data['ID_Instansi']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
							<button type="button" class="btn btn-primary" id="update<?php echo $data['ID_Instansi']; ?>" style="margin-bottom:5px;">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#update<?php echo $data['ID_Instansi']; ?>').click(function(){
			var NamaInstansi = $('#NamaInstansi<?php echo $data['ID_Instansi'] ?>').val();
			var idi = $('#idi<?php echo $data['ID_Instansi'] ?>').val();
			var datas="NamaInstansi="+NamaInstansi+"&idi="+idi;
			if (NamaInstansi==""){
				$('#NamaInstansi<?php echo $data['ID_Instansi'] ?>').val('<?php echo $data['Nama_Instansi']; ?>');
				alert('Form tidak boleh kosong!');
			}else{
				$.ajax({
					type: "POST",
					url: "mod/mod_instansi/action.php?update",
					data: datas
				}).done(function(data){
					back();
				})
				$('#update<?php echo $data['ID_Instansi'] ?>').attr("data-dismiss", "modal");
			 	$( '.modal-backdrop' ).remove();
			}
		})
		</script>

		<!-- Modal Hapus Data -->
		<div class="modal fade" style="text-align:center;" id="hapus<?php echo $data['ID_Instansi']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title" id="hapus">Hapus Data Instansi</h2>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<h4>Apakah yakin ingin menghapus data <b><?php echo $data['Nama_Instansi'] ?></b> ?</h4>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="idi" id="idi<?php echo $data['ID_Instansi'] ?>" value="<?php echo $data['ID_Instansi']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="button" class="btn btn-primary" id="delete<?php echo $data['ID_Instansi']; ?>" style="margin-bottom:5px;">Hapus</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#delete<?php echo $data['ID_Instansi'] ?>').click(function(){
			var idi = $('#idi<?php echo $data['ID_Instansi'] ?>').val();
			var datas="idi="+idi;
			$.ajax({
				type: "POST",
				url: "mod/mod_instansi/action.php?delete",
				data: datas
			}).done(function(data){
				back();
			})
			$('#delete<?php echo $data['ID_Instansi'] ?>').attr("data-dismiss", "modal");
			$( '.modal-backdrop' ).remove();
		})
		</script>
		<?php
		}
		?>

	</tbody>
</table>
<?php include_once "../../BottomResource.php"; ?>
