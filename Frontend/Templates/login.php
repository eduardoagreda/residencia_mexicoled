
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
       
       
     

<form id="loginForm" action="validarCode.php" method="POST" role="form">
    <legend>Iniciar sesion</legend>

    <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus requiered placeholder="usuario">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="txtPassword" class="form-control" id="password" placeholder="****">
    </div>


    <button type="submit" class="btn btn-success">Ingresar</button>
</form>


       </div>
   </div>
   



    </div>
  </div>
    </div>
  </div>


  <?php include 'partials/footer.php';?>

 