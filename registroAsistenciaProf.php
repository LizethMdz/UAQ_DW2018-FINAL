<?php
    $page_title = 'Registro de Asistencia Profesor';
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

       <?php 
require('connectmysql.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
      //include('connectmysql.php');
    $errores=array();
    if (empty($_POST['fec'])){
      $errores="Te faltan datos por llenar";
    }
    else{
     $fec = trim($_POST['fec']);

     $id = trim($_POST['id']); 

     $asistencia = trim($_POST['asistencia']); 

     $c = trim($_POST['curso']); 
     $c = mysqli_real_escape_string($dbcon, $c);
    }

    if (empty($errores)) {
      //Preparar la consulta para registrar los datos en la tabla 'CONVOCATORIA'.
    $query="INSERT INTO ASISTENCIA (id_asistencia,fecha, alumno, tipo_asistencia, curso) VALUES (null,'$fec','$id','$asistencia','$c')";
    //ejecutar la consulta
    $resultado=@mysqli_query($dbcon,$query);
    //Si la consulta tuvo éxito, entonces imprimir un mensaje
    if($resultado){
        echo '<script>alert("Gracias por el registro")</script>';
    }
    else{
        echo '<script>alert("El servidor esta en mantenimiento, intenta mas tarde")</script>';
    }
    }
    else{
        echo '<script>alert("El servidor esta en mantenimiento, intenta mas tarde")</script>';
    }
  
}
?>

<!--<?php include_once('header.php'); ?> <?php include_once('profesor.php'); ?>-->

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