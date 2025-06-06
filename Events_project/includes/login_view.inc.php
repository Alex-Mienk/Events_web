<?php

declare(strict_types=1);

function output_username() {
    if (isset($_SESSION["user_id"])) {
        echo "<div>You are logged in as </div>" . $_SESSION["user_username"];
    } else {
        echo "<div>You are not logged in</div>";
    }
}

function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION["errors_login"]);
    }
    else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo '<br>';
        echo '<p>Login success!</p>';
    }
}