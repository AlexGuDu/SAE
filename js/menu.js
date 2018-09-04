document.getElementById('solicitarPermiso').addEventListener('click', openSolicitud)
document.getElementById('registrarActividad').addEventListener('click', openRegistro)


function openSolicitud(){
  window.location.href = "../views/solicitud.html";
}
function openRegistro(){
  window.location.href = "../views/registrar.html";
}
// Ajax Tabla de Matriculas START
ConsultaDeRegistros(){
  var datosEnviados = {
    'matricula' : $('#matricula').val()
  };
  $.ajax({
    type : 'POST',
    url : '../control/Consultas.php',
    data : datosEnviados,
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
    $('#consulta').append(
        '<tr>'+
          '<td>'+datos.d4+'</td>'+
          '<td>'+datos.d1+'</td>'+
          '<td>'+datos.d2+'</td>'+
          '<td>'+datos.d3+'</td>'+
        '</tr>'
    );
    });
  });
// Ajax Tabla de Matriculas END
