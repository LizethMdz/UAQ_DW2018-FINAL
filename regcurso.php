
<?php include_once('header.php'); ?>

<?php include_once('coordinador.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Designa Instructores</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	         <div class="contenido-all">
           <div class="espacio_contenido">

             <h3 class="titulos">REGISTRO</h3>
             <p class="parr-title">Nombre de la convocatoria</p>
             <select name="municipio" id="muni" class="selects">
               <option value="">Queretaro</option>
             </select>

             <p class="parr-title">Nombre de la sede</p>
             <select name="municipio" id="muni" class="selects">
               <option value="">Queretaro</option>
             </select>


             <p class="parr-title">Instructor</p>
             <select name="municipio" id="muni" class="selects">
               <option value="">Queretaro</option>
             </select>

             <h3 class="titulos">HORARIOS</h3>
             <p class="parr-title">Horarios</p>
             <input type="text" class="inputs-profe">


             <input type="submit" value="Guardar" class="btn-enviar-form">

           </div>
          </div>
</div>

<?php include_once('footer.php'); ?>
