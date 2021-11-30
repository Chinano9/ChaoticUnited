<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Search</title>
</head>

<body>
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
            </tr>
        </thead>
        <tbody>
            <?php
            include('db_connection.php');
            $conn = connect();
            $sql = "SELECT id_user, user_name, user_last_name,
                user_sec_last_name, user_group, user_email,
                user_comment FROM users WHERE id_user = '$_POST[id]'";
            $query = mysqli_query($conn, $sql);
            if (!$query) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            $row = mysqli_fetch_array($query);
            echo "<tr>";
            echo "<td>" . $row['id_user'] . "</td>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['user_last_name'] . "</td>";
            echo "<td>" . $row['user_sec_last_name'] . "</td>";
            echo "<td>" . $row['user_group'] . "</td>";
            echo "<td>" . $row['user_email'] . "</td>";
            echo "<td>" . $row['user_comment'] . "</td>";
            echo "<td><a href='db_update.php?id=" . $row['id_user'] . "' class='btn btn-primary'>Actualizar</a></td>";
            echo "<td><a href='db_delete.php?id=" . $row['id_user'] . "' class='btn btn-danger'>Eliminar</a></td>";
            echo "</tr>";
            ?>
        </tbody>
    </table>
</body>

</html>