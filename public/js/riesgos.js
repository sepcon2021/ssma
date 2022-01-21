$(function() {



console.log('cambios 2.0 1');

    /**************************************************************************** */
    /************* BOTONES PARA ATRAS,SIGUIENTE Y VALIDAR FORMULARO ************* */
    /**************************************************************************** */
    /**************************************************************************** */

    $('.page').animate({ scrollTop: 0 }, 'slow');


    $('#container1').hide();
    $('#container2').hide();
    $('#container3').hide();
    $('#container4').hide();
    $('#container5').hide();
    $('#container6').hide();
    $('#container7').hide();
    $('#container8').hide();
    $('#container9').hide();
    $('#container10').hide();
    $('#container11').hide();
    $('#container12').hide();
    $('#container13').hide();
    $('#container14').hide();
    $('#container15').hide();


    $("#button_next0").on('click', function(event) {
        event.preventDefault();

        if (validateContainer0()) {


            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container0").hide();
            $("#container1").fadeIn();


        } else {

            $('.page').animate({ scrollTop: 0 }, 'slow');

        }


        return false

    });


    $("#button_next1").on('click', function(event) {
        event.preventDefault();


        if (validateContainer1()) {

            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container1").hide();
            $("#container2").fadeIn();
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');
        }


        return false

    });


    $("#button_back1").on('click', function(event) {
        event.preventDefault();

        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container1").hide();
        $("#container0").fadeIn();

        return false

    });


    $("#button_next2").on('click', function(event) {
        event.preventDefault();

        if (validateContainer2()) {

            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container2").hide();
            $("#container3").fadeIn();

        } else {

            $('.page').animate({ scrollTop: 0 }, 'slow');

        }
        return false

    });

    $("#button_back2").on('click', function(event) {
        event.preventDefault();

        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container2").hide();
        $("#container1").fadeIn();

        return false

    });



    $("#button_next3").on('click', function(event) {
        event.preventDefault();

        if (validateContainer3()) {


            $('.page').animate({ scrollTop: 0 }, 'slow');


            $("#container3").hide();
            $("#container4").fadeIn();
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }


        return false

    });

    $("#button_back3").on('click', function(event) {
        event.preventDefault();

        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container3").hide();
        $("#container2").fadeIn();

        return false

    });





    $("#button_next4").on('click', function(event) {
        event.preventDefault();

        if (validateContainer4()) {

            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container4").hide();
            $("#container5").fadeIn();

        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }



        return false

    });

    $("#button_back4").on('click', function(event) {
        event.preventDefault();

        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container4").hide();
        $("#container3").fadeIn();

        return false

    });


    $("#button_next5").on('click', function(event) {
        event.preventDefault();


        if (validateContainer5()) {
            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container5").hide();
            $("#container6").fadeIn();

        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }





        return false

    });

    $("#button_back5").on('click', function(event) {
        event.preventDefault();

        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container5").hide();
        $("#container4").fadeIn();

        return false

    });










    $("#button_next6").on("click", function(event) {
        event.preventDefault();



        if (validateContainer6()) {


            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container6").hide();
            $("#container7").fadeIn();

        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }


        return false
    });

    $("#button_back6").on("click", function(event) {

        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container6").hide();
        $("#container5").fadeIn();
        return false

    });

    $("#button_next7").on("click", function(event) {

        event.preventDefault();

        if (validateContainer7()) {

            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container7").hide();
            $("#container8").fadeIn();

        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }

        return false

    });

    $("#button_back7").on("click", function(event) {
        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container7").hide();
        $("#container6").fadeIn();
        return false

    });

    $("#button_next8").on("click", function(event) {
        event.preventDefault();

        if (validateContainer8()) {
            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container8").hide();
            $("#container9").fadeIn();

        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }


        return false

    });

    $("#button_back8").on("click", function(event) {
        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container8").hide();
        $("#container7").fadeIn();
        return false

    });

    $("#button_next9").on("click", function(event) {
        event.preventDefault();

        if (validateContainer9()) {
            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container9").hide();
            $("#container10").fadeIn();
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }



        return false

    });

    $("#button_back9").on("click", function(event) {
        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container9").hide();
        $("#container8").fadeIn();
        return false

    });

    $("#button_next10").on("click", function(event) {
        event.preventDefault();


        if (validateContainer10()) {

            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container10").hide();
            $("#container11").fadeIn();
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }

        return false

    });

    $("#button_back10").on("click", function(event) {
        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container10").hide();
        $("#container9").fadeIn();
        return false

    });

    $("#button_next11").on("click", function(event) {
        event.preventDefault();
        if (validateContainer11()) {

            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container11").hide();
            $("#container12").fadeIn();
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }


        return false

    });

    $("#button_back11").on("click", function(event) {
        event.preventDefault();

        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container11").hide();
        $("#container10").fadeIn();
        return false

    });

    $("#button_next12").on("click", function(event) {
        event.preventDefault();

        if (validateContainer12()) {

            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container12").hide();
            $("#container13").fadeIn();
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }


        return false

    });

    $("#button_back12").on("click", function(event) {
        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container12").hide();
        $("#container11").fadeIn();
        return false

    });

    $("#button_next13").on("click", function(event) {
        event.preventDefault();

        if (validateContainer13()) {



            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container13").hide();
            $("#container14").fadeIn();
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }

        return false

    });

    $("#button_back13").on("click", function(event) {
        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container13").hide();
        $("#container12").fadeIn();
        return false

    });


    $("#button_next14").on("click", function(event) {
        event.preventDefault();

        if (validateContainer14()) {



            $('.page').animate({ scrollTop: 0 }, 'slow');

            $("#container14").hide();
            $("#container15").fadeIn();
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }

        return false

    });

    $("#button_back14").on("click", function(event) {
        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container14").hide();
        $("#container13").fadeIn();
        return false

    });


    /** EL ULTIMO BOTON VA ENVIAR EL FORMULARIO */

    $("#button_next15").on("click", function(event) {
        event.preventDefault();


        $("#form-riesgo").trigger('submit');

        return false

    });

    $("#button_back15").on("click", function(event) {
        event.preventDefault();
        $('.page').animate({ scrollTop: 0 }, 'slow');

        $("#container15").hide();
        $("#container14").fadeIn();
        return false

    });


    $("#form-riesgo").on('submit', function(event) {
        /* Act on the event */

        var str = $(this).serialize();



        if (validateContainer15()) {

            $.post(RUTA + 'riesgos/saveDocumentWeb', str, function(data, textStatus, xhr) {

                $('.page').animate({ scrollTop: 0 }, 'slow');


                $("#container15").hide();
                $("#container0").fadeIn();

                mostrarMensaje("msj_correcto", "Registrado Correctamente");
                $("#form-riesgo").trigger("reset");
            });
        } else {
            $('.page').animate({ scrollTop: 0 }, 'slow');

        }



        return false;
    });



    /**************************************************************************** */
    /************* SECCION 1 : ACTIVAR LOS COMENTARIOS  ************************* */
    /**************************************************************************** */
    /**************************************************************************** */


    $("input:radio[name='riesgo11']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo12']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo13']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo14']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo15']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo16']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo17']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo21']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo22']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo23']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo24']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo25']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo26']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo27']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo28']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo31']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo32']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo33']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo34']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo35']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo36']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo37']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo38']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo39']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo310']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo41']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo42']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo43']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo44']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo45']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo46']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo47']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo48']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo49']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo410']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo411']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo412']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo51']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo52']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo53']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo54']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo55']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo56']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo57']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo61']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo62']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo63']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo64']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo65']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo66']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo67']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo68']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo69']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo610']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo611']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo612']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo71']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo72']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo73']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo74']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo75']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo76']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo77']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo78']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo79']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo710']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo711']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo81']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo82']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo83']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo84']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo85']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo86']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo87']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo88']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo89']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo810']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo91']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo92']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo93']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo94']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo95']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo96']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo97']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo98']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo99']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo101']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo102']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo103']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo104']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo105']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo111']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo112']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo113']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo114']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo115']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo116']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo117']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo118']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo121']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo122']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo123']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo124']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo125']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo131']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo132']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo133']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo134']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo135']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo136']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo137']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo138']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo141']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo142']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo143']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo144']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo145']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo146']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    $("input:radio[name='riesgo147']").click(function() {
        var value = $(this).val();
        var data = $(this).attr("id_commentario");

        showcomments(value, data);
    });

    function showcomments(value, data) {

        if (value == 0) {

            $(data).fadeIn();

        } else {

            $(data).hide();

        }
    }


    /**************************************************************************** */
    /************* VALIDAR CONTAINER 0   **************************************** */
    /**************************************************************************** */
    /**************************************************************************** */

    function validateContainer0() {

        resultFormContainer0 = true;
        /*
                etiqueta1 = new Etiqueta("lista_proyecto", "proyecto");
                etiqueta2 = new Etiqueta("lista_area", "área");
                etiqueta3 = new Etiqueta("lista_area_observada", "área observada");

                let array_etiquetas_selection = [etiqueta1, etiqueta2, etiqueta3];

                etiqueta1 = new Etiqueta("ubicacion_tarea_auditada", "ubicación auditada");
                etiqueta2 = new Etiqueta("tarea_auditada", " tarea auditada");
                etiqueta3 = new Etiqueta("lider_auditoria", " líder de auditoría");
                etiqueta4 = new Etiqueta("participantes", "participantes");
                etiqueta5 = new Etiqueta("empresa", "empresa");

                let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5];
        */


        etiqueta1 = new Etiqueta("lista_proyecto", "");
        etiqueta2 = new Etiqueta("lista_area", "");
        etiqueta3 = new Etiqueta("lista_area_observada", "");

        let array_etiquetas_selection = [etiqueta1, etiqueta2, etiqueta3];

        etiqueta1 = new Etiqueta("ubicacion_tarea_auditada", "");
        etiqueta2 = new Etiqueta("tarea_auditada", " ");
        etiqueta3 = new Etiqueta("lider_auditoria", "");
        etiqueta4 = new Etiqueta("participantes", "");
        etiqueta5 = new Etiqueta("empresa", "");
        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5];

        array_etiquetas_selection.forEach(item => {


            if (!validateSelect(item.nombre, item.error_message)) {

                resultFormContainer0 = false;

            }
        });


        array_etiquetas.forEach(item => {


            if (!validateCampo(item.nombre, item.error_message)) {

                resultFormContainer0 = false;

            }
        });


        return resultFormContainer0;

    }


    /**************************************************************************** */
    /************* VALIDAR CONTAINER 1   **************************************** */
    /**************************************************************************** */
    /**************************************************************************** */

    function validateContainer1() {

        etiqueta1 = new Etiqueta("riesgo11", "");
        etiqueta2 = new Etiqueta("riesgo12", "");
        etiqueta3 = new Etiqueta("riesgo13", "");
        etiqueta4 = new Etiqueta("riesgo14", "");
        etiqueta5 = new Etiqueta("riesgo15", "");
        etiqueta6 = new Etiqueta("riesgo16", "");
        etiqueta7 = new Etiqueta("riesgo17", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6, etiqueta7];

        return validateCheckGeneral(array_etiquetas);
    }

    /**************************************************************************** */
    /************* VALIDAR CONTAINER 2   **************************************** */
    /**************************************************************************** */
    /**************************************************************************** */

    function validateContainer2() {

        etiqueta1 = new Etiqueta("riesgo21", "");
        etiqueta2 = new Etiqueta("riesgo22", "");
        etiqueta3 = new Etiqueta("riesgo23", "");
        etiqueta4 = new Etiqueta("riesgo24", "");
        etiqueta5 = new Etiqueta("riesgo25", "");
        etiqueta6 = new Etiqueta("riesgo26", "");
        etiqueta7 = new Etiqueta("riesgo27", "");
        etiqueta8 = new Etiqueta("riesgo28", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6, etiqueta7, etiqueta8];

        return validateCheckGeneral(array_etiquetas);
    }

    /**************************************************************************** */
    /************* VALIDAR CONTAINER 3   **************************************** */
    /**************************************************************************** */
    /**************************************************************************** */

    function validateContainer3() {

        etiqueta1 = new Etiqueta("riesgo31", "");
        etiqueta2 = new Etiqueta("riesgo32", "");
        etiqueta3 = new Etiqueta("riesgo33", "");
        etiqueta4 = new Etiqueta("riesgo34", "");
        etiqueta5 = new Etiqueta("riesgo35", "");
        etiqueta6 = new Etiqueta("riesgo36", "");
        etiqueta7 = new Etiqueta("riesgo37", "");
        etiqueta8 = new Etiqueta("riesgo38", "");
        etiqueta9 = new Etiqueta("riesgo39", "");
        etiqueta10 = new Etiqueta("riesgo310", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6, etiqueta7, etiqueta8, etiqueta9, etiqueta10];

        return validateCheckGeneral(array_etiquetas);
    }


    /**************************************************************************** */
    /************* VALIDAR CONTAINER 4   **************************************** */
    /**************************************************************************** */
    /**************************************************************************** */

    function validateContainer4() {

        etiqueta1 = new Etiqueta("riesgo41", "");
        etiqueta2 = new Etiqueta("riesgo42", "");
        etiqueta3 = new Etiqueta("riesgo43", "");
        etiqueta4 = new Etiqueta("riesgo44", "");
        etiqueta5 = new Etiqueta("riesgo45", "");
        etiqueta6 = new Etiqueta("riesgo46", "");
        etiqueta7 = new Etiqueta("riesgo47", "");
        etiqueta8 = new Etiqueta("riesgo48", "");
        etiqueta9 = new Etiqueta("riesgo49", "");
        etiqueta10 = new Etiqueta("riesgo410", "");
        etiqueta11 = new Etiqueta("riesgo411", "");
        etiqueta12 = new Etiqueta("riesgo412", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6, etiqueta7, etiqueta8, etiqueta9, etiqueta10, etiqueta11, etiqueta12];

        return validateCheckGeneral(array_etiquetas);
    }




    /**************************************************************************** */
    /************* VALIDAR CONTAINER 5   **************************************** */
    /**************************************************************************** */
    /**************************************************************************** */

    function validateContainer5() {

        etiqueta1 = new Etiqueta("riesgo51", "");
        etiqueta2 = new Etiqueta("riesgo52", "");
        etiqueta3 = new Etiqueta("riesgo53", "");
        etiqueta4 = new Etiqueta("riesgo54", "");
        etiqueta5 = new Etiqueta("riesgo55", "");
        etiqueta6 = new Etiqueta("riesgo56", "");
        etiqueta7 = new Etiqueta("riesgo57", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6, etiqueta7];

        return validateCheckGeneral(array_etiquetas);
    }



    function validateContainer6() {

        etiqueta1 = new Etiqueta("riesgo61", "");
        etiqueta2 = new Etiqueta("riesgo62", "");
        etiqueta3 = new Etiqueta("riesgo63", "");
        etiqueta4 = new Etiqueta("riesgo64", "");
        etiqueta5 = new Etiqueta("riesgo65", "");
        etiqueta6 = new Etiqueta("riesgo66", "");
        etiqueta7 = new Etiqueta("riesgo67", "");
        etiqueta8 = new Etiqueta("riesgo68", "");
        etiqueta9 = new Etiqueta("riesgo69", "");
        etiqueta10 = new Etiqueta("riesgo610", "");
        etiqueta11 = new Etiqueta("riesgo611", "");
        etiqueta12 = new Etiqueta("riesgo612", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6, etiqueta7, etiqueta8, etiqueta9, etiqueta10, etiqueta11, etiqueta12];

        return validateCheckGeneral(array_etiquetas);
    }




    function validateContainer7() {

        etiqueta1 = new Etiqueta("riesgo71", "");
        etiqueta2 = new Etiqueta("riesgo72", "");
        etiqueta3 = new Etiqueta("riesgo73", "");
        etiqueta4 = new Etiqueta("riesgo74", "");
        etiqueta5 = new Etiqueta("riesgo75", "");
        etiqueta6 = new Etiqueta("riesgo76", "");
        etiqueta7 = new Etiqueta("riesgo77", "");
        etiqueta8 = new Etiqueta("riesgo78", "");
        etiqueta9 = new Etiqueta("riesgo79", "");
        etiqueta10 = new Etiqueta("riesgo710", "");
        etiqueta11 = new Etiqueta("riesgo711", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6, etiqueta7, etiqueta8, etiqueta9, etiqueta10, etiqueta11];

        return validateCheckGeneral(array_etiquetas);
    }


    function validateContainer8() {

        etiqueta1 = new Etiqueta("riesgo81", "");
        etiqueta2 = new Etiqueta("riesgo82", "");
        etiqueta3 = new Etiqueta("riesgo83", "");
        etiqueta4 = new Etiqueta("riesgo84", "");
        etiqueta5 = new Etiqueta("riesgo85", "");
        etiqueta6 = new Etiqueta("riesgo86", "");
        etiqueta7 = new Etiqueta("riesgo87", "");
        etiqueta8 = new Etiqueta("riesgo88", "");
        etiqueta9 = new Etiqueta("riesgo89", "");
        etiqueta10 = new Etiqueta("riesgo810", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6, etiqueta7, etiqueta8, etiqueta9, etiqueta10];

        return validateCheckGeneral(array_etiquetas);
    }

    function validateContainer9() {

        etiqueta1 = new Etiqueta("riesgo91", "");
        etiqueta2 = new Etiqueta("riesgo92", "");
        etiqueta3 = new Etiqueta("riesgo93", "");
        etiqueta4 = new Etiqueta("riesgo94", "");
        etiqueta5 = new Etiqueta("riesgo95", "");
        etiqueta6 = new Etiqueta("riesgo96", "");
        etiqueta7 = new Etiqueta("riesgo97", "");
        etiqueta8 = new Etiqueta("riesgo98", "");
        etiqueta9 = new Etiqueta("riesgo99", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6,
            etiqueta7, etiqueta8, etiqueta9
        ];

        return validateCheckGeneral(array_etiquetas);
    }

    function validateContainer10() {

        etiqueta1 = new Etiqueta("riesgo101", "");
        etiqueta2 = new Etiqueta("riesgo102", "");
        etiqueta3 = new Etiqueta("riesgo103", "");
        etiqueta4 = new Etiqueta("riesgo104", "");
        etiqueta5 = new Etiqueta("riesgo105", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5];

        return validateCheckGeneral(array_etiquetas);
    }

    function validateContainer11() {

        etiqueta1 = new Etiqueta("riesgo111", "");
        etiqueta2 = new Etiqueta("riesgo112", "");
        etiqueta3 = new Etiqueta("riesgo113", "");
        etiqueta4 = new Etiqueta("riesgo114", "");
        etiqueta5 = new Etiqueta("riesgo115", "");
        etiqueta6 = new Etiqueta("riesgo116", "");
        etiqueta7 = new Etiqueta("riesgo117", "");
        etiqueta8 = new Etiqueta("riesgo118", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6,
            etiqueta7, etiqueta8
        ];

        return validateCheckGeneral(array_etiquetas);
    }

    function validateContainer12() {

        etiqueta1 = new Etiqueta("riesgo121", "");
        etiqueta2 = new Etiqueta("riesgo122", "");
        etiqueta3 = new Etiqueta("riesgo123", "");
        etiqueta4 = new Etiqueta("riesgo124", "");
        etiqueta5 = new Etiqueta("riesgo125", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5];

        return validateCheckGeneral(array_etiquetas);
    }


    function validateContainer13() {


        etiqueta1 = new Etiqueta("riesgo131", "");
        etiqueta2 = new Etiqueta("riesgo132", "");
        etiqueta3 = new Etiqueta("riesgo133", "");
        etiqueta4 = new Etiqueta("riesgo134", "");
        etiqueta5 = new Etiqueta("riesgo135", "");
        etiqueta6 = new Etiqueta("riesgo136", "");
        etiqueta7 = new Etiqueta("riesgo137", "");
        etiqueta8 = new Etiqueta("riesgo138", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6,
            etiqueta7, etiqueta8
        ];
        return validateCheckGeneral(array_etiquetas);
    }


    function validateContainer14() {


        etiqueta1 = new Etiqueta("riesgo141", "");
        etiqueta2 = new Etiqueta("riesgo142", "");
        etiqueta3 = new Etiqueta("riesgo143", "");
        etiqueta4 = new Etiqueta("riesgo144", "");
        etiqueta5 = new Etiqueta("riesgo145", "");
        etiqueta6 = new Etiqueta("riesgo146", "");
        etiqueta7 = new Etiqueta("riesgo147", "");

        let array_etiquetas = [etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5, etiqueta6,
            etiqueta7
        ];
        return validateCheckGeneral(array_etiquetas);
    }




    /**************************************************************************** */
    /************* VALIDAR CONTAINER 15   **************************************** */
    /**************************************************************************** */
    /**************************************************************************** */

    function validateContainer15() {

        resultFormContainer0 = true;

        etiqueta1 = new Etiqueta("fortalezas_acciones", "fortalezas /acciones a tomar");
        etiqueta2 = new Etiqueta("responsable", " responsable");

        let array_etiquetas = [etiqueta1, etiqueta2];

        array_etiquetas.forEach(item => {


            if (!validateCampo(item.nombre, item.error_message)) {

                resultFormContainer0 = false;

            }
        });

        return resultFormContainer0;

    }
})



