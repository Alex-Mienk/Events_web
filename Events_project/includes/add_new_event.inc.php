<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] === "POST") { //if the user tries to access the page by changing the URL, the program will send the person back to the page.

    $event_name = $_POST["event_name"];
    $event_date = $_POST["event_date"];
    $event_location = $_POST["event_location"];
    $event_description = $_POST["event_description"];

    

    try {
        require_once 'dbh.inc.php';

        //inserting the event into the database
        $query = "INSERT INTO events_1try (name, date, location, description) VALUES (:name_event, :date_event, :location_event, :description_event);";

        $stmt = $pdo->prepare($query);

        
        //this step is needed so that if someone tries to input an SQL querry in the page, it will not be executed
        //safety measure to prevent destruction of the table
        $stmt -> bindParam(':name_event', $event_name);
        $stmt -> bindParam(':date_event', $event_date);
        $stmt -> bindParam(':location_event', $event_location);
        $stmt -> bindParam(':description_event', $event_description);


        $stmt -> execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../main.php"); //transfering back to the main page

        die();

    } catch (PDOException $e) { //if the date was not inputted the creation of the event will not happen
        header("Location: ../add_event.php");
        
        die();
    }
} else {
    header("Location: ../add_event.php"); //so that the page is accessed only the right way, not by changing the URL
    die();
}
