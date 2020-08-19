<?php
if(isset($_POST['simpan']))
{
    $id = $_POST['id_penjadwalan'];
    $jadwal = $_POST['jadwal'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    if($id == NULL)
    {
        $simpan = mysqli_query($con,"INSERT INTO penjadwalan VALUES ('','$jadwal','$tanggal','$jam')");
    }
    else
    {
        $simpan = mysqli_query($con,"UPDATE `penjadwalan` SET `id_jadwal`= '$jadwal',`tanggal`= '$tanggal',`jam`= '$jam' WHERE `id_penjadwalan`= '$id'");
    }

    if($simpan == TRUE)
    {
        echo"
            <script>
                alert('SUCCESS')
                window.location='?page=penjadwalan/index'
            </script>
        ";
    }else{
        echo"
            <script>
                alert('ERROR')
                window.location='?page=penjadwalan/index'
            </script>
        ";
    }
}

?>