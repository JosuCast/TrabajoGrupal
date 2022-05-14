<?php
include_once 'crudAdmin2.php';
session_start();
if(!isset($_SESSION['admin_name'])){
    header('Location:index.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Productos</title>
    <link rel="icon" href="https://is3-ssl.mzstatic.com/image/thumb/Purple125/v4/af/c4/b6/afc4b64b-ed7d-c106-d744-6e67b7b58938/source/256x256bb.jpg">
    <link href="css/tablasAdmin.css?" rel="stylesheet" >
    <meta charset="utf-8"> 
</head>
<body>

        <p class="tit_rel">PRODUCTOS</p>

        <br>
        <div id="form">
            <div class="titulo">
            <h1 class="subi">Lista de Productos</h1>
            </div>
            <br><br>
        <table cellpadding="25" class="tabla" border="1">
                <tr class="tr">
                    <td class><b>ID</b></td>
                    <td class><b>Nombre</b></td>
                    <td class><b>Descripción</b></td>
                    <td class><b>País</b></td>
                    <td class><b>Flujo</b></td>
                    <td colspan=2><b>Acciones</b></td>
                </tr>
                <?php
                $res = $MySQLiconn->query("SELECT * FROM productos");
                while ($row=$res->fetch_array()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['nom_pais']; ?></td>
                    <td><?php echo $row['flujo']; ?></td>
                    <td><a href="?edit=<?php echo $row['id'];?>" onclick="return confirm('Confirmar edición')" id="editar">Editar</a></td>
                    <td><a href="?del=<?php echo $row['id'];?>" onclick="return confirm('Confirmar eliminación')" id="eliminar">Eliminar</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <br><br><br>
            <form method="post" class="nuevo">
            <h1 class="añadir">Añadir Producto</h1>
        <table width="100%" border="0" cellpadding="15px">
                    <tr>
                        <td>
                            <input type="text" name="nombre" placeholder="Producto" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['nombre'];?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <input type="text" name="descripcion" placeholder="Descripcion" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['descripcion'];?>"> 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="nom_pais" placeholder="País" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['nom_pais'];?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="flujo" placeholder="Flujo" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['flujo'];?>">

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <?php
                                if(isset($_GET['edit'])){
                                    ?>
                                        <button class="edicion" type="submit" name="update">Editar</button>
                                    <?php
                                }else{
                                    ?>
                                    <button class="guardar" type="submit" name="save"> Registrar</button>
                                    <?php
                                }

                            ?>
                        </td>
                    </tr>
                </table>
            </form>
            <br>
            <br>
        </div>
        <br><br><br><br><br><br><br>
</body>
</html>