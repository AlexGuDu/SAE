document.getElementById('regresar').addEventListener('click', openMenuAdministrador);

function openMenuAdministrador(){
  window.location.href = "../views/menu.php";
}

function generarReporte() {
  window.location.href = "../control/generarReporte.php";
}
$(document).ready(function(){
$("#search").keyup(function(){
_this = this;
// Mostrar solo lo que se escribio en el input text
$.each($("#consultaAlum tbody tr"), function() {
if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
$(this).hide();
else
$(this).show();
});
});
});


//Acomodar tabla START
function sortTable(table, col, reverse) {
    var tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
        tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
        i;
    reverse = -((+reverse) || -1);
    tr = tr.sort(function (a, b) { // sort rows
        return reverse // `-1 *` if want opposite order
            * (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
                .localeCompare(b.cells[col].textContent.trim())
               );
    });
    for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
}

function makeSortable(table) {
    var th = table.tHead, i;
    th && (th = th.rows[0]) && (th = th.cells);
    if (th) i = th.length;
    else return; // if no `<thead>` then do nothing
    while (--i >= 0) (function (i) {
        var dir = 1;
        th[i].addEventListener('click', function () {sortTable(table, i, (dir = 1 - dir))});
    }(i));
}

function makeAllSortable(parent) {
    parent = parent || document.body;
    var t = parent.getElementsByTagName('table'), i = t.length;
    while (--i >= 0) makeSortable(t[i]);
}
//Acomodar tabla END


// Ajax Tabla de Matriculas START
function ConsultaDeAlumnos(){
  var j=1;
  $.ajax({
    type : 'POST',
    url : '../control/menu_consulta.php',
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
      for (var i = 1; i < datos.count; i=i+8) {
    $('#Alumnos tbody').append(
        '<tr>'+
          '<td>'+j+'</td>'+
          '<td>'+datos[i+1]+'</td>'+
          '<td>'+datos[i]+'</td>'+
          '<td>'+datos[i+7]+'</td>'+
          '<td>'+datos[i+2]+'</td>'+
          '<td>'+datos[i+3]+'</td>'+
          '<td>'+datos[i+4]+'</td>'+
          '<td>'+datos[i+5]+'</td>'+
          '<td>'+datos[i+6]+'</td>'+
        '</tr>');
        j=j+1;
    }
    });
  }

document.getElementById('graphLAE').addEventListener('click', function(){
  genGraphCarrera('ADMINISTRACION DE EMPRESAS');
});
document.getElementById('graphLI').addEventListener('click', function(){
  genGraphCarrera('INFORMATICA');
});
document.getElementById('graphLNI').addEventListener('click', function(){
  genGraphCarrera('NEGOCIOS INTERNACIONALES');
});
document.getElementById('graphLC').addEventListener('click', function(){
  genGraphCarrera('CONTADURIA');
});
document.getElementById('graphALL').addEventListener('click', genGraph);
var box_myChart = document.getElementById('box-myChart');
var box_chartLAE = document.getElementById('box-chartLAE');
var box_chartLI = document.getElementById('box-chartLI');
var box_chartLNI = document.getElementById('box-chartLNI');
var box_chartLC = document.getElementById('box-chartLC');

  //// GRAPH
function genGraph(){
  $.ajax({
    type : 'POST',
    url : '../control/porcentajeGraph.php',
    dataType : 'json',
    encode : true
  }).done(function(porcentajes){
    var porcentaje_LAE = porcentajes.porcentaje_LAE;
    var porcentaje_LI = porcentajes.porcentaje_LI;
    var porcentaje_LNI = porcentajes.porcentaje_LNI;
    var porcentaje_LC = porcentajes.porcentaje_LC;

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["LAE", "LI", "LNI", "LC"],
            datasets: [{
                label: '% de Cumplimiento',
                data: [porcentaje_LAE, porcentaje_LI, porcentaje_LNI, porcentaje_LC],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',

                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1.5
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
  });
  box_chartLAE.hidden = true;
  box_chartLI.hidden = true;
  box_chartLNI.hidden = true;
  box_chartLC.hidden = true;
  box_myChart.hidden = false;
}

function genGraphCarrera(carrera){
  box_myChart.hidden = true;
  box_chartLAE.hidden = true;
  box_chartLI.hidden = true;
  box_chartLNI.hidden = true;
  box_chartLC.hidden = true;

  if (carrera == "ADMINISTRACION DE EMPRESAS") {
    graphToGenerate = "chartLAE";
  }
  if (carrera == "INFORMATICA") {
    graphToGenerate = "chartLI";
  }
  if (carrera == "NEGOCIOS INTERNACIONALES") {
    graphToGenerate = "chartLNI";
  }
  if (carrera == "CONTADURIA") {
    graphToGenerate = "chartLC";
  }
  var datosEnviados = {
    'carrera' : carrera
  };
  var tituloGraph = "ACTIVIDADES CUMPLIDAS POR " + carrera;
  $.ajax({
    type : 'POST',
    url : '../control/porcentajeGraph_porCarrera.php',
    data : datosEnviados,
    dataType : 'json',
    encode : true
  })
  .done(function(conteo_por_actividad){
    var conteo_01 = conteo_por_actividad.vinculacion;
    var conteo_02 = conteo_por_actividad.cientifica;
    var conteo_03 = conteo_por_actividad.deportiva;
    var conteo_04 = conteo_por_actividad.responsabilidadSocial;
    var conteo_05 = conteo_por_actividad.cultural;

    var ctx = document.getElementById(graphToGenerate).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Vinculacion", "Cientifica", "Deportiva", "Responsabilidad Social", "Cultural"],
            datasets: [{
                label: tituloGraph,
                data: [conteo_01, conteo_02, conteo_03, conteo_04, conteo_05],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1.5
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
  });


  if (graphToGenerate == "chartLAE") {
    box_chartLAE.hidden = false;
  }
  if (graphToGenerate == "chartLI") {
    box_chartLI.hidden = false;
  }
  if (graphToGenerate == "chartLNI") {
    box_chartLNI.hidden = false;
  }
  if (graphToGenerate == "chartLC") {
    box_chartLC.hidden = false;
  }

}
