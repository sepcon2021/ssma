$(function(){

    $(".capas").on('click', 'a', function(event) {
		event.preventDefault();
        /* Act on the event */
        RUTA = RUTA + "public/videos/";
        
        var video = RUTA + $(this).attr('href');
        
		$(".modalInterno").fadeIn('slow', function() {
			$("video")
			.attr("src",video)
			.trigger('play');
		});

		return false;
	});


	let fileInput = document.getElementById("file-input");
	let imageContainer = document.getElementById("images");


	$("#file-input").on("change",function(){
		console.log("prueba");
		preview();
	});

	function preview(){

		imageContainer.innerHTML = "";

		for (i of fileInput.files){
			let reader = new FileReader();
			let figure =document.createElement("figure");
			let figCap = document.createElement("figCaption");

			figCap.innerText = i.name;
			figure.appendChild(figCap);
			reader.onload= ()=> {
				let img = document.createElement("img");
				img.setAttribute("src",reader.result);
				figure.insertBefore(img,figCap);
			}
			imageContainer.appendChild(figure);
			reader.readAsDataURL(i);
		}

	}


	$("#enviar_prueba").on("click",function (event) { 
		event.preventDefault();
		$("#formPrueba").trigger('submit');
	 });

	$("#formPrueba").on('submit', function (event) {
		event.preventDefault();
		console.log(new FormData(this));

		$.ajax({
			type: 'POST',
			url: RUTA + 'seguimiento/uploadFilePrueba',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				console.log(response);
			}
		});
	});
})