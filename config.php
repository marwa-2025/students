<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online";

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname );

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// $x=1;
// $t=1.2;
// $d='15';
// $y="1.5";
// $e=[1 , 2 ,"ar",'sd', 1.5 ,"19"];