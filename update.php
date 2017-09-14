<?php
$timestamp = date('Y-m-d H:i:s', time());
$pdo = new PDO('mysql:host=127.0.0.1; dbname=database', 'username', 'password');

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])){
    $stmt = $pdo->prepare("Update article_v Set name = :name, description = :description, created_at = :created_at Where id = :id");
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':description', $_POST['description']);
    $stmt->bindValue(':created_at', $_POST['created_at']);
    $stmt->execute();
//var_dump($stmt->errorInfo());exit();
    header('Location: index.php');
}
?>
<?php
if(isset($_GET['id'])) {
    $stmt = $pdo->prepare('Select * from article_v where id = :id');
    $stmt->bindValue('id', $_GET['id']);
    $stmt->execute();
    $article = $stmt->fetch();
}
?>
<form method="post">
    <input hidden type="text" name="id" value="<?=$article['id']?>">
    <input type = 'text' required name="name" placeholder="name" value="<?=$article['name']?>"></br>
    <input type = 'text' required name="description" placeholder="description" value="<?=$article['description']?>"></br>
    <input type = 'text' name="created_at" value="<?php echo $timestamp?>"></br>
    <input type="submit">
</form>
