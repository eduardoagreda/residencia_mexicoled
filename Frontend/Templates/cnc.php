<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<script src="https://unpkg.com/xlsx@0.16.5/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@1.3.6/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@5.2.0/dist/js/tableexport.min.js"></script>
<title>Datos</title>
<head>
<p>
      <a href="evidencias.php
      " class="btn btn-primary btn-lg">ir a "Evidencias de pruebas"</a>
      </p>

		
</head>

<style>
		/* Este estilo es s�lo para darle presentaci�n, no es necesario incluirlo */
		body{
			padding: 60px;
			background-color: #ccc;
		}
		.imagen{
			-webkit-border-radius: 130px;
			-moz-border-radius: 150px;
			border-radius: 150px;	
		}
		.contenedor{
			background-color: #fff;
			padding: 5px;
			width: 200px;
			-webkit-border-radius: 150px;
			-moz-border-radius: 150px;
			-webkit-box-shadow: 1px 1px 10px #484848;
			border-radius: 150px;	
		}
	</style>

<div class="form-group">
	<p>
	<img src="cnc.jpg" height="200" width="200" class="imagen" />
	<br>

  <font  color="white" >
  <h1 scope="row"> QILI CNC ROUTER </h1>
  <p>
  
  </div>

<body>
	

	
	<style>
  
.html,body{
     /* Para que funcione correctamente en Smartphones y Tablets */
     height:100vh;
}
body {
     /* Ruta relativa o completa a la imagen */
     background-image: url(fondo_cnc.jpg);
     /* Centramos el fondo horizontal y verticalmente */
     background-position: center center;
     /* El fonde no se repite */
     background-repeat: no-repeat;
     /* Fijamos la imagen a la ventana para que no supere el alto de la ventana */
     background-attachment: fixed;
     /* El fonde se re-escala automáticamente */
     background-size: cover;
     /* Color de fondo si la imagen no se encuentra o mientras se está cargando */
     background-color: #FFF;
     /* Fuente para el texto */
     text-align: center;
     color: #000;
     font-family: "Times New Roman", Times, serif;
}
</style>
    
    <div>
       
		
     </div>
     


<div class="container">
	     <div class="row">
	         <div class="col-sm-3"></div>
	         <div class="col-sm-6">
	             <table id="tabla" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" class="table">
                
<caption style="color: white;"></caption>
	                 <thead>
	                     <tr>
                       
	                         <th style="color: white;" scope="col">Sensor</th>
	                         <th style="color: white;" scope="col">Dato</th>
	                         <th style="color: white;" scope="col">Fecha y Hora</th>
	                     </tr>
	                 </thead>
                     <tbody>
                          <?php
                                if(isset($_POST['obtener'])) {
									  $num_sensor = $sensor = $_POST["sensor"];
                                  $num_disp = $dispositivo = $_POST["dispositivo"];
                                  $num_cant = $cantidad = $_POST["cantidad"];
                                    
                                  $url2 = 'https://tectuinnoweb.uc.r.appspot.com/api/detalle-dispositivo?d='.$num_disp.'&format=json&key=782999fb1d544627e8c1194fe6d8548a9166c266';
                                  $url = 'https://tectuinnoweb.uc.r.appspot.com/api/quiero-datos-ex?d='.$num_disp.'&s='.$num_sensor.'&key=782999fb1d544627e8c1194fe6d8548a9166c266&cant='.$num_cant;
									
                                    $arreglo = json_decode(file_get_contents($url), true);
                                    $arreglo2 = json_decode(file_get_contents($url2), true);
                                     
                                    $nombre_disp = $arreglo2['nombre_disp'];
                                    echo "<caption style='color: white;font-size:150%;'>".$nombre_disp."</caption>";
                                    
                                    foreach($arreglo as $objeto){ //Busca en cada objeto del arreglo (sensor)
                                        
                                            if($objeto['dato'] > '1'){ //Si el valor en 'dato' es mayor a '700', lo imprime en pantalla
                                                $fecha = substr($objeto['timestamp'],0,10);
                                                $hora = substr($objeto['timestamp'],11,8);
                                                echo "<tr><th  scope='row'>".$objeto['nombre_sensor']."</th><td>".$objeto['dato']."</td><td>".$fecha." -- ".$hora."</td></tr>";
                                            }
                                        
                                    }
                                }
                            ?>
                      </tbody>
                    </table>
	         </div>
	         <div class="col-sm-3"></div>
	     </div>
    </div>

    <?php
	if(isset($_POST["obtener"]) && !empty($_POST["obtener"])) {
    $sensor = $_POST["sensor"];
    $dispositivo = $_POST["dispositivo"];
    $cantidad = $_POST["cantidad"];

	}
?>
<html>
	<head>
	</head>
	<body>


  <form>
         <fieldset data-role = "controlgroup" data-type = "horizontal">
            <input type = "checkbox" id = "checkbox 1" />
            <label for = "checkbox 1">Sensor 1 </label>

            <input type = "checkbox" id = "checkbox 1" />
            <label for = "checkbox 1">Sensor 2 </label>

            <input type = "checkbox" id = "checkbox 1" />
            <label for = "checkbox 1">Sensor 3 </label>

            <input type = "checkbox" id = "checkbox 1" />
            <label for = "checkbox 1">Sensor 4 </label>

            <input type = "checkbox" id = "checkbox 1" />
            <label for = "checkbox 1">Sensor 5 </label>

            <input type = "checkbox" id = "checkbox 1" />
            <label for = "checkbox 1">Sensor 6 </label>

            <input type = "checkbox" id = "checkbox 1" />
            <label for = "checkbox 1">Sensor 7 </label>

         </fieldset>
      </form>


			<form method="POST">

    <div  class="col-sm-3" align="center" class="form-group"></div>
  
	         <div align ="center" class="col-sm-6">

           
    <p>
        <input type="number" name="dispositivo" align-content-start  autofocus requiered placeholder="numero de dispositivo">

        <input type="number" name="sensor" align-content-center  autofocus requiered placeholder="numero de sensor">
   
        <input type="tel" name="cantidad" align="end"  autofocus requiered placeholder="cantidad de datos">
        <br>
		<br>
    
	<form method="post"> 
  <input class="btn btn-danger w-100" type="submit" name="obtener" value="Obtener Tabla"/>
    </form>
<p>
<button id="btnExportar" class="btn btn-primary w-100">Exportar a Excel</button>

    </p>
    </p>
    </div>



    <p>
      <a href="pruebas.php
      " class="btn btn-primary btn-lg">ir a pruebas</a>
      </p>
		
	</body>
</html>



<script>
        const $btnExportar = document.querySelector("#btnExportar"), $tabla = document.querySelector("#tabla");
        
        var hoy = new Date();
        var dd = String(hoy.getDate()).padStart(2, '0');
        var mm = String(hoy.getMonth() + 1).padStart(2, '0');
        var yyyy = hoy.getFullYear();
        
        hoy = dd + mm + yyyy;
        
        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "Disp023_Sen04_"+hoy, //Nombre del archivo de Excel
                sheetname: "Datos del sensor", //Título de la hoja
            });
            let datos = tableExport.getExportData();
            let preferenciasDocumento = datos.tabla.xlsx;
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>
    

    



  </body>
  </html>