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

<!--CONTENIDO DE TODO
<div class = "descripcion">
          <div id="des">
	   <h2>Publicacion de Convocatorias</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">
          </div>
	<div class="contenido-all">
                    <div class="espacio_contenido">
                              <h3 class="titulos">REGISTRO</h3>
                             <br>
                             <label class="parr-title">Convocatoria: </label>
                             <select name="convocatoria"></select>
                              <br><br>
                             <label class="parr-title">Fecha de inicio de inscripciones: </label>
                             <input class="inputs-profe" type="date" name="f_inicio_inscripciones" maxlength="25" required min="2017-01-01" max="2020-12-31">
                             <br><br>
                             <label class="parr-title">Fecha de finalización de inscripciones: </label>
                             <input class="inputs-profe" type="date" name="f_fin_inscripciones" maxlength="25" required min="2017-01-01" max="2020-12-31">
                             <br><br>
                             <label class="parr-title" for="estado_convocatoria">Estado: </label>
                             <select name="estado_convocatoria">
                                 <option>Abierta</option>
                                 <option>Proceso</option>
                                 <option>Cerrada</option>
                             </select>
                             <br>
                             <br>
                             <input type="submit" value="Guardar" class="btn-enviar-form">
                   </div>
          </div>
</div>-->
<?php
include('connectmysql.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errores=array();
    if (empty($_POST['estado_convocatoria']) || empty($_POST['f_inicio_inscripciones']) || empty($_POST['f_fin_inscripciones']) ){
        $errores="Te faltan datos por llenar";

    }
    else{
    $convocatoria = trim($_POST['convocatoria']);

    $f_inicio_inscripciones = trim($_POST['f_inicio_inscripciones']);
    $f_inicio_inscripciones = mysqli_real_escape_string($dbcon, $f_inicio_inscripciones);
    $f_fin_inscripciones = trim($_POST['f_fin_inscripciones']);
    $f_fin_inscripciones = mysqli_real_escape_string($dbcon, $f_fin_inscripciones);

    $estado_convocatoria = trim($_POST['estado_convocatoria']);
    }

    if(empty($errores)){
    $query="INSERT INTO CONVOCATORIA_PUBLICADA (convocatoria,f_inicio,f_fin,estado_convocatoria)
    VALUES ('$convocatoria','$f_inicio_inscripciones','$f_fin_inscripciones','$estado_convocatoria')";
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
<?php include_once('coordinador.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Publicacion de Convocatorias</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">
                    <div class="espacio_contenido">
                              <h3 class="titulos">REGISTRO</h3>
                             <br>
                             <label class="parr-title">Convocatoria: </label>
                             <?php
                              $sql_consulta="SELECT c.id_convocatoria, c.nombre_convocatoria FROM CONVOCATORIA c, convocatoria_publicada a where c.id_convocatoria=a.convocatoria ORDER BY nombre_convocatoria ASC";
                              $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                              echo '<select name="convocatoria">';
                              while ($valores = mysqli_fetch_array($sql_datos)) {
                                  echo '<option value="'.$valores[id_convocatoria].'">'.$valores[nombre_convocatoria].'</option>';
                              }
                              echo '</select>';
                              ?>
                              <br><br>
                             <label class="parr-title">Fecha de inicio de inscripciones: </label>
                             <input class="inputs-profe" type="date" name="f_inicio_inscripciones" maxlength="25" required min="2017-01-01" max="2020-12-31">
                             <br><br>
                             <label class="parr-title">Fecha de finalización de inscripciones: </label>
                             <input class="inputs-profe" type="date" name="f_fin_inscripciones" maxlength="25" required min="2017-01-01" max="2020-12-31">
                             <br><br>
                             <label class="parr-title" for="estado_convocatoria">Estado: </label>
                             <select name="estado_convocatoria">
                                 <option>Abierta</option>
                                 <option>Proceso</option>
                                 <option>Cerrada</option>
                             </select>
                             <br>
                             <br>
                             <input type="submit" value="Guardar" class="btn-enviar-form">
                   </div>
          </div>
</div>


<?php
}
?>

<?php include_once('footer.php'); ?>
