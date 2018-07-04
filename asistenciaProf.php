
<?php include_once('header.php'); ?>

<?php include_once('profesor.php'); ?>

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
			<tr>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> <a href="registroAsistenciaProf.php" class="myButton"> ✎ </a> </td>
				<td> <a href="registroCalificacionProf.php" class="myButton"> ✔ </a> </td>
			</tr>
			</tbody>
			</table>

		</div>


    </div>
</div>

<?php include_once('footer.php'); ?>
