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
<form action="insert.php" method="post">
    <label for="titel" class="titel">
    <input type="text" name="titel" placeholder="titel">
    </label>
    <br>
    <label for="genre" class="genre">
    <input type="text" name="genre" placeholder="genre">
    </label>
    <input type="submit">
</form>
</body>
</html>

<?php

include "../db/database.php";
global $db;

// Check if form values are set (after the form is submitted)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values
    $inputTitel = isset($_POST['titel']) ? $_POST['titel'] : '';  // Use null coalescing operator to prevent undefined index error
    $inputGenre = isset($_POST['genre']) ? $_POST['genre'] : '';  // Same for genre

    $stmt = $db->prepare('SELECT * FROM film WHERE titel = :titel');
//    $stmt = $db->prepare('SELECT film FROM filmclub WHERE inputTitel = :titel');
    $stmt->bindParam(':titel', $inputTitel);
    $stmt->execute();
//    $stmt = $db->prepare($stmt);
//    $result
//
//    if (!$result => 1){
//
//    }
    // Check if both fields are filled
    if (!empty($inputTitel) && !empty($inputGenre)) {
        // Prepare the SQL query with named placeholders
        $sqlConnection = "INSERT INTO film (titel, genre) VALUES (:inputTitel, :inputGenre)";

        $stmt = $db->prepare($sqlConnection);

        // Bind parameters to the placeholders
        $stmt->bindParam(':inputTitel', $inputTitel);
        $stmt->bindParam(':inputGenre', $inputGenre);

        // Execute the query
        if ($stmt->execute()) {
            echo "Data inserted successfully!";
        } else {
            echo "Error inserting data.";
        }
    } else {
        echo "Please dont use same name";
    }
} else {
        echo "Please fill in both fields";
}

?>

