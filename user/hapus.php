<?php
    $data = mysqli_query($con,"DELETE FROM user WHERE id_user = '$_GET[id]'");
    if($data == TRUE)
    {
        echo"
            <script>
                alert('SUCCESS')
                window.location='?page=user/index'
            </script>
        ";
    }else{
        echo"
            <script>
                alert('ERROR')
                window.location='?page=user/index'
            </script>
        ";
    }
?>