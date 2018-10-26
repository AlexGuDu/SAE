document.getElementById('solicitarPermiso').addEventListener('click', openSolicitud)
document.getElementById('registrarActividad').addEventListener('click', openRegistro)
document.getElementById('popup_test').addEventListener('click', popSolicitud)
window.addEventListener('click', clickOutside);
// var solicitudPopup = document.getElementById('solicitudPopup');
  var territorio_label = document.getElementById('territorio');
  var pais_label = document.getElementById('pais');
  var estado_label = document.getElementById('estado');
  var ciudad_label = document.getElementById('ciudad');
  var tipo_evento_label = document.getElementById('tipo_evento');
  var fecha_inicial_label = document.getElementById('fecha_inicial');
  var tipo_actividad_label = document.getElementById('tipo_actividad');
  var hora_inicial_label = document.getElementById('hora_inicial');
  var nombre_empresa_label = document.getElementById('nombre_empresa');
  var tema_visita_label = document.getElementById('tema_visita');
  var nombre_representante_label = document.getElementById('nombre_representante');
  var datos_contacto_label = document.getElementById('datos_contacto');
  var objetivo_actividad_label = document.getElementById('objetivo_actividad');
  var materia_fortalecida_label = document.getElementById('materia_fortalecida');
  var aspecto_profesional_label = document.getElementById('aspecto_profesional');
  var maestro_responsable_label = document.getElementById('maestro_responsable');
  var razon_propuesta_label = document.getElementById('razon_propuesta');


  function openSolicitud(){
    window.location.href = "../views/solicitud.html";
  }

  function openRegistro(){
    window.location.href = "../views/registrar.html";
  }

  function popSolicitud(folio){
    var datosEnviados = {
      'folio' : folio
    };
    $.ajax({
      type : 'POST',
      url : '../control/vista_previa.php',
      data : datosEnviados,
      dataType : 'json',
      encode : true
    })
    .done(function(datos){
      territorio_label.innerHTML = datos.Territorio;
      pais_label.innerHTML = datos.Pais;
      estado_label.innerHTML = nombre_estado(datos.Estado);
      ciudad_label.innerHTML = datos.Ciudad;
      tipo_evento_label.innerHTML = nombre_evento(datos.tipo_evento);
      fecha_inicial_label.innerHTML = datos.fecha;
      tipo_actividad_label.innerHTML = nombre_actividad(datos.tipo_actividad);
      hora_inicial_label.innerHTML = datos.hora;
      nombre_empresa_label.innerHTML = datos.empresa;
      tema_visita_label.innerHTML = datos.tema;
      nombre_representante_label.innerHTML = datos.Nombre_Recibe;
      datos_contacto_label.innerHTML = datos.Contacto_empresa;
      objetivo_actividad_label.innerHTML = datos.Objetivo;
      maestro_responsable_label.innerHTML= datos.Maestro;
      });

    solicitudPopup.style.display = 'block';
  }

  function clickOutside(e){
    if(e.target == solicitudPopup){
    solicitudPopup.style.display = 'none';
    }
  }

  $(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        solicitudPopup.style.display = 'none';
    }
  });

  document.getElementById('cerrarPreview').addEventListener('click', function(){
    solicitudPopup.style.display = 'none';
  })


// Ajax Tabla de Solicitudes
function ConsultaDeActividades(){
  $.ajax({
    type : 'POST',
    url : '../control/consultaSolicitudes.php',
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
    for (var i = 1; i < datos.count; i=i+4) {
      $('#consultaSolicitudes tbody').append(
          '<tr>'+
            '<td>'+datos[i]+'</td>'+
            '<td>'+textoEstatus(datos[i+1])+'</td>'+
            '<td>'+'<button onclick="popSolicitud('+datos[i+3]+')" class="btn btn-default" type="button" name="button" id="popup_test">Consultar</button>'+'</td>'+
            '<td>'+datos[i+2]+'</td>'+
          '</tr>'
      );
    }
  });

  $.ajax({
    type : 'POST',
    url : '../control/consultaRegistros.php',
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
    for (var i = 1; i < datos.count; i=i+4) {
      $('#consultaRegistros tbody').append(
          '<tr>'+
            '<td>'+datos[i]+'</td>'+
            '<td>'+textoEstatus(datos[i+1])+'</td>'+
            '<td>'+'<button onclick="popSolicitud('+datos[i+3]+')" class="btn btn-default" type="button" name="button" id="popup_test">Consultar</button>'+'</td>'+
            '<td>'+datos[i+2]+'</td>'+
          '</tr>'
      );
    }
  });

}






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

function textoEstatus(estatus){
  switch (estatus) {
    case '1':
    return '<div class="bg-warning text-center estatus" role="alert">Pendiente</div>'
    break;
    case '2':
    return '<div class="bg-success text-center estatus" role="alert">Aprobada</div>';
    break;
    case '3':
    return '<div class="bg-danger text-center estatus" role="alert">Rechazada</div>';
    break;
    default:
    return "0";

  }
}
