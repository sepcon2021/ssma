$(function(){

    $("#downloadReport").on('click', function(event) {
		event.preventDefault();
        
        $("#formBoletas").trigger('submit');
        
        return false
    });

     //enviar formulario
     $("#formBoletas").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
		var str = $(this).serialize();
        console.log(str);

		$.post(RUTA + 'boleta/getListRRHH',str, function(data, textStatus, xhr) {
			console.log(data) 
            event.preventDefault();
            window.open(data.url)
        },'json');
        
		return false;
	});
})