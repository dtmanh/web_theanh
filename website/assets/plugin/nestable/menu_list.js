
function active_tab(id) {
	$.ajax({
        url: base_url()+"techadmin/menu/active_tab",
		type: 'POST',
		dataType: 'json',
		data: {id:id},
		success: function (msg) {

		}
	});
}