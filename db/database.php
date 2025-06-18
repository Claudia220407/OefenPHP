<?php

try {

$db = new PDO(
"mysql:host=localhost;dbname=filmclub",
"root",
"");

} catch (PDOException $exception) {
die('Error! ' . $exception->getMessage());
}

?>