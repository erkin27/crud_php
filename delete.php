<?php
if($_GET['id']){
    $pdo = new PDO('mysql:host=127.0.0.1; dbname=database', 'username', 'password');

    $stmt = $pdo->prepare("DELETE FROM article_v where id = :id");
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
}
header('Location: index.php');