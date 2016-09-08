<?php    
include_once 'format.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $isValid = true;

    // Validate username
    if (empty($username)) {
        $isValid = false;
        $usernameError = "Please enter your user name.";
    } else if (strlen($username) < 3) {
        $isValid = false;
        $nameError = "Username must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
        $isValid = false;
        $nameError = "Username must contain alphabets and space.";
    }

    // Validate email
    if(empty($email)){
        $isValid = false;
        $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $isValid = false;
        $emailError = "Please enter valid email address.";
    }

    if ($isValid == true) {
        header('Location: complete.html');
        die();
    }
}

include_once 'index.html';

