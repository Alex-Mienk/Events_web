<?php

declare(strict_types=1);
function get_user(object $pdo, string $username) { //function to retrieve the username from the table if it exists
    $querry = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($querry); //prevents SQL injection
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


