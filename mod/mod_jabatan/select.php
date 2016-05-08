<?php include_once "../../config.php"; ?>

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
				<a data-toggle="modal" data-target="#ubah<?php echo $data['ID_Jabatan']; ?>" class="btn btn-small btn-success" title="Ubah Data"><i class="fa fa-edit"> </i></a>
				<?php
					$checkJabatan = $dbase->checkMasterJabatan($data['ID_Jabatan']);
					if($checkJabatan==0){
				?>
				<a data-toggle="modal" data-target="#hapus<?php echo $data['ID_Jabatan']; ?>" class="btn btn-small btn-danger" title="Hapus Data"><i class="fa fa-trash"> </i></a>
				<?php
					}
				?>
			</td>
		</tr>
		<div style="clear:both"></div>

		<!-- Modal Ubah Data -->
		<div class="modal fade" id="ubah<?php echo $data['ID_Jabatan']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ubah">Ubah Data Jabatan</h4>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Nama Jabatan</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="text" class="form-control" name="NamaJabatan" id="NamaJabatan<?php echo $data['ID_Jabatan'] ?>" required value="<?php echo $data['Nama_Jabatan']; ?>" >
								</div>
							</div><br/><br/>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="idj" id="idj<?php echo $data['ID_Jabatan'] ?>" value="<?php echo $data['ID_Jabatan']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
							<button type="button" class="btn btn-primary" id="update<?php echo $data['ID_Jabatan']; ?>" style="margin-bottom:5px;">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#update<?php echo $data['ID_Jabatan']; ?>').click(function(){
			var NamaJabatan = $('#NamaJabatan<?php echo $data['ID_Jabatan'] ?>').val();
			var idj = $('#idj<?php echo $data['ID_Jabatan'] ?>').val();
			var datas="NamaJabatan="+NamaJabatan+"&idj="+idj;
			if (NamaJabatan==""){
				$('#NamaJabatan<?php echo $data['ID_Jabatan'] ?>').val('<?php echo $data['Nama_Jabatan']; ?>');
				alert('Form masih kosong!');
			}else{
				$.ajax({
					type: "POST",
					url: "mod/mod_jabatan/action.php?update",
					data: datas
				}).done(function(data){
					back();
				})
				$('#update<?php echo $data['ID_Jabatan'] ?>').attr("data-dismiss", "modal");
			 	$( '.modal-backdrop' ).remove();
			}
		})
		</script>

		<!-- Modal Hapus Data -->
		<div class="modal fade" style="text-align:center;" id="hapus<?php echo $data['ID_Jabatan']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title" id="hapus">Hapus Data Jabatan</h2>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<h4>Apakah yakin ingin menghapus data <b><?php echo $data['Nama_Jabatan'] ?></b> ?</h4>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="idj" id="idj<?php echo $data['ID_Jabatan'] ?>" value="<?php echo $data['ID_Jabatan']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="button" class="btn btn-primary" id="delete<?php echo $data['ID_Jabatan']; ?>" style="margin-bottom:5px;">Hapus</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#delete<?php echo $data['ID_Jabatan'] ?>').click(function(){
			var idj = $('#idj<?php echo $data['ID_Jabatan'] ?>').val();
			var datas="idj="+idj;
			$.ajax({
				type: "POST",
				url: "mod/mod_jabatan/action.php?delete",
				data: datas
			}).done(function(data){
				back();
			})
			$('#delete<?php echo $data['ID_Jabatan'] ?>').attr("data-dismiss", "modal");
			$( '.modal-backdrop' ).remove();
		})
		</script>
		<?php
		}
		?>

	</tbody>
</table>
<?php include_once "../../BottomResource.php"; ?>
