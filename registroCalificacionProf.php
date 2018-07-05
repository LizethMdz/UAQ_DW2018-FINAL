<?php
    $page_title = 'Registro de Calificacion';
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

  $errores=array();
  if (empty($_POST['calif'])){
    $errores="Te faltan datos por llenar";
  }
  else{
   $cal = trim($_POST['calif']); 
   $id = trim($_POST['id']); 
   $c = trim($_POST['curso']); 
   $c = mysqli_real_escape_string($dbcon, $c);
  }

  if (empty($errores)) {
  $query="INSERT INTO RL_INSCRIPCION (alumno,rl_curso, calificacion_alumno) 
    VALUES ('$id','$c','$cal') 
    ON DUPLICATE KEY UPDATE alumno='$id' , rl_curso='$c' , calificacion_alumno='$cal';";
  $resultado=@mysqli_query($dbcon,$query);
  if($resultado){
        echo '<script>alert("Gracias por el registro")</script>';
    }
    else{
        echo '<script>alert("El servidor esta en mantenimiento, intenta mas tarde")</script>';
    }
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

			<label> Nombre alumno </label>
			<input type = "text"> <br> <br>

			<label> Calificacion </label>
			<input type = "number"> <br> <br>

        	<input type = "button" name= "BotonG" value = "Aceptar">


        </div>
		</div>
    </div>
</div>

<?php include_once('footer.php'); ?>