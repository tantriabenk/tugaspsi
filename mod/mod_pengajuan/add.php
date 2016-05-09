<form action="" method="POST" class="form-horizontal form-label-left">

	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">No Surat</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control " value="123456789" readonly id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
		<label class="control-label col-md-2 col-sm-2 col-xs-2">NIP Pegawai</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control " value="92829381293" readonly id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Nama Pegawai</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control " value="<?php echo $_SESSION['nama']; ?>" readonly id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Jabatan</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control " value="<?php echo $dbase->getJabatan($_SESSION['jabatan']); ?>" readonly id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Golongan</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control " value="<?php echo $dbase->getGolongan($_SESSION['golongan']); ?>" readonly id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Instansi</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control " value="<?php echo $dbase->getInstansi($_SESSION['instansi']); ?>" readonly id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Jenis Cuti</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<select class="form-control">
				<?php
					$field = array('ID_JCuti', 'NamaJenisCuti');
					foreach($dbase->select('jeniscuti', $field) as $data){
						echo "<option value='$data[ID_JCuti]'>$data[NamaJenisCuti]</option>";
					}
				?>
			</select>
		</div>
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Sisa Cuti</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control " value="3" readonly id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Alasan Cuti</label>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<textarea class="form-control" rows="5" cols=""></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Tanggal Awal Cuti</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control" id="single_cal3" placeholder="mm/dd/yyyy" aria-describedby="inputSuccess2Status">
			<span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
		</div>
		<label class="control-label col-md-2 col-sm-2 col-xs-2">Tanggal Akhir Cuti</label>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="text" class="form-control" id="single_cal2" placeholder="mm/dd/yyyy" aria-describedby="inputSuccess2Status">
			<span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="ln_solid"></div>

	<div class="form-group">
		<div class="col-md-9 col-md-offset-2">
			<button type="submit" class="btn btn-danger">Cancel</button>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>

</form>
