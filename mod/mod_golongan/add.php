<form action="mod/mod_golongan/action.php?add" method="POST" class="form-horizontal form-label-left">

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
			<input type="text" class="form-control" name="Nama_Golongan" value="" id="inputSuccess2" >
			<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		</div>
	</div>
	<div class="ln_solid"></div>

	<div class="form-group">
		<div class="col-md-9 col-md-offset-2">
			<a href="<?php echo "$_SERVER[PHP_SELF]?mod=golongan"; ?>" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>

</form>
<!-- form validation -->
<script src="../../js/validator/validator.js"></script>
<script>
	// initialize the validator function
	validator.message['date'] = 'not a real date';

	// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
	$('form')
		.on('blur', 'input[required], input.optional, select.required', validator.checkField)
		.on('change', 'select.required', validator.checkField)
		.on('keypress', 'input[required][pattern]', validator.keypress);

	$('.multi.required')
		.on('keyup blur', 'input', function() {
			validator.checkField.apply($(this).siblings().last()[0]);
		});

	// bind the validation to the form submit event
	//$('#send').click('submit');//.prop('disabled', true);

	$('form').submit(function(e) {
		e.preventDefault();
		var submit = true;
		// evaluate the form using generic validaing
		if (!validator.checkAll($(this))) {
			submit = false;
		}

		if (submit)
			this.submit();
		return false;
	});

	/* FOR DEMO ONLY */
	$('#vfields').change(function() {
		$('form').toggleClass('mode2');
	}).prop('checked', false);

	$('#alerts').change(function() {
		validator.defaults.alerts = (this.checked) ? false : true;
		if (this.checked)
			$('form .alert').remove();
	}).prop('checked', false);
</script>
