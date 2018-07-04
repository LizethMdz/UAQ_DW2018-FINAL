
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
                              <br><br>
          		<label for="" class="parr-title">Nombre completo:</label>
          		<input type="text"  class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Telefono:</label>
          		<input type="number" class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Celular: </label>
          		<input type="number" class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Email:</label>
          		<input type="email" class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Confirma Email</label>
          		<input type="email" class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Direccion</label>
          		<input type="text" class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Municipio</label>
          		<select name="municipio" id="muni" class="selects">
          			<option value="">Queretaro</option>
          		</select>

          		<input type="submit" value="Guardar" class="btn-enviar-form">

          	</div>
          </div>
</div>

<?php include_once('footer.php'); ?>
