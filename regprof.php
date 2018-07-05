<?php include_once('header.php'); ?>

<?php include_once('coordinador.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Dar de alta Profesor</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">
          <div class="espacio_contenido">

              <h3 class="titulos">REGISTRO</h3>
                              <br>
          		<p class="parr-title">Nombre completo:</p>
          		<input type="text"  class="inputs-profe">
                              <br><br>
          		<p class="parr-title">Telefono:</p>
          		<input type="number" class="inputs-profe">
                              <br><br>
          		<p class="parr-title">Celular: </p>
          		<input type="number" class="inputs-profe">
                              <br><br>
          		<p class="parr-title">Email:</p>
          		<input type="email" class="inputs-profe">
                              <br><br>
          		<p class="parr-title">Confirma Email</p>
          		<input type="email" class="inputs-profe">
                              <br><br>
          		<p class="parr-title">Direccion</p>
          		<input type="text" class="inputs-profe">
                              <br><br>
          		<p class="parr-title">Municipio</p>
          		<select name="municipio" id="muni" class="selects">
          			<option value="">Queretaro</option>
          		</select>
                              <br>
          		<input type="submit" value="Guardar" class="btn-enviar-form">

          	</div>
          </div>
</div>

<?php include_once('footer.php'); ?>
