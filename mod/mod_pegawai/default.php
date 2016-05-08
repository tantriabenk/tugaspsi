<script>
function back(){
	$("#result").load("mod/mod_pegawai/select.php");
}
$(document).ready(function() {
	$("#result").load("mod/mod_pegawai/select.php");
});
</script>
<div class="x_panel">
	<div class="x_title">
		<h2>Manage Pegawai</h2>
		<button type="button" class="btn btn-sm btn-info" style="float:right;" data-toggle="modal" data-target="#tambah">
		  Tambah Pegawai
		</button>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<div id="result"></div>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Pegawai</h4>
      </div>
			<form action="" method="POST" class="form-horizontal form-label-left">
	      <div class="modal-body">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Nama Pegawai</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="text" class="form-control" name="NamaPegawai" id="NamaPegawai" required placeholder="Masukkan Nama Pegawai" >
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">No. Telpon</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="number" class="form-control" name="NoTelpon" placeholder="Masukkan No. Telpon" id="NoTelpon" >
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Alamat</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="text" class="form-control" name="Alamat" placeholder="Masukkan Alamat" id="Alamat" >
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Tanggal Lahir</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="date" class="form-control" name="TanggalLahir" id="TanggalLahir" placeholder="Masukkan Tanggal Lahir" aria-describedby="inputSuccess2Status2">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Jenis Kelamin</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select class="form-control" name="JenisKelamin" id="JenisKelamin">
								<option value="L">Laki-Laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Golongan</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select class="form-control" name="Golongan" id="Golongan">
								<?php
								$tgolongan = "golongan";
								$fildg = "*";
								foreach($dbase->select($tgolongan, $fildg) as $dgolongan){
									echo "<option value='$dgolongan[ID_Golongan]'>$dgolongan[Nama_Golongan]</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Instansi</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select class="form-control" name="Instansi" id="Instansi">
								<?php
								$tinstansi = "instansi";
								$fildg = "*";
								foreach($dbase->select($tinstansi, $fildg) as $dinstansi){
									echo "<option value='$dinstansi[ID_Instansi]'>$dinstansi[Nama_Instansi]</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Jabatan</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select class="form-control" name="Jabatan" id="Jabatan">
								<?php
								$tjabatan = "jabatan";
								$fildg = "*";
								foreach($dbase->select($tjabatan, $fildg) as $djabatan){
									echo "<option value='$djabatan[ID_Jabatan]'>$djabatan[Nama_Jabatan]</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Password</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="Password" class="form-control" name="Pass" id="Pass" placeholder="" >
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Konfirmasi Password</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="Password" class="form-control" name="ConPass" id="ConPass" placeholder="">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
	        <button type="button" class="btn btn-primary" id="insert" style="margin-bottom:5px;">Simpan</button>
	      </div>
			</form>
    </div>
  </div>
</div>
<script>
$('#insert').click(function(){
	var NamaPegawai = $('#NamaPegawai').val();
	var NoTelpon = $('#NoTelpon').val();
	var Alamat = $('#Alamat').val();
	var TanggalLahir = $('#TanggalLahir').val();
	var JenisKelamin = $('#JenisKelamin').val();
	var Golongan = $('#Golongan').val();
	var Instansi = $('#Instansi').val();
	var Jabatan = $('#Jabatan').val();
	var Pass = $('#Pass').val();
	var ConPass = $('#ConPass').val();
	var datas="NamaPegawai="+NamaPegawai+"&NoTelpon="+NoTelpon+"&Alamat="+Alamat+"&TanggalLahir="+TanggalLahir+"&JenisKelamin="+JenisKelamin+"&Golongan="+Golongan+"&Instansi="+Instansi+"&Jabatan="+Jabatan+"&Pass="+Pass+"&ConPass="+ConPass;
	if (NamaPegawai=="" || NoTelpon=="" || Alamat=="" || TanggalLahir=="" || JenisKelamin=="" || Golongan=="" || Instansi=="" || Jabatan=="" || Pass==""){
		alert('Form masih kosong!');
	}else{
		if (Pass == ConPass){
			$.ajax({
				type: "POST",
				url: "mod/mod_pegawai/action.php?add",
				data: datas
			}).done(function(data){
				$('#NamaPegawai').val('');
				$('#NoTelpon').val('');
				$('#Alamat').val('');
				$('#TanggalLahir').val('');
				$('#Pass').val('');
				$('#ConPass').val('');
				back();
			})
			$('#insert').attr("data-dismiss", "modal");
			$( '.modal-backdrop' ).remove();
		}else{
			alert("Password dan Konfirmasi Password Tidak Sama!");
		}
	}
})
</script>
