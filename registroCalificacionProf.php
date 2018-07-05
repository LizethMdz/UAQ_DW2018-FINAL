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
    <div class ="espacio_contenido">

    	<form method="POST" action="registroCalificacionProf.php">

		<h3 class="titulos"> REGISTRAR CALIFICACION </h3>

		<div class = "Datos-alumno">

				 <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" >

          		<p class="parr-title"> Nombre alumno: </p>
          		<input type="text" class="inputs-profe" name="alumno" disabled id="alumno" value="<?php if(isset($_GET['p'])) echo $_GET['p'];?>">
              <br><br>


        		<p class="parr-title"> Calificacion:</p>
          		<input type="number"  class="inputs-profe" name="calif">
              <br><br>
              <input type="hidden" name="curso" id="curso" value="<?php echo $_GET['c'];?>">


        	<input type="submit" value="Guardar" class="btn-enviar-form" name="guardar">

        </div>
        </form>
		</div>
  </div>
</div>
<?php
}
?>
<?php include_once('footer.php'); ?>
