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
      for (var i = 1; i < datos.count; i=i+2) {
    $('#Alumnos tbody').append(
        '<tr>'+
          '<td>'+j+'</td>'+
          '<td>'+datos[i+1]+'</td>'+
          '<td>'+datos[i]+'</td>'+
          '<td>'+' 3 '+'</td>'+
          '<td>'+' 1 '+'</td>'+
          '<td>'+' 1 '+'</td>'+
          '<td>'+' 0 '+'</td>'+
          '<td>'+' 0 '+'</td>'+
          '<td>'+' 1 '+'</td>'+
        '</tr>');
        j=j+1;
    }
    });
  }
