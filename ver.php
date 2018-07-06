<?php
    $page_title = 'Convocatorias';
    include ('header.php');
 session_start();
  if (@$_SESSION['id'] == 'Coordinador'){
    include("coordinador.php");
  }
  elseif (@$_SESSION['id']=='Instructor'){
    include("profesor.php");
  }
  elseif (@$_SESSION['id']=='Alumno'){
    include("alumno.php");
  }
  elseif (@!$_SESSION['id']) {
    include("menu_principal.php");
  }

  /*if(!isset($_SESSION["user"])) {
  header("location:login.php");
} else {*/

?>

<!--SCRIPT-->
<script>
						function buscarJson(){
							//Capturar lo que el usuario Escribio en la busqueda
							Iconvo = document.getElementById('buscar');
							busAjax = new XMLHttpRequest();
							busAjax.open('GET', 'buscarAjaxJson.php?bus='+Iconvo.value);
							busAjax.send();
							busAjax.onreadystatechange = function(){
								if (busAjax.readyState == 4 && busAjax.status == 200) {
									console.log(Iconvo.value);
									document.querySelector("#resCon").innerHTML = busAjax.responseText;
									//Imprimir resultados
									 miJSON = JSON.parse(busAjax.responseText);
                   if(miJSON.length > 0){
                     document.querySelector('#resCon').innerHTML =
                      "<td>"+ miJSON[0].id_convocatoria +"</td>"+
                      "<td>"+ miJSON[0].nombre_convocatoria +"</td>"+
                      "<td>"+ miJSON[0].f_inicio +"</td>"+
                      "<td>"+ miJSON[0].f_fin +"</td>"+
                      "<td>"+ miJSON[0].costo_convocatoria +"</td>"+
                      "<td>"+ miJSON[0].contenido_convocatoria +"</td>"+
                      "<td style='background:green; color:white;'>"+ miJSON[0].estado_convocatoria +"</td>";
                   }else{
                     document.querySelector('#resCon').innerHTML =
                     "<td colspan='7' style='font-syle:italic; color:gray;'>"+ "!!!!!!!!!!!!!!!!!!SIN RESULTADOS !!!!!!!!!!!!!!!!!!" +"</td>";
                   }

								}
							}
						}


				</script>



<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Ver Convocatorias</h2>
          </div>
        	<div class="contenido-all">

                            <div class="espacio_contenido">
                                <h3 class="titulos">BUSCAR CONVOCATORIAS</h3>
                                  <br><p><i>Busca por nombre</i></p><br>
                                <label for="buscar" class="parr-title">Buscar</label>
                                <input type="text" clase="inputs-profe" name="buscar" id="buscar" placeholder="Introduce el Curso a Buscar"
                                style="width:300px; padding:5px;" onkeyup="buscarJson();">
                                <br><br>
                                <div class="tabla-contenedor-2">
                                  <table class="tabla-general" id="tabla-ajax">
                                    <thead>

                                        <tr>
                                          <th style="background:#006BAA; color:white;">ID </th>
                                          <th style="background:#006BAA; color:white;">Nombre</th>
                                          <th style="background:#006BAA; color:white;">Fecha de Inicio</th>
                                          <th style="background:#006BAA; color:white;">Fecha de Fin</th>
                                          <th style="background:#006BAA; color:white;">Costo</th>
                                          <th style="background:#006BAA; color:white;">Contenido</th>
                                          <th style="background:#006BAA; color:white;">Estado</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr id="resCon">

                                        </tr>

                                      </tbody>
                                      </table>
                              </div>
                              <!--<div class='resCon' id="resCon"></div>-->
                                <br><br>
                                <!--<h3 class="titulos">CONVOCATORIAS CREADAS</h3>
                                <div class="tabla-contenedor-2">
                                  <table class="tabla-general">
                                    <thead>

                                        <tr>
                                          <th style="background:#006BAA; color:white;">Nombre</th>
                                          <th style="background:#006BAA; color:white;">Fecha de Inicio</th>
                                          <th style="background:#006BAA; color:white;">Fecha de Fin</th>
                                          <th style="background:#006BAA; color:white;">Costo</th>
                                          <th style="background:#006BAA; color:white;">Contenido</th>
                                          <th style="background:#006BAA; color:white;">Estado</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                            include('connectmysql.php');
                                             $sqldata= mysqli_query($dbcon,"SELECT * from convocatoria,convocatoria_publicada where convocatoria.id_convocatoria=convocatoria_publicada.convocatoria and convocatoria_publicada.estado_convocatoria='Abierta'");

                                             while($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
                                               echo "<tr><td>";
                                               echo $row['nombre_convocatoria'];
                                               echo "</td><td>";
                                               echo $row['f_inicio'];
                                               echo "</td><td>";
                                               echo $row['f_fin'];
                                               echo "</td><td>";
                                               echo $row['costo_convocatoria'];
                                               echo "</td><td>";
                                               echo $row['contenido_convocatoria'];
                                               echo "</td><td>";
                                               echo $row['estado_convocatoria'];
                                               echo "</td>";
                                               /*echo "<td><a href='upcat.php?id=$row[nombre]&p=$row[provincia]'><img src='comun/img/act2.png' class='img-rounded'></td>";
                                               echo "<td><a href='ciudad.php?id=$row[nombre]&p=$row[provincia]&idborrar=2'><img src='comun/img/eli2.png' class='img-rounded'/></a></td>";
                                               echo "<tr>";*/
                                             }
                                            ?>
                                      </tbody>
                                   </table>

                                </div>-->

                            </div>

        </div>

</div>


<?php
/*}*/
?>

<?php include_once('footer.php'); ?>
