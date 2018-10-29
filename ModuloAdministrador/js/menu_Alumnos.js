
document.getElementById('regresar').addEventListener('click', openMenuAdministrador);


function openMenuAdministrador(){
  window.location.href = "../views/menu.html";
}

function openActividades(){
  window.location.href = "../views/menu_consultas.html";
}
modificarAlumno(matricula){
  var datosEnviados = {
    'matricula' : matricula
  };
  $.ajax({
    type : 'POST',
    url : '../control/buscarMatricula.php',
    dataType : 'json',
    encode : true
  })
  window.location.href = "../views/alumnoRegistro.php";
}

// Consulta por medio de input text
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

// Ajax Tabla de Matriculas START
function consultaDeAlumnos(){
  $.ajax({
    type : 'POST',
    url : '../control/consultaAlumno.php',
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
      for (var i = 1; i < datos.count; i=i+7) {
    $('#consultaAlum tbody').append(
        '<tr>'+
          '<td>'+'<input type="button" name="" onclick="modificarAlumno('+datos[i]+')" class="botonsm boton-plus" value=" " >'+'</td>'+
          '<td>'+datos[i]+'</td>'+
          '<td>'+datos[i+2]+' '+datos[i+3]+' '+datos[i+1]+'</td>'+
          '<td>'+datos[i+4]+'</td>'+
          '<td>'+datos[i+5]+'</td>'+
          '<td>'+datos[i+6]+'</td>'+

        '</tr>');
    }
    });
  }



// Ajax Tabla de Matriculas END
