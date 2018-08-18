document.getElementById('solicitarPermiso').addEventListener('click', openSolicitud)
document.getElementById('registrarActividad').addEventListener('click', openRegistro)


function openSolicitud(){
  window.location.href = "solicitud.html";
}
function openRegistro(){
  window.location.href = "registrar.html";
}
