
<?php include_once('header.php'); ?>

<?php include_once('profesor.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>	Reporte de Alumnos </h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">
		<div class ="contenedor">

		<div class="Titulo">
			<h3> Registrar asistencia </h3>
		</div>

		<div class = "Datos-alumno">

			<label> Fecha </label>
			<input type = "date"> <br> <br>

			<label> Nombre alumno </label>
			<input type = "text"> <br> <br>

			<label>Asistencia </label>
    		<select name="asistencia" style="width:30%">
        	<option value='asistencia'>Asistencia</option>
        	<option value='falta'>Falta</option>
        	<option value='justificacion'>Justificación</option>
        	<option value='retardo'>Retardo</option>
        	</select> <br> <br>

        	<input type = "button" name= "BotonG" value = "Aceptar">


        </div>
		</div>
    </div>
</div>

<?php include_once('footer.php'); ?>