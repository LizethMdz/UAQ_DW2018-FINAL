<?php
    $page_title = 'Registro';
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

?>

<?php
   include('connectmysql.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

    $folio=trim($_POST['folio']);
    $folio = mysqli_real_escape_string($dbcon, $folio);

    $domicilio_alumno=trim($_POST['domicilio_alumno']);
    $domicilio_alumno = mysqli_real_escape_string($dbcon, $domicilio_alumno);

    $nombre_alumno = trim($_POST['nombre_alumno']);
    $nombre_alumno = mysqli_real_escape_string($dbcon, $nombre_alumno);

    $apaterno_alumno = trim($_POST['apaterno_alumno']);
    $apaterno_alumno = mysqli_real_escape_string($dbcon, $apaterno_alumno);

    $amaterno_alumno = trim($_POST['amaterno_alumno']);
    $amaterno_alumno = mysqli_real_escape_string($dbcon, $amaterno_alumno);

    $nacimiento_alumno = trim($_POST['nacimiento_alumno']);
    $nacimiento_alumno = mysqli_real_escape_string($dbcon, $nacimiento_alumno);

    $ocupacion_alumno = trim($_POST['ocupacion_alumno']);
    $ocupacion_alumno = mysqli_real_escape_string($dbcon, $ocupacion_alumno);

    /*$telefono_alumno = trim($_POST['telefono_alumno']);
    $telefono_alumno = mysqli_real_escape_string($dbcon, $telefono_alumno);*/

    $celular_alumno = trim($_POST['celular_alumno']);
    $celular_alumno = mysqli_real_escape_string($dbcon, $celular_alumno);

    $email_alumno = trim($_POST['email_alumno']);
    $email_alumno = mysqli_real_escape_string($dbcon, $email_alumno);

    $municipio = trim($_POST['municipio']);

    $query="INSERT INTO ALUMNO(id_alumno,folio,nombre_alumno,apaterno_alumno,amaterno_alumno,nacimiento_alumno,ocupacion_alumno,celular_alumno,email_alumno,callenumero_alumno,municipio)
    VALUES ('Null','$folio','$nombre_alumno','$apaterno_alumno','$amaterno_alumno','$nacimiento_alumno','$ocupacion_alumno','$celular_alumno','$email_alumno','$domicilio_alumno','$municipio' )";
    $resultado=@mysqli_query($dbcon,$query);
    if($resultado){

    }
    else{
        echo '<script>alert("El servidor esta en mantenimiento, intenta mas tarde")</script>';
    }
}
?>


				<div class = "descripcion">
					<div id="des">
						 <h2>Registro</h2>
						 <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
					</div>
					 <div class="contenido-all">
             <form method="POST" action="registro.php">
									<div class ="re2">
										<h3>Contacto</h3>
										<p> Celular</p>
										<input type="number" name="celular_alumno" maxlength="10" required pattern="[0-9]{10]" title="Sólo números" id="celular_alumno">
										<p> Email </p>
										<input type =  "email" name="email_alumno" id="email_alumno" maxlength="30" required placeholder="correo@dominio.com" >
										<p> Confirmar Email </p>
										<input type =  "email" name="confirmar_email_alumno" id="confirmar_email_alumno" maxlength="30" required placeholder="confirma tu correo">
										<p> Colonia </p>
										<input type = "text" name="colonia" maxlength="20" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras" id="colonia">
										<p> Calle y número</p>
										<input type =  "text" name="calle" maxlength="25" title="Letras y números" id="calle" placeholder="Calle y numero">
										<p> Municipio</p>

                      <?php
                        $sql_consulta="SELECT * FROM MUNICIPIO ORDER BY nombre_municipio ASC";
                        $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                        echo '<select name="municipio">';
                        while ($valores = mysqli_fetch_array($sql_datos)) {
                            echo '<option value="'.$valores[id_municipio].'">'.$valores[nombre_municipio].'</option>';
                        }
                        echo '</select>';
                        ?>

									</div>

									<div class="re1">
										<h3>Datos Generales</h3>
										<p> Nombre(s) </p>
										<input type =  "text" name="nombre_alumno"  id="nombre_alumno" maxlength="30" required autofocus pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras" >
										<p> Apellido Paterno</p>
										<input type =  "text" name="apaterno_alumno" autofocus pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras" >
										<p> Apellido Materno</p>
										<input type =  "text" name="amaterno_alumno" autofocus pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras" >
										<p> Fecha de Nacimiento </p>
										<input type =  "date" min="1950-01-01" max="2018-12-01" name="nacimiento_alumno" required title="Seleccione una fecha" >
										<p> Ocupacion</p>
										<input type =  "text" name="ocupacion_alumno" maxlength="30" required autofocus pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras" >

									</div>

									<input name="folio" maxlength="10" id="folio" style="visibility: hidden;" >
									<input name="domicilio_alumno"  id="domicilio_alumno" style="visibility: hidden;">

									<div id = "envio">
										<input type="submit" name="guardar"  value="Aceptar" onclick="validarAlumno();">
									</div>
                </form>
							</div>
				</div><!--descripcion-->
<?php include_once('footer.php'); ?>
</body>
</html>
