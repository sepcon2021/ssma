<?php

require_once 'public/generate-pdf/generatepdf.php';
require_once 'models/seguimientomodel.php';


class Riesgos extends Controller {

        function __construct()
        {
            parent::__construct();
        }

        function render(){
            
            session_start();

            $this->view->nombres = $_SESSION['nombres'];
        
            $this->view->render('riesgos/index');
        }


        function saveDocumentWeb(){
            session_start();


            $idProyecto=$_POST['idProyecto'];
            $idArea=$_POST['idArea'];
            $idAreaObservada=$_POST['idAreaObservada'];
            $ubicacion_tarea_auditada = $_POST["ubicacion_tarea_auditada"]; 
            $tarea_auditada = $_POST["tarea_auditada"]; 
            $lider_auditoria = ''; 
            $participantes = $_POST["participantes"]; 
            $empresa = $_POST["empresa"]; 
            $fecha = $_POST["fecha"]; 
            $fortalezas_acciones = $_POST["fortalezas_acciones"]; 
            $fecha_cumplimiento = $_POST["fecha_cumplimiento"]; 
            $responsable = $_POST["responsable"]; 
            $idusuario = $_SESSION['internal'];


            $riesgo11 = $this->convertVariable( $_POST["riesgo11"]);
            $riesgo11_comments = $_POST["riesgo11_comments"];
            $riesgo12 = $this->convertVariable( $_POST["riesgo12"]);
            $riesgo12_comments = $_POST["riesgo12_comments"];
            $riesgo13 = $this->convertVariable( $_POST["riesgo13"]);
            $riesgo13_comments = $_POST["riesgo13_comments"];
            $riesgo14 = $this->convertVariable( $_POST["riesgo14"]);
            $riesgo14_comments = $_POST["riesgo14_comments"];
            $riesgo15 = $this->convertVariable( $_POST["riesgo15"]);
            $riesgo15_comments = $_POST["riesgo15_comments"];
            $riesgo16 = $this->convertVariable( $_POST["riesgo16"]);
            $riesgo16_comments = $_POST["riesgo16_comments"];
            $riesgo17 = $this->convertVariable( $_POST["riesgo17"]);
            $riesgo17_comments = $_POST["riesgo17_comments"];
            $riesgo21 = $this->convertVariable( $_POST["riesgo21"]);
            $riesgo21_comments = $_POST["riesgo21_comments"];
            $riesgo22 = $this->convertVariable( $_POST["riesgo22"]);
            $riesgo22_comments = $_POST["riesgo22_comments"];
            $riesgo23 = $this->convertVariable( $_POST["riesgo23"]);
            $riesgo23_comments = $_POST["riesgo23_comments"];
            $riesgo24 = $this->convertVariable( $_POST["riesgo24"]);
            $riesgo24_comments = $_POST["riesgo24_comments"];
            $riesgo25 = $this->convertVariable( $_POST["riesgo25"]);
            $riesgo25_comments = $_POST["riesgo25_comments"];
            $riesgo26 = $this->convertVariable( $_POST["riesgo26"]);
            $riesgo26_comments = $_POST["riesgo26_comments"];
            $riesgo27 = $this->convertVariable( $_POST["riesgo27"]);
            $riesgo27_comments = $_POST["riesgo27_comments"];
            $riesgo28 = $this->convertVariable( $_POST["riesgo28"]);
            $riesgo28_comments = $_POST["riesgo28_comments"];
            $riesgo31 = $this->convertVariable( $_POST["riesgo31"]);
            $riesgo31_comments = $_POST["riesgo31_comments"];
            $riesgo32 = $this->convertVariable( $_POST["riesgo32"]);
            $riesgo32_comments = $_POST["riesgo32_comments"];
            $riesgo33 = $this->convertVariable( $_POST["riesgo33"]);
            $riesgo33_comments = $_POST["riesgo33_comments"];
            $riesgo34 = $this->convertVariable( $_POST["riesgo34"]);
            $riesgo34_comments = $_POST["riesgo34_comments"];
            $riesgo35 = $this->convertVariable( $_POST["riesgo35"]);
            $riesgo35_comments = $_POST["riesgo35_comments"];
            $riesgo36 = $this->convertVariable( $_POST["riesgo36"]);
            $riesgo36_comments = $_POST["riesgo36_comments"];
            $riesgo37 = $this->convertVariable( $_POST["riesgo37"]);
            $riesgo37_comments = $_POST["riesgo37_comments"];
            $riesgo38 = $this->convertVariable( $_POST["riesgo38"]);
            $riesgo38_comments = $_POST["riesgo38_comments"];
            $riesgo39 = $this->convertVariable( $_POST["riesgo39"]);
            $riesgo39_comments = $_POST["riesgo39_comments"];
            $riesgo310 =$this->convertVariable(  $_POST["riesgo310"]);
            $riesgo310_comments = $_POST["riesgo310_comments"];
            $riesgo41 = $this->convertVariable( $_POST["riesgo41"]);
            $riesgo41_comments = $_POST["riesgo41_comments"];
            $riesgo42 = $this->convertVariable( $_POST["riesgo42"]);
            $riesgo42_comments = $_POST["riesgo42_comments"];
            $riesgo43 = $this->convertVariable( $_POST["riesgo43"]);
            $riesgo43_comments = $_POST["riesgo43_comments"];
            $riesgo44 = $this->convertVariable( $_POST["riesgo44"]);
            $riesgo44_comments = $_POST["riesgo44_comments"];
            $riesgo45 = $this->convertVariable( $_POST["riesgo45"]);
            $riesgo45_comments = $_POST["riesgo45_comments"];
            $riesgo46 = $this->convertVariable( $_POST["riesgo46"]);
            $riesgo46_comments = $_POST["riesgo46_comments"];
            $riesgo47 = $this->convertVariable( $_POST["riesgo47"]);
            $riesgo47_comments = $_POST["riesgo47_comments"];
            $riesgo48 = $this->convertVariable( $_POST["riesgo48"]);
            $riesgo48_comments = $_POST["riesgo48_comments"];
            $riesgo49 = $this->convertVariable( $_POST["riesgo49"]);
            $riesgo49_comments = $_POST["riesgo49_comments"];
            $riesgo410 =$this->convertVariable(  $_POST["riesgo410"]);
            $riesgo410_comments = $_POST["riesgo410_comments"];
            $riesgo411 =$this->convertVariable(  $_POST["riesgo411"]);
            $riesgo411_comments = $_POST["riesgo411_comments"];
            $riesgo412 =$this->convertVariable(  $_POST["riesgo412"]);
            $riesgo412_comments = $_POST["riesgo412_comments"];
            $riesgo51 = $this->convertVariable( $_POST["riesgo51"]);
            $riesgo51_comments = $_POST["riesgo51_comments"];
            $riesgo52 = $this->convertVariable( $_POST["riesgo52"]);
            $riesgo52_comments = $_POST["riesgo52_comments"];
            $riesgo53 = $this->convertVariable( $_POST["riesgo53"]);
            $riesgo53_comments = $_POST["riesgo53_comments"];
            $riesgo54 = $this->convertVariable( $_POST["riesgo54"]);
            $riesgo54_comments = $_POST["riesgo54_comments"];
            $riesgo55 = $this->convertVariable( $_POST["riesgo55"]);
            $riesgo55_comments = $_POST["riesgo55_comments"];
            $riesgo56 = $this->convertVariable( $_POST["riesgo56"]);
            $riesgo56_comments = $_POST["riesgo56_comments"];
            $riesgo57 = $this->convertVariable( $_POST["riesgo57"]);
            $riesgo57_comments = $_POST["riesgo57_comments"];
            $riesgo61 = $this->convertVariable( $_POST["riesgo61"]);
            $riesgo61_comments = $_POST["riesgo61_comments"];
            $riesgo62 = $this->convertVariable( $_POST["riesgo62"]);
            $riesgo62_comments = $_POST["riesgo62_comments"];
            $riesgo63 = $this->convertVariable( $_POST["riesgo63"]);
            $riesgo63_comments = $_POST["riesgo63_comments"];
            $riesgo64 = $this->convertVariable( $_POST["riesgo64"]);
            $riesgo64_comments = $_POST["riesgo64_comments"];
            $riesgo65 = $this->convertVariable( $_POST["riesgo65"]);
            $riesgo65_comments = $_POST["riesgo65_comments"];
            $riesgo66 = $this->convertVariable( $_POST["riesgo66"]);
            $riesgo66_comments = $_POST["riesgo66_comments"];
            $riesgo67 = $this->convertVariable( $_POST["riesgo67"]);
            $riesgo67_comments = $_POST["riesgo67_comments"];
            $riesgo68 = $this->convertVariable( $_POST["riesgo68"]);
            $riesgo68_comments = $_POST["riesgo68_comments"];
            $riesgo69 = $this->convertVariable( $_POST["riesgo69"]);
            $riesgo69_comments = $_POST["riesgo69_comments"];
            $riesgo610 =$this->convertVariable(  $_POST["riesgo610"]);
            $riesgo610_comments = $_POST["riesgo610_comments"];
            $riesgo611 =$this->convertVariable(  $_POST["riesgo611"]);
            $riesgo611_comments = $_POST["riesgo611_comments"];
            $riesgo612 =$this->convertVariable(  $_POST["riesgo612"]);
            $riesgo612_comments = $_POST["riesgo612_comments"];
            $riesgo71 = $this->convertVariable( $_POST["riesgo71"]);
            $riesgo71_comments = $_POST["riesgo71_comments"];
            $riesgo72 = $this->convertVariable( $_POST["riesgo72"]);
            $riesgo72_comments = $_POST["riesgo72_comments"];
            $riesgo73 = $this->convertVariable( $_POST["riesgo73"]);
            $riesgo73_comments = $_POST["riesgo73_comments"];
            $riesgo74 = $this->convertVariable( $_POST["riesgo74"]);
            $riesgo74_comments = $_POST["riesgo74_comments"];
            $riesgo75 = $this->convertVariable( $_POST["riesgo75"]);
            $riesgo75_comments = $_POST["riesgo75_comments"];
            $riesgo76 = $this->convertVariable( $_POST["riesgo76"]);
            $riesgo76_comments = $_POST["riesgo76_comments"];
            $riesgo77 = $this->convertVariable( $_POST["riesgo77"]);
            $riesgo77_comments = $_POST["riesgo77_comments"];
            $riesgo78 = $this->convertVariable( $_POST["riesgo78"]);
            $riesgo78_comments = $_POST["riesgo78_comments"];
            $riesgo79 = $this->convertVariable( $_POST["riesgo79"]);
            $riesgo79_comments = $_POST["riesgo79_comments"];
            $riesgo710 =$this->convertVariable(  $_POST["riesgo710"]);
            $riesgo710_comments = $_POST["riesgo710_comments"];
            $riesgo711 =$this->convertVariable(  $_POST["riesgo711"]);
            $riesgo711_comments = $_POST["riesgo711_comments"];
            $riesgo81 = $this->convertVariable( $_POST["riesgo81"]);
            $riesgo81_comments = $_POST["riesgo81_comments"];
            $riesgo82 = $this->convertVariable( $_POST["riesgo82"]);
            $riesgo82_comments = $_POST["riesgo82_comments"];
            $riesgo83 = $this->convertVariable( $_POST["riesgo83"]);
            $riesgo83_comments = $_POST["riesgo83_comments"];
            $riesgo84 = $this->convertVariable( $_POST["riesgo84"]);
            $riesgo84_comments = $_POST["riesgo84_comments"];
            $riesgo85 = $this->convertVariable( $_POST["riesgo85"]);
            $riesgo85_comments = $_POST["riesgo85_comments"];
            $riesgo86 = $this->convertVariable( $_POST["riesgo86"]);
            $riesgo86_comments = $_POST["riesgo86_comments"];
            $riesgo87 = $this->convertVariable( $_POST["riesgo87"]);
            $riesgo87_comments = $_POST["riesgo87_comments"];
            $riesgo88 = $this->convertVariable( $_POST["riesgo88"]);
            $riesgo88_comments = $_POST["riesgo88_comments"];
            $riesgo89 = $this->convertVariable( $_POST["riesgo89"]);
            $riesgo89_comments = $_POST["riesgo89_comments"];
            $riesgo810 =$this->convertVariable(  $_POST["riesgo810"]);
            $riesgo810_comments = $_POST["riesgo810_comments"];
            $riesgo91 = $this->convertVariable( $_POST["riesgo91"]);
            $riesgo91_comments = $_POST["riesgo91_comments"];
            $riesgo92 = $this->convertVariable( $_POST["riesgo92"]);
            $riesgo92_comments = $_POST["riesgo92_comments"];
            $riesgo93 = $this->convertVariable( $_POST["riesgo93"]);
            $riesgo93_comments = $_POST["riesgo93_comments"];
            $riesgo94 = $this->convertVariable( $_POST["riesgo94"]);
            $riesgo94_comments = $_POST["riesgo94_comments"];
            $riesgo95 = $this->convertVariable( $_POST["riesgo95"]);
            $riesgo95_comments = $_POST["riesgo95_comments"];
            $riesgo96 = $this->convertVariable( $_POST["riesgo96"]);
            $riesgo96_comments = $_POST["riesgo96_comments"];
            $riesgo97 = $this->convertVariable( $_POST["riesgo97"]);
            $riesgo97_comments = $_POST["riesgo97_comments"];
            $riesgo98 = $this->convertVariable( $_POST["riesgo98"]);
            $riesgo98_comments = $_POST["riesgo98_comments"];
            $riesgo99 = $this->convertVariable( $_POST["riesgo99"]);
            $riesgo99_comments = $_POST["riesgo99_comments"];
            $riesgo101 =$this->convertVariable(  $_POST["riesgo101"]);
            $riesgo101_comments = $_POST["riesgo101_comments"];
            $riesgo102 =$this->convertVariable(  $_POST["riesgo102"]);
            $riesgo102_comments = $_POST["riesgo102_comments"];
            $riesgo103 =$this->convertVariable(  $_POST["riesgo103"]);
            $riesgo103_comments = $_POST["riesgo103_comments"];
            $riesgo104 =$this->convertVariable(  $_POST["riesgo104"]);
            $riesgo104_comments = $_POST["riesgo104_comments"];
            $riesgo105 =$this->convertVariable(  $_POST["riesgo105"]);
            $riesgo105_comments = $_POST["riesgo105_comments"];
            $riesgo111 =$this->convertVariable(  $_POST["riesgo111"]);
            $riesgo111_comments = $_POST["riesgo111_comments"];
            $riesgo112 =$this->convertVariable(  $_POST["riesgo112"]);
            $riesgo112_comments = $_POST["riesgo112_comments"];
            $riesgo113 =$this->convertVariable(  $_POST["riesgo113"]);
            $riesgo113_comments = $_POST["riesgo113_comments"];
            $riesgo114 =$this->convertVariable(  $_POST["riesgo114"]);
            $riesgo114_comments = $_POST["riesgo114_comments"];
            $riesgo115 =$this->convertVariable(  $_POST["riesgo115"]);
            $riesgo115_comments = $_POST["riesgo115_comments"];
            $riesgo116 =$this->convertVariable(  $_POST["riesgo116"]);
            $riesgo116_comments = $_POST["riesgo116_comments"];
            $riesgo117 =$this->convertVariable(  $_POST["riesgo117"]);
            $riesgo117_comments = $_POST["riesgo117_comments"];
            $riesgo118 =$this->convertVariable(  $_POST["riesgo118"]);
            $riesgo118_comments = $_POST["riesgo118_comments"];
            $riesgo121 =$this->convertVariable(  $_POST["riesgo121"]);
            $riesgo121_comments = $_POST["riesgo121_comments"];
            $riesgo122 =$this->convertVariable(  $_POST["riesgo122"]);
            $riesgo122_comments = $_POST["riesgo122_comments"];
            $riesgo123 =$this->convertVariable(  $_POST["riesgo123"]);
            $riesgo123_comments = $_POST["riesgo123_comments"];
            $riesgo124 =$this->convertVariable(  $_POST["riesgo124"]);
            $riesgo124_comments = $_POST["riesgo124_comments"];
            $riesgo125 =$this->convertVariable(  $_POST["riesgo125"]);
            $riesgo125_comments = $_POST["riesgo125_comments"];
            $riesgo131 =$this->convertVariable(  $_POST["riesgo131"]);
            $riesgo131_comments = $_POST["riesgo131_comments"];
            $riesgo132 =$this->convertVariable(  $_POST["riesgo132"]);
            $riesgo132_comments = $_POST["riesgo132_comments"];
            $riesgo133 =$this->convertVariable(  $_POST["riesgo133"]);
            $riesgo133_comments = $_POST["riesgo133_comments"];
            $riesgo134 =$this->convertVariable(  $_POST["riesgo134"]);
            $riesgo134_comments = $_POST["riesgo134_comments"];
            $riesgo135 =$this->convertVariable(  $_POST["riesgo135"]);
            $riesgo135_comments = $_POST["riesgo135_comments"];
            $riesgo136 =$this->convertVariable(  $_POST["riesgo136"]);
            $riesgo136_comments = $_POST["riesgo136_comments"];
            $riesgo137 =$this->convertVariable(  $_POST["riesgo137"]);
            $riesgo137_comments = $_POST["riesgo137_comments"];
            $riesgo138 =$this->convertVariable(  $_POST["riesgo138"]);
            $riesgo138_comments = $_POST["riesgo138_comments"];
            $riesgo141 =$this->convertVariable(  $_POST["riesgo141"]);
            $riesgo141_comments = $_POST["riesgo141_comments"];
            $riesgo142 =$this->convertVariable(  $_POST["riesgo142"]);
            $riesgo142_comments = $_POST["riesgo142_comments"];
            $riesgo143 =$this->convertVariable(  $_POST["riesgo143"]);
            $riesgo143_comments = $_POST["riesgo143_comments"];
            $riesgo144 =$this->convertVariable(  $_POST["riesgo144"]);
            $riesgo144_comments = $_POST["riesgo144_comments"];
            $riesgo145 =$this->convertVariable(  $_POST["riesgo145"]);
            $riesgo145_comments = $_POST["riesgo145_comments"];
            $riesgo146 =$this->convertVariable(  $_POST["riesgo146"]);
            $riesgo146_comments = $_POST["riesgo146_comments"];
            $riesgo147 =$this->convertVariable(  $_POST["riesgo147"]);
            $riesgo147_comments = $_POST["riesgo147_comments"];
            $dni_propietario = $_POST['dni_propietario'];

            $datos = compact(
                'idProyecto',
                'idArea',
                'idAreaObservada',
                "ubicacion_tarea_auditada",
                "tarea_auditada",
                "lider_auditoria",
                "participantes",
                "empresa",
                "fecha",
                "fortalezas_acciones",
                "fecha_cumplimiento",
                "responsable",
                "idusuario",

                "riesgo11",
                "riesgo11_comments",
                "riesgo12",
                "riesgo12_comments",
                "riesgo13",
                "riesgo13_comments",
                "riesgo14",
                "riesgo14_comments",
                "riesgo15",
                "riesgo15_comments",
                "riesgo16",
                "riesgo16_comments",
                "riesgo17",
                "riesgo17_comments",
                "riesgo21",
                "riesgo21_comments",
                "riesgo22",
                "riesgo22_comments",
                "riesgo23",
                "riesgo23_comments",
                "riesgo24",
                "riesgo24_comments",
                "riesgo25",
                "riesgo25_comments",
                "riesgo26",
                "riesgo26_comments",
                "riesgo27",
                "riesgo27_comments",
                "riesgo28",
                "riesgo28_comments",
                "riesgo31",
                "riesgo31_comments",
                "riesgo32",
                "riesgo32_comments",
                "riesgo33",
                "riesgo33_comments",
                "riesgo34",
                "riesgo34_comments",
                "riesgo35",
                "riesgo35_comments",
                "riesgo36",
                "riesgo36_comments",
                "riesgo37",
                "riesgo37_comments",
                "riesgo38",
                "riesgo38_comments",
                "riesgo39",
                "riesgo39_comments",
                "riesgo310",
                "riesgo310_comments",
                "riesgo41",
                "riesgo41_comments",
                "riesgo42",
                "riesgo42_comments",
                "riesgo43",
                "riesgo43_comments",
                "riesgo44",
                "riesgo44_comments",
                "riesgo45",
                "riesgo45_comments",
                "riesgo46",
                "riesgo46_comments",
                "riesgo47",
                "riesgo47_comments",
                "riesgo48",
                "riesgo48_comments",
                "riesgo49",
                "riesgo49_comments",
                "riesgo410",
                "riesgo410_comments",
                "riesgo411",
                "riesgo411_comments",
                "riesgo412",
                "riesgo412_comments",
                "riesgo51",
                "riesgo51_comments",
                "riesgo52",
                "riesgo52_comments",
                "riesgo53",
                "riesgo53_comments",
                "riesgo54",
                "riesgo54_comments",
                "riesgo55",
                "riesgo55_comments",
                "riesgo56",
                "riesgo56_comments",
                "riesgo57",
                "riesgo57_comments",
                "riesgo61",
                "riesgo61_comments",
                "riesgo62",
                "riesgo62_comments",
                "riesgo63",
                "riesgo63_comments",
                "riesgo64",
                "riesgo64_comments",
                "riesgo65",
                "riesgo65_comments",
                "riesgo66",
                "riesgo66_comments",
                "riesgo67",
                "riesgo67_comments",
                "riesgo68",
                "riesgo68_comments",
                "riesgo69",
                "riesgo69_comments",
                "riesgo610",
                "riesgo610_comments",
                "riesgo611",
                "riesgo611_comments",
                "riesgo612",
                "riesgo612_comments",
                "riesgo71",
                "riesgo71_comments",
                "riesgo72",
                "riesgo72_comments",
                "riesgo73",
                "riesgo73_comments",
                "riesgo74",
                "riesgo74_comments",
                "riesgo75",
                "riesgo75_comments",
                "riesgo76",
                "riesgo76_comments",
                "riesgo77",
                "riesgo77_comments",
                "riesgo78",
                "riesgo78_comments",
                "riesgo79",
                "riesgo79_comments",
                "riesgo710",
                "riesgo710_comments",
                "riesgo711",
                "riesgo711_comments",
                "riesgo81",
                "riesgo81_comments",
                "riesgo82",
                "riesgo82_comments",
                "riesgo83",
                "riesgo83_comments",
                "riesgo84",
                "riesgo84_comments",
                "riesgo85",
                "riesgo85_comments",
                "riesgo86",
                "riesgo86_comments",
                "riesgo87",
                "riesgo87_comments",
                "riesgo88",
                "riesgo88_comments",
                "riesgo89",
                "riesgo89_comments",
                "riesgo810",
                "riesgo810_comments",
                "riesgo91",
                "riesgo91_comments",
                "riesgo92",
                "riesgo92_comments",
                "riesgo93",
                "riesgo93_comments",
                "riesgo94",
                "riesgo94_comments",
                "riesgo95",
                "riesgo95_comments",
                "riesgo96",
                "riesgo96_comments",
                "riesgo97",
                "riesgo97_comments",
                "riesgo98",
                "riesgo98_comments",
                "riesgo99",
                "riesgo99_comments",
                "riesgo101",
                "riesgo101_comments",
                "riesgo102",
                "riesgo102_comments",
                "riesgo103",
                "riesgo103_comments",
                "riesgo104",
                "riesgo104_comments",
                "riesgo105",
                "riesgo105_comments",
                "riesgo111",
                "riesgo111_comments",
                "riesgo112",
                "riesgo112_comments",
                "riesgo113",
                "riesgo113_comments",
                "riesgo114",
                "riesgo114_comments",
                "riesgo115",
                "riesgo115_comments",
                "riesgo116",
                "riesgo116_comments",
                "riesgo117",
                "riesgo117_comments",
                "riesgo118",
                "riesgo118_comments",
                "riesgo121",
                "riesgo121_comments",
                "riesgo122",
                "riesgo122_comments",
                "riesgo123",
                "riesgo123_comments",
                "riesgo124",
                "riesgo124_comments",
                "riesgo125",
                "riesgo125_comments",
                "riesgo131",
                "riesgo131_comments",
                "riesgo132",
                "riesgo132_comments",
                "riesgo133",
                "riesgo133_comments",
                "riesgo134",
                "riesgo134_comments",
                "riesgo135",
                "riesgo135_comments",
                "riesgo136",
                "riesgo136_comments",
                "riesgo137",
                "riesgo137_comments",
                "riesgo138",
                "riesgo138_comments",
                "riesgo141",
                "riesgo141_comments",
                "riesgo142",
                "riesgo142_comments",
                "riesgo143",
                "riesgo143_comments",
                "riesgo144",
                "riesgo144_comments",
                "riesgo145",
                "riesgo145_comments",
                "riesgo146",
                "riesgo146_comments",
                "riesgo147",
                "riesgo147_comments"

            );

            $idRiesgo = $this->model->insert($datos);

            $this->elaborarCorreo($idRiesgo , $dni_propietario);
    



            echo $idRiesgo;
        }


