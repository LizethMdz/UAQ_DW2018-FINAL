<?php

  DEFINE ('DB_USER','root');
  DEFINE ('DB_PSWD', '');
  DEFINE ('DB_HOST', 'localhost');
  DEFINE ('DB_NAME', 'convocatoriadb');

  $dbcon = mysqli_connect(DB_USER,DB_HOST,DB_PSWD, DB_NAME);

  if(!$dbcon){
    die('error al conectar en la base de datos');
  }


 ?>
