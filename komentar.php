<?php
include "koneksi.php";
if(isset($_POST['kirim']))
{
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];
    $tanggal = date('Y-m-d');

    $simpan = mysqli_query($con,"INSERT INTO `pengaduan` VALUES ('','$email','$nama','$komentar','$tanggal')");
    if($simpan == TRUE)
    {
        echo"
            <script>
                alert('SUCCESS')
                window.location='index.php'
            </script>
        ";
    }else{
        echo"
            <script>
                alert('ERROR')
                window.location='index.php'
            </script>
        ";
    }

}