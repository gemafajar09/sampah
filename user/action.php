<?php
if(isset($_POST['simpan']))
{
    $id = $_POST['id_user'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($id == NULL)
    {
        $simpan = mysqli_query($con,"INSERT INTO user VALUES ('','$nama','$username','$password')");
    }
    else
    {
        $simpan = mysqli_query($con,"UPDATE `user` SET `nama`= '$nama',`username`= '$username',`password`= '$password' WHERE `id_user`= '$id'");
    }

    if($simpan == TRUE)
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
}

?>