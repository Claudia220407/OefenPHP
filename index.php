<!doctype html>
<html lang="\">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <a href="/insert.php">Go to Insert</a> <br><br>
</body>
</html>

<?php
include "db/database.php";

try {

    $db = new PDO(
        "mysql:host=localhost;dbname=filmclub",
        "root",
        "");

} catch (PDOException $exception) {
    die('Error! ' . $exception->getMessage());
}

$query = $db->prepare("SELECT * FROM film ");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$result = $db->query("SELECT id, titel from film");
while ($results = $result->fetch()) {
    echo $results['id'];
    echo $results['titel'] . '<br>';
}
?>