//Form for Adding Item
$('#form-register-item').submit(function(e) {
 	e.preventDefault();
 	
 	var a = '<a href="<?php echo site_url("masterlistofitems") ?>"><u>Go to Items</u></a>';
 	var me = $(this);
 	var succ = '';

 	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

 	//ajax
 	$.ajax({
 		url: me.attr('action'),
 		type: 'post',
 		data: me.serialize(),
 		dataType: 'json',
 		success: function(response) {
 			if (response.success == true) {
 				toastr.success("Added! " + a);
 			} else {
 				toastr.error(response.errors);
 			}

 		}
 	});
 });


//Form for updating item
$('#form-update-item').submit(function(e) {
 	e.preventDefault();
 	
 	var me = $(this);
 	var succ = '';

 	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

 	//ajax
 	$.ajax({
 		url: me.attr('action'),
 		type: 'post',
 		data: me.serialize(),
 		dataType: 'json',
 		success: function(response) {
 			if (response.success == true) {
 				toastr.success("Updated! Please refresh this page.");
 			} else {
 				toastr.error(response.errors);
 			}

 		}
 	});
 });