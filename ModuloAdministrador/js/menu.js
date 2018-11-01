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
var responsable_label = document.getElementById('responsable');
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
  $('#agregar').click(function(){
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
    $('#rechazar').click(function(){
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

function comentarioAceptaR(folio){
  comentarioAceptarR.style.display = 'block';
  $('#agregarR').click(function(){
   var datosEnviados = {
     'folio' : folio ,
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


 function comentarioRechazaR(folio){
   comentarioDenegarR.style.display = 'block';
    $('#rechazaR').click(function(){
   var datosEnviados = {
     'folio' : folio,
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
      url : '../control/vistaPreviaCoo.php',
      data : datosEnviados,
      dataType : 'json',
      encode : true
    })
    .done(function(datos){
      territorio_label.innerHTML = datos.Territorio;
      pais_label.innerHTML = datos.Pais;
      estado_label.innerHTML = datos.Estado;
      ciudad_label.innerHTML = datos.Ciudad;
      tipo_evento_label.innerHTML = datos.tipo_evento;
      fecha_inicial_label.innerHTML = datos.fecha;
      tipo_actividad_label.innerHTML = datos.tipo_actividad;
      hora_inicial_label.innerHTML = datos.hora;
      nombre_empresa_label.innerHTML = datos.empresa;
      tema_visita_label.innerHTML = datos.tema;
      nombre_representante_label.innerHTML = datos.Nombre_Recibe;
      datos_contacto_label.innerHTML = datos.Contacto_empresa;
      objetivo_actividad_label.innerHTML = datos.Objetivo;
      maestro_responsable_label.innerHTML= datos.Maestro;
      responsable_label.innerHTML= datos.responsable;
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
      for (var i = 1; i < datos.count; i=i+4) {
        $('#consultaSolicitud tbody').append(
          '<tr>'+
            '<td>'+'<input type="button" name="boton" class="botonsm boton-add" onclick="comentarioAceptaS('+datos[i+3]+')"  id="popup_agregar"> <input type="button" name="" onclick="comentarioRechazaS('+datos[i+3]+')" class="botonsm boton-del">'+'</td>'+
            '<td>'+datos[i+1]+'</td>'+
            '<td>'+datos[i]+'</td>'+
            '<td>'+'<button onclick="popSolicitud('+datos[i+3]+')" class="btn btn-default" type="button" name="button" id="popup_test">Vista Previa</button>'+'</td>'+
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
        for (var i = 1; i < datos.count; i=i+4) {
          $('#consultaRegistro tbody').append(
            '<tr>'+
              '<td>'+'<input type="button" name="boton" class="botonsm boton-add" onclick="comentarioAceptaR('+datos[i+3]+','+datos[i+1]+')"  id="popup_agregar"> <input type="button" name="" onclick="comentarioRechazaR('+datos[i+3]+','+datos[i+1]+')" class="botonsm boton-del">'+'</td>'+
              '<td>'+datos[i+1]+'</td>'+
              '<td>'+datos[i]+'</td>'+
              '<td>'+'<button onclick="popSolicitud('+datos[i+3]+')" class="btn btn-default" type="button" name="button" id="popup_test">Vista Previa</button>'+'</td>'+
              '<td>'+datos[i+2]+'</td>'+
            '</tr>');
        }
      });
    }

// Ajax Tabla de Matriculas END

// Ajax Tabla de Matriculas END
