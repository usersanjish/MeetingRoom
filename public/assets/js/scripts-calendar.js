$(function(){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var route = $('input[name="route"]').val();
	var today = new Date();
	var start = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
	$('.date_start, .date_end').datetimepicker({
		language: 'ru',
		format: "dd-mm-yyyy hh:ii",
		daysOfWeekDisabled: [0, 6],
		autoclose: true,
		startDate: start,
		minuteStep: 5,
		hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7, 18, 19, 20, 21, 22, 23]
	});
	$('.date_end').on('changeDate', function(ev){
		$('.vtitle, .vstart, .vend, .vdescription').html('');
		var data_option = this.getAttribute('data-option');
		$.ajax({
			url: route,
			type: 'POST',
			dataType: 'JSON',
			data: {_token: CSRF_TOKEN, 
					start: $('.date_start').val(), 
					end: $('.date_end').val(),
					check_id: $('#check_id').val()
				},
			success: function (data) {

				if(data.status == true){
					$("#submit").attr('disabled', data.status);
					$(".v"+data_option).html('В это время помещение занято');
				}else{
					$("#submit").attr('disabled', data.status);
				}
			},
		});
	});

	$("#set_start").on('click', function () {
		$('.date_start').datetimepicker('show');
	});

	$("#clear_start").on('click', function () {
		$('.date_start').val('');
	});

	$("#set_end").on('click', function () {
		$('.date_end').datetimepicker('show');
	});

	$("#clear_end").on('click', function () {
		$('.date_end').val('');
	});

	$(".js-lightgallery").lightGallery({
		mode: 'lg-zoom-out',
		download: false,
		zoom: true
	});
	$("#addBooking").on('click', function () {
		$('#addBookingModal').modal('show');
	});

	$("#submit").on('click',function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var room_id = $('#check_id').val();
		var title = $('input[name="title"]').val();
		var start = $('input[name="start"]').val();
		var end = $('input[name="end"]').val();
		var des = $('textarea[name="description"]').val();
			$.ajax({
			url: "store",
			type: 'post',
			dataType: 'JSON',
			data: {_token: CSRF_TOKEN, room_id: room_id, title: title, start: start, end: end, description: des},
			success: function (data) {
				window.location.href = data.url;
			},
			error: function (data){
				$('.vtitle').html(data.responseJSON.errors['title']);
				$('.vstart').html(data.responseJSON.errors['start']);
				$('.vend').html(data.responseJSON.errors['end']);
				$('.vdescription').html(data.responseJSON.errors['description']);
			}
		});
	});
});