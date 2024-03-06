<?php
include("conexion.php");

if(isset($_POST['add'])){
    // Escapar y limpiar los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
    $nivel = mysqli_real_escape_string($conn, $_POST['nivel']);
    $creditos = mysqli_real_escape_string($conn, $_POST['creditos']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $horario = mysqli_real_escape_string($conn, $_POST['horario']);

    // Insertar los datos en la tabla materias
    $insert = mysqli_query($conn, "INSERT INTO materias (nombre, codigo, nivel, creditos, descripcion, horario) 
                                  VALUES ('$nombre', '$codigo', '$nivel', '$creditos', '$descripcion', '$horario')");

    if($insert){
        echo '<br><br><br><div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                ¡Datos guardados correctamente!
              </div>';
    } else{
        echo '<br><br><br><div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Error al guardar los datos.
              </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Materia</title>
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
            <h2>Datos de materias &raquo; Agregar Materia</h2>
            <hr />

            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-6">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre de la materia" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Código</label>
                    <div class="col-sm-6">
                        <input type="text" name="codigo" class="form-control" placeholder="Código de la materia">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nivel</label>
                    <div class="col-sm-6">
                        <select name="nivel" class="form-control" required>
                            <option value="pregrado">Pregrado</option>
                            <option value="posgrado">Posgrado</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Créditos</label>
                    <div class="col-sm-6">
                        <input type="number" name="creditos" class="form-control" placeholder="Número de créditos">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Descripción</label>
                    <div class="col-sm-6">
                        <textarea name="descripcion" class="form-control" placeholder="Descripción de la materia"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Horario</label>
                    <div class="col-sm-6">
                        <input type="text" name="horario" class="form-control" placeholder="Horario de la materia">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar materia">
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
