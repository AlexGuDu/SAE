
//Eliminar session de matriculas al refrescar la pagina
function limpiarMatriculas(){
  $.ajax({
    type : 'POST',
    url : '../control/limpiarMatriculas.php',
    dataType : 'json',
    encode : true
  })
}
//Eliminar session de matriculas al refrescar la pagina END

// Funcionalidad Agregar matricula tabla solicitud
var ingresar_matricula = document.getElementById('ingresar_matricula');
var warningModalMatricula = document.getElementById('warningModalMatricula');
var error1 = document.getElementById('error1');
var error2 = document.getElementById('error2');
var error3 = document.getElementById('error3');
var error4 = document.getElementById('error4');
var error5 = document.getElementById('error5');

window.addEventListener('click', clickOutside);
error1.style.display='none';
error2.style.display='none';
error3.style.display='none';
error4.style.display='none';
error5.style.display='none';
  function clickOutside(e){
    if(e.target == warningModalMatricula){
    warningModalMatricula.style.display = 'none';
    error1.style.display='none';
    error2.style.display='none';
    error3.style.display='none';
    error4.style.display='none';
    error5.style.display='none';
    }
  }
  $(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        warningModalMatricula.style.display = 'none';
        error1.style.display='none';
        error2.style.display='none';
        error3.style.display='none';
        error4.style.display='none';
        error5.style.display='none';
    }
  });
  document.getElementById('ok_modalMatricula').addEventListener('click', function(){
    warningModalMatricula.style.display = 'none';
    error1.style.display='none';
    error2.style.display='none';
    error3.style.display='none';
    error4.style.display='none';
    error5.style.display='none';
  })

  //Quitar matricula de la trabla solictud
  function borrar(matricula){
    $(document).on('click', '.boton-del', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
    var datosEnviados = {
      'matricula' : matricula
    };
    $.ajax({
      type : 'POST',
      url : '../control/quitarMatricula.php',
      data : datosEnviados,
      dataType : 'json',
      encode : true
    })
  }
  //Quitar matricula de la trabla solictud END

//Agregar alumno a trabla de solicitud
$('#boton_ingresar_matricula').click(function(){

  var datosEnviados = {
    'matricula' : $('#ingresar_matricula').val()
  };
  $.ajax({
    type : 'POST',
    url : '../control/agregarMatricula.php',
    data : datosEnviados,
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
    //Error no se ingreso nunguna matricula
    if (datos.error==1) {
      warningModalMatricula.style.display = 'block';
      error1.style.display='block';
    }
    //Error matricula no existe
    else if (datos.error==2) {
      warningModalMatricula.style.display = 'block';
      error2.style.display='block';
    }
    //Error Matricula de sesion
    else if (datos.error==3) {
      warningModalMatricula.style.display = 'block';
      error3.style.display='block';
    }
    //Error matricula ya existe en la tabla
    else if (datos.error==4) {
      warningModalMatricula.style.display = 'block';
      error4.style.display='block';
    }
    else if (datos.error==5) {
      warningModalMatricula.style.display = 'block';
      error5.style.display='block';
    }
    else {
    ingresar_matricula.value="";
    $('#datos_tabla tbody').append(
        '<tr>'+
          '<td>'+'<input type="button" onclick="borrar('+datos.d5+')" name="boton" class="boton boton-del">'+'</td>'+
          '<td>'+datos.d4+'</td>'+
          '<td>'+datos.d1+'</td>'+
          '<td>'+datos.d2+'</td>'+
          '<td>'+datos.d3+'</td>'+
        '</tr>'
    );
    }
    });
  });
//  Funcionalidad Agregar matricula tabla solicitud END



/*------------------------------------------------------------------------------------------------------*/

// Funcionalidad a Transiciones de Territorio Nacional-Extranjero START
    var toggleNacional = document.getElementById('territorioNac');
    var toggleExtranjero = document.getElementById('territorioExt');
    var formNacional = document.getElementById('formNac');
    var formExtranjero = document.getElementById('formExt');
    var terrFlag = 'nac'; // Used in Form Validation's if condition

    toggleNacional.addEventListener('click', function(){
      es.style.backgroundColor = 'white';
      ci.style.backgroundColor = 'white';
      formNacional.style.display = 'block';
      formExtranjero.style.display = 'none';
      terrFlag = 'nac';
    });
    toggleExtranjero.addEventListener('click', function(){
      ext_pais.style.backgroundColor = 'white';
      ext_es.style.backgroundColor = 'white';
      ext_ci.style.backgroundColor = 'white';
      formNacional.style.display = 'none';
      formExtranjero.style.display = 'block';
      terrFlag = 'ext';
    });

// Funcionalidad a Transiciones de Territorio Nacional-Extranjero END

/*------------------------------------------------------------------------------------------------------*/

// Funcionaldiad a Transiciones Dinamicas Evento-Actividad START

  var tipo_evento = document.getElementById('eventoSelector');
  var tipo_actividad = document.getElementById('actividadSelector');
  tipo_evento.addEventListener('change', function(){
    tipo_actividad.disabled = false;
    tipo_actividad.value = "0";
    if(tipo_evento.value == '1'){                 // Vinculacion:
      tipo_actividad.options[1].hidden = false;   // Visitas Empresariales
      tipo_actividad.options[2].hidden = false;   // Viajes de Estudio
      tipo_actividad.options[3].hidden = false;   // Practicas Academicas
      tipo_actividad.options[4].hidden = true;
      tipo_actividad.options[5].hidden = true;
      tipo_actividad.options[6].hidden = true;
      tipo_actividad.options[7].hidden = true;
      tipo_actividad.options[8].hidden = true;
      tipo_actividad.options[9].hidden = true;
      tipo_actividad.options[10].hidden = true;
      tipo_actividad.options[11].hidden = false;  // Otro
    }
    if(tipo_evento.value == '2'){                // Cientifica
      tipo_actividad.options[1].hidden = true;
      tipo_actividad.options[2].hidden = true;
      tipo_actividad.options[3].hidden = true;
      tipo_actividad.options[4].hidden = false;  // Congresos
      tipo_actividad.options[5].hidden = false;  // Conferencias
      tipo_actividad.options[6].hidden = false;  // Talleres
      tipo_actividad.options[7].hidden = false;  // Platicas
      tipo_actividad.options[8].hidden = false;  // Maratones
      tipo_actividad.options[9].hidden = false;  // Diplomados
      tipo_actividad.options[10].hidden = true;
      tipo_actividad.options[11].hidden = false; // Otro

    }
    if(tipo_evento.value == '3'){                // Deportiva
      tipo_actividad.options[1].hidden = true;
      tipo_actividad.options[2].hidden = true;
      tipo_actividad.options[3].hidden = true;
      tipo_actividad.options[4].hidden = true;
      tipo_actividad.options[5].hidden = true;
      tipo_actividad.options[6].hidden = true;
      tipo_actividad.options[7].hidden = true;
      tipo_actividad.options[8].hidden = true;
      tipo_actividad.options[9].hidden = true;
      tipo_actividad.options[10].hidden = false; // Caminata
      tipo_actividad.options[11].hidden = false; // Otro
    }

    if(tipo_evento.value == '4'){                // Responsabilidad Social
      tipo_actividad.options[1].hidden = true;
      tipo_actividad.options[2].hidden = true;
      tipo_actividad.options[3].hidden = true;
      tipo_actividad.options[4].hidden = true;
      tipo_actividad.options[5].hidden = true;
      tipo_actividad.options[6].hidden = true;
      tipo_actividad.options[7].hidden = true;
      tipo_actividad.options[8].hidden = true;
      tipo_actividad.options[9].hidden = true;
      tipo_actividad.options[10].hidden = true;
      tipo_actividad.options[11].hidden = false; // Otro
    }
    if(tipo_evento.value == '5'){                // Cultural
      tipo_actividad.options[1].hidden = true;
      tipo_actividad.options[2].hidden = true;
      tipo_actividad.options[3].hidden = true;
      tipo_actividad.options[4].hidden = true;
      tipo_actividad.options[5].hidden = true;
      tipo_actividad.options[6].hidden = true;
      tipo_actividad.options[7].hidden = true;
      tipo_actividad.options[8].hidden = true;
      tipo_actividad.options[9].hidden = true;
      tipo_actividad.options[10].hidden = true;
      tipo_actividad.options[11].hidden = false; // Otro
    }
  });

// Funcionaldiad a Transiciones Dinamicas Evento-Actividad END

/*------------------------------------------------------------------------------------------------------*/

// Generacion de datos de materia

function materia_ComboBox(){

  $.ajax({
    type : 'POST',
    url : '../control/materiaComboBox.php',
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
     for (var i = 1; i < datos.count; i=i+3) {
    $('#materiaCB').append(
      '<option value="'+datos[i+2]+'">'+datos[i+1]+" - "+datos[i]+'</option>');
     }
    });
}


// Funcionalidad Validar Llenado de Forms y Transiciones de Modulos START
var warningModal = document.getElementById('warningModal');

var section_1 = document.getElementById('section_one');
var section_2 = document.getElementById('section_two');
var section_3 = document.getElementById('section_three');

var nextBtn_1 = document.getElementById('nextBtn_one')
var nextBtn_2 = document.getElementById('nextBtn_two')
var previousBtn_1 = document.getElementById('previousBtn_one')
var previousBtn_2 = document.getElementById('previousBtn_two')
// var solicitarPermiso = document.getElementById('solicitarPermiso');


// Utilizadas para el cambio de colores dependiendo de campo vacio o seleccionado
// S1
var ext_pa = document.getElementById('ext_pais');
var ext_es = document.getElementById('ext_estado');
var ext_ci = document.getElementById('ext_ciudad');
var es = document.getElementById('nac_estado');
var ci = document.getElementById('nac_ciudad');
var t_e = document.getElementById('eventoSelector');
var t_a = document.getElementById('actividadSelector');
var fe = document.getElementById('fecha');
var ho = document.getElementById('hora');
var l_e = document.getElementById('lugar_evento');

// S2
var nomEmp = document.getElementById('nombreEmpresa');
var temVis = document.getElementById('temaVisita');
var recEmp = document.getElementById('recibeEmpresa');
var conEmp = document.getElementById('contactoEmpresa');

// S3
var objEve = document.getElementById('objetivoEvento');
var matFort = document.getElementById('materiaCB');
var maeMat = document.getElementById('maestroMateria');
var aspPro = document.getElementById('aspectoProfesional');
var propAsi = document.getElementById('proponeAsistir')

nextBtn_1.addEventListener('click', openSection_2);
nextBtn_2.addEventListener('click', openSection_3);
previousBtn_1.addEventListener('click', returnToSection_1);
previousBtn_2.addEventListener('click', returnToSection_2);

window.addEventListener('click', clickOutside);

  function clickOutside(e){
    if(e.target == warningModal){
    warningModal.style.display = 'none';
    }
  }

  $(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        warningModal.style.display = 'none';
    }
  });

  document.getElementById('ok_modal').addEventListener('click', function(){
    warningModal.style.display = 'none';
  })


  // Regresar a Section ONE
  function returnToSection_1(){
    section_1.style.display = 'block'
    section_2.style.display = 'none'
  }

  // Regresar a Section TWO
  function returnToSection_2(){
    section_2.style.display = 'block';
    section_1.style.display = 'none'
    section_3.style.display = 'none'
  }

  // Validar Section One START
  function openSection_2(){
    // Entrega valores a variables al momento de dar click en "SIGUIENTE"
    var ext_pais = document.forms["entireForm"]["ext_pais"].value;
    var ext_estado = document.forms["entireForm"]["ext_estado"].value;
    var ext_ciudad = document.forms["entireForm"]["ext_ciudad"].value;
    var estado = document.forms["entireForm"]["nac_estado"].value;
    var ciudad = document.forms["entireForm"]["nac_ciudad"].value;
    var valor_evento = document.forms["entireForm"]["tipo_evento"].value;
    var valor_actividad = document.forms["entireForm"]["tipo_actividad"].value;
    var fecha = document.forms["entireForm"]["fecha"].value;
    var hora = document.forms["entireForm"]["hora"].value;
    var lugar_evento = document.forms["entireForm"]["lugar_evento"].value;

    if (terrFlag == "nac") {
      if(estado == "" || estado == 0 || ciudad == "" || valor_evento == "" || valor_evento == 0 || valor_actividad == "" || valor_actividad == 0 || fecha == "" || hora == "" || lugar_evento == ""){
        if(estado == "" || estado == 0){
          es.style.backgroundColor = '#ffa76d';
        }
        if (ciudad == "") {
          ci.style.backgroundColor = '#ffa76d';
        }
        if (valor_evento == "" || valor_evento == 0) {
          t_e.style.backgroundColor = '#ffa76d';
        }
        if (valor_actividad == "" || valor_actividad == 0) {
          t_a.style.backgroundColor = '#ffa76d';
        }
        if (fecha == "") {
          fe.style.backgroundColor = '#ffa76d';
        }
        if (hora == "" ) {
          ho.style.backgroundColor = '#ffa76d';
        }
        if (lugar_evento == "") {
          l_e.style.backgroundColor = '#ffa76d';
        }
        warningModal.style.display = 'block';

      } else {
        section_2.style.display = 'block';
        section_1.style.display = 'none'
        section_3.style.display = 'none'
      }
    }
    if (terrFlag == "ext") {
      if(ext_pais == "" || ext_pais == 0 || ext_estado == "" || ext_estado == 0 || ext_ciudad == "" || valor_evento == "" || valor_evento == 0 || valor_actividad == "" || valor_actividad == 0 || fecha == "" || hora == "" || lugar_evento == ""){
        if(ext_pais == "" || ext_pais == 0){
          ext_pa.style.backgroundColor = '#ffa76d';
        }
        if(ext_estado == "" || ext_estado == 0){
          ext_es.style.backgroundColor = '#ffa76d';
        }
        if (ext_ciudad == "") {
          ext_ci.style.backgroundColor = '#ffa76d';
        }
        if (valor_evento == "" || valor_evento == 0) {
          t_e.style.backgroundColor = '#ffa76d';
        }
        if (valor_actividad == "" || valor_actividad == 0) {
          t_a.style.backgroundColor = '#ffa76d';
        }
        if (fecha == "") {
          fe.style.backgroundColor = '#ffa76d';
        }
        if (hora == "" ) {
          ho.style.backgroundColor = '#ffa76d';
        }
        if (lugar_evento == "") {
          l_e.style.backgroundColor = '#ffa76d';
        }
        warningModal.style.display = 'block';

      } else {
        section_2.style.display = 'block';
        section_1.style.display = 'none'
        section_3.style.display = 'none'
      }
    }

  }

  // Validar Section Two START
  function openSection_3(){
    var nombreEmpresa = document.forms["entireForm"]["nombreEmpresa"].value;
    var temaVisita = document.forms["entireForm"]["temaVisita"].value;
    var recibeEmpresa = document.forms["entireForm"]["recibeEmpresa"].value;
    var contactoEmpresa = document.forms["entireForm"]["contactoEmpresa"].value;
    if(nombreEmpresa == "" || temaVisita == "" || recibeEmpresa == "" || contactoEmpresa == ""){
      if (nombreEmpresa == "") {
        nomEmp.style.backgroundColor = '#ffa76d';
      }
      if (temaVisita == "") {
        temVis.style.backgroundColor = '#ffa76d';
      }
      if (recibeEmpresa == "") {
        recEmp.style.backgroundColor = '#ffa76d';
      }
      if (contactoEmpresa == "") {
        conEmp.style.backgroundColor = '#ffa76d';
      }
      warningModal.style.display = 'block';
    } else {
      section_2.style.display = 'none'
      section_3.style.display = 'block';
    }
  }

  function validateSection_3(){
    // Validar Section Three START
    var objetivoEvento = document.forms["entireForm"]["objetivoEvento"].value;
    var materiaFortalecida = document.forms["entireForm"]["materiaFortalecida"].value;
    var maestroMateria = document.forms["entireForm"]["maestroMateria"].value;
    var aspectoProfesional = document.forms["entireForm"]["aspectoProfesional"].value;
    var proponeAsistir = document.forms["entireForm"]["proponeAsistir"].value;

    if(objetivoEvento == "" || materiaFortalecida == "" || materiaFortalecida == 0 ||  maestroMateria == "" || aspectoProfesional == "" || aspectoProfesional == 0 || proponeAsistir == "" || proponeAsistir == 0){
      if (objetivoEvento == "") {
        objEve.style.backgroundColor = '#ffa76d';
      }
      if ( materiaFortalecida == "" || materiaFortalecida == 0) {
        matFort.style.backgroundColor = '#ffa76d';
      }
      if (maestroMateria == "") {
        maeMat.style.backgroundColor = '#ffa76d';
      }
      if (aspectoProfesional == "" || aspectoProfesional == 0) {
        aspPro.style.backgroundColor = '#ffa76d';
      }
      if (proponeAsistir == "" || proponeAsistir == 0) {
        propAsi.style.backgroundColor = '#ffa76d';
      }
      warningModal.style.display = 'block';
      return false;
    }
  }

