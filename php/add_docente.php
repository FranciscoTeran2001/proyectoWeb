<?php
include("conexion.php");

if(isset($_POST['add'])){
    $nombres = mysqli_real_escape_string($conn, $_POST["nombres"]);
    $apellidos = mysqli_real_escape_string($conn, $_POST["apellidos"]);
    $cedula_docente = mysqli_real_escape_string($conn, $_POST["cedula_docente"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $telefono = mysqli_real_escape_string($conn, $_POST["telefono"]);
    $area_especializacion = mysqli_real_escape_string($conn, $_POST["area_especializacion"]);
    $disponibilidad_horaria = mysqli_real_escape_string($conn, $_POST["disponibilidad_horaria"]);
    $horas_clases = mysqli_real_escape_string($conn, $_POST["horas_clases"]);
    
    $insert = mysqli_query($conn, "INSERT INTO docentes(nombres, apellidos, cedula_docente, email, telefono, area_especializacion, disponibilidad_horaria, horas_clases)
                    VALUES('$nombres', '$apellidos', '$cedula_docente', '$email', '$telefono', '$area_especializacion', '$disponibilidad_horaria', '$horas_clases')");

    if($insert){
        echo '<br><br><br><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>¡Los datos del docente se han guardado con éxito!</div>';
    }else{
        echo '<br><br><br><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron guardar los datos del docente.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Registro de Docente</title>
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
            <h2>Datos del docente &raquo; Agregar datos</h2>
            <hr />

            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Apellidos</label>
                    <div class="col-sm-4">
                        <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Cédula de Identidad</label>
                    <div class="col-sm-4">
                        <input type="text" name="cedula_docente" class="form-control" placeholder="Cédula de Identidad" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Correo Electrónico</label>
                    <div class="col-sm-4">
                        <input type="email" name="email" class="form-control" placeholder="Correo Electrónico">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Teléfono</label>
                    <div class="col-sm-4">
                        <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Área de Especialización</label>
                    <div class="col-sm-4">
                        <input type="text" name="area_especializacion" class="form-control" placeholder="Área de Especialización">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Disponibilidad Horaria</label>
                    <div class="col-sm-4">
                        <textarea name="disponibilidad_horaria" class="form-control" placeholder="Disponibilidad Horaria"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Horas de Clases</label>
                    <div class="col-sm-4">
                        <input type="text" name="horas_clases" class="form-control" placeholder="Horas de Clases">
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
