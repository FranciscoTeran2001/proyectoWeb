<link rel="stylesheet" href="css/login.css">
<div class="cajafuera">
<div class="pagprincipal">
	
<?php
include('conexion.php');
session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
	echo "<br><br><h1>Bienvenido: $usuarioingresado </h1>";
}
else
{
	header('location: ../index.html');
}
?>

<form method="POST">
<tr><td colspan='2' align="center"><input type="submit" value="Cerrar sesión" name="btncerrar" /></td></tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: ../index.html');
}
	
?>

</div>

</div>

<?php
include("conexion.php");

// Verificar si se ha enviado el parámetro de filtro por estado
if(isset($_GET['filter'])){
    $filter = mysqli_real_escape_string($con, $_GET['filter']);
    $sql = "SELECT * FROM docentes WHERE estado='$filter' ORDER BY id_docente ASC";
} else {
    $sql = "SELECT * FROM docentes ORDER BY id_docente ASC";
}

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Docentes</title>
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
            <h2>Lista de docentes</h2>
            <hr />

            <table class="table table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Cédula de Identidad</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Área de Especialización</th>
                    <th>Disponibilidad Horaria</th>
                    <th>Horas de Clases</th>
                    <th>Acciones</th>
                </tr>
                <?php
                if(mysqli_num_rows($result) == 0){
                    echo '<tr><td colspan="10">No hay datos.</td></tr>';
                }else{
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$row['nombres'].'</td>
                            <td>'.$row['apellidos'].'</td>
                            <td>'.$row['cedula_docente'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['telefono'].'</td>
                            <td>'.$row['area_especializacion'].'</td>
                            <td>'.$row['disponibilidad_horaria'].'</td>
                            <td>'.$row['horas_clases'].'</td>
                            <td>
                                <a href="edit.php?nik='.$row['id_docente'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <a href="index.php?aksi=delete&nik='.$row['id_docente'].'" title="Eliminar" onclick="return confirm(\'¿Estás seguro de borrar los datos de '.$row['nombres'].' '.$row['apellidos'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
