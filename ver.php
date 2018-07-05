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

  if(!isset($_SESSION["user"])) {
  header("location:login.php");
  } else {

?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Ver Convocatorias</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
        	<div class="contenido-all">

                            <div class="espacio_contenido">
                                <h3 class="titulos">CONVOCATORIAS CREADAS</h3>
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
                                               echo "</td><td>$";
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

                                </div>

                            </div>

        </div>

</div>

<div class="tabla">
	<h1 class="pal">Convocatorias Creadas</h1>
	<button type="button" class="btn1">Regresar</button><br>

	<input type="search" name="buscar" placeholder="Buscar por el nombre del producto"  id="busca">

<table class="tl">
<tr class="t">
	<td>Nombre</td>
	<td>Fecha de Inicio</td>
	<td>Fecha de Fin</td>
	<td>Costo</td>
	<td>Contenido</td>
	<td>Estado</td>
</tr>

<tr>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
</tr>
</table>
</div>

<?php
}
?>

<?php include_once('footer.php'); ?>
