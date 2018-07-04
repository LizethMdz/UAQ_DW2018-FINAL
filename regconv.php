<?php include_once('header.php'); ?>

<?php include_once('coordinador.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Registrar Convocatorias</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	   <div class="contenido-all">
           <div class="espacio_contenido">

              <h3 class="titulos">REGISTRO</h3>
              <br><br>
              <label for="nombre_convocatoria" class="parr-title">Nombre de la convocatoria: </label>
              <input class="inputs-profe" type="text" name="nombre_convocatoria" maxlength="30" required
              value="<?php /*if (isset($_POST['nombre_convocatoria'])) echo $_POST['nombre_convocatoria'];*/ ?>">
              <br><br>
              <label for="f_inicio" class="parr-title">Fecha de inicio: </label>
              <input class="inputs-profe" type="date" min="2017-01-01" max="2020-12-31" name="f_inicio" required title="Seleccione una fecha"
              value="<?php /*if (isset($_POST['f_inicio'])) echo $_POST['f_inicio'];*/ ?>">
              <br><br>
              <label for="f_fin" class="parr-title">Fecha de finalización: </label>
              <input class="inputs-profe" type="date" min="2017-01-01" max="2020-12-31" name="f_fin" required title="Seleccione una fecha"
              value="<?php /*if (isset($_POST['f_fin'])) echo $_POST['f_fin'];*/ ?>">
              <br><br>
              <label for="costo_convocatoria" class="parr-title">Costo ($): </label>
              <input class="inputs-profe" type="number" name="costo_convocatoria" maxlength="10" required pattern="[0-9]+" title="Sólo números"
              value="<?php /*if (isset($_POST['costo_convocatoria'])) echo $_POST['costo_convocatoria']; */ ?>">
              <br><br>
              <label for="contenido_convocatoria" class="parr-title">Contenido:</label><br>
              <textarea name="contenido_convocatoria" required pattern="[A-Za-z0-9\s]+"></textarea>
              <br><br>
              <input type="submit" value="Guardar" class="btn-enviar-form">
           </div>
      </div>
</div>
</div>

<?php include_once('footer.php'); ?>
