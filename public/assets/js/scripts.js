$(function(){
	$(".js-lightgallery").lightGallery({
		mode: 'lg-zoom-out',
		download: false,
		zoom: true
	});
	$("#addBooking").on('click', function () {
		$('#addBookingModal').modal('show');
	});
});

function deletefuc(f) {
	$('#deletmodal').modal('show')
	$("#delet").on('click', function () {
		f.submit();
	});
}