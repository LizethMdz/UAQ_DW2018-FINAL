<?php
    $page_title = 'Educacion para todos';
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

				<div class = "descripcion">

					<div id="des">
						 <h2>BIENVENIDO <?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?></h2>
						 <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
					</div>
					<div id="texto">
						<p>Por fin despues de mucho tiempo de preparación! se lanza un programa de convocatorias con una gran variedad de cursos en distintas partes del pais para fomentar el crecimiento de la educación en la sociedad. Para poder unirte a algun curso que te interese necesitas:</p><br>
						<h3>¡Registrarte!</h3><br>
						<p>Solo tienes que llenar el formulario con tus datos para poder registrarte como alumno! Despues de eso podrás checar las convocatorias disponibles y podras inscribirte al curso que más te interese!</p><br>
						<h3>¡Te deseamos mucha suerte en tu nueva aventura del conocimiento!</h3>
					</div>

				</div><!--descripcion-->
<?php include_once('footer.php'); ?>
