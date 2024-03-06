<?php
include("conexion.php");

$sql = "SELECT * FROM aulas ORDER BY id_aula ASC";

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Aulas</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style_nav.css" rel="stylesheet">
    <style>
        .content {
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include('nav.php');?>
    </nav>
    <div class="container">
        <div class="content">
            <h2>Lista de Aulas</h2>
            <hr />

            <table class="table table-striped table-hover">
                <tr>
                    <th>ID Aula</th>
                    <th>Nombre</th>
                    <th>Capacidad</th>
                    <th>Novedades</th>
                    <th>Acciones</th>
                </tr>
                <?php
                if(mysqli_num_rows($result) == 0){
                    echo '<tr><td colspan="5">No hay datos.</td></tr>';
                }else{
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <tr>
                            <td>'.$row['id_aula'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$row['capacidad'].'</td>
                            <td>'.$row['novedades'].'</td>
                            <td>
                                <a href="edit.php?nik='.$row['id_aula'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <a href="index.php?aksi=delete&nik='.$row['id_aula'].'" title="Eliminar" onclick="return confirm(\'¿Estás seguro de borrar los datos del aula '.$row['nombre'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
                }
                ?>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
