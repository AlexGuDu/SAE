document.getElementById('actividadRegistradas').addEventListener('click', openActividades);
document.getElementById('alumnos').addEventListener('click', openAlumnos);
document.getElementById('popup_test').addEventListener('click', popSolicitud);
document.getElementById('exit_sol_aceptar').addEventListener('click', cerrarpopup);
document.getElementById('exit_sol_denegar').addEventListener('click', cerrarpopup);
document.getElementById('exit_reg_aceptar').addEventListener('click', cerrarpopup);
document.getElementById('exit_reg_denegar').addEventListener('click', cerrarpopup);
window.addEventListener('click', clickOutside);
var comentarioAceptarS = document.getElementById('comentarioAceptarS');
var comentarioDenegarS = document.getElementById('comentarioDenegarS');
var comentarioAceptarR = document.getElementById('comentarioAceptarR');
var comentarioDenegarR = document.getElementById('comentarioDenegarR');

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

function openActividades(){
  window.location.href = "../views/menu_consultas.html";

}
function openAlumnos(){
  window.location.href = "../views/menu_alumnos.html";

}

function cerrarpopup() {
  comentarioAceptarR.style.display = 'none';
  comentarioAceptarS.style.display = 'none';
  comentarioDenegarR.style.display = 'none';
  comentarioDenegarS.style.display = 'none';
}

function comentarioAceptaS(folio){
  comentarioAceptarS.style.display = 'block';
  $('#sol_aceptar').click(function(){
   var datosEnviados = {
     'folio' : folio ,
     'comentario' : $('#com_sol_aceptar').val()
   };
   $.ajax({
     type : 'POST',
     url : '../control/aceptarSolicitud.php',
     data : datosEnviados,
     dataType : 'json',
     encode : true,
     complete: function(){
       cerrarpopup();
       consultaDeSolicitud();
     }
   })

  });

 }


 function comentarioRechazaS(folio){
   comentarioDenegarS.style.display = 'block';
    $('#sol_denegar').click(function(){
   var datosEnviados = {
     'folio' : folio,
      'comentario' : $('#com_sol_denegar').val()
   };
   $.ajax({
     type : 'POST',
     url : '../control/rechazarSolicitud.php',
     data : datosEnviados,
     dataType : 'json',
     encode : true,
     complete: function(){
       cerrarpopup();
       consultaDeSolicitud();
     }
   })

  });
 }

function comentarioAceptaR(folio, matricula){
  comentarioAceptarR.style.display = 'block';
  $('#reg_aceptar').click(function(){
   var datosEnviados = {
     'folio' : folio ,
     'matricula' : matricula,
     'comentario' : $('#com_reg_aceptar').val()
   };
   $.ajax({
     type : 'POST',
     url : '../control/aceptarRegistro.php',
     data : datosEnviados,
     dataType : 'json',
     encode : true,
     complete: function(){
       cerrarpopup();
       consultaDeRegistro();
     }
   })
  });
 }


 function comentarioRechazaR(folio, matricula){
   comentarioDenegarR.style.display = 'block';
    $('#reg_denegar').click(function(){
   var datosEnviados = {
     'folio' : folio,
     'matricula' : matricula,
     'comentario' : $('#com_reg_denegar').val()
   };
   $.ajax({
     type : 'POST',
     url : '../control/rechazarRegistro.php',
     data : datosEnviados,
     dataType : 'json',
     encode : true,
     complete: function(){
       cerrarpopup();
       consultaDeRegistro();
     }
   })
  });
 }


 function popSolicitud(folio){
   var datosEnviados = {
     'folio' : folio
   };
   $.ajax({
     type : 'POST',
     url : '../control/vistaPreviaAdmin.php',
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
       url :'../control/materiaNombreAdmin.php',
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
   });

   solicitudPopup.style.display = 'block';
 }

  function clickOutside(e){
    if(e.target == comentarioAceptarS){
    comentarioAceptarS.style.display = 'none';
    }
    if(e.target == comentarioDenegarS){
    comentarioDenegarS.style.display = 'none';
    }
    if(e.target == comentarioAceptarR){
    comentarioAceptarR.style.display = 'none';
    }
    if(e.target == comentarioDenegarR){
    comentarioDenegarR.style.display = 'none';
    }
    if(e.target == solicitudPopup){
    solicitudPopup.style.display = 'none';
    }
  }
  $(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        comentarioAceptarS.style.display = 'none';
        comentarioDenegarS.style.display = 'none';
        comentarioAceptarR.style.display = 'none';
        comentarioDenegarR.style.display = 'none';
        solicitudPopup.style.display = 'none';
    }
  });

document.getElementById('cerrarPreview').addEventListener('click', function(){
  solicitudPopup.style.display = 'none';
})

// Ajax Tabla de Matriculas START

function consultaDeSolicitud(){
  $('#consultaSolicitud tbody').empty();
  $.ajax({
    type : 'POST',
    url : '../control/consultaSolicitud.php',
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
    if (datos.count == 1) {
      $('#consultaSolicitud tbody').append(
        '<tr>'+
          '<td colspan="5" class="table-emptymsg" >No hay actividades pendientes</td>'+
        '</tr>'
      );
    }
      for (var i = 1; i < datos.count; i=i+4) {
        $('#consultaSolicitud tbody').append(
          '<tr>'+
            '<td>'+'<input type="button" name="boton" class="botonsm boton-add" onclick="comentarioAceptaS('+datos[i+3]+')"  id="popup_agregar"> <input type="button" name="" onclick="comentarioRechazaS('+datos[i+3]+')" class="botonsm boton-del">'+'</td>'+
            '<td>'+datos[i+1]+'</td>'+
            '<td>'+datos[i]+'</td>'+
            '<td>'+'<button onclick="popSolicitud('+datos[i+3]+')" class="btn btn-default" type="button" name="button" id="popup_test">Consultar</button>'+'</td>'+
            '<td>'+datos[i+2]+'</td>'+
          '</tr>');
      }
    });
  }

  function consultaDeRegistro(){
    $('#consultaRegistro tbody').empty();
    $.ajax({
      type : 'POST',
      url : '../control/consultaRegistro.php',
      dataType : 'json',
      encode : true
    })
    .done(function(datos){
      if (datos.count == 1) {
        $('#consultaRegistro tbody').append(
          '<tr>'+
            '<td colspan="5" class="table-emptymsg" >No hay actividades pendientes</td>'+
          '</tr>'
        );
      }
        for (var i = 1; i < datos.count; i=i+4) {
          $('#consultaRegistro tbody').append(
            '<tr>'+
              '<td>'+'<input type="button" name="boton" class="botonsm boton-add" onclick="comentarioAceptaR('+datos[i+3]+','+datos[i+1]+')"  id="popup_agregar"> <input type="button" name="" onclick="comentarioRechazaR('+datos[i+3]+','+datos[i+1]+')" class="botonsm boton-del">'+'</td>'+
              '<td>'+datos[i+1]+'</td>'+
              '<td>'+datos[i]+'</td>'+
              '<td>'+'<button onclick="popSolicitud('+datos[i+3]+')" class="btn btn-default" type="button" name="button" id="popup_test">Consultar</button>'+'</td>'+
              '<td>'+datos[i+2]+'</td>'+
            '</tr>');
        }
      });
    }

// Ajax Tabla de Matriculas END

// Ajax Tabla de Matriculas END


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
