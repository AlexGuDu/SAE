document.getElementById('solicitarPermiso').addEventListener('click', openSolicitud)
document.getElementById('registrarActividad').addEventListener('click', openRegistro)
document.getElementById('popup_test').addEventListener('click', popSolicitud)
window.addEventListener('click', clickOutside);
var solicitudPopup = document.getElementById('solicitudPopup');


  function openSolicitud(){
    window.location.href = "../views/solicitud.html";
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
