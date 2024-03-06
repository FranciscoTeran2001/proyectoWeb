<?php
include("conexion.php");

// Verificar si se ha enviado el parámetro de filtro por nivel
if(isset($_GET['filter'])){
    $filter = mysqli_real_escape_string($con, $_GET['filter']);
    $sql = "SELECT * FROM materias WHERE nivel='$filter' ORDER BY id_materia ASC";
} else {
    $sql = "SELECT * FROM materias ORDER BY id_materia ASC";
}

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Materias</title>
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
            <h2>Lista de Materias</h2>
            <hr />

            <table class="table table-striped table-hover">
                <tr>
                    <th>ID Materia</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Nivel</th>
                    <th>Créditos</th>
                    <th>Descripción</th>
                    <th>Horario</th>
                    <th>Acciones</th>
                </tr>
                <?php
                if(mysqli_num_rows($result) == 0){
                    echo '<tr><td colspan="8">No hay datos.</td></tr>';
                }else{
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <tr>
                            <td>'.$row['id_materia'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$row['codigo'].'</td>
                            <td>'.$row['nivel'].'</td>
                            <td>'.$row['creditos'].'</td>
                            <td>'.$row['descripcion'].'</td>
                            <td>'.$row['horario'].'</td>
                            <td>
                                <a href="edit.php?nik='.$row['id_materia'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <a href="index.php?aksi=delete&nik='.$row['id_materia'].'" title="Eliminar" onclick="return confirm(\'¿Estás seguro de borrar los datos de la materia '.$row['nombre'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
