<?php
include("conexion.php");

if(isset($_POST['add'])){
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $capacidad = mysqli_real_escape_string($conn, $_POST["capacidad"]);
    $novedades = mysqli_real_escape_string($conn, $_POST["novedades"]);
    
    $insert = mysqli_query($conn, "INSERT INTO aulas(nombre, capacidad, novedades)
                    VALUES('$nombre', '$capacidad', '$novedades')");

    if($insert){
        echo '<br><br><br><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>¡El aula se ha agregado correctamente!</div>';
    }else{
        echo '<br><br><br><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo agregar el aula.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Registro de Aula</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="../css/style_nav.css" rel="stylesheet">
    <style>
        .content {
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include("nav.php");?>
    </nav>
    <div class="container">
        <div class="content">
            <h2>Datos del aula &raquo; Agregar datos</h2>
            <hr />

            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Capacidad</label>
                    <div class="col-sm-4">
                        <input type="number" name="capacidad" class="form-control" placeholder="Capacidad" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Novedades</label>
                    <div class="col-sm-4">
                        <textarea name="novedades" class="form-control" placeholder="Novedades" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script>
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
        })
    </script>
</body>
</html>
