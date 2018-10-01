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
var estado_show = document.getElementById('estado_show');
var ciudad_show = document.getElementById('ciudad_show');
var fecha_input = document.getElementById('fecha');
var hora_input = document.getElementById('hora');
var infoGeo = document.getElementById('infoGeo');

/*------------------------------------------------------------------------------------------------------*/

// Funcionaldiad a Transiciones Dinamicas Evento-Actividad START

  var tipo_evento = document.getElementById('eventoSelector');
  var tipo_actividad = document.getElementById('actividadSelector');
  tipo_evento.addEventListener('change', function(){
    tipo_actividad.disabled = false;
    if(tipo_evento.value == '1'){                 // Vinculacion:
      tipo_actividad.selected == tipo_actividad.options[12];
      tipo_actividad.options[1].hidden = false;   // Visitas Empresariales
      tipo_actividad.options[2].hidden = false;   // Viajes de Estudio
      tipo_actividad.options[3].hidden = false;   // Practicas Academicas
      tipo_actividad.options[4].hidden = true;
      tipo_actividad.options[5].hidden = true;
      tipo_actividad.options[6].hidden = true;
      tipo_actividad.options[7].hidden = true;
      tipo_actividad.options[8].hidden = true;
      tipo_actividad.options[9].hidden = true;
      tipo_actividad.options[10].hidden = true;
      tipo_actividad.options[11].hidden = true;
    }
    if(tipo_evento.value == '2'){                // Cientifica
      tipo_actividad.options[1].hidden = true;
      tipo_actividad.options[2].hidden = true;
      tipo_actividad.options[3].hidden = true;
      tipo_actividad.options[4].hidden = false;  // Congresos
      tipo_actividad.options[5].hidden = false;  // Conferencias
      tipo_actividad.options[6].hidden = false;  // Talleres
      tipo_actividad.options[7].hidden = false;  // Platicas
      tipo_actividad.options[8].hidden = false;  // Maratones
      tipo_actividad.options[9].hidden = false;  // Diplomados
      tipo_actividad.options[10].hidden = true;
      tipo_actividad.options[11].hidden = false; // Otro

    }
    if(tipo_evento.value == '3'){                // Deportiva
      tipo_actividad.options[1].hidden = true;
      tipo_actividad.options[2].hidden = true;
      tipo_actividad.options[3].hidden = true;
      tipo_actividad.options[4].hidden = true;
      tipo_actividad.options[5].hidden = true;
      tipo_actividad.options[6].hidden = true;
      tipo_actividad.options[7].hidden = true;
      tipo_actividad.options[8].hidden = true;
      tipo_actividad.options[9].hidden = true;
      tipo_actividad.options[10].hidden = false; // Caminata
      tipo_actividad.options[11].hidden = false; // Otro
    }

    if(tipo_evento.value == '4'){                // Responsabilidad Social
      tipo_actividad.options[1].hidden = true;
      tipo_actividad.options[2].hidden = true;
      tipo_actividad.options[3].hidden = true;
      tipo_actividad.options[4].hidden = true;
      tipo_actividad.options[5].hidden = true;
      tipo_actividad.options[6].hidden = true;
      tipo_actividad.options[7].hidden = true;
      tipo_actividad.options[8].hidden = true;
      tipo_actividad.options[9].hidden = true;
      tipo_actividad.options[10].hidden = true;
      tipo_actividad.options[11].hidden = false; // Otro
    }
    if(tipo_evento.value == '5'){                // Cultural
      tipo_actividad.options[1].hidden = true;
      tipo_actividad.options[2].hidden = true;
      tipo_actividad.options[3].hidden = true;
      tipo_actividad.options[4].hidden = true;
      tipo_actividad.options[5].hidden = true;
      tipo_actividad.options[6].hidden = true;
      tipo_actividad.options[7].hidden = true;
      tipo_actividad.options[8].hidden = true;
      tipo_actividad.options[9].hidden = true;
      tipo_actividad.options[10].hidden = true;
      tipo_actividad.options[11].hidden = false; // Otro
    }
  });

// Funcionaldiad a Transiciones Dinamicas Evento-Actividad END

/*------------------------------------------------------------------------------------------------------*/

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
    fecha.disabled = false;
    hora.disabled = false;
    infoGeo.style.display = 'none';
    $('#eventoSelector').append(
      '<option disabled selected hidden value="0">SELECCIONE</option>'
    );
    $('#actividadSelector').append(
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
      fecha_input.disabled = "disabled";
      hora_input.disabled = "disabled";
      infoGeo.style.display = 'block';
      estado_show.disabled = "disabled";
      ciudad_show.disabled = "disabled";
      $('#eventoSelector').append(
        '<option disabled selected hidden value="'+datos.tipo_evento+'">'+datos.tipo_evento+'</option>'
      );
      $('#actividadSelector').append(
        '<option disabled selected hidden value="'+datos.tipo_actividad+'">'+datos.tipo_actividad+'</option>'
      );
      estado_show.value = datos.Estado;
      ciudad_show.value = datos.Ciudad;
      hora_input.value = datos.hora;
    
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
