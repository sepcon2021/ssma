$(function () {

    var DOCUMENTOS = 0;
    var SEGUIMIENTO = 1;
    var SEGUIMIENTODASHBOARD = 2;
    var REPORTES = 3;
    var ESTADISTICA = 4;
    var CAPACITACIONES = 5;


    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

    var nombres = data.result[0].nombres;
    var apellidos = data.result[0].apellidos;

    $("#header_usuario_inicial").text(getFirstWordName(nombres, apellidos));
    $("#header_usuario_apellido").text(nombres.split(" ")[0] +" "+apellidos.split(" ")[0]  )
    $("#header_usuario_cargo").text(data.result[0].dcargo)


    $.post(RUTA + 'documento/render', function (data, textStatus, xhr) {
        $(".mainpage").html(data);
    });
    
    let tabs = document.querySelector(".sidebar");
    let tabHeader = tabs.querySelector(".sidebar__menu");
    let tabHeaders = tabHeader.querySelectorAll("div");


    for (let i = 0; i < tabHeaders.length; i++) {
        tabHeaders[i].addEventListener("click", function () {

            tabHeader.querySelector(".active").classList.remove("active");
            tabHeaders[i].classList.add("active");
            console.log(i);
            getContentHtml(i);

        });
    }

    function getContentHtml(indexPage) {


        if(indexPage == DOCUMENTOS){
            $.post(RUTA + 'documento/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass();
        }
        if(indexPage == SEGUIMIENTO){
            $.post(RUTA + 'seguimiento/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass()       
        }
        if(indexPage == SEGUIMIENTODASHBOARD){
            $.post(RUTA + 'seguimientodashboard/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass()       
        }

        if(indexPage == REPORTES){
            $.post(RUTA + 'reporte/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass()

        }
        if(indexPage == ESTADISTICA){
            $(".mainpage").load("views/dashboard/estadistica.html");
            removeClass()
        }
        if(indexPage == CAPACITACIONES){
            $.post(RUTA + 'capacitacion/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });            
            removeClass()
        }

    }

    function getFirstWordName(name,apellido){
        var wordName = name.charAt(0);
        var wordAddress = apellido.charAt(0);
        return wordName+wordAddress;
    }

    $("#header_buscador_menu").on('click',function(){
        
        //var sidebar = document.getElementById("sidebar");
        var sidebar = document.getElementsByClassName("sidebar")[0];
        sidebar.classList.add("sidebar_responsive");

    });

    $("#sidebar_close").on('click',function(){
        
        //var sidebar = document.getElementById("sidebar");
        var sidebar = document.getElementsByClassName("sidebar")[0];
        sidebar.classList.remove("sidebar_responsive");

    });

    function removeClass(){
        var sidebar = document.getElementsByClassName("sidebar")[0];
        sidebar.classList.remove("sidebar_responsive");
    }
    

});