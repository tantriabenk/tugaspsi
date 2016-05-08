<?php include_once "../../config.php"; ?>
<?php include_once "../../TopResource.php"; ?>
<table id="datatable" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NIP</th>
			<th>Nama Pegawai</th>
			<th>No Telpon</th>
			<th>Golongan</th>
			<th>Instansi</th>
			<th>Jabatan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		//post data
		$table = array(
			'pegawai P',
			'golongan G',
			'instansi I',
			'jabatan J'
		);
		$fild = "*";
		$join = "
			pegawai P LEFT OUTER JOIN golongan G ON P.ID_Golongan=G.ID_Golongan
			LEFT OUTER JOIN instansi I ON I.ID_Instansi=P.ID_Instansi
			LEFT OUTER JOIN jabatan J ON J.ID_Jabatan=P.ID_Jabatan";
		$where = "";
		$no = 1;
		foreach($dbase->select($table, $fild, $where, $join) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['NIP']; ?> </td>
			<td> <?php echo $data['Nama']; ?></td>
			<td> <?php echo $data['Phone']; ?> </td>
			<td> <?php echo $data['Nama_Golongan']; ?> </td>
			<td> <?php echo $data['Nama_Instansi']; ?> </td>
			<td> <?php echo $data['Nama_Jabatan']; ?> </td>
			<td>
				<a data-toggle="modal" data-target="#ubah<?php echo $data['NIP']; ?>" class="btn btn-small btn-success" title="Ubah Data"><i class="fa fa-edit"> </i></a>
				<?php
					$checkPegawai = $dbase->checkMasterPegawai($data['NIP']);
					if($checkPegawai==0){
				?>
				<a data-toggle="modal" data-target="#hapus<?php echo $data['NIP']; ?>" class="btn btn-small btn-danger" title="Hapus Data"><i class="fa fa-trash"> </i></a>
				<?php
					}
				?>

			</td>
		</tr>
		<div style="clear:both"></div>

		<!-- Modal Ubah Data -->
		<div class="modal fade" id="ubah<?php echo $data['NIP']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ubah">Ubah Data Pegawai</h4>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Nama Pegawai</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="text" class="form-control" name="NamaPegawai" id="NamaPegawai<?php echo $data['NIP'] ?>" required value="<?php echo $data['Nama']; ?>" >
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">No. Telpon</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="number" class="form-control" name="NoTelpon" value="<?php echo $data['Phone']; ?>" id="NoTelpon<?php echo $data['NIP'] ?>" >
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Alamat</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="text" class="form-control" name="Alamat" value="<?php echo $data['Alamat']; ?>" id="Alamat<?php echo $data['NIP'] ?>" >
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Tanggal Lahir</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="date" class="form-control" name="TanggalLahir" id="TanggalLahir<?php echo $data['NIP'] ?>" value="<?php echo $data['Tanggal_Lahir']; ?>" aria-describedby="inputSuccess2Status2">
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Jenis Kelamin</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select class="form-control" name="JenisKelamin" id="JenisKelamin<?php echo $data['NIP'] ?>">
									<?php
										if($data['Jenis_Kelamin']=="L"){
											echo "
												<option value='L' selected>Laki-Laki</option>
												<option value='P'>Perempuan</option>
											";
										}else{
											echo "
												<option value='L'>Laki-Laki</option>
												<option value='P' selected>Perempuan</option>
											";
										}
									?>

									</select>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Golongan</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select class="form-control" name="Golongan" id="Golongan<?php echo $data['NIP'] ?>">
										<?php
										$tgolongan = "golongan";
										$fildg = "*";
										foreach($dbase->select($tgolongan, $fildg) as $dgolongan){
											if($data['ID_Golongan']==$dgolongan['ID_Golongan']){
												echo "<option value='$dgolongan[ID_Golongan]' selected>$dgolongan[Nama_Golongan]</option>";
											}else{
												echo "<option value='$dgolongan[ID_Golongan]'>$dgolongan[Nama_Golongan]</option>";
											}
										}
										?>
									</select>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Instansi</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select class="form-control" name="Instansi" id="Instansi<?php echo $data['NIP'] ?>">
										<?php
										$tinstansi = "instansi";
										$fildg = "*";
										foreach($dbase->select($tinstansi, $fildg) as $dinstansi){
											if($data['ID_Instansi']==$dinstansi['ID_Instansi']){
												echo "<option value='$dinstansi[ID_Instansi]' selected>$dinstansi[Nama_Instansi]</option>";
											}else{
												echo "<option value='$dinstansi[ID_Instansi]'>$dinstansi[Nama_Instansi]</option>";
											}
										}
										?>
									</select>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Jabatan</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select class="form-control" name="Jabatan" id="Jabatan<?php echo $data['NIP'] ?>">
										<?php
										$tjabatan = "jabatan";
										$fildg = "*";
										foreach($dbase->select($tjabatan, $fildg) as $djabatan){
											if($data['ID_Jabatan']==$djabatan['ID_Jabatan']){
												echo "<option value='$djabatan[ID_Jabatan]' selected>$djabatan[Nama_Jabatan]</option>";
											}else{
												echo "<option value='$djabatan[ID_Jabatan]'>$djabatan[Nama_Jabatan]</option>";
											}
										}
										?>
									</select>
								</div>
							</div><br/><br/>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="nip" id="nip<?php echo $data['NIP'] ?>" value="<?php echo $data['NIP']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
							<button type="button" class="btn btn-primary" id="update<?php echo $data['NIP']; ?>" style="margin-bottom:5px;">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#update<?php echo $data['NIP'] ?>').click(function(){
			var NamaPegawai = $('#NamaPegawai<?php echo $data['NIP'] ?>').val();
			var NoTelpon = $('#NoTelpon<?php echo $data['NIP'] ?>').val();
			var Alamat = $('#Alamat<?php echo $data['NIP'] ?>').val();
			var TanggalLahir = $('#TanggalLahir<?php echo $data['NIP'] ?>').val();
			var JenisKelamin = $('#JenisKelamin<?php echo $data['NIP'] ?>').val();
			var Golongan = $('#Golongan<?php echo $data['NIP'] ?>').val();
			var Instansi = $('#Instansi<?php echo $data['NIP'] ?>').val();
			var Jabatan = $('#Jabatan<?php echo $data['NIP'] ?>').val();
			var nip = $('#nip<?php echo $data['NIP'] ?>').val();
			var datas="NamaPegawai="+NamaPegawai+"&NoTelpon="+NoTelpon+"&Alamat="+Alamat+"&TanggalLahir="+TanggalLahir+"&JenisKelamin="+JenisKelamin+"&Golongan="+Golongan+"&Instansi="+Instansi+"&Jabatan="+Jabatan+"&nip="+nip;
			if (NamaPegawai=="" || NoTelpon=="" || Alamat=="" || TanggalLahir=="" || JenisKelamin=="" || Golongan=="" || Instansi=="" || Jabatan==""){
				alert('Form masih kosong!');
			}else{
				$.ajax({
					type: "POST",
					url: "mod/mod_pegawai/action.php?update",
					data: datas
				}).done(function(data){
					back();
				})
				$('#update<?php echo $data['NIP'] ?>').attr("data-dismiss", "modal");
				$( '.modal-backdrop' ).remove();
			}
		})
		</script>

		<!-- Modal Hapus Data -->
		<div class="modal fade" style="text-align:center;" id="hapus<?php echo $data['NIP']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title" id="hapus">Hapus Data Pegawai</h2>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<h4>Apakah yakin ingin menghapus data <b><?php echo $data['Nama'] ?></b> ?</h4>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="nip" id="nip<?php echo $data['NIP'] ?>" value="<?php echo $data['NIP']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="button" class="btn btn-primary" id="delete<?php echo $data['NIP']; ?>" style="margin-bottom:5px;">Hapus</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script>
		$('#delete<?php echo $data['NIP'] ?>').click(function(){
			var nip = $('#nip<?php echo $data['NIP'] ?>').val();
			var datas="nip="+nip;
			$.ajax({
				type: "POST",
				url: "mod/mod_pegawai/action.php?delete",
				data: datas
			}).done(function(data){
				back();
			})
			$('#delete<?php echo $data['NIP'] ?>').attr("data-dismiss", "modal");
			$( '.modal-backdrop' ).remove();
		})
		</script>
		<?php
		}
		?>

	</tbody>
</table>

<?php include_once "../../BottomResource.php"; ?>
