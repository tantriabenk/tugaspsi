<?php include_once "../../config.php"; ?>
<?php include_once "../../TopResource.php"; ?>
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
					<a data-toggle="modal" data-target="#ubah<?php echo $data['ID_Golongan']; ?>" class="btn btn-small btn-success" title="Ubah Data"><i class="fa fa-edit"> </i></a>
					<?php
						$checkGolongan = $dbase->checkMasterGolongan($data['ID_Golongan']);
						if($checkGolongan==0){
					?>
					<a data-toggle="modal" data-target="#hapus<?php echo $data['ID_Golongan']; ?>" class="btn btn-small btn-danger" title="Hapus Data"><i class="fa fa-trash"> </i></a>
					<?php
						}
					?>
				</td>
			</tr>

			<div style="clear:both"></div>

			<!-- Modal Ubah Data -->
			<div class="modal fade" id="ubah<?php echo $data['ID_Golongan']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="ubah">Ubah Data Golongan</h4>
						</div>
						<form action="" method="POST" class="form-horizontal form-label-left">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4 col-xs-4">Nama Golongan</label>
									<div class="col-md-8 col-sm-8 col-xs-8">
										<input type="text" class="form-control" name="NamaGolongan" id="NamaGolongan<?php echo $data['ID_Golongan'] ?>" required value="<?php echo $data['Nama_Golongan']; ?>" >
									</div>
								</div><br/><br/>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="idg" id="idg<?php echo $data['ID_Golongan'] ?>" value="<?php echo $data['ID_Golongan']; ?>" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
								<button type="button" class="btn btn-primary" id="update<?php echo $data['ID_Golongan']; ?>" style="margin-bottom:5px;">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<script>
			$('#update<?php echo $data['ID_Golongan']; ?>').click(function(){
				var NamaGolongan = $('#NamaGolongan<?php echo $data['ID_Golongan'] ?>').val();
				var idg = $('#idg<?php echo $data['ID_Golongan'] ?>').val();
				var datas="NamaGolongan="+NamaGolongan+"&idg="+idg;
				if (NamaGolongan==""){
					$('#NamaGolongan<?php echo $data['ID_Golongan'] ?>').val('<?php echo $data['Nama_Golongan']; ?>');
					alert('Form masih kosong!');
				}else{
					$.ajax({
						type: "POST",
						url: "mod/mod_golongan/action.php?update",
						data: datas
					}).done(function(data){
						back();
					})
					$('#update<?php echo $data['ID_Golongan'] ?>').attr("data-dismiss", "modal");
				 	$( '.modal-backdrop' ).remove();
				}
			})
			</script>

			<!-- Modal Hapus Data -->
			<div class="modal fade" style="text-align:center;" id="hapus<?php echo $data['ID_Golongan']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h2 class="modal-title" id="hapus">Hapus Data Golongan</h2>
						</div>
						<form action="" method="POST" class="form-horizontal form-label-left">
							<div class="modal-body">
								<h4>Apakah yakin ingin menghapus data <b><?php echo $data['Nama_Golongan'] ?></b> ?</h4>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="idg" id="idg<?php echo $data['ID_Golongan'] ?>" value="<?php echo $data['ID_Golongan']; ?>" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<button type="button" class="btn btn-primary" id="delete<?php echo $data['ID_Golongan']; ?>" style="margin-bottom:5px;">Hapus</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<script>
			$('#delete<?php echo $data['ID_Golongan'] ?>').click(function(){
				var idg = $('#idg<?php echo $data['ID_Golongan'] ?>').val();
				var datas="idg="+idg;
				$.ajax({
					type: "POST",
					url: "mod/mod_golongan/action.php?delete",
					data: datas
				}).done(function(data){
					back();
				})
				$('#delete<?php echo $data['ID_Golongan'] ?>').attr("data-dismiss", "modal");
				$( '.modal-backdrop' ).remove();
			})
			</script>
			<?php
			}
			?>

		</tbody>
	</table>
<?php include_once "../../BottomResource.php"; ?>
