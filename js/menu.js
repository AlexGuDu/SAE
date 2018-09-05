document.getElementById('solicitarPermiso').addEventListener('click', openSolicitud)
document.getElementById('registrarActividad').addEventListener('click', openRegistro)


function openSolicitud(){
  window.location.href = "../views/solicitud.html";
}
function openRegistro(){
  window.location.href = "../views/registrar.html";
}


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
          '<td>'+datos[i+2]+'</td>'+
          '<td>'+datos[i+3]+'</td>'+
        '</tr>'
    );
    }
    });

  }

// Ajax Tabla de Matriculas END
