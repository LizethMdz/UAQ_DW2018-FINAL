<?php include_once('header.php'); ?>

<?php include_once('alumno.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Envio de Documentos</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">
                    <div class="espacio_contenido">
                              <h3 class="titulos">REGISTRO</h3>
                              <br>
                              <label class="parr-title" for="usuario_alumno">Tu usuario es:</label>
                              <input class="inputs-profe" type="text" name="usuario_alumno" disabled id="usuario_alumno" value="">
                              <br><br>
                              <label class="parr-title" for="folio_alumno">Tu folio/contraseña es:</label>
                              <input class="inputs-profe" type="text" name="folio_alumno" disabled id="folio_alumno" value="">
                              <br><br>
                              <input class="inputs-profe" type="text" name="id_alumno"  id="id_alumno" value="" style="visibility: hidden;">
                              <br><br>
                              <label class="parr-title" for="cedula_inscripcion">Cédula de inscripción:</label>
                              <input class="inputs-profe" type="file" name="cedula_inscripcion" required >
                              <br><br>
                              <label class="parr-title" for="recibo_pago">Recibo de pago:</label>
                              <input class="inputs-profe" type="file" name="recibo_pago" required>
                              <br><br>
                              <label class="parr-title" for="curp_alumno">CURP:</label>
                              <input class="inputs-profe" type="file" name="curp" required>
                              <br><br>
                              <input type="submit" value="Guardar" class="btn-enviar-form">
                    </div>

          </div>
</div>

<?php include_once('footer.php'); ?>
