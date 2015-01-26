<?php

    //Only process POST requests.
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Contact Form';
        $to = 'megan@seraphinaknits.com';
        $subject = 'Contact Form Submission';

        $body = "From: $name\n E-mail: $email\n Message:\n $message";

    //Check if name has been entered
    if (!$_POST['name']){
            $errName = 'Please enter your name.';
    }

    //Check if email entered is valid.
    if (!$_POST['email']|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errEmail = 'Please enter a valid email address.';
    }

    //Check if message has been entered.
    if (!$_POST['message']){
        $errMessage = 'Please enter your message.';
    }

    //Check if simple anti-bot test is correct.
    if ($human !==17){
        $errHuman = 'Your anti-spam is incorrect.';
    }

    //If there are no errors, send the email.
    if (!$errName && !$errEmail && !$errMessage && !$errHuman){
        if (mail ($to, $subject, $body, $from)){
            $result='<div class="alert alert-success">Thank you! I will be in touch soon!</div>';
        } else {
            $result = '<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
        }
    }

    echo "<meta http-equiv='refresh' content=\"0; url=http://www.seraphinaknits.com\">";
}
?>