<?php 
// PDO connect
function connect() {
    return new PDO('mysql:host=localhost;dbname=health', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
$pdo = connect();

?>