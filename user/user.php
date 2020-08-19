<?php
include "../koneksi.php";
$id = $_POST['id_user'];
$data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user WHERE id_user = '$id'"));
echo json_encode($data);