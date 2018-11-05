document.getElementById('regresar').addEventListener('click', openMenuAdministrador);

function openMenuAdministrador(){
  window.location.href = "../views/menu.html";
}

function generarReporte() {
  window.location.href = "../control/generarReporte.php";
}

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
