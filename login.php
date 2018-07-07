<?php
    $page_title = 'Login';
    include ('header.php');

  if (@$_SESSION['id'] == 'Coordinador'){
    header("Location:inicio.php");
  }
  elseif (@$_SESSION['id']=='Instructor'){
    header("Location:inicio.php");
  }
  elseif (@$_SESSION['id']=='Alumno'){
    header("Location:inicio.php");
  }
  elseif (@!$_SESSION['id']) {
    include("menu_principal.php");
  }

?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require ("connectmysql.php");
    $errores = array();

    if(empty($_POST['email']) or empty($_POST['password'])){
      $errores[] = 'Error' ;
    }
    else{
      $username = trim($_POST['email']);
      $pass = trim($_POST['password']);
    }

    if(empty($errores)){
      session_start();

      $query = "select * from USUARIO where password_usuario like '$pass' and email_usuario like '$username'";
      $resultado = mysqli_query($dbcon, $query);
      $n = mysqli_num_rows($resultado); //Si hay algo incorrecto esa wea debe ser 0
      if($n==0) {
        echo '<script>alert("Sus datos estan incorrectos, verifique")</script>';
        echo "<script>location.href='inicio.php'</script>";
      }
      else{// si todo está correcto entonces n!=0 y ya no hay pez xd
        if($resultado){
        while ($user = mysqli_fetch_assoc($resultado)){
          if ($pass == $user['password_usuario'] && $username == $user['email_usuario'] && 'Coordinador' == $user['tipo_usuario']){

            $_SESSION['id']=$user['tipo_usuario'];
            $_SESSION['user']=$user['email_usuario'];
            echo '<script>alert("BIENVENIDO COORDINADOR")</script>';
            echo "<script>location.href='inicio.php'</script>";
          }
          elseif ($pass == $user['password_usuario'] && $username == $user['email_usuario'] && 'Instructor' == $user['tipo_usuario']){
            $_SESSION['id']=$user['tipo_usuario'];
            $_SESSION['user']=$user['email_usuario'];
            echo '<script>alert("BIENVENIDO INSTRUCTOR")</script>';
            echo "<script>location.href='inicio.php'</script>";
          }
          elseif ($pass == $user['password_usuario'] && $username == $user['email_usuario'] && 'Alumno' == $user['tipo_usuario']){
            $_SESSION['id']=$user['tipo_usuario'];
            $_SESSION['user']=$user['email_usuario'];
            echo '<script>alert("BIENVENIDO ALUMNO")</script>';
            echo "<script>location.href='inicio.php'</script>";
          }
        }
      }
    }

  }
  else{
    echo '<script>alert("Error, Sus datos estan incompletos")</script>';
    echo "<script>location.href='inicio.php'</script>";
  }
  // Cerrar la conexión a la base de datos
  mysqli_close($dbcon);

  }
?>

<!--<?php include_once('header.php'); ?>


<?php include_once('menu_principal.php'); ?>-->

				<div class = "descripcion">

					<div id="des">
						 <h2>Login</h2>
						 <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
					</div>
					 <div class="contenido-all">

						 <form class="" action="login.php" method="post">


										<div class="ingreso">
											<p> Correo </p>
											<input type =  "email" name="email" maxlength="30" required placeholder="correo@dominio.com">
											<p> Contraseña</p>
											<input type =  "password" name="password" maxlength="10" required>
										</div>
										<div id = "envio">
											<input type="submit" name="guardar" value="Inicio Sesión">
										</div>
						  </form>

					</div>
				</div><!--descripcion-->
<?php include_once('footer.php'); ?>
