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
    include('connectmysql.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $i=trim($_POST['inst']);
        $i = mysqli_real_escape_string($dbcon, $i); //cadena escapada

        $query="INSERT INTO Institucion(id_institucion,nombre_institucion)
        VALUES ('Null','$i')";
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
	   <h2>Registra Institución</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
    	<div class="contenido-all">
        <form action="reginst.php" method="post">


          <div class="espacio_contenido">
            <h3 class="titulos">REGISTRO</h3>
            <br><p><i>Introduce una institucion</i></p><br>
            <label class="parr-title" for="int_name">Institucion</label>
            <input type="text" class="inputs-profe" name="inst" id="int_name" maxlength="30" reuired autofocus pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras" >


            <input type="submit" name="guardar" value="Aceptar" class="btn-enviar-form">

          </div>
        </form>
      </div>
</div>
<?php
}
?>
<?php include_once('footer.php'); ?>
