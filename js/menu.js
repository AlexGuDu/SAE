document.getElementById('solicitarPermiso').addEventListener('click', openSolicitud)
document.getElementById('registrarActividad').addEventListener('click', openRegistro)
document.getElementById('popup_test').addEventListener('click', popSolicitud)
window.addEventListener('click', clickOutside);
// var solicitudPopup = document.getElementById('solicitudPopup');



function openSolicitud(folio){
    window.location.href = "../views/menu.php";
  }

  function openRegistro(){
    window.location.href = "../views/registrar.html";
  }

  function popSolicitud(){
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


// Ajax Tabla de Matriculas START
function ConsultaDeRegistros(){
  var datosEnviados = {
  };
  $.ajax({
    type : 'POST',
    url : '../control/Consultas.php',
    data : datosEnviados,
    dataType : 'json',
    encode : true
  })
  .done(function(datos){

      for (var i = 1; i < datos.count; i=i+4) {
    $('#consulta tbody').append(
        '<tr>'+
          '<td>'+datos[i]+'</td>'+
          '<td>'+datos[i+1]+'</td>'+
          '<td aling="center">'+'<button onclick="popSolicitud('+1+')" class="btn btn-default" type="button" name="button" id="popup_test">Vista Previa</button>'+'</td>'+
          '<td>'+datos[i+3]+'</td>'+
        '</tr>');
    }
    });
  }

// Ajax Tabla de Matriculas END
