<?php
/*$leer = "SELECT * FROM movies WHERE nombrePelicula
LIKE '%$mo%' OR directorPelicula
LIKE '%$mo%' OR fechaPelicula
LIKE '%$mo%' OR generoPelicula
LIKE '%$mo%'";*/
$convoca = $_GET['bus'];

include('connectmysql.php');
 $resultado = mysqli_query($dbcon,"SELECT * from convocatoria,convocatoria_publicada
   where convocatoria.id_convocatoria=convocatoria_publicada.convocatoria and convocatoria_publicada.estado_convocatoria='Abierta'
   and convocatoria.nombre_convocatoria LIKE '%$convoca%'" );

$convocatorias = array();
while ($convocatoria = $resultado->fetch_object()) {
       array_push($convocatorias, array(
       "id_convocatoria"=> $convocatoria->id_convocatoria,
       "nombre_convocatoria"=> $convocatoria->nombre_convocatoria,
       "f_inicio"=> $convocatoria->f_inicio,
       "f_fin"=> $convocatoria->f_fin,
       "costo_convocatoria"=> $convocatoria->costo_convocatoria,
       "contenido_convocatoria"=> $convocatoria->contenido_convocatoria,
       "estado_convocatoria"=> $convocatoria->estado_convocatoria

    ));
}
echo json_encode($convocatorias);
/*echo "<pre>";
print_r($convocatorias);
echo "</pre>";*/
?>
