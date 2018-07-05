<?php
    $page_title = 'Educacion para todos';
    include ('header.php');
 session_start();
  if (@$_SESSION['id'] == 'Coordinador'){
    include("coordinador.php");
  }
  elseif (@$_SESSION['id']=='Instructor'){
    include("profesor.php");
  }
  elseif (@$_SESSION['id']=='Alumno'){
    include("alumno.php");
  }
  elseif (@!$_SESSION['id']) {
    include("menu_principal.php");
  }

  if(!isset($_SESSION["user"])) {
  header("location:login.php");
  } else {
?>
<?php


include('connectmysql.php');

      if($_SERVER['REQUEST_METHOD']=='POST'){

          $errores=array();
          if (empty($_POST['full-name']) || empty($_POST['telefono']) || empty($_POST['direccion']) ){
              $errores="Te faltan datos por llenar";

          }
          else{
          $id_profe = $_SESSION['user'];

          $nombre = trim($_POST['full-name']);

          $telefono = trim($_POST['telefono']);

          $direccion = trim($_POST['direccion']);

          $municipio = trim($_POST['municipio']); //limpia de espacios al inicio y al final del campo

        /*  echo $id_profe;
          echo $nombre;
          echo $telefono;
          echo $direccion;
          echo $municipio;*/
          }

      if (empty($errores)) {
          $query= "UPDATE instructor SET nombre_instructor = '$nombre', celular_instructor = '$telefono', direccion_instructor = '$direccion',
          municipio = '$municipio'
          WHERE email_instructor = '$id_profe'";
          $resultado=@mysqli_query($dbcon,$query);
          if($resultado){
              echo '<script>alert("Gracias por modificar")</script>';
          }
          else{

              echo '<script>alert("Hubo error, intenta mas tarde")</script>';
          }

        }
          else{
              echo '<script>alert("El servidor esta en mantenimiento, intenta mas tarde")</script>';
          }
      }
?>
<div class = "descripcion">

  <div id="des">
     <h2>BIENVENIDO <?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?></h2>
     <!--<input type="text" name="des" value="Inscribite a nuestras convocatorias">-->
  </div>
  <div class="contenido-all">



              <div class="form-add-user">
               <p style="color: #3458C1; text-align: center; margin-left:10px; font-size: 24px;
               ">Edita los campos</p>
               <form method="post" action="perfilProf.php.">
               <p style="margin-top: 15px; margin-left: 15px;
               color: #3458C1; font-size: 14px;">Nombre</p>
               <input type="text" placeholder="Nombre Completo" class="input-grp size" name="full-name" style="display: inline-block;"
               maxlength="50" required autofocus pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo letras">
               <p style="margin-left: 25px;
               color: #3458C1; font-size: 14px;">Celular</p>
               <input type="tel" placeholder="Celular" class="input-grp size" name="telefono" style="display: inline-block;"
               maxlength="10" required pattern="[0-9]{10]" title="Sólo números">
               <p style="margin-left: 25px; color: #3458C1; font-size: 14px;">Municipio</p>
               <?php
                     $sql_consulta="SELECT * FROM MUNICIPIO ORDER BY nombre_municipio ASC";
                     $sql_datos=mysqli_query($dbcon,$sql_consulta) or die('Error');
                     echo '<select name="municipio" class="select-st size" style="display:inline-block;">';
                     while ($valores = mysqli_fetch_array($sql_datos)) {
                     echo '<option value="'.$valores[id_municipio].'">'.$valores[nombre_municipio].'</option>';
                     }
                     echo '</select>';
                     ?>

               <p style="margin-left: 25px;
               color: #3458C1; font-size: 14px;">Direccion</p>
               <input type="text" placeholder="Direccion" class="input-grp size" name="direccion" style="display: inline-block;"
               maxlength="50" required>

                 <br>
               <button style="padding: 10px;
               margin-left: 25px; margin-top: 25px; background: #3458C1; color:#fff;" name="edit_account" type="submit" value="Editar">
                 Agregar
               </button>
             </form>
         </div>

  </div>

</div><!--descripcion-->

<?php
}
?>
<?php include_once('footer.php'); ?>
