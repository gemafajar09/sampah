<?php
if(isset($_POST['simpan']))
{
    $id = $_POST['id_penjadwalan'];
    $ya = $_POST['ya'];
    $tanggal = date('Y-m-d');

    mysqli_query($con,"UPDATE penjadwalan SET status = '$ya' WHERE id_penjadwalan = '$id'");
    $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM penjadwalan a LEFT JOIN jadwal b ON a.id_jadwal=b.id_jadwal WHERE id_penjadwalan = '$id'"));
    $simpan = mysqli_query($con,"INSERT INTO `pengangkutan` VALUES ('','$data[tanggal]','$data[jam]','$data[wilayah]','$data[jadwal]','$tanggal','$ya')");
    if($simpan == TRUE)
    {
        echo"
            <script>
                alert('SUCCESS')
                window.location='?page=pengangkutan/index'
            </script>
        ";
    }else{
        echo"
            <script>
                alert('ERROR')
                window.location='?page=pengangkutan/index'
            </script>
        ";
    }
}

?>