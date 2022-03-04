var url = 'http://localhost/ssma/reporte/pruebaFetch';
var data = {tipo_documento: 9};

fetch(url, {
  method: 'POST', // or 'PUT'
  body: JSON.stringify(data), // data can be `string` or {object}!
  headers:{
    'Content-Type': 'application/json'
  }
}).then(res => res.json())
.then(response => console.log(JSON.stringify(response)))
.catch(error => failure(error));


// Save this as fetch.js --------------------------------------------------------------------------

function success(json) {
    console.log("AFTER: " + JSON.stringify(json));
  } // ----------------------------------------------------------------------------------------------
  
  function failure(error) {
    console.log("ERROR: " + error);
  } // ----------------------------------------------------------------------------------------------


  class Persona{

    constructor(name,year){
        this.name = name;
        this.year = year;
    }
  }