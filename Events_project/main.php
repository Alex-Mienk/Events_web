<?php

declare(strict_types=1);
        
require_once 'includes/dbh.inc.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>

    <!-- css is here so that the style here is unique and can be easily modified in the same file -->
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #7395AE;
        }
        .container {
            margin: auto;
            padding: 20px;
        }
        .event-card {
            border: 5px solid #ccc;
            border-radius: 25px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f8f8f8;
        }
        .event-title {
            font-size: 24px;
            margin-bottom: 10px;
            
        }
        .event-date {
            font-size: 18px;
            margin-bottom: 10px;
            color: red;
        }
        .event-description {
            font-size: 16px;
            margin-bottom: 10px;
        
        }
        button {
            padding: 10px 15px;
            background-color: #b1a296;
            height: 6%;
            width: 40%;
            color: white;
            border: 2px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 10px;
            position: absolute;
            right: 8%;
            width: 10%;
        }
        div {
            align-items: center;
            text-align: center;

        }
        h1 {
            color:white;
        }
    </style>
</head>
<body>
    <div>
        <!-- button to add new event. Transfers the user to signup/login page -->
                
        <a href="index.php"><button>Account</button></a>
        <?php
        if (isset($_SESSION["user_id"])) {
            echo "<a href='add_event.php'><button>Add event</button></a>";
        }
        ?>
            
    </div>
        <h1>Welcome to Club Hub!</h1>
        <?php 

        
        try {
            // getting all the events from the table
            $query = "SELECT * FROM events_1try WHERE date > CURDATE() ORDER BY date ASC";
            
            $stmt = $pdo->prepare($query);
            $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { //while there is another event to display
                 ?>

                    <div>
                <!-- displaying the events that were fetched from the table -->
                    <div class="event-card">
                        <div class="event-title">Title: <?php echo $row['name']?></div>
                        <div class="event-date">Date: <?php echo $row['date']?></div>
                        <div><b>Location:</b> <?php echo $row['location']?></div>
                        <div class="event-description" style="padding-top: 20px;"><b>Description:</b> <?php echo $row['description']?></div>
                    </div><?php
                }
            } catch (PDOException $e) {
                die("Querry failed: " . $e->getMessage()); //in case of error, it is displayed
            }
        
        
        ?>
    </div>

        <div>
            <form action = "includes/main_comment.inc.php" method = "post">
                <textarea name = "comment" rows="3" placeholder="Here you can provide us with the feedback"></textarea>
                <button>Submit</button>
            </form>
            
        </div>
        
    
</body>

<br></br>
<br></br>
<br>
<p>&copy; This page was created by an IB student for Internal Assessment project, 2024</p>
</br>
<br></br>

</html>
