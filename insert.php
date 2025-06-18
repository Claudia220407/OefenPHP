<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
</head>
<body>
<form action="index.php" method="post">
    <label for="titel" class="titel">
    <input type="text" name="titel" placeholder="titel">
    </label>
    <br>
    label
    <input type="text" name="genre" placeholder="genre">
</form>
</body>
</html>

<?php
include "db/database.php";

$inputTitel = $_POST['titel'];
$inputGenre = $_POST['genre'];

$sql = "INSERT INTO film ($inputTitel, $inputGenre) VALUES (?,?,?)";
$stmt= $db->prepare($sql);
$stmt->execute([$inputTitel, $inputGenre]);