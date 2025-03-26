<?php

declare(strict_types=1);

function is_input_empty(string $username,string $pwd,string $email) {       //checking whether all fields are empty or not
    if (empty($username) || empty($pwd) || empty($email))  {
        return true;
    }
    else {
        return false;
    }
}

function is_email_invalid(string $email) {      //checking the type for email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username) {     //checking if username is free or not
    if (get_username($pdo, $username))  {
        return true;
    } else {
        return false;
    }
}


function is_email_registered(object $pdo, string $email) {      //checking whether email already in database
    if (get_email($pdo, $email))  {
        return true;
    } else {
        return false;
    }
}


function create_user(object $pdo, string $pwd, string $username, string $email) {
    set_user($pdo, $pwd, $username, $email);    // Setting up data for user
}