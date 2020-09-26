
<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>



  <div class="container">

    <div class="starter-template">
    <br>
    <br>
    <br>
    <div class ="row">
    <div class="col-md-4 col-md-offset-4">
    
   


<br>
<br>

   <div class="panel panel-default">
       <div class="panel-body">
       
       
       <img src="mexicoled.png" height="170" width="300" class="rounded mx-auto d-block  " alt="...">     

<form id="loginForm" action="validarCode.php" method="POST" role="form">
   <br>

    <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus requiered placeholder="usuario">
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="txtPassword" class="form-control" id="password" placeholder="****">
    </div>


    <button type="submit" class="btn btn-success">Ingresar</button>
</form>

<br>

<div class="form-group">
        <label class="text-muted" for="password">¿Aun no tienes cuenta?
        <a href="registro.php">REGISTRATE</a>
        </label>

    </div>


       </div>
   </div>

   
   



    </div>
  </div>
    </div>
  </div>


  <?php include 'partials/footer.php';?>

 






 