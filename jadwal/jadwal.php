<?php
include "../koneksi.php";
$id = $_POST['id_jadwal'];
$data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM jadwal WHERE id_jadwal = '$id'"));
echo json_encode($data);