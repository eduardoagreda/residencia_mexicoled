<!DOCTYPE html>
<html>
<title>Datos</title>
<head>



    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    
    <script src="https://unpkg.com/xlsx@0.16.5/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@1.3.6/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@5.2.0/dist/js/tableexport.min.js"></script>

    <div id="anychart-embed-src-line-charts-line-chart-with-x-scale-continuous-mode" class="anychart-embed anychart-embed-src-line-charts-line-chart-with-x-scale-continuous-mode">
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
<div id="ac_style_src-line-charts-line-chart-with-x-scale-continuous-mode" style="display:none;">
html, body, #container {
    width: 100%;
    height: 600px;
    margin: 0;
    padding: 0;
}
</div>

    <style>
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
</head>
<body>

<div class='container'>
    <div class="form-group">
        <p>
            <img src="cnc.jpg" height="200" width="200" class="imagen" />
            <br>
            <font  color="white">
            <h1 scope="row"> QILI CNC ROUTER </h1>
        </p>
    </div>
    <div class="row">
        <form method="POST">
            <p>
               
                <input type="number" name="dispositivo" align-content-start  autofocus requiered placeholder="Número de dispositivo">
                <input type="tel" name="cantidad" align="end"  autofocus requiered placeholder="Cantidad de datos">
            </p>
            <label>Seleccione sensor(es):</label>
            <p><input type="checkbox" name="sensor[]" value="1"><label>Sensor 1 </label>
            <input type="checkbox" name="sensor[]" value="2"><label>Sensor 2 </label>
            <input type="checkbox" name="sensor[]" value="3"><label>Sensor 3 </label>
            <input type="checkbox" name="sensor[]" value="4"><label>Sensor 4 </label>
            <input type="checkbox" name="sensor[]" value="5"><label>Sensor 5 </label>
            <input type="checkbox" name="sensor[]" value="6"><label>Sensor 6 </label>
            <input type="checkbox" name="sensor[]" value="7"><label>Sensor 7 </label>
            
            <p><input class="btn btn-danger btn-lg" type="submit" name="obtener" value="Obtener Tabla"/></p>
        </form>
    </div>

   
    
    <?php
        if(isset($_POST["obtener"]))
        {
            if(!empty($_POST["sensor"]))
            {
                echo "<div class='container'>
                
        	     <div class='row'>
        	     <div class='col-sm-3'></div>
        	     <div class='col-sm-6'>
                 <table id='tabla' summary='Code page support in different versions of MS Windows.' rules='groups' frame='hsides' class='table'>
                 <caption style='color: white;'></caption>
        	     <thead>
        	     <tr>
        	     <th style='color: white;' scope='col'>Sensor</th>
        	     <th style='color: white;' scope='col'>Dato</th>
        	     <th style='color: white;' scope='col'>Fecha y Hora</th>
        	     </tr>
        	     </thead>
        	     <tbody>";
                foreach ($_POST['sensor'] as $selected)
                {
                    $num_sensor =  $selected;
                    $num_disp = $_POST["dispositivo"];
                    $num_cant = $_POST["cantidad"];

					$url2 = 'https://tectuinnoweb.uc.r.appspot.com/api/detalle-dispositivo?d='.$num_disp.'&format=json&key=782999fb1d544627e8c1194fe6d8548a9166c266';	
                    $url = 'https://tectuinnoweb.uc.r.appspot.com/api/quiero-datos-ex?d='.$num_disp.'&s='.$num_sensor.'&key=782999fb1d544627e8c1194fe6d8548a9166c266&cant='.$num_cant;
						
                    $arreglo = json_decode(file_get_contents($url), true);
                    $arreglo2 = json_decode(file_get_contents($url2), true);

                    $nombre_disp = $arreglo2['nombre_disp'];
                    echo "<caption style='color: white;font-size:150%;'>".$nombre_disp."</caption>";

                    foreach($arreglo as $objeto)
                    { //Busca en cada objeto del arreglo (sensor)
                        $fecha = substr($objeto['timestamp'],0,10);
                        $hora = substr($objeto['timestamp'],11,8);
                        echo "<tr><th  scope='row'>".$objeto['nombre_sensor']."</th><td>".$objeto['dato']."</td><td>".$fecha." -- ".$hora."</td></tr>";
                    }
                }
                echo "</tbody></table></div><div class='col-sm-3'></div></div></div>
                <form method='POST'>
                <p><button id='btnExportar' class='btn btn-primary btn-lg'>Exportar a Excel</button></p>
                </form>";
            }
        }
    ?>
    
    <script>
        const $btnExportar = document.querySelector("#btnExportar"), $tabla = document.querySelector("#tabla");
        
        var hoy = new Date();
        var dd = String(hoy.getDate()).padStart(2, '0');
        var mm = String(hoy.getMonth() + 1).padStart(2, '0');
        var yyyy = hoy.getFullYear();
        
        hoy = dd + mm + yyyy;
        
        var disp = "<?php echo $num_disp ?>";
        
        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "tabla_D"+disp+"_"+hoy, //Nombre del archivo de Excel
                sheetname: "Datos del sensor", //Título de la hoja
            });
            let datos = tableExport.getExportData();
            let preferenciasDocumento = datos.tabla.xlsx;
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>




