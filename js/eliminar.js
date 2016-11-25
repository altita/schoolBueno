$(document).ready(function() {
	$('a.delete').click(function(e) {

		e.preventDefault();
		var parent = $(this).parent();
		$.ajax({
			type: 'get',
			url: '../php/eliminarDocente.php',
			data: 'ajax=1&delete=' + parent.attr('id').replace('record-',''),
			beforeSend: function() {
				parent.animate({'backgroundColor':'#fb6c6c'},300);
			},
			success: function() {
				parent.slideUp(300,function() {
					parent.remove();
				});
			}
		});
	});
});
