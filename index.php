<?php
require_once 'connec.php';
$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);


$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$query = "INSERT INTO friend (firstname, lastname) VALUES ('$firstname', '$lastname')";
$statement = $pdo->prepare($query);

$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
$statement->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Friends quest PDO</title>
</head>
<body>
<?php
foreach($friends as $friend) {
    echo $friend['firstname'] . ' ' . $friend['lastname'] . PHP_EOL . '<br>';
}
?>
<p>Add a new Friend :</p>
<form action="index.php" method="post">
    <div>
      <label for="firstname">Firstname :</label>
      <input type="text" id="firstname" name="firstname">
    </div>
    <div>
      <label for="lastname">Lastname :</label>
      <input type="text" id="lastname" name="lastname">
    </div>
    <div><input type="submit" value="OK">Submit</div>
</form>
</body>
</html>
