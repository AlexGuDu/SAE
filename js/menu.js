document.getElementById('solicitarPermiso').addEventListener('click', openSolicitud)
document.getElementById('registrarActividad').addEventListener('click', openRegistro)


function openSolicitud(){
  window.location.href = "../views/solicitud.html";
}
function openRegistro(){
  window.location.href = "../views/registrar.html";
}
