<?php
include_once 'db.php';

if(isset($_POST['save']))
{

    $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
    $fecha = $MySQLiconn->real_escape_string($_POST['fecha']);
    $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);


    $SQL = $MySQLiconn->query("INSERT INTO relaciones(nombre,fecha,descripcion) VALUES('$nombre','$fecha','$descripcion')");
    header("Location: relacionesAdmin.php");
    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM relaciones WHERE id=".$_GET['del']);
    header("Location: relacionesAdmin.php");
}

if(isset($_GET['edit']))
{   
    $SQL = $MySQLiconn->query("SELECT * FROM relaciones WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}
if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE relaciones SET nombre='".$_POST['nombre']."',fecha='".$_POST['fecha']."',descripcion='".$_POST['descripcion']."'WHERE id=".$_GET['edit']);
    header("Location: relacionesAdmin.php");
}
?>