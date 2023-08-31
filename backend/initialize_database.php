<?php
$host = "localhost";
$username = "";
$password = "";
$port = 3350;

try {
    $db = new PDO("mysql:host=$host;port=$port", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec("CREATE DATABASE IF NOT EXISTS comments_app");
    $db->exec("USE comments_app");

    $db->exec("
        CREATE TABLE IF NOT EXISTS comments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            text TEXT NOT NULL,
            time DATETIME NOT NULL
        )
    ");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>