
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

          		<p class="parr-title">Nombre:</p>
          		<input type="text"  class="inputs-profe">

          		<p class="parr-title">Institucion</p>
          		<select name="municipio" id="muni" class="selects">
          			<option value="">UAQ</option>
          		</select>
          		<p class="parr-title">Institucion:</p>
          		<input type="number" class="inputs-profe">

          		<p class="parr-title">Municipio</p>
          		<select name="municipio" id="muni" class="selects">
          			<option value="">Queretaro</option>
          		</select>

          		<input type="submit" value="Guardar" class="btn-enviar-form">

          	</div>
          </div>
</div>

<?php include_once('footer.php'); ?>
