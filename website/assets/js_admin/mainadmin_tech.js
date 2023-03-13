$( window ).load(function() {
    var url = window.location.href;
	$('a[href="' + url + '"]').parent('li').addClass('active');
	$('a[href="' + url + '"]').parent('li').parent('ul').parent('li').addClass('active');
	
});

function base_url(){
    return $('#baseurl').val();
}
