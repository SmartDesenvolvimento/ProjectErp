/*
$(document).ready(function() {
	$('#exemplomodal').modal('show');
})
*/

$(button).click(function(){
	
	$('table tbody tr').each(function(){
	var name = $('.name').html();
	alert(name);
	
	});
});


/*
$(function(){
	$(document).on('click', '.btn-danger', function(e) {
			e.preventDefault;
			var nome = $(this).parent().find(".name").text();;
			alert(nome);
	});
});
*/