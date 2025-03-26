<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] === "POST") { //if the user tries to access the page by changing the URL, the program will send the person back to the page.

    $comment = $_POST["comment"];

    try {
        require_once 'dbh.inc.php';

        //inserting the event into the database
        $query = "INSERT INTO comments (user_comment) VALUES (:comnt);";

        $stmt = $pdo->prepare($query);

        
        //this step is needed so that if someone tries to input an SQL querry in the page, it will not be executed
        //safety measure to prevent destruction of the table
        $stmt -> bindParam(':comnt', $comment);


        $stmt -> execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../main.php"); //transfering back to the main page

        die();

    } catch (PDOException $e) { //if the date was not inputted the creation of the event will not happen
        header("Location: ../main.php");
        
        die();
    }
} else {
    header("Location: ../main.php"); //so that the page is accessed only the right way, not by changing the URL
    die();
}