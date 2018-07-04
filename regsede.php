
<?php include_once('header.php'); ?>

<?php include_once('coordinador.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Asignar Sedes</h2>

          </div>
	<div class="contenido-all">
          <div class="espacio_contenido">

          		<h3 class="titulos">REGISTRO</h3>
                              <br>
          		<label for="" class="parr-title">Nombre:</label>
          		<input type="text"  class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Institucion</label>
          		<select name="municipio" id="muni" class="selects">
          			<option value="">UAQ</option>
          		</select>
                              <br><br>
          		<label for="" class="parr-title">Institucion:</label>
          		<input type="number" class="inputs-profe">
                              <br><br>
          		<label for="" class="parr-title">Municipio</label>
          		<select name="municipio" id="muni" class="selects">
          			<option value="">Queretaro</option>
          		</select>
                              <br><br>
          		<input type="submit" value="Guardar" class="btn-enviar-form">

          	</div>
          </div>
</div>

<?php include_once('footer.php'); ?>
