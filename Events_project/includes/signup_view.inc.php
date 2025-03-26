<?php

declare(strict_types=1);

function signup_inputs () {      //php for signup input from login/signup page


    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) { // if username isnt taken, leave the data inputted for user's conveniece
        echo '<input class="login_input" type = "text" name = "username" placeholder="Username" value= "' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input class="login_input" type="text" name ="username" placeholder="Username">'; // the username is taken, so the data should be reset
    }


    echo '<input class="login_input" type="password" name="pwd" placeholder="Password">'; // password isn't saved on the page for safety measures


    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {// save eamil if no errors
        echo '<input class="login_input" type = "text" name = "email" placeholder="E-mail" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input class="login_input" type = "text" name = "email" placeholder="E-mail">'; // if there was an error, email is reset
    }


}

function check_signup_errors() {        //check for errors function
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) { // $errors is an array containing the error messages
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);

    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") { // if all date inputted correctly, success message
        
        echo '<br>';
        echo '<p>Signup success!</p>';
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
}