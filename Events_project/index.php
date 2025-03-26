<?php       //main login/signup page php + html

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-A-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width = device-width">
    <link rel="stylesheet" href = css/main.css>
    <title>Document</title>
</head>

<body>

    <div class = "log_state">
        <h2>
            <?php
            output_username();      // output the log in state on the website
            ?>
        </h2>
    </div>

    <!-- the form is visible only if the user is not logged in. Otherwise there's no need for login -->
    <div class = "forms">
        <?php
        if (!isset($_SESSION["user_id"])) { ?>
            <!-- login form html -->
            <h2>Login</h2>    

            <form action = "includes/login.inc.php" method = post> 
                <input type = "text" name = "username" placeholder="Username">
                <input type = "password" name = "pwd" placeholder="Password">
                <input type = "text" name = "organizer_ID" placeholder = "Organizer pass code">
                <button>Login</button>
            </form>

            <div class = "forms">
    <!-- signup form html + php -->
        <h2>Signup</h2>

        <form action = "includes/signup.inc.php" method = post> 
            <?php 
            signup_inputs();
            ?>
            <button>Signup</button>
        </form>
    </div>
        <?php } else{
            echo "<a href='add_event.php'><button>Add event here</button></a>";} ?> 
            <!-- if the user is logged in, the button to add event page appears -->

    </div>
        

    <!-- error messages will be displayed here -->
    <div class ="form_errors"> 
        <?php
        check_login_errors();
        ?>
    </div>


    
<!-- this section displays any errors that occurred during signup -->
    <div class = "form_errors">
        <?php
        check_signup_errors();
        ?>

    </div>

    <!-- Log out button -->
    <div class = "forms">  
        <form action = "includes/logout.inc.php" method = post> 
                <button class = "logout">Logout</button>
            </form>

    </div>
    <!-- button to go to the main page -->
    <div>
        <a href="main.php"><button>Go to main page!</button></a>
    </div>


</body>

</html>