// Ajax Tabla de Matriculas START
$('#Agregar').click(function(){
  var datosEnviados = {
    'matricula' : $('#matriculas').val()
  };
  $.ajax({
    type : 'POST',
    url : '../control/agregarMatricula.php',
    data : datosEnviados,
    dataType : 'json',
    encode : true
  })
  .done(function(datos){
    $('#datos_tabla tbody').append(
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



/*------------------------------------------------------------------------------------------------------*/

// Funcionalidad a Transiciones de Territorio Nacional-Extranjero START
    var toggleNacional = document.getElementById('territorioNac');
    var toggleExtranjero = document.getElementById('territorioExt');
    var formNacional = document.getElementById('formNac');
    var formExtranjero = document.getElementById('formExt');
    var terrFlag = 'nac'; // Used in Form Validation's if condition

    toggleNacional.addEventListener('click', function(){
      formNacional.style.display = 'block';
      formExtranjero.style.display = 'none';
      terrFlag = 'nac';
    });
    toggleExtranjero.addEventListener('click', function(){
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
      tipo_actividad.selected == tipo_actividad.options[12];
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
      tipo_actividad.options[11].hidden = true;
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


// Funcionalidad Validar Llenado de Forms y Transiciones de Modulos START
var warningModal = document.getElementById('warningModal');

var section_1 = document.getElementById('section_one');
var section_2 = document.getElementById('section_two');
var section_3 = document.getElementById('section_three');

var nextBtn_1 = document.getElementById('nextBtn_one')
var nextBtn_2 = document.getElementById('nextBtn_two')
var previousBtn_1 = document.getElementById('previousBtn_one')
var previousBtn_2 = document.getElementById('previousBtn_two')
var solicitarPermiso = document.getElementById('solicitarPermiso');


// Utilizadas para el cambio de colores dependiendo de campo vacio o seleccionado
var es = document.getElementById('estado');
var ci = document.getElementById('ciudad');
var t_e = document.getElementById('eventoSelector');
var t_a = document.getElementById('actividadSelector');
var fe = document.getElementById('fecha');
var ho = document.getElementById('hora');
var l_e = document.getElementById('lugar_evento');


nextBtn_1.addEventListener('click', openSection_2);
nextBtn_2.addEventListener('click', openSection_3);
previousBtn_1.addEventListener('click', returnToSection_1);
previousBtn_2.addEventListener('click', returnToSection_2);
solicitarPermiso.addEventListener('click', validateSection_3)
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
    var estado = document.forms["entireForm"]["estado"].value;
    var ciudad = document.forms["entireForm"]["ciudad"].value;
    var valor_evento = document.forms["entireForm"]["tipo_evento"].value;
    var valor_actividad = document.forms["entireForm"]["tipo_actividad"].value;
    var fecha = document.forms["entireForm"]["fecha"].value;
    var hora = document.forms["entireForm"]["hora"].value;
    var lugar_evento = document.forms["entireForm"]["lugar_evento"].value;
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

  // Validar Section Two START
  function openSection_3(){
    var nombreEmpresa = document.forms["entireForm"]["nombreEmpresa"].value;
    var temaVisita = document.forms["entireForm"]["temaVisita"].value;
    var recibeEmpresa = document.forms["entireForm"]["recibeEmpresa"].value;
    var contactoEmpresa = document.forms["entireForm"]["contactoEmpresa"].value;
    if(nombreEmpresa == "" || temaVisita == "" || recibeEmpresa == "" || contactoEmpresa == ""){
      warningModal.style.display = 'block';
    } else {
      section_2.style.display = 'none'
      section_3.style.display = 'block';
    }
  }

  function validateSection_3(){
    // Validar Section Three START
    var objetivoEvento = document.forms["entireForm"]["objetivoEvento"].value;
    var maestroMateria = document.forms["entireForm"]["maestroMateria"].value;
    // pending more inputs

    if(objetivoEvento == "" || maestroMateria == ""){
      alert("Favor de llenar todos los campos!");
    }
  }

// Limpiar border
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





  // nextBtn_1.addEventListener('click', test);
  // function test(){
  //   if (estado == "" || estado == 0){
  //     console.log('fill it out');
  //   }
  // }

// Funcionalidad Validar Llenado de Forms y Transiciones de Modulos END

/*------------------------------------------------------------------------------------------------------*/
