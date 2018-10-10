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
var confirm_campus = document.getElementById('confirm_campus');
var ingresar_matricula = document.getElementById('ingresar_matricula');
var boton_ingresar_matricula = document.getElementById('boton_ingresar_matricula');

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

// Funcionalidad Validar Llenado de Forms y Transiciones de Modulos START

var section_1 = document.getElementById('section_one');
var section_2 = document.getElementById('section_two');
var section_3 = document.getElementById('section_three');

var nextBtn_1 = document.getElementById('nextBtn_one')
var nextBtn_2 = document.getElementById('nextBtn_two')
var previousBtn_1 = document.getElementById('previousBtn_one')
var previousBtn_2 = document.getElementById('previousBtn_two')


nextBtn_1.addEventListener('click', openSection_2);
nextBtn_2.addEventListener('click', openSection_3);
previousBtn_1.addEventListener('click', returnToSection_1);
previousBtn_2.addEventListener('click', returnToSection_2);


  // Regresar a Section ONE
  function returnToSection_1(){
    section_1.style.display = 'block'
    section_2.style.display = 'none'
  }

  // Regresar a Section TWO
  function returnToSection_2(){
    section_2.style.display = 'block';
    section_1.style.display = 'none'
    section_3.style.display = 'none'
  }

  // Validar Section One START
  function openSection_2(){
    section_2.style.display = 'block';
    section_1.style.display = 'none'
    section_3.style.display = 'none'
  }

  // Validar Section Two START
  function openSection_3(){
    section_2.style.display = 'none'
    section_3.style.display = 'block';

  }


// Funcionalidad Validar Llenado de Forms y Transiciones de Modulos END


// Generacion de datos de solicitud previa en campos de Registro

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
    fecha_input.disabled = false;
    hora_input  .disabled = false;
    ingresar_matricula.disabled = false;
    boton_ingresar_matricula.disabled = false;
    infoGeo.style.display = 'none';
    confirm_campus.style.display = 'block';
    lugarEvento.disabled = false;
    nombreActividad.disabled = false;
    nombreOrganiza.disabled = false;
    objetivoEvento.disabled = false;
    maestroMateria.disabled = false;
    ingresar_matricula.disabled = false;
    boton_ingresar_matricula.disabled = false;
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
    fecha_input.value = "";
    hora_input.value = "";
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
      confirm_campus.style.display = 'none';
      estado_show.disabled = "disabled";
      ciudad_show.disabled = "disabled";
      lugarEvento.disabled = "disabled";
      nombreActividad.disabled = "disabled";
      nombreOrganiza.disabled = "disabled";
      objetivoEvento.disabled = "disabled";
      maestroMateria.disabled = "disabled";
      ingresar_matricula.disabled = "disabled";
      boton_ingresar_matricula.disabled = "disabled";
      $('#eventoSelector').append(
        '<option disabled selected hidden value="'+datos.tipo_evento+'">'+nombre_evento(datos.tipo_evento)+'</option>'
      );
      $('#actividadSelector').append(
        '<option disabled selected hidden value="'+datos.tipo_actividad+'">'+nombre_actividad(datos.tipo_actividad)+'</option>'
      );
      estado_show.value = nombre_estado(datos.Estado);
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

// Regresar nombre de evento a base de clave

function nombre_evento(evento){
  switch (evento) {
    case '1':
      return "Vinculacion"
      break;
    case '2':
      return "Cientifica"
      break;
    case '3':
      return "Deportiva"
      break;
    case '4':
      return "Responsabilidad Social"
      break;
    case '5':
      return "Cultural"
      break;

    default:
      return "0"

  }
}

// Regresar nombre de actividad a base de clave
function nombre_actividad(actividad){
  switch (actividad) {
    case '1':
      return "Visitas Empresariales"
      break;
    case '2':
      return "Viajes de Estudio"
      break;
    case '3':
      return "Practicas Academicas"
      break;
    case '4':
      return "Congresos"
      break;
    case '5':
      return "Conferencias"
      break;
    case '6':
      return "Talleres"
      break;
    case '7':
      return "Platicas"
      break;
    case '8':
      return "Maratones"
      break;
    case '9':
      return "Diplomados"
      break;
    case '10':
      return "Caminata"
      break;
    case '11':
      return "Otro"
      break;

    default:
      return "0"

  }
}


// Regresra nombre de estado a base de clave
function nombre_estado(estado){
  switch (estado) {
    case "DIF":
    return "Distrito Federal"
    break;
    case "AGS":
    return "Aguascalientes"
    break;
    case "BCN":
    return "Baja California"
    break;
    case "BCS":
    return "Baja California Sur"
    break;
    case "CAM":
    return "Campeche"
    break;
    case "CHP":
    return "Chiapas"
    break;
    case "CHI":
    return "Chihuahua"
    break;
    case "COA":
    return "Coahuila"
    break;
    case "COL":
    return "Colima"
    break;
    case "DUR":
    return "Durango"
    break;
    case "GTO":
    return "Guanajuato"
    break;
    case "GRO":
    return "Guerrero"
    break;
    case "HGO":
    return "Hidalgo"
    break;
    case "JAL":
    return "Jalisco"
    break;
    case "MEX":
    return "M&eacute;xico"
    break;
    case "MIC":
    return "Michoac&aacute;n"
    break;
    case "MOR":
    return "Morelos"
    break;
    case "NAY":
    return "Nayarit"
    break;
    case "NLE":
    return "Nuevo Le&oacute;n"
    break;
    case "OAX":
    return "Oaxaca"
    break;
    case "PUE":
    return "Puebla"
    break;
    case "QRO":
    return "Quer&eacute;taro"
    break;
    case "ROO":
    return "Quintana Roo"
    break;
    case "SLP":
    return "San Luis Potos&iacute;"
    break;
    case "SIN":
    return "Sinaloa"
    break;
    case "SON":
    return "Sonora"
    break;
    case "TAB":
    return "Tabasco"
    break;
    case "TAM":
    return "Tamaulipas"
    break;
    case "TLX":
    return "Tlaxcala"
    break;
    case "VER":
    return "Veracruz"
    break;
    case "YUC":
    return "Yucat&aacute;n"
    break;
    case "ZAC":
    return "Zacatecas"
    break;

    default:
    return "0"

  }
}
