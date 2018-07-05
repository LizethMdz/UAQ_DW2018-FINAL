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
    $query="INSERT INTO ASISTENCIA (id_asistencia,fecha, alumno, tipo_asistencia, curso) VALUES ('NULL','$fec','$id','$asistencia','$c')";
    //ejecutar la consulta
    $resultado=@mysqli_query($dbcon,$query);
    //Si la consulta tuvo éxito, entonces imprimir un mensaje
        if($resultado){
            echo '<script>alert("Gracias por el registro")</script>';
        }
        else{
            die();
            echo '<script>alert("Hubo errores en la consulta")</script>';
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
    <div class ="espacio_contenido">

    		<form method="POST" action="registroAsistenciaProf.php">


    		<h3 class="titulos"> REGISTRAR ASISTENCIA </h3>

    		<div class = "Datos-alumno">

            	<p class="parr-title"> Fecha:</p>
              		<input type="date"  name="fec" class="inputs-profe" value = "<?php if (isset($_POST['fec'])) echo $_POST['fec']; ?>" min="1915-01-01" max="2019-12-31" required >
                  <br><br>
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
              		<p class="parr-title"> Nombre alumno: </p>
              		<input type="text" class="inputs-profe" id="alumno" name="alumno" value="<?php if(isset($_GET['p'])) echo $_GET['p'];?>">
                   <br><br>
        			<input type="hidden" name="curso" id="curso" value="<?php echo $_GET['c'];?>">

                <p class="parr-title"> Asistencia </p>
              		<select name="asistencia" class="selects">
              			<option value='asistencia'>Asistencia</option>
            				<option value='falta'>Falta</option>
            				<option value='justificacion'>Justificación</option>
            				<option value='retardo'>Retardo</option>
              		</select>



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
