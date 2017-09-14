<?php
$pdo = new PDO('mysql:host=127.0.0.1; dbname=database', 'username', 'password');

$stmt = $pdo->prepare('Select * from article_v');
$stmt ->execute();
$articles = $stmt->fetchAll();

foreach ($articles as $article) {
    echo $article['name'] . ' ' . $article['description'] . ' ' . $article['created_at']. ' [ <a href = "update.php?id='.$article['id']. '">update</a> | <a href = "delete.php?id='.$article['id']. '">delete</a> ] </br>';
}
?>
<a href="create.php">Create</a>
