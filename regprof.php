
<?php
    $page_title = 'Profesor';
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
//1 - VERIFICAR QUE SE ENVIÓ EL FORMULARIO
if($_SERVER['REQUEST_METHOD']=='POST'){

    // Crear el arreglo para almacenar los mensajes de error
    $errores=array();
    //2 - CONVERTIR A VARIABLES LOS CAMPOS
    if (empty($_POST['nombre_instructor']) || empty($_POST['telefono_instructor']) || empty($_POST['celular_instructor']) || empty($_POST['email_instructor']) || empty($_POST['direccion_instructor']) ){
        $errores="Te faltan datos por llenar";

    }
    else{
        //2 - CONVERTIR A VARIABLES LOS CAMPOS
    //aquí debes obtener el folio generado por js
    $folio=trim($_POST['folio']);
    $folio = mysqli_real_escape_string($dbcon, $folio); //cadena escapada

    $nombre_instructor = trim($_POST['nombre_instructor']); //limpia de espacios al inicio y al final del campo
    $nombre_instructor = mysqli_real_escape_string($dbcon, $nombre_instructor); //cadena escapada

    $telefono_instructor = trim($_POST['telefono_instructor']); //limpia de espacios al inicio y al final del campo
    $telefono_instructor = mysqli_real_escape_string($dbcon, $telefono_instructor); //cadena escapada

    $celular_instructor = trim($_POST['celular_instructor']); //limpia de espacios al inicio y al final del campo
    $celular_instructor = mysqli_real_escape_string($dbcon, $celular_instructor); //cadena escapada

    $email_instructor = trim($_POST['email_instructor']); //limpia de espacios al inicio y al final del campo
    $email_instructor = mysqli_real_escape_string($dbcon, $email_instructor); //cadena escapada

    $direccion_instructor = trim($_POST['direccion_instructor']); //limpia de espacios al inicio y al final del campo
    $direccion_instructor = mysqli_real_escape_string($dbcon, $direccion_instructor); //cadena escapada

    $municipio = trim($_POST['municipio']); //limpia de espacios al inicio y al final del campo
    }

    if (empty($errores)) {
        //Preparar la consulta para registrar los datos en la tabla
        $sql= "INSERT INTO INSTRUCTOR (id_instructor,folio,nombre_instructor,telefono_instructor,celular_instructor, email_instructor,   direccion_instructor, municipio
        ) VALUES ('Null','$folio','$nombre_instructor','$telefono_instructor','$celular_instructor', '$email_instructor', '$direccion_instructor', '$municipio')";
        $query="INSERT INTO instructor (id_instructor,folio,nombre_instructor,telefono_instructor,celular_instructor, email_instructor,   direccion_instructor, municipio)
        VALUES ('Null','$folio','$nombre_instructor','$telefono_instructor','$celular_instructor', '$email_instructor', '$direccion_instructor', '$municipio' )";
    //ejecutar la consulta
    $resultado=@mysqli_query($dbcon,$sql);
    //Si la consulta tuvo éxito, entonces imprimir un mensaje
        if($resultado){

        }
        else{
            echo '<script>alert("Hubo un error")</script>';

        }

    }
    else{
         echo '<script>alert("El servidor esta en mantenimiento, intenta mas tarde, HAY ERRORES")</script>';
    }
}
?>
<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Dar de alta Profesor</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">
    <form name="registro_profesor" action="regprof.php" method="POST">
          <div class="espacio_contenido">

              <h3 class="titulos">REGISTRO</h3>
                              <br>
          		<p class="parr-title">Nombre completo:</p>
          		<input type="text"  class="inputs-profe" name="nombre_instructor" id="nombre_instructor" maxlength="50" required autofocus pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras">
                              <br><br>
          		<p class="parr-title">Telefono:</p>
          		<input type="tel" class="inputs-profe" name="telefono_instructor" id="telefono_instructor" maxlength="7" required pattern="[0-9]{7}" title="Sólo números">
                              <br><br>
          		<p class="parr-title">Celular: </p>
          		<input type="tel" class="inputs-profe" name="celular_instructor" maxlength="10" required pattern="[0-9]{10]" title="Sólo números">
                              <br><br>
          		<p class="parr-title">Email:</p>
          		<input type="email" class="inputs-profe" name="email_instructor" id="email_instructor" maxlength="30" required placeholder="correo@dominio.com">
                              <br><br>
          		<p class="parr-title">Confirma Email</p>
          		<input type="email" class="inputs-profe" name="confirma_email_instructor" id="confirma_email_instructor" maxlength="30" required placeholder="confirma tu correo">
                              <br><br>
          		<p class="parr-title">Direccion</p>
          		<input type="text" class="inputs-profe" name="direccion_instructor" maxlength="50" required>
                              <br><br>
          		<p class="parr-title">Municipio</p>
              <?php
                    $sql_consulta="SELECT * FROM MUNICIPIO ORDER BY nombre_municipio ASC";
                    $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                    echo '<select name="municipio">';
                    while ($valores = mysqli_fetch_array($sql_datos)) {
                    echo '<option value="'.$valores[id_municipio].'">'.$valores[nombre_municipio].'</option>';
                    }
                    echo '</select>';
                    ?>
              <br>
              <input class="campo_corto" name="folio" maxlength="10" id="folio" style="visibility: hidden;">
          		<input type="submit" value="Guardar" name="guardar" class="btn-enviar-form" onclick="validarCorreo();">

          	</div>

          </form>
    </div>
</div>
<?php
}
?>
<?php include_once('footer.php'); ?>
