<?php
    $data = mysqli_query($con,"DELETE FROM penjadwalan WHERE id_penjadwalan = '$_GET[id]'");
    if($data == TRUE)
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
?>