<?php
    $page_title = 'Curso';
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
include('connectmysql.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

    $errores=array();
    if (empty($_POST['sede']) || empty($_POST['convocatoria']) || empty($_POST['instructor'])|| empty($_POST['horario']) ){
        $errores="Te faltan datos por llenar";

    }
    else{
    $sede_curso = trim($_POST['sede']);

    $hora = trim($_POST['horario']);
    $hora = mysqli_real_escape_string($dbcon, $hora);

    $convocatoria = trim($_POST['convocatoria']);

    $instructor = trim($_POST['instructor']);
    }

if (empty($errores)) {
    $query="INSERT INTO RL_CURSO (id_curso,sede_curso,dia_y_hora_curso,convocatoria,instructor, promedio_evaluacion_curso)
    VALUES ('Null','$sede_curso','$hora','$convocatoria','$instructor',0)";
    $resultado=@mysqli_query($dbcon,$query);
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

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Designa Instructores</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	         <div class="contenido-all">
          <form action="regcurso.php" method="POST">
               <div class="espacio_contenido">

                 <h3 class="titulos">REGISTRO</h3>
                 <br>
                 <p class="parr-title">Nombre de la convocatoria</p>
                 <?php
                  $sql_consulta="SELECT * FROM CONVOCATORIA ORDER BY nombre_convocatoria ASC";
                  $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                  echo '<select name="convocatoria">';
                  while ($valores = mysqli_fetch_array($sql_datos)) {
                      echo '<option value="'.$valores[id_convocatoria].'">'.$valores[nombre_convocatoria].'</option>';
                  }
                  echo '</select>';
                  ?>

                 <p class="parr-title">Nombre de la sede</p>
                 <?php
                  $sql_consulta="SELECT * FROM SEDE ORDER BY nombre_sede ASC";
                  $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                  echo '<select name="sede">';
                  while ($valores = mysqli_fetch_array($sql_datos)) {
                      echo '<option value="'.$valores[id_sede].'">'.$valores[nombre_sede].'</option>';
                  }
                  echo '</select>';
                  ?>


                 <p class="parr-title">Instructor</p>
                 <?php
                  $sql_consulta="SELECT * FROM INSTRUCTOR ORDER BY nombre_instructor ASC";
                  $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                  echo '<select name="instructor">';
                  while ($valores = mysqli_fetch_array($sql_datos)) {
                      echo '<option value="'.$valores[id_instructor].'">'.$valores[nombre_instructor].'</option>';
                  }
                  echo '</select>';
                  ?>

                 <h3 class="titulos">HORARIOS</h3>
                 <br>
                 <p class="parr-title">Horarios</p>
                 <input type="text" class="inputs-profe" name="horario" maxlength="50" required >


                 <input type="submit" value="Guardar" class="btn-enviar-form" name="guardar">

               </div>
             </form>
          </div>
</div>
<?php
}
?>
<?php include_once('footer.php'); ?>
