$(function() {
    $("#callReportes").on("click", function(e) {
        e.preventDefault();

        $("#modalReporte").fadeIn();

        return false;
    });

    $("#closeReporte").on("click", function(e) {
        e.preventDefault();

        $("#modalReporte").fadeOut();

        return false;
    });



   // var src= document.querySelector("#pruebaimagen").src;
    //console.log(src);

    function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
      }
      
      var base64 = getBase64Image(document.getElementById("pruebaimagen"));
      console.log(base64);
})