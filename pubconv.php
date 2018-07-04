<?php include_once('header.php'); ?>

<?php include_once('coordinador.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Publicacion de Convocatorias</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">
                    <div class="espacio_contenido">
                              <h3 class="titulos">REGISTRO</h3>
                             <br>
                             <label class="parr-title">Convocatoria: </label>
                             <select name="convocatoria"></select>
                              <br><br>
                             <label class="parr-title">Fecha de inicio de inscripciones: </label>
                             <input class="inputs-profe" type="date" name="f_inicio_inscripciones" maxlength="25" required min="2017-01-01" max="2020-12-31">
                             <br><br>
                             <label class="parr-title">Fecha de finalización de inscripciones: </label>
                             <input class="inputs-profe" type="date" name="f_fin_inscripciones" maxlength="25" required min="2017-01-01" max="2020-12-31">
                             <br><br>
                             <label class="parr-title" for="estado_convocatoria">Estado: </label>
                             <select name="estado_convocatoria">
                                 <option>Abierta</option>
                                 <option>Proceso</option>
                                 <option>Cerrada</option>
                             </select>
                             <br>
                             <br>
                             <input type="submit" value="Guardar" class="btn-enviar-form">
                   </div>
          </div>
</div>

<?php include_once('footer.php'); ?>
