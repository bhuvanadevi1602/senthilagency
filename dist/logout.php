<?php
session_start();
session_destroy();
echo "<script>window.location.href='login-2.php'</script>";
?>