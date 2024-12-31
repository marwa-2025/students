<?php
include('config.php');
if(isset($_GET['id'])){

    $sql = sprintf("DELETE FROM products WHERE id=%d",$_GET['id']);

    mysqli_query($conn, $sql);
    
    mysqli_close($conn);
    

}
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'add.php';
header("Location: http://$host$uri/$extra");
exit;
?>