<?php
include("db_connection.php");
$conn = connect();

$id_user = $_POST['id'];
$user_name = $_POST['nombre'];
$user_last_name = $_POST['apellido-p'];
$user_sec_last_name = $_POST['apellido-m'];
$user_group = $_POST['group'];
$user_email = $_POST['email'];
$user_comment = $_POST['comments'];
$user_password = $_POST['password'];

$sql="INSERT INTO users VALUES('$id_user','$user_name',
    '$user_last_name','$user_sec_last_name',
    '$user_group','$user_email',
    '$user_comment','$user_password')";
$query = mysqli_query($conn, $sql);
if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
Header("Location: ../forms.php");
?>