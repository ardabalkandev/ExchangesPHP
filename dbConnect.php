<?php
try {
    $dbConnect = new PDO('YOUR_DB_HOST', 'DB_USERNAME', 'DB_PASSWORD');
    $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbConnect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbConnect->exec("SET CHARACTER SET utf8");
    $dbConnect->exec("SET NAMES utf8");
} catch (PDOException $e){
    echo "Connection Error : " . $e->getMessage();
}
