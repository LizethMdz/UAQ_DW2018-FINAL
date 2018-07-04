<?php include_once('header.php'); ?>

<?php include_once('coordinador.php'); ?>

			
				<div class = "descripcion">
					<div class="formulario">
						<form method="POST">
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
								<p> Ocupación</p>
								<select >
									<option>Estudiante</option>
									<option>Empleado</option>
									<option>Maestro</option>
								</select>

							</div>

							<div id = "envio">
								<input type="submit" name="registro" value="Registrarme!">
							</div>
						</form>
					</div><!--formulario-->
				</div><!--descripcion-->
<?php include_once('footer.php'); ?>
</body>

</html>
</body>

</html>