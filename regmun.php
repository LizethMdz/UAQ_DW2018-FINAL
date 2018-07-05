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
    $m=trim($_POST['mun']);
    $m= mysqli_real_escape_string($dbcon, $m);

    $query="INSERT INTO Municipio(id_municipio,nombre_municipio)
    VALUES ('Null','$m')";

    $resultado=@mysqli_query($dbcon,$query);

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
        	   <h2>Registra Municipio</h2>
        	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
          <div class="contenido-all">
            <form action="regmun.php" method="post">

               <div class="espacio_contenido">
                 <h3 class="titulos">REGISTRO</h3>
                 <label for="mun_nombre" class="parr-title">Municipio</label>
                 <input type="text" class="inputs-profe" name="mun" id="mun_nombre"maxlength="30" required autofocus pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras">


                 <input type="submit" name="guardar" value="Aceptar" class="btn-enviar-form">

               </div>
             </form>
           </div>
</div>
<?php
}
?>
<?php include_once('footer.php'); ?>
