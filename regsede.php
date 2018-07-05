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

<!--CONTENIDO DE TODO-->
<!--<div class = "descripcion">
          <div id="des">
	   <h2>Asignar Sedes</h2>

          </div>
	<div class="contenido-all">
          <div class="espacio_contenido">

          		<h3 class="titulos">REGISTRO</h3>
                              <br>
          		<label for="" class="parr-title">Nombre:</label>
          		<input type="text"  class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Institucion</label>
          		<select name="municipio" id="muni" class="selects">
          			<option value="">UAQ</option>
          		</select>
                              <br><br>
          		<label for="" class="parr-title">Institucion:</label>
          		<input type="number" class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Municipio</label>
          		<select name="municipio" id="muni" class="selects">
          			<option value="">Queretaro</option>
          		</select>
                              <br><br>
          		<input type="submit" value="Guardar" class="btn-enviar-form">

          	</div>
          </div>
</div>-->
<?php
include('connectmysql.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

    $errores=array();
    if (empty($_POST['nombre_sede']) || empty($_POST['institucion']) || empty($_POST['municipio']) || empty($_POST['capacidad_sede']) ){
        $errores="Te faltan datos por llenar";

    }
    else{

    $nombre_sede = trim($_POST['nombre_sede']); //limpia de espacios al inicio y al final del campo
    $nombre_sede = mysqli_real_escape_string($dbcon, $nombre_sede); //cadena escapada

    $institucion = trim($_POST['institucion']); //limpia de espacios al inicio y al final del campo

    $municipio = trim($_POST['municipio']); //limpia de espacios al inicio y al final del campo

    $capacidad = trim($_POST['capacidad_sede']); //limpia de espacios al inicio y al final del campo
    $capacidad = mysqli_real_escape_string($dbcon, $capacidad); //cadena escapada
    }

    if (empty($errores)) {
    $query="INSERT INTO SEDE (id_sede,nombre_sede,institucion,municipio,capacidad)
    VALUES ('Null','$nombre_sede','$institucion','$municipio','$capacidad' )";
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
 <!--CONTENIDO DE TODO-->
 <div class = "descripcion">
           <div id="des">
 	   <h2>Asignar Sedes</h2>

           </div>
 	<div class="contenido-all">
    <form  action="regsede.php" method="POST">
           <div class="espacio_contenido">

                 		<h3 class="titulos">REGISTRO</h3>
                                     <br>
                 		<label for="" class="parr-title">Nombre:</label>
                 		<input type="text"  class="inputs-profe" name="nombre_sede" maxlength="30" autofocus required pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ\s]+" title="Letras y números">
                    <br><br>
                   		<label for="" class="parr-title">Institucion</label>
                   		<?php
                     $sql_consulta="SELECT * FROM INSTITUCION ORDER BY nombre_institucion ASC";
                     $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                     echo '<select name="institucion">';
                     while ($valores = mysqli_fetch_array($sql_datos)) {
                     echo '<option value="'.$valores[id_institucion].'">'.$valores[nombre_institucion].'</option>';
                     }
                     echo '</select>';
                     ?>
                      <br><br>
                   		<label for="" class="parr-title">Capacidad:</label>
                   		<input type="number" class="inputs-profe" name="capacidad_sede" maxlength="2" title="Sólo números">
                                       <br><br>
                   		<label for="" class="parr-title">Municipio</label>
                   		<?php
                          $sql_consulta="SELECT * FROM MUNICIPIO ORDER BY nombre_municipio ASC";
                          $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                          echo '<select name="municipio">';
                          while ($valores = mysqli_fetch_array($sql_datos)) {
                          echo '<option value="'.$valores[id_municipio].'">'.$valores[nombre_municipio].'</option>';
                          }
                          echo '</select>';
                     ?>
                    <br><br>
           	 	<input type="submit" value="Guardar" class="btn-enviar-form" name="guardar">

           	</div>
          </form>
    </div>
 </div>
<?php
}
?>
<?php include_once('footer.php'); ?>
