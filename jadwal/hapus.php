<?php
    $data = mysqli_query($con,"DELETE FROM jadwal WHERE id_jadwal = '$_GET[id]'");
    if($data == TRUE)
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
?>