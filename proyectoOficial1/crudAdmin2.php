<?php
include_once 'db.php';

if(isset($_POST['save']))
{

    $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
    $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
    $nom_pais = $MySQLiconn->real_escape_string($_POST['nom_pais']);
    $flujo = $MySQLiconn->real_escape_string($_POST['flujo']);


    $SQL = $MySQLiconn->query("INSERT INTO productos(nombre,descripcion,nom_pais,flujo) VALUES('$nombre','$descripcion','$nom_pais','$flujo')");
    header("Location: productosAdmin.php");
    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM productos WHERE id=".$_GET['del']);
    header("Location: productosAdmin.php");
}

if(isset($_GET['edit']))
{   
    $SQL = $MySQLiconn->query("SELECT * FROM productos WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}
if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE productos SET nombre='".$_POST['nombre']."',descripcion='".$_POST['descripcion']."',nom_pais='".$_POST['nom_pais']."',flujo='".$_POST['flujo']."'WHERE id=".$_GET['edit']);
    header("Location: productosAdmin.php");
}
?>