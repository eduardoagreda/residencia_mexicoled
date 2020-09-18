<?php
include 'Conexion.php';


class datosJson extends Conexion
{
    protected static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    /**
     * Metodo que sirve para guardar datos json
     *
     * @param      object         
     * @return     boolean
     */
    
     $id_datos       = $_POST['id_datos'];
     $nombre_datos   = $_POST['nombre_datos'];
     $fecha_datos    = $_POST['fecha_datos'];

     $insertar ="INSERT INTO datosJson VALUES ('$id_datos',
     '$nombre_datos','$fecha_datos')";

     $query = mysql_query($conectar, $insertar);

     if($query){
         echo "<script> alert('correcto'); </script>";
     }else{
         echo "<script> alert('incorrecto'); </script>";
     }