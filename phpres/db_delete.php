<?php
include('db_connection.php');
$conn = connect();

$id_user = $_GET['id'];

$sql = "DELETE FROM users WHERE id_user='$id_user'";
$query = mysqli_query($conn, $sql);
if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
Header("Location: ../forms.php");
?>