<script>(function(){
function ac_add_to_head(el){
	var head = document.getElementsByTagName('head')[0];
	head.insertBefore(el,head.firstChild);
}
function ac_add_link(url){
	var el = document.createElement('link');
	el.rel='stylesheet';el.type='text/css';el.media='all';el.href=url;
	ac_add_to_head(el);
}
function ac_add_style(css){
	var ac_style = document.createElement('style');
	if (ac_style.styleSheet) ac_style.styleSheet.cssText = css;
	else ac_style.appendChild(document.createTextNode(css));
	ac_add_to_head(ac_style);
}
ac_add_link('https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33');
ac_add_link('https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33');
ac_add_style(document.getElementById("ac_style_src-line-charts-line-chart-with-x-scale-continuous-mode").innerHTML);
ac_add_style(".anychart-embed-src-line-charts-line-chart-with-x-scale-continuous-mode{width:400px;height:750px;}");
})();</script>
<div id="container"></div>

<script>
anychart.onDocumentReady(function () {
    // create data set on our data
    var dataSet = anychart.data.set(getData());

    // map data for the first series, take x from the zero column and value from the first column of data set
    var seriesData_1 = dataSet.mapAs({'x': 0, 'value': 1});

    // map data for the second series, take x from the zero column and value from the second column of data set
    var seriesData_2 = dataSet.mapAs({'x': 0, 'value': 2});

    // map data for the third series, take x from the zero column and value from the third column of data set
    var seriesData_3 = dataSet.mapAs({'x': 0, 'value': 3});

       // map data for the third series, take x from the zero column and value from the third column of data set
       var seriesData_4 = dataSet.mapAs({'x': 0, 'value': 4});

         // map data for the third series, take x from the zero column and value from the third column of data set
         var seriesData_5 = dataSet.mapAs({'x': 0, 'value': 5});
         

    // create line chart
    var chart = anychart.line();

    // turn on chart animation
    chart.animation(true);

    // set chart padding
    chart.padding([10, 20, 5, 20]);

    // turn on the crosshair
    chart.crosshair()
            .enabled(true)
            .yLabel(false)
            .yStroke(null);

    // set tooltip mode to point
    chart.tooltip().positionMode('point');

    // set chart title text settings
    chart.title('Grafica de comportamiento Mexicoled');

    // set yAxis title
    chart.yAxis().title('Datos segun tipo de sensor');
    chart.xAxis().labels().padding(5);

    chart.xScale().mode('continuous');

    // create first series with mapped data
    var series_1 = chart.line(seriesData_1);
    series_1.name('sensor 1');
    series_1.hovered().markers()
            .enabled(true)
            .type('circle')
            .size(4);
    series_1.tooltip()
            .position('right')
            .anchor('left-center')
            .offsetX(5)
            .offsetY(5);

    // create second series with mapped data
    var series_2 = chart.line(seriesData_2);
    series_2.name('sensor 2');
    series_2.hovered().markers()
            .enabled(true)
            .type('circle')
            .size(4);
    series_2.tooltip()
            .position('right')
            .anchor('left-center')
            .offsetX(5)
            .offsetY(5);

    // create third series with mapped data
    var series_3 = chart.line(seriesData_3);
    series_3.name('sensor 3');
    series_3.hovered().markers()
            .enabled(true)
            .type('circle')
            .size(4);
    series_3.tooltip()
            .position('right')
            .anchor('left-center')
            .offsetX(5)
            .offsetY(5);

             // create third series with mapped data
    var series_4 = chart.line(seriesData_4);
    series_4.name('sensor 4');
    series_4.hovered().markers()
            .enabled(true)
            .type('circle')
            .size(4);
    series_4.tooltip()
            .position('right')
            .anchor('left-center')
            .offsetX(5)
            .offsetY(5);

                   // create third series with mapped data
    var series_5 = chart.line(seriesData_5);
    series_5.name('sensor 5');
    series_5.hovered().markers()
            .enabled(true)
            .type('circle')
            .size(4);
    series_5.tooltip()
            .position('right')
            .anchor('left-center')
            .offsetX(5)
            .offsetY(5);

    // turn the legend on
    chart.legend()
            .enabled(true)
            .fontSize(13)
            .padding([0, 0, 10, 0]);

    // set container id for the chart
    chart.container('container');
    // initiate chart drawing
    chart.draw();
});