        function saveDocumentApp(){


            $return["state"] = true;
            $return["message"] = "Envio exitoso";


            $idProyecto=$_POST['idProyecto'];
            $idArea=$_POST['idArea'];
            $idAreaObservada=$_POST['idAreaObservada'];

            $ubicacion_tarea_auditada = $_POST["ubicacion_tarea_auditada"]; 
            $tarea_auditada = $_POST["tarea_auditada"]; 
            $lider_auditoria = ''; 
            $participantes = $_POST["participantes"]; 
            $empresa = $_POST["empresa"]; 
            $fecha = $_POST["fecha"]; 
            $fortalezas_acciones = $_POST["fortalezas_acciones"]; 
            $fecha_cumplimiento = $_POST["fecha_cumplimiento"]; 
            $responsable = $_POST["responsable"]; 
            $idusuario = $_POST['idusuario'];


            $riesgo11 = $_POST["riesgo11"];
            $riesgo11_comments = $_POST["riesgo11_comments"];
            $riesgo12 = $_POST["riesgo12"];
            $riesgo12_comments = $_POST["riesgo12_comments"];
            $riesgo13 = $_POST["riesgo13"];
            $riesgo13_comments = $_POST["riesgo13_comments"];
            $riesgo14 = $_POST["riesgo14"];
            $riesgo14_comments = $_POST["riesgo14_comments"];
            $riesgo15 = $_POST["riesgo15"];
            $riesgo15_comments = $_POST["riesgo15_comments"];
            $riesgo16 = $_POST["riesgo16"];
            $riesgo16_comments = $_POST["riesgo16_comments"];
            $riesgo17 = $_POST["riesgo17"];
            $riesgo17_comments = $_POST["riesgo17_comments"];
            $riesgo21 = $_POST["riesgo21"];
            $riesgo21_comments = $_POST["riesgo21_comments"];
            $riesgo22 = $_POST["riesgo22"];
            $riesgo22_comments = $_POST["riesgo22_comments"];
            $riesgo23 = $_POST["riesgo23"];
            $riesgo23_comments = $_POST["riesgo23_comments"];
            $riesgo24 = $_POST["riesgo24"];
            $riesgo24_comments = $_POST["riesgo24_comments"];
            $riesgo25 = $_POST["riesgo25"];
            $riesgo25_comments = $_POST["riesgo25_comments"];
            $riesgo26 = $_POST["riesgo26"];
            $riesgo26_comments = $_POST["riesgo26_comments"];
            $riesgo27 = $_POST["riesgo27"];
            $riesgo27_comments = $_POST["riesgo27_comments"];
            $riesgo28 = $_POST["riesgo28"];
            $riesgo28_comments = $_POST["riesgo28_comments"];
            $riesgo31 = $_POST["riesgo31"];
            $riesgo31_comments = $_POST["riesgo31_comments"];
            $riesgo32 = $_POST["riesgo32"];
            $riesgo32_comments = $_POST["riesgo32_comments"];
            $riesgo33 = $_POST["riesgo33"];
            $riesgo33_comments = $_POST["riesgo33_comments"];
            $riesgo34 = $_POST["riesgo34"];
            $riesgo34_comments = $_POST["riesgo34_comments"];
            $riesgo35 = $_POST["riesgo35"];
            $riesgo35_comments = $_POST["riesgo35_comments"];
            $riesgo36 = $_POST["riesgo36"];
            $riesgo36_comments = $_POST["riesgo36_comments"];
            $riesgo37 = $_POST["riesgo37"];
            $riesgo37_comments = $_POST["riesgo37_comments"];
            $riesgo38 = $_POST["riesgo38"];
            $riesgo38_comments = $_POST["riesgo38_comments"];
            $riesgo39 = $_POST["riesgo39"];
            $riesgo39_comments = $_POST["riesgo39_comments"];
            $riesgo310 = $_POST["riesgo310"];
            $riesgo310_comments = $_POST["riesgo310_comments"];
            $riesgo41 = $_POST["riesgo41"];
            $riesgo41_comments = $_POST["riesgo41_comments"];
            $riesgo42 = $_POST["riesgo42"];
            $riesgo42_comments = $_POST["riesgo42_comments"];
            $riesgo43 = $_POST["riesgo43"];
            $riesgo43_comments = $_POST["riesgo43_comments"];
            $riesgo44 = $_POST["riesgo44"];
            $riesgo44_comments = $_POST["riesgo44_comments"];
            $riesgo45 = $_POST["riesgo45"];
            $riesgo45_comments = $_POST["riesgo45_comments"];
            $riesgo46 = $_POST["riesgo46"];
            $riesgo46_comments = $_POST["riesgo46_comments"];
            $riesgo47 = $_POST["riesgo47"];
            $riesgo47_comments = $_POST["riesgo47_comments"];
            $riesgo48 = $_POST["riesgo48"];
            $riesgo48_comments = $_POST["riesgo48_comments"];
            $riesgo49 = $_POST["riesgo49"];
            $riesgo49_comments = $_POST["riesgo49_comments"];
            $riesgo410 = $_POST["riesgo410"];
            $riesgo410_comments = $_POST["riesgo410_comments"];
            $riesgo411 = $_POST["riesgo411"];
            $riesgo411_comments = $_POST["riesgo411_comments"];
            $riesgo412 = $_POST["riesgo412"];
            $riesgo412_comments = $_POST["riesgo412_comments"];
            $riesgo51 = $_POST["riesgo51"];
            $riesgo51_comments = $_POST["riesgo51_comments"];
            $riesgo52 = $_POST["riesgo52"];
            $riesgo52_comments = $_POST["riesgo52_comments"];
            $riesgo53 = $_POST["riesgo53"];
            $riesgo53_comments = $_POST["riesgo53_comments"];
            $riesgo54 = $_POST["riesgo54"];
            $riesgo54_comments = $_POST["riesgo54_comments"];
            $riesgo55 = $_POST["riesgo55"];
            $riesgo55_comments = $_POST["riesgo55_comments"];
            $riesgo56 = $_POST["riesgo56"];
            $riesgo56_comments = $_POST["riesgo56_comments"];
            $riesgo57 = $_POST["riesgo57"];
            $riesgo57_comments = $_POST["riesgo57_comments"];
            $riesgo61 = $_POST["riesgo61"];
            $riesgo61_comments = $_POST["riesgo61_comments"];
            $riesgo62 = $_POST["riesgo62"];
            $riesgo62_comments = $_POST["riesgo62_comments"];
            $riesgo63 = $_POST["riesgo63"];
            $riesgo63_comments = $_POST["riesgo63_comments"];
            $riesgo64 = $_POST["riesgo64"];
            $riesgo64_comments = $_POST["riesgo64_comments"];
            $riesgo65 = $_POST["riesgo65"];
            $riesgo65_comments = $_POST["riesgo65_comments"];
            $riesgo66 = $_POST["riesgo66"];
            $riesgo66_comments = $_POST["riesgo66_comments"];
            $riesgo67 = $_POST["riesgo67"];
            $riesgo67_comments = $_POST["riesgo67_comments"];
            $riesgo68 = $_POST["riesgo68"];
            $riesgo68_comments = $_POST["riesgo68_comments"];
            $riesgo69 = $_POST["riesgo69"];
            $riesgo69_comments = $_POST["riesgo69_comments"];
            $riesgo610 = $_POST["riesgo610"];
            $riesgo610_comments = $_POST["riesgo610_comments"];
            $riesgo611 = $_POST["riesgo611"];
            $riesgo611_comments = $_POST["riesgo611_comments"];
            $riesgo612 = $_POST["riesgo612"];
            $riesgo612_comments = $_POST["riesgo612_comments"];
            $riesgo71 = $_POST["riesgo71"];
            $riesgo71_comments = $_POST["riesgo71_comments"];
            $riesgo72 = $_POST["riesgo72"];
            $riesgo72_comments = $_POST["riesgo72_comments"];
            $riesgo73 = $_POST["riesgo73"];
            $riesgo73_comments = $_POST["riesgo73_comments"];
            $riesgo74 = $_POST["riesgo74"];
            $riesgo74_comments = $_POST["riesgo74_comments"];
            $riesgo75 = $_POST["riesgo75"];
            $riesgo75_comments = $_POST["riesgo75_comments"];
            $riesgo76 = $_POST["riesgo76"];
            $riesgo76_comments = $_POST["riesgo76_comments"];
            $riesgo77 = $_POST["riesgo77"];
            $riesgo77_comments = $_POST["riesgo77_comments"];
            $riesgo78 = $_POST["riesgo78"];
            $riesgo78_comments = $_POST["riesgo78_comments"];
            $riesgo79 = $_POST["riesgo79"];
            $riesgo79_comments = $_POST["riesgo79_comments"];
            $riesgo710 = $_POST["riesgo710"];
            $riesgo710_comments = $_POST["riesgo710_comments"];
            $riesgo711 = $_POST["riesgo711"];
            $riesgo711_comments = $_POST["riesgo711_comments"];
            $riesgo81 = $_POST["riesgo81"];
            $riesgo81_comments = $_POST["riesgo81_comments"];
            $riesgo82 = $_POST["riesgo82"];
            $riesgo82_comments = $_POST["riesgo82_comments"];
            $riesgo83 = $_POST["riesgo83"];
            $riesgo83_comments = $_POST["riesgo83_comments"];
            $riesgo84 = $_POST["riesgo84"];
            $riesgo84_comments = $_POST["riesgo84_comments"];
            $riesgo85 = $_POST["riesgo85"];
            $riesgo85_comments = $_POST["riesgo85_comments"];
            $riesgo86 = $_POST["riesgo86"];
            $riesgo86_comments = $_POST["riesgo86_comments"];
            $riesgo87 = $_POST["riesgo87"];
            $riesgo87_comments = $_POST["riesgo87_comments"];
            $riesgo88 = $_POST["riesgo88"];
            $riesgo88_comments = $_POST["riesgo88_comments"];
            $riesgo89 = $_POST["riesgo89"];
            $riesgo89_comments = $_POST["riesgo89_comments"];
            $riesgo810 = $_POST["riesgo810"];
            $riesgo810_comments = $_POST["riesgo810_comments"];
            $riesgo91 = $_POST["riesgo91"];
            $riesgo91_comments = $_POST["riesgo91_comments"];
            $riesgo92 = $_POST["riesgo92"];
            $riesgo92_comments = $_POST["riesgo92_comments"];
            $riesgo93 = $_POST["riesgo93"];
            $riesgo93_comments = $_POST["riesgo93_comments"];
            $riesgo94 = $_POST["riesgo94"];
            $riesgo94_comments = $_POST["riesgo94_comments"];
            $riesgo95 = $_POST["riesgo95"];
            $riesgo95_comments = $_POST["riesgo95_comments"];
            $riesgo96 = $_POST["riesgo96"];
            $riesgo96_comments = $_POST["riesgo96_comments"];
            $riesgo97 = $_POST["riesgo97"];
            $riesgo97_comments = $_POST["riesgo97_comments"];
            $riesgo98 = $_POST["riesgo98"];
            $riesgo98_comments = $_POST["riesgo98_comments"];
            $riesgo99 = $_POST["riesgo99"];
            $riesgo99_comments = $_POST["riesgo99_comments"];
            $riesgo101 = $_POST["riesgo101"];
            $riesgo101_comments = $_POST["riesgo101_comments"];
            $riesgo102 = $_POST["riesgo102"];
            $riesgo102_comments = $_POST["riesgo102_comments"];
            $riesgo103 = $_POST["riesgo103"];
            $riesgo103_comments = $_POST["riesgo103_comments"];
            $riesgo104 = $_POST["riesgo104"];
            $riesgo104_comments = $_POST["riesgo104_comments"];
            $riesgo105 = $_POST["riesgo105"];
            $riesgo105_comments = $_POST["riesgo105_comments"];
            $riesgo111 = $_POST["riesgo111"];
            $riesgo111_comments = $_POST["riesgo111_comments"];
            $riesgo112 = $_POST["riesgo112"];
            $riesgo112_comments = $_POST["riesgo112_comments"];
            $riesgo113 = $_POST["riesgo113"];
            $riesgo113_comments = $_POST["riesgo113_comments"];
            $riesgo114 = $_POST["riesgo114"];
            $riesgo114_comments = $_POST["riesgo114_comments"];
            $riesgo115 = $_POST["riesgo115"];
            $riesgo115_comments = $_POST["riesgo115_comments"];
            $riesgo116 = $_POST["riesgo116"];
            $riesgo116_comments = $_POST["riesgo116_comments"];
            $riesgo117 = $_POST["riesgo117"];
            $riesgo117_comments = $_POST["riesgo117_comments"];
            $riesgo118 = $_POST["riesgo118"];
            $riesgo118_comments = $_POST["riesgo118_comments"];
            $riesgo121 = $_POST["riesgo121"];
            $riesgo121_comments = $_POST["riesgo121_comments"];
            $riesgo122 = $_POST["riesgo122"];
            $riesgo122_comments = $_POST["riesgo122_comments"];
            $riesgo123 = $_POST["riesgo123"];
            $riesgo123_comments = $_POST["riesgo123_comments"];
            $riesgo124 = $_POST["riesgo124"];
            $riesgo124_comments = $_POST["riesgo124_comments"];
            $riesgo125 = $_POST["riesgo125"];
            $riesgo125_comments = $_POST["riesgo125_comments"];
            $riesgo131 = $_POST["riesgo131"];
            $riesgo131_comments = $_POST["riesgo131_comments"];
            $riesgo132 = $_POST["riesgo132"];
            $riesgo132_comments = $_POST["riesgo132_comments"];
            $riesgo133 = $_POST["riesgo133"];
            $riesgo133_comments = $_POST["riesgo133_comments"];
            $riesgo134 = $_POST["riesgo134"];
            $riesgo134_comments = $_POST["riesgo134_comments"];
            $riesgo135 = $_POST["riesgo135"];
            $riesgo135_comments = $_POST["riesgo135_comments"];
            $riesgo136 = $_POST["riesgo136"];
            $riesgo136_comments = $_POST["riesgo136_comments"];
            $riesgo137 = $_POST["riesgo137"];
            $riesgo137_comments = $_POST["riesgo137_comments"];
            $riesgo138 = $_POST["riesgo138"];
            $riesgo138_comments = $_POST["riesgo138_comments"];
            $riesgo141 = $_POST["riesgo141"];
            $riesgo141_comments = $_POST["riesgo141_comments"];
            $riesgo142 = $_POST["riesgo142"];
            $riesgo142_comments = $_POST["riesgo142_comments"];
            $riesgo143 = $_POST["riesgo143"];
            $riesgo143_comments = $_POST["riesgo143_comments"];
            $riesgo144 = $_POST["riesgo144"];
            $riesgo144_comments = $_POST["riesgo144_comments"];
            $riesgo145 = $_POST["riesgo145"];
            $riesgo145_comments = $_POST["riesgo145_comments"];
            $riesgo146 = $_POST["riesgo146"];
            $riesgo146_comments = $_POST["riesgo146_comments"];
            $riesgo147 = $_POST["riesgo147"];
            $riesgo147_comments = $_POST["riesgo147_comments"];


            $datos = compact(
                'idProyecto',
                'idArea',
                'idAreaObservada',
                "ubicacion_tarea_auditada",
                "tarea_auditada",
                "lider_auditoria",
                "participantes",
                "empresa",
                "fecha",
                "fortalezas_acciones",
                "fecha_cumplimiento",
                "responsable",
                "idusuario",

                "riesgo11",
                "riesgo11_comments",
                "riesgo12",
                "riesgo12_comments",
                "riesgo13",
                "riesgo13_comments",
                "riesgo14",
                "riesgo14_comments",
                "riesgo15",
                "riesgo15_comments",
                "riesgo16",
                "riesgo16_comments",
                "riesgo17",
                "riesgo17_comments",
                "riesgo21",
                "riesgo21_comments",
                "riesgo22",
                "riesgo22_comments",
                "riesgo23",
                "riesgo23_comments",
                "riesgo24",
                "riesgo24_comments",
                "riesgo25",
                "riesgo25_comments",
                "riesgo26",
                "riesgo26_comments",
                "riesgo27",
                "riesgo27_comments",
                "riesgo28",
                "riesgo28_comments",
                "riesgo31",
                "riesgo31_comments",
                "riesgo32",
                "riesgo32_comments",
                "riesgo33",
                "riesgo33_comments",
                "riesgo34",
                "riesgo34_comments",
                "riesgo35",
                "riesgo35_comments",
                "riesgo36",
                "riesgo36_comments",
                "riesgo37",
                "riesgo37_comments",
                "riesgo38",
                "riesgo38_comments",
                "riesgo39",
                "riesgo39_comments",
                "riesgo310",
                "riesgo310_comments",
                "riesgo41",
                "riesgo41_comments",
                "riesgo42",
                "riesgo42_comments",
                "riesgo43",
                "riesgo43_comments",
                "riesgo44",
                "riesgo44_comments",
                "riesgo45",
                "riesgo45_comments",
                "riesgo46",
                "riesgo46_comments",
                "riesgo47",
                "riesgo47_comments",
                "riesgo48",
                "riesgo48_comments",
                "riesgo49",
                "riesgo49_comments",
                "riesgo410",
                "riesgo410_comments",
                "riesgo411",
                "riesgo411_comments",
                "riesgo412",
                "riesgo412_comments",
                "riesgo51",
                "riesgo51_comments",
                "riesgo52",
                "riesgo52_comments",
                "riesgo53",
                "riesgo53_comments",
                "riesgo54",
                "riesgo54_comments",
                "riesgo55",
                "riesgo55_comments",
                "riesgo56",
                "riesgo56_comments",
                "riesgo57",
                "riesgo57_comments",
                "riesgo61",
                "riesgo61_comments",
                "riesgo62",
                "riesgo62_comments",
                "riesgo63",
                "riesgo63_comments",
                "riesgo64",
                "riesgo64_comments",
                "riesgo65",
                "riesgo65_comments",
                "riesgo66",
                "riesgo66_comments",
                "riesgo67",
                "riesgo67_comments",
                "riesgo68",
                "riesgo68_comments",
                "riesgo69",
                "riesgo69_comments",
                "riesgo610",
                "riesgo610_comments",
                "riesgo611",
                "riesgo611_comments",
                "riesgo612",
                "riesgo612_comments",
                "riesgo71",
                "riesgo71_comments",
                "riesgo72",
                "riesgo72_comments",
                "riesgo73",
                "riesgo73_comments",
                "riesgo74",
                "riesgo74_comments",
                "riesgo75",
                "riesgo75_comments",
                "riesgo76",
                "riesgo76_comments",
                "riesgo77",
                "riesgo77_comments",
                "riesgo78",
                "riesgo78_comments",
                "riesgo79",
                "riesgo79_comments",
                "riesgo710",
                "riesgo710_comments",
                "riesgo711",
                "riesgo711_comments",
                "riesgo81",
                "riesgo81_comments",
                "riesgo82",
                "riesgo82_comments",
                "riesgo83",
                "riesgo83_comments",
                "riesgo84",
                "riesgo84_comments",
                "riesgo85",
                "riesgo85_comments",
                "riesgo86",
                "riesgo86_comments",
                "riesgo87",
                "riesgo87_comments",
                "riesgo88",
                "riesgo88_comments",
                "riesgo89",
                "riesgo89_comments",
                "riesgo810",
                "riesgo810_comments",
                "riesgo91",
                "riesgo91_comments",
                "riesgo92",
                "riesgo92_comments",
                "riesgo93",
                "riesgo93_comments",
                "riesgo94",
                "riesgo94_comments",
                "riesgo95",
                "riesgo95_comments",
                "riesgo96",
                "riesgo96_comments",
                "riesgo97",
                "riesgo97_comments",
                "riesgo98",
                "riesgo98_comments",
                "riesgo99",
                "riesgo99_comments",
                "riesgo101",
                "riesgo101_comments",
                "riesgo102",
                "riesgo102_comments",
                "riesgo103",
                "riesgo103_comments",
                "riesgo104",
                "riesgo104_comments",
                "riesgo105",
                "riesgo105_comments",
                "riesgo111",
                "riesgo111_comments",
                "riesgo112",
                "riesgo112_comments",
                "riesgo113",
                "riesgo113_comments",
                "riesgo114",
                "riesgo114_comments",
                "riesgo115",
                "riesgo115_comments",
                "riesgo116",
                "riesgo116_comments",
                "riesgo117",
                "riesgo117_comments",
                "riesgo118",
                "riesgo118_comments",
                "riesgo121",
                "riesgo121_comments",
                "riesgo122",
                "riesgo122_comments",
                "riesgo123",
                "riesgo123_comments",
                "riesgo124",
                "riesgo124_comments",
                "riesgo125",
                "riesgo125_comments",
                "riesgo131",
                "riesgo131_comments",
                "riesgo132",
                "riesgo132_comments",
                "riesgo133",
                "riesgo133_comments",
                "riesgo134",
                "riesgo134_comments",
                "riesgo135",
                "riesgo135_comments",
                "riesgo136",
                "riesgo136_comments",
                "riesgo137",
                "riesgo137_comments",
                "riesgo138",
                "riesgo138_comments",
                "riesgo141",
                "riesgo141_comments",
                "riesgo142",
                "riesgo142_comments",
                "riesgo143",
                "riesgo143_comments",
                "riesgo144",
                "riesgo144_comments",
                "riesgo145",
                "riesgo145_comments",
                "riesgo146",
                "riesgo146_comments",
                "riesgo147",
                "riesgo147_comments"

            );

            $idRiesgo = $this->model->insert($datos);

            if($idRiesgo != null){

                // echo "Guardado desde Celular";
                 $return["state"] = false;
                 $return["message"] =  "Problemas en nuestros servicios";

             }
             
             
 
             header('Content-Type: application/json');
             // tell browser that its a json data
             echo json_encode($return);
             //converting array to JSON string
        }

        function convertVariable($data){
            
            $value=0;

            if($data==1){
                $value=1;
            }
            
            if($data==0){
                $value=2;
            }
            
            if($data==-1){
                $value=3;
            }
            return $value;
        }


        public function elaborarCorreo($idRiesgo , $dniPropietario)
        {
            $idTipoDocumento = 6;
            $nombreDocumento = 'Riesgos Críticos';
            $resultado = $this->model->findByIdRiesgo($idRiesgo);
    
            $generatePdf = new GeneratePDF();
            $urlPdf = $generatePdf->generateRiesgoPdf($resultado);

            $this->model->actualizarUrlPdfRiesgo($idRiesgo, $urlPdf);
    
            $seguimientoModel = new SeguimientoModel;
            $seguimientoModel->insertarSeguimientoGeneral($idRiesgo, $dniPropietario, $urlPdf, $idTipoDocumento, $nombreDocumento);
        }
}
