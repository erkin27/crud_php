<?php
$timestamp = date('Y-m-d H:i:s', time());

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])){
    $pdo = new PDO('mysql:host=127.0.0.1; dbname=database', 'username', 'password');
    $stmt = $pdo->prepare("Insert into article_v (name, description, created_at) VALUES (:name, :description, :created_at)");
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':description', $_POST['description']);
    $stmt->bindValue(':created_at', $_POST['created_at']);
    $stmt->execute();

    header('Location: index.php');
}
?>
<form method="post">
    <input type = 'text' required name="name" placeholder="name"></br>
    <input type = 'text' required name="description" placeholder="description"></br>
    <input type = 'text' name="created_at" value="<?php echo $timestamp?>"></br>
    <input type="submit">
</form>