function getData() {
    return [
        ['1986', 3.6, 2.3, 2.8, 11.5, 4.2],
        ['1987', 7.1, 4.0, 4.1, 14.1, 5.6],
        ['1988', 8.5, 6.2, 5.1, 17.5, 3.1],
        ['1989', 9.2, 11.8, 6.5, 18.9, 5.8],
        ['1990', 10.1, 13.0, 12.5, 20.8, 3.9],
        ['1991', 11.6, 13.9, 18.0, 22.9, 3.9],
        ['1992', 16.4, 18.0, 21.0, 25.2, 3.9],
        ['1993', 18.0, 23.3, 20.3, 27.0, 2.2],
        ['1994', 13.2, 24.7, 19.2, 26.5, 2.1],
        ['1995', 12.0, 18.0, 14.4, 25.3, 2.5],
        ['1996', 3.2, 15.1, 9.2, 23.4, 2.6],
        ['1997', 4.1, 11.3, 5.9, 19.5, 2.7],
        ['1998', 6.3, 14.2, 5.2, 17.8, 2.8],
        ['1999', 9.4, 13.7, 4.7, 16.2, 2.9],
        ['2000', 11.5, 9.9, 4.2, 15.4, 3.0],
        ['2001', 13.5, 12.1, 1.2, 14.0, 3.1],
        ['2002', 14.8, 13.5, 5.4, 12.5, 3.6],
        ['2003', 16.6, 15.1, 6.3, 10.8, 3.6],
        ['2004', 18.1, 17.9, 8.9, 8.9, 3.6],
        ['2005', 17.0, 18.9, 10.1, 8.0, 4.2],
        ['2006', 16.6, 20.3, 11.5, 6.2, 3.7],
        ['2007', 14.1, 20.7, 12.2, 5.1, 4.6],
        ['2008', 15.7, 21.6, 10, 3.7, 8.9],
        ['2009', 12.0, 22.5, 8.9, 1.5, 9.5]
    ]
}
</script>



<br>

<p><a href="pruebas.php" class="btn btn-primary btn-lg">ir a pruebas</a></p>

<p>
      <a href="prueba2.php
      " class="btn btn-primary btn-lg">ir a prueba2</a>
      </p>



</body>
</html>