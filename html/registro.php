<!DOCTYPE html>
<html>
<head>
	<title> EduCon </title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type = "text/css" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Wendy+One" rel="stylesheet">
</head>

<body>


	<div id ="menu-superior"> 
			<div id = "menu-ingreso">
				<div class="centro">
					<!--<div class = "img">
						<img src="img.jpg">
					</div>-->
					<div id = "logo"> 
						<span class = "rojo"> E </span>
						<span class = "rosa"> d </span>
						<span class = "naranja"> u  </span>
						<span class = "verde"> C </span>
						<span class = "azul"> o </span>
						<span class = "amarillo"> n </span> 
					</div>
					<!--<div class = "img2">
						<img src="img2.png">
					</div>-->
				</div><!--centro-->

				<div class = "opciones"> 
            			<div > <a href="index.php"> Inicio </a></div>
            			<div > <a href="#"> Convocatorias </a></div>
            			<div > <a href="#"> Contacto </a></div>
            			<div > <a href="#"> Login </a></div>
            			<div > <a href="#"> Registro </a></div> 
				</div><!--opciones-->

			
				<div class = "descripcion">
						<div class ="re2">
							<p> Celular</p>
							<input type =  "text">
							<p> Email </p>
							<input type =  "email">
							<p> Contraseña </p>
							<input type =  "password">
							<p> Calle y número</p>
							<input type =  "text">
							<p> Estado</p>
							<select >
								<option>Querétaro</option>
								<option>Guanajuato</option>
								<option>CDMX</option>
							</select>

						</div>

						<div class="re1">
							<p> Nombre(s) </p>
							<input type =  "text">
							<p> Apellido Paterno</p>
							<input type =  "text">
							<p> Apellido Materno</p>
							<input type =  "text">
							<p> Fecha de Nacimiento </p>
							<input type =  "date">
							<p> Ocupacion</p>
							<input type =  "text">
						</div>

						<div id = "envio">
							<input type="submit" name="registro" value="Registrarme!">
						</div>
				</div><!--descripcion-->
			</div><!--Menu ingreso-->
	</div><!--Menu superior-->
  <script src="jquery/jquery-3.3.1.min.js"></script>
  <script src="jquery/jquery.min.js"></script>
  <script type="text/javascript" src="funciones.js"></script>
</body>

</html>
</body>

</html>