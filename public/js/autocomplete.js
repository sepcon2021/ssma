function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 2; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i][1].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i][1].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i][1].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i][1] + "'  idcargo='" + arr[i][0] + "'>";


                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;


                    //ACA VAMOS MODIFICAR UNA EQUITETA EN EL FORMULARIO

                    var element = document.getElementById("idcargo");
                    element.value = this.getElementsByTagName("input")[0].getAttribute("idcargo");



                    /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}

/*An array containing all the country names in the world:*/
//var countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia & Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre & Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts & Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad & Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks & Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];
var countries = [
    [1,'Oficial Fierrero'],
    [2,'Operario Fierrero'],
    [3,'Obras Civiles '],
    [4,'Supervisor Electricista'],
    [5,'Chofer de Equipo Liviano - Camioneta'],
    [6,'Peón'],
    [7,'Asistente de Gerencia'],
    [8,'Operario de Limpieza'],
    [9,'Capataz de Montaje Mecánico'],
    [10,'Rigger'],
    [11,'Coordinador de QA/QC'],
    [12,'Dirección y Operación de Obra'],
    [13,'Oficial Tubero'],
    [14,'Operador de Equipo Pesado (Excavadora)'],
    [15,'Supervisor de SSMA'],
    [16,'Jefe de QA/QC'],
    [17,'Soldador de Estructuras'],
    [18,'Operador de Equipo Semi Pesado - Mixer'],
    [19,'Asistente de Tecnología e Informática'],
    [20,'Operario Tubero'],
    [21,'Asistente Administrativo - Importaciones'],
    [22,'SSMA - Seguridad'],
    [23,'Mecánico de Equipo Pesado'],
    [24,'Asistente Administrativo'],
    [25,'Capataz de Obras Civiles'],
    [26,'Supervisor de Pre-comisionado y Comisionado'],
    [27,'SSMA - Vigías '],
    [28,'Oficial Albañil'],
    [29,'Logistica - Operadores y Rigger'],
    [30,'Operador de Equipo Semi Pesado - Camión Grúa'],
    [31,'Asistente de SSMA'],
    [32,'Coordinador de Sistemas'],
    [33,'Oficial Tareador'],
    [34,'Operador de Equipo Pesado (Grúa)'],
    [35,'Supervisor QA/QC'],
    [36,'Auxiliar Contable'],
    [37,'Operario Montajista - Alineador'],
    [38,'Operario Pintor'],
    [39,'Operador de Equipo Pesado - Manlift'],
    [40,'Operario Montajista'],
    [41,'Montaje de Andamios '],
    [42,'Operario Albañil'],
    [43,'Coordinador de Control de Proyectos'],
    [44,'Asistente de Control de Costos'],
    [45,'Inspector de Precom y Comisionado'],
    [46,'Técnico de Aire Acondicionado'],
    [47,'Oficial Instrumentista'],
    [48,'Ingeniero de Oficina Técnica'],
    [49,'Jefe de RR.HH. - Obra'],
    [50,'Oficial Pintor'],
    [51,'Supervisor de Repuestos y Materiales'],
    [52,'Asistente de Compras'],
    [53,'Soldador Calificado'],
    [54,'Inspector de QA/QC'],
    [55,'Asistente de RR.HH. '],
    [56,'Operador de Equipo Semi Pesado - Carmix'],
    [57,'Médico'],
    [58,'Oficial Amolador'],
    [59,'Practicante de Control de Proyectos'],
    [60,'Operario Gasfitero'],
    [61,'Jefe Corporativo de RR.HH.'],
    [62,'Ayudante Calificado / Tramitador'],
    [63,'Mecánico de Equipo Liviano'],
    [64,'Campamentos '],
    [65,'Almacenero'],
    [66,'SSMA - Medio Ambiente'],
    [67,'Enfermero'],
    [68,'Operario Electricista'],
    [69,'Control de Calidad'],
    [70,'Asistente de Precom y Comisionado'],
    [71,'Operador de Equipo Pesado - Excavadora'],
    [72,'Obras Mecánicas (Piping - Soldadura - Montaje)'],
    [73,'Oficial Montajista'],
    [74,'Capataz de Obras Mecánicas'],
    [75,'Asistente Administrativo-Trámites'],
    [76,'Operador de Equipo Pesado - Rodillo'],
    [77,'Operario Técnico de Laboratorio'],
    [78,'Oficial Carpintero'],
    [79,'Capataz Electricista'],
    [80,'Electricista B'],
    [81,'Carpintero A'],
    [82,'Asistenta Social'],
    [83,'Inspector de SSMA'],
    [84,'Mantenimiento Mécanico '],
    [85,'Inspector de soldadura'],
    [86,'Operario Carpintero'],
    [87,'Coordinador Eléctrico'],
    [88,'Jefe de Oficina Técnica'],
    [89,'Capataz Tubero'],
    [90,'Asistente de QA/QC'],
    [91,'Asistente de Almacén'],
    [92,'Operador de Equipo Pesado - Telehandler'],
    [93,'Capataz  Armado de Campamento'],
    [94,'Jefe Corporativo de Administración'],
    [95,'Gerente SSMA'],
    [96,'Jefe de SSMA'],
    [97,'Encargado de Fase (Pruebas Hidrostáticas)'],
    [98,'Gerente de Contratos y RR.HH'],
    [99,'Operario de Almacén'],
    [100,'Jefe Corporativo de Mantenimiento Mecánico'],
    [101,'Jefe de Planificación'],
    [102,'Superintendente de Obra'],
    [103,'Jefe de Control de Proyectos'],
    [104,'Planchador / Pintor'],
    [105,'Control de Proyectos'],
    [106,'Jefe Corporativo de Presupuestos'],
    [107,'Contador General'],
    [108,'Coordinador de Mantenimiento Mecánico'],
    [109,'Precomisionado y Comisionado '],
    [110,'Capataz Instrumentista'],
    [111,'Asistente de Contabilidad'],
    [112,'Operador de Equipo Semi Pesado - Volquete'],
    [113,'Supervisor de Mantenimiento Mecánico'],
    [114,'Oficial Mecánico de Equipos'],
    [115,'Gerente de Administración y Logística'],
    [116,'Electricista de Mantenimiento de Equipo'],
    [117,'Operador de Equipo Pesado - Grúa'],
    [118,'Operador de Equipo Pesado - Cargador Frontal'],
    [119,'Operario Pintor de Mantenimiento Mecánico'],
    [120,'Asistente de Control de Documento (DCA)'],
    [121,'Capataz Andamiero'],
    [122,'Operador de Equipo Semi Pesado - Montacarga'],
    [123,'Operario de Planta de Concreto '],
    [124,'Ayudante Calificado'],
    [125,'Administrador de Contratos'],
    [126,'Almacenes '],
    [127,'Encargado de Fase'],
    [128,'Asistente de Transporte'],
    [129,'Electricidad e Instrumentación '],
    [130,'Jefe Corporativo de SSMA'],
    [131,'Operario Mecánico de Equipo Pesado - B'],
    [132,'Cadista'],
    [133,'Jefe de Ingeniería'],
    [134,'Abogado'],
    [135,'Director Ejecutivo'],
    [136,'Gerente de Asuntos Institucionales'],
    [137,'Coordinador de Bienestar Social'],
    [138,'Supervisor de Obras Civiles'],
    [139,'Responsable de Sede'],
    [140,'Líder de Precom / Comisionado'],
    [141,'Coordinador de Obras Mecánicas'],
    [142,'Gerente de Operaciones'],
    [143,'Pit de Combustible'],
    [144,'Operador de Equipo Semi Pesado - Cama Baja'],
    [145,'Jefe de Logística'],
    [146,'Jefe Corporativo de Almacenes'],
    [147,'Coordinador de Logística'],
    [148,'Operador de Equipo Semi Pesado - Cisterna'],
    [149,'Jefe de SGI'],
    [150,'Asistente de Logística'],
    [151,'Responsable de Selección y Desarrollo Organizacional'],
    [152,'Oficial Electricista'],
    [153,'Gerente de Proyecto'],
    [154,'Asistente Recepcionista'],
    [155,'Operario Instrumentista'],
    [156,'Topógrafo'],
    [157,'Analista de SGI'],
    [158,'Supervisor Instrumentista'],
    [159,'Asistente de Control de Proyectos'],
    [160,'Capataz de Obras Mecánicas - Pintura'],
    [161,'Inspector de Medio Ambiente'],
    [162,'Oficial de Almacén'],
    [163,'Operador de Equipo Semi Pesado - Cama Baja (carga ancha)'],
    [164,'Operario Tornero'],
    [165,'Oficial de Topografía'],
    [166,'Topografía'],
    [167,'Supervisor de Montaje'],
    [168,'Traductor'],
    [169,'Jefe de Almacén'],
    [170,'Jefe de Procura'],
    [171,'Campamentero'],
    [172,'Gerente General'],
    [173,'Coordinador de Tecnología e Informática'],
    [174,'Supervisor de Campamento'],
    [175,'Coordinador de Repuestos y Materiales'],
    [176,'Comprador'],
    [177,'Responsable de Compensaciones'],
    [178,'Ingeniero de Presupuestos'],
    [179,'Tareador'],
    [180,'Oficial Vigía'],
    [181,'Operario Electricista de Mantenimiento Mecánico - A'],
    [182,'Jefe Corporativo de Salud Ocupacional'],
    [183,'Operador de Equipo Pesado - Motoniveladora'],
    [184,'Ayudante Mecánico'],
    [185,'Gerente Financiero'],
    [186,'Especialista en Ingeniería'],
    [187,'Operario Instrumentista - Conexionista'],
    [188,'Ayudante Local'],
    [189,'Ayudante Calificado  C'],
    [190,'Ingeniero Electrónico'],
    [191,'Operador de Grúa'],
    [192,'Ayudante Calificado B'],
    [193,'Oficial de Pit de Combustible - Lubricantes'],
    [194,'Operario Mecánico de Equipo Liviano - B'],
    [195,'Operario Electricista de Mantenimiento Mecánico - B'],
    [196,'Operario Soldador HDPE'],
    [197,'Oficial de Repuestos y Materiales'],
    [198,'Asistente Bilingüe'],
    [199,'SSMA - Salud'],
    [200,'Carpintero B'],
    [201,'Recursos Humanos'],
    [202,'Supervisor Eléctrico e Instrumentista'],
    [203,'Oficial Andamiero'],
    [204,'Asistente de Catering'],
    [205,'Inspector de Soldadura II'],
    [206,'Amolador'],
    [207,'Jefe de Mantenimiento Mecánico'],
    [208,'Operario Mecánico de Equipo Liviano'],
    [209,'DCA'],
    [210,'Superintendente de Construcción'],
    [211,'Chofer de Microbus'],
    [212,'Operario Rigger'],
    [213,'Practicante de Tecnología e Informática'],
    [214,'Operario Topógrafo'],
    [215,'Operador de Equipo Pesado: Plataforma Elevadora (Man Lift)'],
    [216,'Supervisor de Control de Erosión'],
    [217,'Operador de Equipo Pesado - Tractor'],
    [218,'Operador de Equipo Semi Pesado - Bus'],
    [219,'Operador de Equipo Pesado - Tractor Oruga'],
    [220,'Operador de Equipo Semipesado: Minicargador (Bob CAT)'],
    [221,'Supervisor de Línea'],
    [222,'Técnico de Curvado'],
    [223,'Operador de Equipo Semi Pesado - Cisterna de Agua'],
    [224,'Capataz de Movimiento de Suelos'],
    [225,'Operario Manteador'],
    [226,'Operador de Equipo Pesado - Sideboom'],
    [227,'Capataz de Control de Erosión'],
    [228,'Operario Acoplador'],
    [229,'Operador de Equipo Semi Pesado - Cisterna de Combustible'],
    [230,'Operario Mecánico de Equipo Pesado - A'],
    [231,'Supervisor de Medio Ambiente'],
    [232,'Operario Soldador 4G'],
    [233,'Operario Electricista de Mantenimiento de Equipo - B'],
    [234,'Ingeniería y Topografía'],
];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("observado_puesto"), countries);