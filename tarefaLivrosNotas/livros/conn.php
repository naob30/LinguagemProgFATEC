<?php
    $host ='localhost';
    $dbname = 'bdlivros';
    $username = 'root';
    $password = '';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
?>