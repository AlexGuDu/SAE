document.getElementById('regresar').addEventListener('click', openMenuCoordinador);

function openMenuCoordinador(){
  window.location.href = "../views/menu.php";
}
// Ajax Tabla de Matriculas START

// Write on keyup event of keyword input element
$(document).ready(function(){
$("#search").keyup(function(){
_this = this;
// Show only matching TR, hide rest of them
$.each($("#Alumnos tbody tr"), function() {
if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
$(this).hide();
else
$(this).show();
});
});
});

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
