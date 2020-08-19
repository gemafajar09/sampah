<?php
if(isset($_POST['simpan']))
{
    $id = $_POST['id_jadwal'];
    $jadwal = $_POST['jadwal'];
    $wilayah = $_POST['wilayah'];
    if($id == NULL)
    {
        $simpan = mysqli_query($con,"INSERT INTO jadwal VALUES ('','$wilayah','$jadwal')");
    }
    else
    {
        $simpan = mysqli_query($con,"UPDATE `jadwal` SET `wilayah`= '$wilayah',`jadwal`= '$jadwal' WHERE `id_jadwal`= '$id'");
    }

    if($simpan == TRUE)
    {
        echo"
            <script>
                alert('SUCCESS')
                window.location='?page=jadwal/index'
            </script>
        ";
    }else{
        echo"
            <script>
                alert('ERROR')
                window.location='?page=jadwal/index'
            </script>
        ";
    }
}

?>