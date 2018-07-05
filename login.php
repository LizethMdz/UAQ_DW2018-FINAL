<?php include_once('header.php'); ?>

<?php include_once('menu_principal.php'); ?>

				<div class = "descripcion">

					<div id="des">
						 <h2>Login</h2>
						 <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
					</div>
					 <div class="contenido-all">

						 <form class="" action="login.php" method="post">

										<div class="ingreso">
											<p> Correo o Usuario </p>
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
