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


<?php
require('connectmysql.php');
  $valor_id="";
    $correo_usuario=$_SESSION['user'];
    $query = "select * from ALUMNO where email_alumno like '$correo_usuario' ";
    $sql_datos=mysqli_query($dbcon,$query) or die('Error');
    while ($valores = mysqli_fetch_array($sql_datos)){
        $valor_id=$valores['id_alumno'];
        $valor_folio=$valores['folio'];
        $valor_nombre=$valores['nombre_Alumno'];
        $valor_apaterno=$valores['apaterno_alumno'];
        $valor_amaterno=$valores['amaterno_alumno'];
        $valor_nacimiento=$valores['nacimiento_alumno'];
//        $valor_telefono=$valores['telefono_alumno'];
        $valor_celular=$valores['celular_alumno'];
        $valor_email=$valores['email_alumno'];
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $curso=trim($_POST['curso']);

        $query="INSERT INTO rl_inscripcion(alumno, rl_curso, calificacion_alumno,total_asistencias, evaluacion_curso)
        VALUES ('$valor_id','$curso','null','null','null')";
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
?>
<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Selecciona tu curso</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">
                    <div class="espacio_contenido">
                    <h3 class="titulos">REGISTRO</h3>

                    <label for="" class="parr-title">Curso</label>
                    <?php
                    $sql_consulta="SELECT DISTINCT * from rl_curso JOIN convocatoria,sede WHERE rl_curso.sede_curso=sede.id_sede AND rl_curso.convocatoria=convocatoria.id_convocatoria";
                    $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                    echo '<select name="curso">';
                    while ($valores = mysqli_fetch_array($sql_datos)) {
                        echo '<option value="'.$valores[id_curso].'">'.$valores[nombre_convocatoria].','.$valores[nombre_sede].','.$valores[dia_y_hora_curso].','.'</option>';
                    }
                    echo '</select>';
                    ?>


                    <input type="submit" value="Guardar" class="btn-enviar-form">

                    </div>
          </div>
</div>
<?php
}
?>
<?php include_once('footer.php'); ?>
