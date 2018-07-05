<?php
    $page_title = 'Registro de Convocatoria';
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
if($_SERVER['REQUEST_METHOD']=='POST'){
  include('connectmysql.php');
    // Crear el arreglo para almacenar los mensajes de error
    $errores=array();
    if (empty($_POST['nombre_convocatoria']) || empty($_POST['f_inicio']) || empty($_POST['f_fin']) || empty($_POST['costo_convocatoria'])  || empty($_POST['contenido_convocatoria'])){
        $errores="Te faltan datos por llenar";

    }
    else{
          $nombre_convocatoria = trim($_POST['nombre_convocatoria']); //limpia de espacios al inicio y al final del campo
          $nombre_convocatoria = mysqli_real_escape_string($dbcon, $nombre_convocatoria); //cadena escapada

          $f_inicio = trim($_POST['f_inicio']); //limpia de espacios al inicio y al final del campo
          $f_inicio = mysqli_real_escape_string($dbcon, $f_inicio); //cadena escapada

          $f_fin = trim($_POST['f_fin']); //limpia de espacios al inicio y al final del campo
          $f_fin = mysqli_real_escape_string($dbcon, $f_fin); //cadena escapada

          $costo_convocatoria = trim($_POST['costo_convocatoria']); //limpia de espacios al inicio y al final del campo
          $costo_convocatoria = mysqli_real_escape_string($dbcon, $costo_convocatoria); //cadena escapada

          $contenido_convocatoria = trim($_POST['contenido_convocatoria']); //limpia de espacios al inicio y al final del campo
          $contenido_convocatoria = mysqli_real_escape_string($dbcon, $contenido_convocatoria); //cadena escapada

          $estado_convocatoria="Abierta";
    }

    if (empty($errores)) {
    $query="INSERT INTO CONVOCATORIA(id_convocatoria,nombre_convocatoria,f_inicio,f_fin,costo_convocatoria,contenido_convocatoria)
    VALUES ('Null','$nombre_convocatoria','$f_inicio','$f_fin','$costo_convocatoria','$contenido_convocatoria' )";

    //$query2="INSERT INTO CONVOCATORIA_PUBLICADA(convocatoria,f_inicio,f_fin,estado_convocatoria)
    //VALUES ('Null', '$f_inicio','$f_fin', '$estado_convocatoria')";
    //ejecutar la consulta
    $resultado=@mysqli_query($dbcon,$query);
    //$res2 =@mysqli_query($dbcon,$query2);
    //Si la consulta tuvo éxito, entonces imprimir un mensaje
    if($resultado){
        echo '<script>alert("Gracias por el registro")</script>';
    }
    else{
        echo '<script>alert("El servidor esta en mantenimiento, intenta mas tarde")</script>';
    }

    }

}
?>

<!--<?php include_once('header.php'); ?> <?php include_once('coordinador.php'); ?>-->

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Dar de alta convocatorias Convocatorias</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	   <div class="contenido-all">
       <form action="regconv.php" method="post">

           <div class="espacio_contenido">

              <h3 class="titulos">REGISTRO</h3>
              <br><br>
              <label for="nombre_convocatoria" class="parr-title">Nombre de la convocatoria: </label>
              <input class="inputs-profe" type="text" name="nombre_convocatoria" maxlength="30" required
              value="<?php /*if (isset($_POST['nombre_convocatoria'])) echo $_POST['nombre_convocatoria'];*/ ?>">
              <br><br>
              <label for="f_inicio" class="parr-title">Fecha de inicio: </label>
              <input class="inputs-profe" type="date" min="2017-01-01" max="2020-12-31" name="f_inicio" required title="Seleccione una fecha"
              value="<?php /*if (isset($_POST['f_inicio'])) echo $_POST['f_inicio'];*/ ?>">
              <br><br>
              <label for="f_fin" class="parr-title">Fecha de finalización: </label>
              <input class="inputs-profe" type="date" min="2017-01-01" max="2020-12-31" name="f_fin" required title="Seleccione una fecha"
              value="<?php /*if (isset($_POST['f_fin'])) echo $_POST['f_fin'];*/ ?>">
              <br><br>
              <label for="costo_convocatoria" class="parr-title">Costo ($): </label>
              <input class="inputs-profe" type="number" name="costo_convocatoria" maxlength="10" required pattern="[0-9]+" title="Sólo números"
              value="<?php /*if (isset($_POST['costo_convocatoria'])) echo $_POST['costo_convocatoria']; */ ?>">
              <br><br>
              <label for="contenido_convocatoria" class="parr-title">Contenido:</label><br>
              <textarea name="contenido_convocatoria" required pattern="[A-Za-z0-9\s]+"></textarea>
              <br><br>
              <input type="submit" name="guardar" value="Guardar" class="btn-enviar-form">
           </div>
         </form>
      </div>
</div>
</div>

<?php
}
?>

<?php include_once('footer.php'); ?>
