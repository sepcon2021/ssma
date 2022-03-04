$(function () {

    var DOCUMENTOS = 0;
    var SEGUIMIENTO = 1;
    var SEGUIMIENTODASHBOARD = 2;
    var REPORTES = 3;
    var ESTADISTICA = 4;
    var FORMULARIO = 5;
    var ADMINFORMULARIO = 6;
    var LECCIONES_GENERAL = 7;
    var LECCIONES_APRENDIDAS = 8;



    var dataJson = "";

    emptySession();


    function showSideBar(){
        let contentHTML = ``;
        let permiso = dataJson.result[0].permiso;

        if(permiso.length > 0){

            contentHTML = `
            <div class="active"> Documentos</div>
            <div>Seguimiento</div>
            <div>Admin seguimiento</div>
            <div>Reportes</div>
            <div>Estadística</div>
            <div>Formulario</div>
            <div>Admin formulario</div>
            <div>Lecciones aprendidas</div>
            <div>Admin de lecciones</div>`

        }else{
    
            contentHTML = `
            <div class="active"> Documentos</div>
            <div>Seguimiento</div>
            <div>Reportes</div>
            <div>Estadística</div>
            <div>Formulario</div>
            <div>Lecciones aprendidas</div>`
        }

        $(".sidebar__menu").html(contentHTML);

    }


    function emptySession() {


        if (sessionStorage.getItem("dataTrabajador") == null) {
            window.location.replace(RUTA);
        } else {

            dataJson = JSON.parse(sessionStorage.getItem("dataTrabajador"));

            var nombres = dataJson.result[0].nombres;
            var apellidos = dataJson.result[0].apellidos;

            var notificacion = dataJson.result[0].notificacion;
            showNotificacion(notificacion);


            $("#header_usuario_inicial").text(getFirstWordName(nombres, apellidos));
            $("#header_usuario_apellido").text(nombres.split(" ")[0] + " " + apellidos.split(" ")[0])
            $("#header_usuario_cargo").text(dataJson.result[0].dcargo)

            showSideBar();


        }
    }


    function showNotificacion(notificacion){
        if(notificacion){
            $("#popup-2").addClass("active");
        }
    
    }

    $(".notificacion_button").on('click',function(){
        let dni = dataJson.result[0].dni;

        $.post(RUTA + 'main/insertNotificacion', {dni : dni } ,function (data, textStatus, xhr) {


            dataJson.result[0].notificacion = false;

            sessionStorage.removeItem("dataTrabajador");

            sessionStorage.setItem("dataTrabajador", JSON.stringify(dataJson));



            $.post(RUTA + 'leccionesAprendidas/renderGeneral', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
                $("#popup-2").removeClass("active");
            });  
        });  
        
 

        removeClass();
    });


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
            console.log("data");
            console.log(dataJson.result[0].permiso.length);

            if(dataJson.result[0].permiso.length > 0){
                getContentHtmlAdministrador(i);
            }else{
                getContentHtmlUser(i);
            }

        });
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

    function getContentHtmlAdministrador(indexPage) {


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
        if(indexPage == FORMULARIO){
            $.post(RUTA + 'administradorExamen/renderDashboardInicio', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass()
        }
        if(indexPage == ADMINFORMULARIO){
            $.post(RUTA + 'capacitacion/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });            
            removeClass()
        }

        if(indexPage == LECCIONES_APRENDIDAS){
            $.post(RUTA + 'leccionesAprendidas/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });            
            removeClass()
        }

        if(indexPage == LECCIONES_GENERAL){
            $.post(RUTA + 'leccionesAprendidas/renderGeneral', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });            
            removeClass()
        }


    }


    function getContentHtmlUser(indexPage) {


        if(indexPage == 0){
            $.post(RUTA + 'documento/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass();
        }
        if(indexPage == 1){
            $.post(RUTA + 'seguimiento/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass()       
        }

        if(indexPage == 2){
            $.post(RUTA + 'reporte/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass()

        }
        if(indexPage == 3){
            $(".mainpage").load("views/dashboard/estadistica.html");
            removeClass()
        }
        if(indexPage == 4){
            $.post(RUTA + 'administradorExamen/renderDashboardInicio', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
            removeClass()
        }
        if(indexPage == 5){
            $.post(RUTA + 'leccionesAprendidas/renderGeneral', function (data, textStatus, xhr) {
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

    function removeClass(){
        var sidebar = document.getElementsByClassName("sidebar")[0];
        sidebar.classList.remove("sidebar_responsive");
    }
    

    $(".cerrar_sesion").on('click',function(){
        
        if(sessionStorage.removeItem("dataTrabajador") == null){
            window.location.replace(RUTA);
        }

    });



});