function validateCheckGeneral(array_checks) {

    resultFormContainer = true;


    array_checks.forEach(item => {


        if (!validateCheck(item.nombre)) {

            resultFormContainer = false;

        }
    });

    return resultFormContainer;
}




/**************************************************************************** */
/************* FUNCIONES PARA VALIDAR CAMPOS   ****************************** */
/**************************************************************************** */
/**************************************************************************** */


//definimos el constructor para la clase 
function Etiqueta(nombre, error_message) {
    this.nombre = nombre
    this.error_message = error_message
}



function validateCampo(idEtiqueta, error_message) {

    resultForm = true;

    const etiqueta = document.getElementById(idEtiqueta);
    const etiquetaValue = etiqueta.value.trim();

    if (etiquetaValue === '') {
        resultForm = false;

        setErrorFor(etiqueta, personalErrrorMessage(error_message));
    } else {
        setSuccessFor(etiqueta);
    }

    return resultForm;
}

function personalErrrorMessage(error_message) {

    message = " ";
    if (error_message.length > 0) {
        message += error_message;
    }

    return message;
}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}



/**************************************************************************** */
/************* FUNCIONES PARA VALIDAR CHECKS   ****************************** */
/**************************************************************************** */
/**************************************************************************** */




function validateCheck(idEtiqueta) {

    resultForm = true;

    index = idEtiqueta.split("riesgo");


    const etiqueta = document.getElementsByName(idEtiqueta);

    if (etiqueta[0].checked || etiqueta[1].checked || etiqueta[2].checked) {

        setSuccessForCheck(index[1]);

    } else {

        resultForm = false;
        setErrorForCheck(index[1]);
    }

    //VALIDMAOS EL CAMPO DE COMENTARIOS

    if (etiqueta[1].checked) {

        resultForm = validateCampo(idEtiqueta + "_comments", "Ingresar comentario")

    }


    return resultForm;
}





/** CHECKS ITEMS  */
function setErrorForCheck(index) {

    const message = document.getElementById('riesgo' + index + '_message');
    message.className = 'message error';

}

function setSuccessForCheck(index) {
    const message = document.getElementById('riesgo' + index + '_message');
    message.className = 'message success';
}


/**************************************************************************** */
/************* FUNCIONES PARA VALIDAR  SELECTS    ****************************** */
/**************************************************************************** */
/**************************************************************************** */





function validateSelect(idEtiqueta, error_message) {

    resultForm = true;

    const etiqueta = document.getElementById(idEtiqueta);
    const etiquetaValue = etiqueta.value;

    if (etiquetaValue === "-1") {
        resultForm = false;

        setErrorFor(etiqueta, personalErrrorMessage(error_message));
    } else {
        setSuccessFor(etiqueta);
    }

    return resultForm;
}