<?php
include('phpres/db_connection.php');
$conn = connect();

$sql = "SELECT id_user, user_name, user_last_name,
            user_sec_last_name, user_group, user_email,
            user_comment FROM users";
$query = mysqli_query($conn, $sql);
if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 form">
                <h1>Register</h1>
                <form action="phpres/db_register.php" method="post">
                    <div class="form-floating mb-2">
                        <input required class="form-control" type="text" name="id" id="id" placeholder="Matricula">
                        <label for="id">Matricula</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input required class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input required class="form-control" type="text" name="apellido-p" id="apellido-p" placeholder="Apellido paterno">
                        <label for="apellido-p">Apellido Paterno</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input required class="form-control" type="text" name="apellido-m" id="apellido-m" placeholder="Apellido materno">
                        <label for="apellido-m">Apellido Materno</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input required class="form-control" type="text" name="group" id="group" placeholder="Grupo">
                        <label for="group">Grupo</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input required class="form-control" type="email" name="email" id="email" placeholder="email@ejemlo.com">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea class="form-control" name="comments" id="comments" cols="30" rows="1" placeholder="repampanos"></textarea>
                        <label for="comments">Comentarios</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input required class="form-control" type="password" name="password" id="password" placeholder="Contraseña">
                        <label for="password">Contraseña</label>
                    </div>
                    <input type="submit" value="Register" class="btn btn-dark">
                </form>
            </div>
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Comentarios</th>
                            <th scope="col" colspan="2">
                            <form action="phpres/db_search.php" method="POST">
                                <div class="form-floating mb-2">
                                    <input required class="form-control" type="text" name="id" id="id" placeholder="Matricula">
                                    <label for="id">Matricula</label>
                                </div>
                                <input type="submit" value="Buscar" class="btn btn-dark">
</form>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="user_table">
                        <?php
                        do {
                            echo "<tr>";
                            echo "<th scope='row'>" . $row['id_user'] . "</th>";
                            echo "<td>" . $row['user_name'] . "</td>";
                            echo "<td>" . $row['user_last_name'] . "</td>";
                            echo "<td>" . $row['user_sec_last_name'] . "</td>";
                            echo "<td>" . $row['user_group'] . "</td>";
                            echo "<td>" . $row['user_email'] . "</td>";
                            echo "<td>" . $row['user_comment'] . "</td>";
                            echo "<td><a href='phpres/db_update.php?id=" . $row['id_user'] . "' class='btn btn-primary'>Editar</a></td>";
                            echo "<td><a href='phpres/db_delete.php?id=" . $row['id_user'] . "' class='btn btn-danger'>Borrar</a></td>";
                            echo "</tr>";
                        } while ($row = mysqli_fetch_array($query));
                        ?>
                    </tbody>
            </div>
        </div>
    </div>

</body>

</html>