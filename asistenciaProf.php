<?php
    $page_title = 'Asistencia Profesor';
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
    $correo_instructor=$_SESSION['user'];
?>


<!--<?php include_once('header.php'); ?> <?php include_once('profesor.php'); ?>-->
<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>	Reporte de Alumnos </h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">

		<div class = "tabla-convocatoria">

			<table>
			<thead>
			<tr>
				<th> Id Curso </th>
				<th> Id Alumno </th>
				<th> Nombre Alumno </th>
				<th> Asistencia </th>
				<th> Calificación </th>
			</tr>
			</thead>
			<tbody>
        <?php
                    include('connectmysql.php');
                    $sqldata= mysqli_query($dbcon,"SELECT rl_inscripcion.alumno, alumno.nombre_alumno, rl_inscripcion.rl_curso, rl_curso.instructor, instructor.email_instructor FROM alumno, rl_inscripcion, rl_curso, instructor WHERE rl_inscripcion.alumno=alumno.id_alumno AND rl_inscripcion.rl_curso=rl_curso.id_curso AND rl_curso.instructor=instructor.id_instructor AND instructor.email_instructor = (SELECT usuario.email_usuario FROM usuario, instructor WHERE usuario.email_usuario=instructor.email_instructor AND usuario.email_usuario='$correo_instructor')");

                    while($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
                      echo "<tr><td>";
                      echo $row['rl_curso'];
                      echo "</td><td>";
                      echo $row['alumno'];
                      echo "</td><td>";
                      echo $row['nombre_alumno'];
                      echo "</td>";
                      echo "<td><a href='registroAsistenciaProf.php?id=$row[alumno]&p=$row[nombre_alumno]&c=$row[rl_curso]' class='myButton'>✎ </a></td>";
                      echo "<td><a href='registroCalificacionProf.php?id=$row[alumno]&p=$row[nombre_alumno]&c=$row[rl_curso]' class='myButton'>✔</a></td>";
                      echo "<tr>";
                    }
                  ?>

			</tbody>
			</table>

		</div>


    </div>
</div>
<?php
}
?>
<?php include_once('footer.php'); ?>
