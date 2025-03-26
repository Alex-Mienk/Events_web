<?php

use Random\Engine\Secure;

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);


session_set_cookie_params([
    'lifetime' => 1800, //time in seconds
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,
]);

session_start();

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_loggedin();
    }else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interval) {
            regenerate_session_id_loggedin();  // Regeneration of session ID so that it is less accessible and less prone to cyber atacks
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
    }else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interval) {
            regenerate_session_id();  // Regeneration of session ID so that it is less accessible and less prone to cyber atacks
        }
    }
}

function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION["last_regenetation"] = time();
}

function regenerate_session_id_loggedin() {

    session_regenerate_id(true);

    $user_Id = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $user_Id;
    session_id($sessionId);

    $_SESSION["last_regenetation"] = time();
}