// Limpiar border
  // S1
  ext_pa.onclick = function(){
    ext_pa.style.backgroundColor = 'white';
  };
  ext_es.onclick = function(){
    ext_es.style.backgroundColor = 'white';
  };
  ext_ci.onclick = function(){
    ext_ci.style.backgroundColor = 'white';
  };
  es.onclick = function(){
    es.style.backgroundColor = 'white';
  };
  ci.onclick = function(){
    ci.style.backgroundColor = 'white';
  };
  t_e.onclick = function(){
    t_e.style.backgroundColor = 'white';
  };
  t_a.onclick = function(){
    t_a.style.backgroundColor = 'white';
  };
  fe.onclick = function(){
    fe.style.backgroundColor = 'white';
  };
  ho.onclick = function(){
    ho.style.backgroundColor = 'white';
  };
  l_e.onclick = function(){
    l_e.style.backgroundColor = 'white';
  };

  // S2
  nomEmp.onclick = function(){
    nomEmp.style.backgroundColor = 'white';
  };
  temVis.onclick = function(){
    temVis.style.backgroundColor = 'white';
  };
  recEmp.onclick = function(){
    recEmp.style.backgroundColor = 'white';
  };
  conEmp.onclick = function(){
    conEmp.style.backgroundColor = 'white';
  };

  // S3
  objEve.onclick = function(){
    objEve.style.backgroundColor = 'white';
  };
  matFort.onclick = function(){
    matFort.style.backgroundColor = 'white';
  };
  maeMat.onclick = function(){
    maeMat.style.backgroundColor = 'white';
  };
  aspPro.onclick = function(){
    aspPro.style.backgroundColor = 'white';
  };
  propAsi.onclick = function(){
    propAsi.style.backgroundColor = 'white';
  };



// Funcionalidad Validar Llenado de Forms y Transiciones de Modulos END

/*------------------------------------------------------------------------------------------------------*/
