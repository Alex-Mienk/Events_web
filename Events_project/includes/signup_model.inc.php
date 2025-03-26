<?php

declare(strict_types=1);


function get_username(object $pdo, string $username) 
{
    $querry = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($querry); //prevents SQL injection
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) 
{
    $querry = "SELECT username FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($querry); //prevents SQL injection
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}



function set_user(object $pdo, string $pwd, string $username, string $email) {
    $querry = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
    $stmt = $pdo->prepare($querry); //prevents SQL injection

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}