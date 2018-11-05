<!DOCTYPE html>

<?php
Session_start();
if(!isset($_SESSION['matricula'])){
  $_SESSION['error']=2;
	header('Location: home.php');
}
?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Solicitud de Permiso</title>
    <!-- Bootstrap and CSS styles -->
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/css/solicitud.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>

<body onload="limpiarMatriculas(); materia_ComboBox();">
    <!-- HEADER -->
    <div style="height:30px"></div>
    <div id="Header">
        <script type="text/javascript">
            $("#Header").load("shared/_header-sae.php #header-sae");
        </script>
    </div><br>
    <!-- FIN HEADER  -->

    <div id="form_titulo" class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1>Solicitud Previa de Actividad</h1>
        </div>
      </div>
    </div>

    <form name="entireForm" action="../control/registrarSolicitud.php" method="post" onsubmit="return validateSection_3();">
        <div style="height:30px"></div>
        <div id="entirePage">

            <!-- FIRST ROW CONTAINING DROPDOWNS, MATRICULA INPUT AND TABLE -->

            <div id="section_one">
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                              <label> SELECCIONE SI EL EVENTO SERA DENTRO DE TERRITORIO NACIONAL O EXTRANJERO: </label>
                              <div class="btn-group btn-group-toggle" data-toggle="buttons" id="territory_button_group">
                                <label class="btn btn-success btn-sm active" id="territorioNac">
                                  <input type="radio" name="territorio" value="Nacional" checked> NACIONAL
                                </label>
                                <label class="btn btn-success btn-sm" id="territorioExt">
                                  <input type="radio" name="territorio" value="Extranjero"> EXTRANJERO
                                </label>
                              </div>
                            <br> <br>

                            <!-- FORMS - TERRITORIO NACIONAL/EXTRANJERO -->

                            <div id="formNac" class="form-group">
                                <label> SELECCIONE EL ESTADO: </label>
                                <select class="custom-select" name="estado" id="nac_estado">
                              <option selected disabled hidden value="0"> SELECCIONE </option>
                              <option value="DIF">Distrito Federal</option>
                              <option value="AGS">Aguascalientes</option>
                              <option value="BCN">Baja California</option>
                              <option value="BCS">Baja California Sur</option>
                              <option value="CAM">Campeche</option>
                              <option value="CHP">Chiapas</option>
                              <option value="CHI">Chihuahua</option>
                              <option value="COA">Coahuila</option>
                              <option value="COL">Colima</option>
                              <option value="DUR">Durango</option>
                              <option value="GTO">Guanajuato</option>
                              <option value="GRO">Guerrero</option>
                              <option value="HGO">Hidalgo</option>
                              <option value="JAL">Jalisco</option>
                              <option value="MEX">M&eacute;xico</option>
                              <option value="MIC">Michoac&aacute;n</option>
                              <option value="MOR">Morelos</option>
                              <option value="NAY">Nayarit</option>
                              <option value="NLE">Nuevo Le&oacute;n</option>
                              <option value="OAX">Oaxaca</option>
                              <option value="PUE">Puebla</option>
                              <option value="QRO">Quer&eacute;taro</option>
                              <option value="ROO">Quintana Roo</option>
                              <option value="SLP">San Luis Potos&iacute;</option>
                              <option value="SIN">Sinaloa</option>
                              <option value="SON">Sonora</option>
                              <option value="TAB">Tabasco</option>
                              <option value="TAM">Tamaulipas</option>
                              <option value="TLX">Tlaxcala</option>
                              <option value="VER">Veracruz</option>
                              <option value="YUC">Yucat&aacute;n</option>
                              <option value="ZAC">Zacatecas</option>
                            </select>
                                <br>
                                <label>INGRESE LA CIUDAD: </label>
                                <input type="text" class="form-control" placeholder="ej. Tijuana" name="ciudad" id="nac_ciudad">
                            </div>
                            <div id="formExt" class="form-group">
                                <label>SELECCIONE EL PAIS: </label>
                                <select class="custom-select" name="pais" id="ext_pais">
                              <option selected disabled hidden value="0"> SELECCIONE </option>
                              <option value="USA">Estados Unidos</option>
                              <option value="CAN">Canadá</option>
                              <option value="AUS">Australia</option>
                              <option value="IDN">Indonesia</option>
                              <option value="MYS">Malasia</option>
                              <option value="NZL">Nueva Zelanda</option>
                              <option value="PHL">Filipinas</option>
                              <option value="SGP">Singapur</option>
                              <option value="THA">Tailandia</option>
                              <option value="AFG">Afganistán</option>
                              <option value="ALB">Albania</option>
                              <option value="DEU">Alemania</option>
                              <option value="AND">Andorra</option>
                              <option value="AGO">Angola</option>
                              <option value="AIA">Anguila</option>
                              <option value="ATG">Antigua y Barbuda</option>
                              <option value="ANT">Antillas Neerlandesas</option>
                              <option value="ATA">Antártida</option>
                              <option value="SAU">Arabia Saudita</option>
                              <option value="DZA">Argelia</option>
                              <option value="ARG">Argentina</option>
                              <option value="ARM">Armenia</option>
                              <option value="ABW">Aruba</option>
                              <option value="AUT">Austria</option>
                              <option value="AZE">Azerbaiyán</option>
                              <option value="BHS">Bahamas</option>
                              <option value="BHR">Bahréin</option>
                              <option value="BGD">Bangladesh</option>
                              <option value="BRB">Barbados</option>
                              <option value="BLZ">Belice</option>
                              <option value="BEN">Benín</option>
                              <option value="BMU">Bermudas</option>
                              <option value="BLR">Bielorrusia</option>
                              <option value="MMR">Birmania</option>
                              <option value="BOL">Bolivia</option>
                              <option value="BIH">Bosnia y Herzegovina</option>
                              <option value="BWA">Botsuana</option>
                              <option value="BRA">Brasil</option>
                              <option value="BRN">Brunei Darussalam</option>
                              <option value="BGR">Bulgaria</option>
                              <option value="BFA">Burkina Faso</option>
                              <option value="BDI">Burundi</option>
                              <option value="BTN">Bután</option>
                              <option value="BEL">Bélgica</option>
                              <option value="CPV">Cabo Verde</option>
                              <option value="KHM">Camboya</option>
                              <option value="CMR">Camerún</option>
                              <option value="TCD">Chad</option>
                              <option value="CHL">Chile</option>
                              <option value="CHN">China</option>
                              <option value="CYP">Chipre</option>
                              <option value="COL">Colombia</option>
                              <option value="COM">Comores</option>
                              <option value="COG">Congo</option>
                              <option value="KOR">Corea del Sur</option>
                              <option value="CRI">Costa Rica</option>
                              <option value="CIV">Costa de Marfil</option>
                              <option value="HRV">Croacia (nombre local: Hrvatska)</option>
                              <option value="CUB">Cuba</option>
                              <option value="DNK">Dinamarca</option>
                              <option value="DMA">Dominica</option>
                              <option value="ECU">Ecuador</option>
                              <option value="EGY">Egipto</option>
                              <option value="SLV">El Salvador</option>
                              <option value="ARE">Emiratos Árabes Unidos</option>
                              <option value="ERI">Eritrea</option>
                              <option value="SVK">Eslovaquia</option>
                              <option value="SVN">Eslovenia</option>
                              <option value="ESP">España</option>
                              <option value="VAT">Estado de la Ciudad del Vaticano</option>
                              <option value="EST">Estonia</option>
                              <option value="ETH">Etiopía</option>
                              <option value="RUS">Federación Rusa</option>
                              <option value="FIN">Finlandia</option>
                              <option value="FJI">Fiyi</option>
                              <option value="FRA">Francia</option>
                              <option value="FXX">Francia metropolitana</option>
                              <option value="GAB">Gabón</option>
                              <option value="GMB">Gambia</option>
                              <option value="GEO">Georgia</option>
                              <option value="GHA">Ghana</option>
                              <option value="GIB">Gibraltar</option>
                              <option value="GRD">Granada</option>
                              <option value="GRC">Grecia</option>
                              <option value="GRL">Groenlandia</option>
                              <option value="GLP">Guadalupe</option>
                              <option value="GUM">Guam</option>
                              <option value="GTM">Guatemala</option>
                              <option value="GUY">Guayana</option>
                              <option value="GUF">Guayana Francesa</option>
                              <option value="GGY">Guernsey</option>
                              <option value="GIN">Guinea</option>
                              <option value="GNQ">Guinea Ecuatorial</option>
                              <option value="GNB">Guinea-Bissau</option>
                              <option value="HTI">Haití</option>
                              <option value="HND">Honduras</option>
                              <option value="HKG">Hong Kong</option>
                              <option value="HUN">Hungría</option>
                              <option value="IND">India</option>
                              <option value="IRQ">Iraq</option>
                              <option value="IRL">Irlanda</option>
                              <option value="IRN">Irán, República Islámica de</option>
                              <option value="BVT">Isla Bouvet</option>
                              <option value="NFK">Isla Norfolk</option>
                              <option value="IMN">Isla de Man</option>
                              <option value="CXR">Isla de Navidad</option>
                              <option value="MAF">Isla de San Martín</option>
                              <option value="ISL">Islandia</option>
                              <option value="CCK">Islas Cocos</option>
                              <option value="CYM">Islas Caimán</option>
                              <option value="COK">Islas Cook</option>
                              <option value="FRO">Islas Feroe</option>
                              <option value="SGS">Islas Georgias del Sur y Sandwich del Sur</option>
                              <option value="HMD">Islas Heard y McDonald</option>
                              <option value="FLK">Islas Malvinas</option>
                              <option value="MNP">Islas Marianas del Norte</option>
                              <option value="MHL">Islas Marshall</option>
                              <option value="SLB">Islas Salomón</option>
                              <option value="TCA">Islas Turcas y Caicos</option>
                              <option value="UMI">Islas Ultramarinas de los EE.UU.</option>
                              <option value="VGB">Islas Vírgenes Británicas</option>
                              <option value="VIR">Islas Vírgenes de los Estados Unidos</option>
                              <option value="ALA">Islas Åland</option>
                              <option value="ISR">Israel</option>
                              <option value="ITA">Italia</option>
                              <option value="JAM">Jamaica</option>
                              <option value="JPN">Japón</option>
                              <option value="JEY">Jersey</option>
                              <option value="JOR">Jordania</option>
                              <option value="KAZ">Kazajistán</option>
                              <option value="KEN">Kenia</option>
                              <option value="KGZ">Kirguistán</option>
                              <option value="KIR">Kiribati</option>
                              <option value="KWT">Kuwait</option>
                              <option value="LAO">Laos (República Democrática Popular Lao)</option>
                              <option value="LSO">Lesoto</option>
                              <option value="LVA">Letonia</option>
                              <option value="LBR">Liberia</option>
                              <option value="LBY">Libia</option>
                              <option value="LIE">Liechtenstein</option>
                              <option value="LTU">Lituania</option>
                              <option value="LUX">Luxemburgo</option>
                              <option value="LBN">Líbano</option>
                              <option value="MAC">Macao</option>
                              <option value="MKD">Macedonia, Antigua República Yugoslava de</option>
                              <option value="MDG">Madagascar</option>
                              <option value="MWI">Malawi</option>
                              <option value="MDV">Maldivas</option>
                              <option value="MLI">Mali</option>
                              <option value="MLT">Malta</option>
                              <option value="MAR">Marruecos</option>
                              <option value="MUS">Mauricio</option>
                              <option value="MRT">Mauritania</option>
                              <option value="MYT">Mayotte</option>
                              <option value="FSM">Micronesia, Estados Federales de</option>
                              <option value="MDA">Moldavia, República de</option>
                              <option value="MNG">Mongolia</option>
                              <option value="MNE">Montenegro</option>
                              <option value="MSR">Montserrat</option>
                              <option value="MOZ">Mozambique</option>
                              <option value="MCO">Mónaco</option>
                              <option value="NAM">Namibia</option>
                              <option value="NRU">Nauru</option>
                              <option value="NPL">Nepal</option>
                              <option value="NIC">Nicaragua</option>
                              <option value="NGA">Nigeria</option>
                              <option value="NIU">Niue</option>
                              <option value="NOR">Noruega</option>
                              <option value="NCL">Nueva Caledonia</option>
                              <option value="NER">Níger</option>
                              <option value="OMN">Omán</option>
                              <option value="PAK">Pakistán</option>
                              <option value="PLW">Palaos</option>
                              <option value="PSE">Palestino Ocupado, Territorio</option>
                              <option value="PAN">Panamá</option>
                              <option value="PNG">Papúa Nueva Guinea</option>
                              <option value="PRY">Paraguay</option>
                              <option value="NLD">Países Bajos</option>
                              <option value="PER">Perú</option>
                              <option value="PCN">Pitcairn</option>
                              <option value="POL">Polonia</option>
                              <option value="PRT">Portugal</option>
                              <option value="PRI">Puerto Rico</option>
                              <option value="QAT">Qatar</option>
                              <option value="GBR">Reino Unido</option>
                              <option value="CAF">República Centroafricana</option>
                              <option value="CZE">República Checa</option>
                              <option value="COD">República Democrática del Congo</option>
                              <option value="DOM">República Dominicana</option>
                              <option value="REU">Reunión</option>
                              <option value="RWA">Ruanda</option>
                              <option value="ROU">Rumania</option>
                              <option value="ESH">Sahara Occidental</option>
                              <option value="WSM">Samoa</option>
                              <option value="ASM">Samoa Americana</option>
                              <option value="BLM">San Bartolomé</option>
                              <option value="KNA">San Cristóbal y Nieves</option>
                              <option value="SMR">San Marino</option>
                              <option value="SPM">San Pedro y Miguelón</option>
                              <option value="VCT">San Vicente y las Granadinas</option>
                              <option value="SHN">Santa Helena</option>
                              <option value="LCA">Santa Lucía</option>
                              <option value="STP">Santo Tomé y Príncipe</option>
                              <option value="SEN">Senegal</option>
                              <option value="SRB">Serbia</option>
                              <option value="SYC">Seychelles</option>
                              <option value="SLE">Sierra Leona</option>
                              <option value="SOM">Somalia</option>
                              <option value="LKA">Sri Lanka</option>
                              <option value="SWZ">Suazilandia</option>
                              <option value="ZAF">Sudáfrica</option>
                              <option value="SDN">Sudán</option>
                              <option value="SWE">Suecia</option>
                              <option value="CHE">Suiza</option>
                              <option value="SUR">Surinam</option>
                              <option value="SJM">Svalbard y Jan Mayen</option>
                              <option value="TWN">Taiwán</option>
                              <option value="TZA">Tanzania, República Unida de</option>
                              <option value="TJK">Tayikistán</option>
                              <option value="IOT">Territorio Británico del Océano Índico</option>
                              <option value="ATF">Territorios Australes Franceses</option>
                              <option value="TLS">Timor Oriental</option>
                              <option value="TGO">Togo</option>
                              <option value="TKL">Tokelau</option>
                              <option value="TON">Tonga</option>
                              <option value="TTO">Trinidad y Tobago</option>
                              <option value="TKM">Turkmenistán</option>
                              <option value="TUR">Turquía</option>
                              <option value="TUV">Tuvalu</option>
                              <option value="TUN">Túnez</option>
                              <option value="UKR">Ucrania</option>
                              <option value="UGA">Uganda</option>
                              <option value="URY">Uruguay</option>
                              <option value="UZB">Uzbekistán</option>
                              <option value="VUT">Vanuatu</option>
                              <option value="VEN">Venezuela</option>
                              <option value="VNM">Vietnam</option>
                              <option value="WLF">Wallis y Futuna</option>
                              <option value="YEM">Yemen</option>
                              <option value="DJI">Yibuti</option>
                              <option value="ZMB">Zambia</option>
                              <option value="ZWE">Zimbabue</option>
                            </select>
                                <br>
                                <label>INGRESE EL ESTADO: </label>
                                <input type="text" class="form-control" placeholder="ej. California" name="estado_extranjera" id="ext_estado">
                                <br>
                                <label>INGRESE LA CIUDAD: </label>
                                <input type="text" class="form-control" placeholder="ej. Anaheim" name="ciudad_extranjera" id="ext_ciudad">
                            </div>
                            <div style="height:5px;"></div>
                            <hr style="height: 10px;">
                            <div class="form-group">
                                <label> SELECCIONE EL TIPO DE EVENTO DE INTERES: </label>
                                <select id="eventoSelector" class="custom-select" name="tipo_evento" >
                                <option selected disabled hidden value="0"> SELECCIONE </option>
                                <option value="1"> Vinculacion </option>
                                <option value="2"> Cientifica </option>
                                <option value="3"> Deportiva </option>
                                <option value="4"> Responsabilidad Social </option>
                                <option value="5"> Cultural </option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>SELECCIONE TIPO DE ACTIVIDAD A REALIZAR: </label>
                                <select id="actividadSelector" class="custom-select" disabled="disabled" name="tipo_actividad" >
                                <option selected disabled hidden value="0"> SELECCIONE </option>
                                <option hidden value="1"> Visitas Empresariales </option>
                                <option hidden value="2"> Viajes de Estudio </option>
                                <option hidden value="3"> Practicas Academicas </option>
                                <option hidden value="4"> Congresos </option>
                                <option hidden value="5"> Conferencias </option>
                                <option hidden value="6"> Talleres </option>
                                <option hidden value="7"> Platicas </option>
                                <option hidden value="8"> Maratones </option>
                                <option hidden value="9"> Diplomados </option>
                                <option hidden value="10"> Caminata </option>
                                <option hidden value="11"> Otro </option>
                            </select>
                            </div>
                            <div style="height:5px;"></div>
                            <hr style="height: 10px;">
                            <div class="form-group">
                                <label>FECHA INICIAL DEL EVENTO: </label> <br>
                                <input type="date" class="form-control" name="fecha" id="fecha">
                            </div>
                            <div class="form-group">
                                <label>HORA INICIAL DEL EVENTO: </label> <br>
                                <input type="time" class="form-control" name="hora" id="hora">
                            </div>
                        </div>
                        <!-- End of left column -->
                        <div class="col"> </div>

                        <div class="col-md-7 col-sm-7">
                            <div class="form-group">
                                <label>INGRESAR MATRICULA DE LOS INTEGRANTES QUE ASISTIRAN:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="ej. 1218229" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ingresar_matricula">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" id="boton_ingresar_matricula" type="button">Agregar</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="scrollable">
                                <table class="table table-bordered" id="datos_tabla">
                                    <thead>
                                        <tr>
                                            <td>Accion</td>
                                            <td>Matricula</td>
                                            <td>Nombre</td>
                                            <td>Carrera</td>
                                            <td>Grupo</td>
                                        </tr>
                                    </thead>
                                    <tbody id="datos_tbody">
                                        <!-- Cargar Matriculas - AJAX -->

                                        <!-- Cargar Matriculas - AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End of right column -->
                    </div>
                    <!-- End of row -->
                </div>
                <!-- End first row container -->

                <br>

                <!-- LUGAR DEL EVENTO -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="form-group">
                                <label>LUGAR DEL EVENTOO</label>
                                <input type="text" class="form-control" placeholder="ej. CECUT" name="lugar_evento" id="lugar_evento" >
                            </div>
                            <br>
                            <div class="text-center"><button type="button" id="nextBtn_one" class="btn btn-success btn-lg">SIGUIENTE</button></div>
                        </div>
                    </div>
                </div>
                <!-- End second row container -->
            </div>
            <!-- end section one -->

            <!-- FIN LIGAR DEL EVENTO -->


            <!-- DATOS DE LA ACTIVIDAD -->

            <div id="section_two">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-sm-8">
                            <div class="text-center"><button type="button" id="previousBtn_one" class="btn btn-success btn-lg">ANTERIOR</button></div> <br>
                            <div class="form-group">
                                <label for="nombreEmpresa">Nombre de la empresa:</label>
                                <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa">
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label for="temaVisita">Tema de la visita (Nombre de la Actividad):</label>
                                <input type="text" class="form-control" id="temaVisita" name="temaVisita">
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label for="recibeEmpresa">Nombre de quien los recibe en la empresa:</label>
                                <input type="text" class="form-control" id="recibeEmpresa" name="recibeEmpresa">
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label for="contactoEmpresa">Correo de la empresa:</label>
                                <input type="text" class="form-control" id="contactoEmpresa" name="contactoEmpresa">
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" id="nextBtn_two" class="btn btn-success btn-lg">SIGUIENTE</button>
                            </div>
                        </div>
                    </div>
                    <!-- End of Justified-Center Row -->
                </div>
                <!-- End third row container -->
            </div>
            <!-- End section two -->

            <!-- FIN DATOS DE LA ACTIVIDAD -->

            <!-- JUSTIFICACION DEL EVENTO -->

            <div id="section_three">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-sm-8">
                            <div class="text-center"><button type="button" id="previousBtn_two" class="btn btn-success btn-lg">ANTERIOR</button></div> <br>
                            <div class="form-group">
                                <label for="objetivoEvento">Ingrese brevemente el objetivo de la asistencia a este evento:</label>
                                <input type="text" class="form-control" id="objetivoEvento" name="objetivoEvento">
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label for="materiaFortalecida">Seleccione la materia que se vera fortalecida por la realizacion de esta actividad:</label>
                                <select class="custom-select" id="materiaCB" name="materiaFortalecida">
                                    <option selected disabled hidden value="0"> SELECCIONE </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label for="maestroMateria">Nombre del maestro responsable de la materia:</label>
                                <input type="text" class="form-control" id="maestroMateria" name="maestroMateria">
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label for="aspectoProfesional">Aspecto profesional que se fortalecera por la realizacion de esta actividad: </label>
                                <select class="custom-select" id="aspectoProfesional" name="aspectoProfesional">
                                  <option selected disabled hidden value="0"> SELECCIONE </option>
                                  <option value="Tecnico">Tecnico</option>
                                  <option value="Deportivo">Deportivo</option>
                                  <option value="Social">Social</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8">
                          <label for="proponeAsistir">Quien propone asistir al evento: </label>
                          <select class="custom-select" id="proponeAsistir" name="proponeAsistir">
                            <option selected disabled hidden value="0"> SELECCIONE </option>
                            <option value="Coordinacion">Coordinacion</option>
                            <option value="Docente">Docente</option>
                            <option value="Subdireccion">Subdireccion</option>
                            <option value="Otros">Otros</option>
                          </select>
                        </div>
                    </div>

                    <!-- End of Justified-Center Row </from> -->
                    <hr>
                    <div class="text-center">
                        <button id="solicitarPermiso" class="btn btn-success btn-lg" type="submit">SOLICITAR PERMISO</button>
                    </div>

                </div>
            </div>
            <!-- end section three -->
            <!-- FIN JUSTIFICACION DEL EVENTO -->
        </div>
    </form>
    <div style="height:40px"></div>

    <div id="warningModal" class="modal">
        <div class="modal-content">
            <h2>Favor de llenar todos los campos.</h2>
            <input id="ok_modal"  class="btn btn-success btn-lg" type="button" name="ok_modal" value="Ok">
        </div>
    </div>
    <div id="warningModalMatricula" class="modal">
        <div class="modal-content">
          <h2 id="error1">No se ingreso ninguna matricula</h2>
          <h2 id="error2">La matricula que ingreso no existe</h2>
          <h2 id="error3">No puede ingresar su matricula en esta tabla</h2>
          <h2 id="error4">La matricula ya fue ingresada</h2>
          <h2 id="error5">El alumno asociado con esta matricula no esta dado de alta</h2>
          <input id="ok_modalMatricula"  class="btn btn-success btn-lg" type="button" name="ok_modal" value="Ok">
        </div>
    </div>




</body>
<!-- SCRIPTS -->
<script src="../assets/popper/popper.min.js"></script>
<script src="../assets/bootstrap/bootstrap.min.js"></script>
<script src="../js/solicitud.js"></script>
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>

</html>
