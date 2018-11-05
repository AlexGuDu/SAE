document.getElementById('solicitarPermiso').addEventListener('click', openSolicitud);
document.getElementById('registrarActividad').addEventListener('click', openRegistro);
document.getElementById('popup_test').addEventListener('click', popSolicitud);
window.addEventListener('click', clickOutside);
  var solicitudPopup = document.getElementById('solicitudPopup');
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
  var comentario_label = document.getElementById('comentario');
  var materiaName;
  var card_cientifica = document.getElementById('card_cientifica');
  var card_cultural = document.getElementById('card_cultural');
  var card_vinculacion = document.getElementById('card_vinculacion');
  var card_deportiva = document.getElementById('card_deportiva');
  var card_responsabilidad_social = document.getElementById('card_responsabilidad_social');
  var count_cientifica = document.getElementById('count_cientifica');
  var count_cultural = document.getElementById('count_cultural');
  var count_vinculacion = document.getElementById('count_vinculacion');
  var count_deportiva = document.getElementById('count_deportiva');
  var count_responsabilidad_social = document.getElementById('count_responsabilidad_social');
  var actividades_realizadas = document.getElementById('actividades_realizadas');
  var barra_progreso = document.getElementById('barra_progreso');
  var cert_button = document.getElementById('cert_button');



  function openSolicitud(){
    window.location.href = "../views/solicitud.php";
  }

  function openRegistro(){
    window.location.href = "../views/registrar.php";
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
      // Conseguir nombre de materia a base de clave
      var datosEnviados = {
        'cveMateria': datos.materia
      }
      $.ajax({
        type: 'POST',
        url :'../control/materiaNombre.php',
        data: datosEnviados,
        dataType: 'json',
        encode: true
      })
      .done(function(datos){
        materia_fortalecida.innerHTML =  datos.NomMateria.toUpperCase();
      });
      // END

    territorio_label.innerHTML = datos.Territorio.toUpperCase();
    pais_label.innerHTML = datos.Pais.toUpperCase();
    estado_label.innerHTML = nombre_estado(datos.Estado).toUpperCase();
    ciudad_label.innerHTML = datos.Ciudad.toUpperCase();
    tipo_evento_label.innerHTML = nombre_evento(datos.tipo_evento).toUpperCase();
    fecha_inicial_label.innerHTML = datos.fecha.toUpperCase();
    tipo_actividad_label.innerHTML = nombre_actividad(datos.tipo_actividad).toUpperCase();
    hora_inicial_label.innerHTML = datos.hora.toUpperCase();
    nombre_empresa_label.innerHTML = datos.empresa.toUpperCase();
    tema_visita_label.innerHTML = datos.tema.toUpperCase();
    nombre_representante_label.innerHTML = datos.Nombre_Recibe.toUpperCase();
    datos_contacto_label.innerHTML = datos.Contacto_empresa.toUpperCase();
    objetivo_actividad_label.innerHTML = datos.Objetivo.toUpperCase();
    // materia fortalecida
    maestro_responsable_label.innerHTML= datos.Maestro.toUpperCase();
    aspecto_profesional_label.innerHTML = datos.aspecto_pro.toUpperCase();
    razon_propuesta_label.innerHTML = datos.proponente.toUpperCase();
    comentario_label.innerHTML = datos.comentario.toUpperCase();
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
  $('#consultaSolicitudes tbody').empty();
  $('#consultaRegistros tbody').empty();
  $.ajax({
    type : 'POST',
    url : '../control/consultaSolicitudes.php',
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
    if (datos.count == 1) {
      $('#consultaSolicitudes tbody').append(
        '<tr>'+
          '<td colspan="4" class="table-emptymsg" >No hay actividades pendientes</td>'+
        '</tr>'
      );
    }
    for (var i = 1; i < datos.count; i=i+5) {
      if(datos[i+2]!=0){
        var msg = textoEstatus(datos[i+2]);
      } else {
        var msg = textoEstatus(datos[i+1]);
      }
      $('#consultaSolicitudes tbody').append(
          '<tr style="text-align:center;">'+
            '<td>'+datos[i]+'</td>'+
            '<td>'+msg+'</td>'+
            '<td>'+'<button onclick="popSolicitud('+datos[i+4]+')" class="btn btn-default fas fa-eye" type="button" name="button" id="popup_test"></button>'+'</td>'+
            '<td>'+datos[i+3]+'</td>'+
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
    if (datos.count == 1) {
      $('#consultaRegistros tbody').append(
        '<tr>'+
          '<td colspan="4" class="table-emptymsg" >No hay actividades pendientes</td>'+
        '</tr>'
      );
    }
    for (var i = 1; i < datos.count; i=i+5) {
      if(datos[i+2]!=0){
        var msg = textoEstatus(datos[i+2]);
      } else {
        var msg = textoEstatus(datos[i+1]);
      }
      $('#consultaRegistros tbody').append(
          '<tr style="text-align:center;">'+
            '<td>'+datos[i]+'</td>'+
            '<td>'+msg+'</td>'+
            '<td>'+'<button onclick="popSolicitud('+datos[i+4]+')" class="btn btn-default fas fa-eye" type="button" name="button" id="popup_test"></button>'+'</td>'+
            '<td>'+datos[i+3]+'</td>'+
          '</tr>'
      );
    }
  });

}

function ConsultaDeCumplimiento(){
  $.ajax({
    type : 'POST',
    url : '../control/informacionCumplimiento.php',
    dataType : 'json',
    encode : true
  }).done(function(datos){
    count_vinculacion.innerHTML = datos.act01;
    count_cientifica.innerHTML = datos.act02;
    count_deportiva.innerHTML = datos.act03;
    count_responsabilidad_social.innerHTML = datos.act04;
    count_cultural.innerHTML = datos.act05;

    actividades_realizadas.innerHTML = 'Actividades realizadas ('+datos.total+'/5)';
    switch (datos.total) {
      case 0:
        barra_progreso.innerHTML = '0%';
        barra_progreso.style.width = '2%';
      break;
      case 1:
        barra_progreso.innerHTML = '20%';
        barra_progreso.style.width = '20%';
      break;
      case 2:
        barra_progreso.innerHTML = '40%';
        barra_progreso.style.width = '40%';
      break;
      case 3:
        barra_progreso.innerHTML = '60%';
        barra_progreso.style.width = '60%';
      break;
      case 4:
        barra_progreso.innerHTML = '80%';
        barra_progreso.style.width = '80%';
      break;
      case 5:
        barra_progreso.innerHTML = '100%';
        barra_progreso.style.width = '100%';
        barra_progreso.style.color = 'black';
        barra_progreso.style.fontWeight = 'bold';
        barra_progreso.classList.add('bg-warning');
        makeItRain();
        cert_button.innerHTML= '<div class="row justify-content-center">'+
                                  '<div class="col-md-3 col-sm-3">'+
                                    '<button onClick="certPdf();" type="button" class="boton" name="button">IMPRIMIR CERTIFICADO</button>'+
                                  '</div>'+
                                '</div>';
      break;

      default:
      barra_progreso.innerHTML = 'Un error ha ocurrido!';
      barra_progreso.style.width = '33%';
      barra_progreso.classList.add('bg-danger');

    }

    if (datos.act01!=0) {
      count_vinculacion.classList.add("badge");
      count_vinculacion.classList.add("badge-pill");
      count_vinculacion.classList.add("badge-success");
      card_vinculacion.classList.add("border");
      card_vinculacion.classList.add("border-success");
    }
    if (datos.act02!=0) {
      count_cientifica.classList.add("badge");
      count_cientifica.classList.add("badge-pill");
      count_cientifica.classList.add("badge-success");
      card_cientifica.classList.add("border");
      card_cientifica.classList.add("border-success");
    }
    if (datos.act03!=0) {
      count_deportiva.classList.add("badge");
      count_deportiva.classList.add("badge-pill");
      count_deportiva.classList.add("badge-success");
      card_deportiva.classList.add("border");
      card_deportiva.classList.add("border-success");
    }
    if (datos.act04!=0) {
      count_responsabilidad_social.classList.add("badge");
      count_responsabilidad_social.classList.add("badge-pill");
      count_responsabilidad_social.classList.add("badge-success");
      card_responsabilidad_social.classList.add("border");
      card_responsabilidad_social.classList.add("border-success");
    }
    if (datos.act05!=0) {
      count_cultural.classList.add("badge");
      count_cultural.classList.add("badge-pill");
      count_cultural.classList.add("badge-success");
      card_cultural.classList.add("border");
      card_cultural.classList.add("border-success");
    }

  });
}

function certPdf(){
    window.location.href = "../control/certificado.php";
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
    return '<div class="bg-success text-center text-white estatus" role="alert">Aprobada</div>';
    break;
    case '3':
    return '<div class="bg-danger text-center text-white estatus" role="alert">Rechazada</div>';
    break;
    default:
    return "0";

  }
}

function makeItRain(){
  // Some random colors
  const colors = ["#3CC157", "#2AA7FF", "#1B1B1B", "#FCBC0F", "#F85F36"];

  const numBalls = 50;
  const balls = [];

  for (let i = 0; i < numBalls; i++) {
    let ball = document.createElement("div");
    ball.classList.add("ball");
    ball.style.background = colors[Math.floor(Math.random() * colors.length)];
    ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
    ball.style.top = `${Math.floor(Math.random() * 100)}vh`;
    ball.style.transform = `scale(${Math.random()})`;
    ball.style.width = `${Math.random()}em`;
    ball.style.height = ball.style.width;

    balls.push(ball);
    document.body.append(ball);
  }

  // Keyframes
  balls.forEach((el, i, ra) => {
    let to = {
      x: Math.random() * (i % 2 === 0 ? -11 : 11),
      y: Math.random() * 12
    };

    let anim = el.animate(
      [
        { transform: "translate(0, 0)" },
        { transform: `translate(${to.x}rem, ${to.y}rem)` }
      ],
      {
        duration: (Math.random() + 1) * 2000, // random duration
        direction: "alternate",
        fill: "both",
        iterations: Infinity,
        easing: "ease-in-out"
      }
    );
  });
}
