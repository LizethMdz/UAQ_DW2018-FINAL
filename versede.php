<?php
    $page_title = 'Sedes';
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

<!--<?php include_once('header.php'); ?><?php include_once('coordinador.php'); ?>-->

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Ver Sedes</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
        	<div class="contenido-all">

                            <div class="espacio_contenido">
                                <h3 class="titulos">SEDES CREADAS</h3>
                                <div class="tabla-contenedor">
                                  <table class="tabla-general">
                                        <thead>

                                        <tr>
                                          <th style="background:#30ACAC; color:white;">Sede</th>
                                          <th style="background:#30ACAC; color:white;">Municipio</th>
                                          <th style="background:#30ACAC; color:white;">Institucion</th>
                                          <th style="background:#30ACAC; color:white;">Capacidad</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                                    include('connectmysql.php');
                                                    $sqldata= mysqli_query($dbcon,"SELECT * from sede,municipio,institucion where sede.municipio=municipio.id_municipio AND sede.institucion=institucion.id_institucion");

                                                    while($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
                                                      echo "<tr><td style='padding: 15px;'>";
                                                      echo $row['nombre_sede'];
                                                      echo "</td><td>";
                                                      echo $row['nombre_municipio'];
                                                      echo "</td><td>";
                                                      echo $row['nombre_institucion'];
                                                      echo "</td><td>";
                                                      echo $row['capacidad'];
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

<?php
}
?>

<?php include_once('footer.php'); ?>
