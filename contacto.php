
<?php include_once('header.php'); ?>

<?php include_once('coordinador.php'); ?>

<!--CONTENIDO DE TODO-->
<div class = "descripcion">
          <div id="des">
	   <h2>Contacto</h2>
	   <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
          </div>
	<div class="contenido-all">
                    <br>
                    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                      <div style='overflow:hidden;height:440px;width:700px; left: 180px; position: relative;'>
                        <div id='gmap_canvas' style='height:440px;width:700px;'>
                        </div>
                         <div>
                        <small><a href="embedgooglemaps.com/es/">https://embedgooglemaps.com/es/</a></small></div>
                        <div><small><a href="http://eurodisneyaanbiedingen.nl/">www.eurodisneyaabiedingen.nl</a></small></div>
                        <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                       </div>

                      <script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(20.7050467,-100.4413035),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(20.7050467,-100.4413035)});infowindow = new google.maps.InfoWindow({content:'<strong>Escuela</strong><br>uaq juriquilla<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
                      </script>

                     <p>Escríbenos a: educacion.atencionaclientes@mx.edu.com</p>
                     <p>Marca desde tu teléfono *123 sin costo Interior de la República: 01-800-1010-288 las 24 horas del día, los 365 días del año</p>
          </div>
</div>

<?php include_once('footer.php'); ?>
