var lugarEvento_input = document.getElementById('lugarEvento');
var nombreActividad_input = document.getElementById('nombreActividad');
var nombreOrganiza_input = document.getElementById('nombreOrganiza');
var objetivoEvento_input = document.getElementById('objetivoEvento');
var materiaFortalecida_input = document.getElementById('materiaFortalecida');
var maestroMateria_input = document.getElementById('maestroMateria');
var aspectoProfesional_input = document.getElementById('aspectoProfesional');
var proponeAsistir_input = document.getElementById('proponeAsistir');
var eventoSelector = document.getElementById('eventoSelector');
var actividadSelector = document.getElementById('actividadSelector');
var estadoSelector = document.getElementById('estadoSelector');
var ciudadSelector = document.getElementById('ciudadSelector');
var fecha_input = document.getElementById('fecha');
var hora_input = document.getElementById('hora');

function folio_ComboBox(){
  $.ajax({
    type : 'POST',
    url : '../control/folioComboBox.php',
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
     for (var i = 1; i < datos.count; i=i+2) {
    $('#folioCB').append(
      '<option value="'+datos[i]+'">'+datos[i+1]+'</option>');
     }
    });
    }

var folio = document.getElementById('folioCB');
folio.addEventListener('change', function(){
  if(folio.value == 'clear'){
    eventoSelector.disabled = false;
    estadoSelector.disabled = false;
    fecha.disabled = false;
    hora.disabled = false;
    $('#eventoSelector').append(
      '<option disabled selected hidden value="0">SELECCIONE</option>'
    );
    $('#actividadSelector').append(
      '<option disabled selected hidden value="0">SELECCIONE</option>'
    );
    $('#estadoSelector').append(
      '<option disabled selected hidden value="0">SELECCIONE</option>'
    );
    $('#ciudadSelector').append(
      '<option disabled selected hidden value="0">SELECCIONE</option>'
    );
    $('#fecha').append(
      '<option disabled selected hidden value="0">SELECCIONE</option>'
    );
    $('#hora').append(
      '<option disabled selected hidden value="0">SELECCIONE</option>'
    );
    lugarEvento_input.value = "";
    nombreActividad_input.value = "";
    nombreOrganiza_input.value = "";
    objetivoEvento_input.value = "";
    materiaFortalecida_input.value = "";
    maestroMateria_input.value = "";
    aspectoProfesional_input.value = "";
    proponeAsistir_input.value = "";
  }
  else {
    var datosEnviados = {
      'folio' : folio.value
    };
    $.ajax({
      type : 'POST',
      url : '../control/desplegarSolicitud.php',
      data : datosEnviados,
      dataType : 'json',
      encode : true
    })
    .done(function(datos){
      actividadSelector.disabled = "disabled";
      eventoSelector.disabled = "disabled";
      estadoSelector.disabled = "disabled";
      ciudadSelector.disabled = "disabled";
      fecha_input.disabled = "disabled";
      hora_input.disabled = "disabled";
      $('#eventoSelector').append(
        '<option disabled selected hidden value="'+datos.tipo_evento+'">'+datos.tipo_evento+'</option>'
      );
      $('#actividadSelector').append(
        '<option disabled selected hidden value="'+datos.tipo_actividad+'">'+datos.tipo_actividad+'</option>'
      );
      $('#estadoSelector').append(
        '<option disabled selected hidden value="'+datos.Estado+'">'+datos.Estado+'</option>'
      );
      $('#ciudadSelector').append(
        '<option disabled selected hidden value="'+datos.Ciudad+'">'+datos.Ciudad+'</option>'
      );
      $('#hora').append(
        '<option disabled selected hidden value="'+datos.hora+'">'+datos.hora+'</option>'
      );
      fecha_input.value = datos.fecha;
      lugarEvento_input.value = datos.lugar;
      nombreActividad_input.value = datos.tema;
      nombreOrganiza_input.value = datos.Nombre_Recibe;
      objetivoEvento_input.value = datos.Objetivo;
      materiaFortalecida_input.value = "null";
      maestroMateria_input.value = datos.Maestro;
      aspectoProfesional_input.value = "null";
      proponeAsistir_input.value = "null";
      });
}
});
