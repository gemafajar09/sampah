<?php
include "../koneksi.php";
$id = $_POST['id_penjadwalan'];
$data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM penjadwalan WHERE id_penjadwalan = '$id'"));
echo json_encode($data);