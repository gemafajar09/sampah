<?php
session_start();
session_destroy();
echo "
<script>
    alert('Silahkan Kembali Lagi')
    window.location='login.php'
</script>
";