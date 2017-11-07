function addEvents() {
	$("tr[id]").click(function(){
        window.location = $(this).attr('href');
        return false;
    });
}

addEvents();