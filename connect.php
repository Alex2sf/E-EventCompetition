<?php
// $db_host = 'localhost:8111';
// $db_user = 'root';
// $port = 3306;
// $db_pass = '';
// $db_name = 'event'; 

// $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name , $port);

// if (!$conn) {
//     die('Gagal terhubung MySQl :' . mysqli_connect_error());
// }else
// {
// }

//Default port 8080
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    // nama database
    $dbname = 'event';
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn){
        die('Gagal terhubung dengan database MySQL :' .mysqli_connect_error());
        echo("gagal");
    }

?>