<?php
// Basic PHP form processor for FA demo. Add more checks for production use.
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);

    if(!$fullname || !$email){
        echo '<p>Missing required fields. <a href="index.html">Back</a></p>'; exit;
    }

    $to = 'someone@example.com';
    $subject = 'Registration from ' . $fullname;
    $message = "Name: $fullname\nEmail: $email\nPhone: $phone\nGender: $gender\n";
    $headers = 'From: no-reply@example.com\r\nReply-To: ' . $email;

    if(mail($to, $subject, $message, $headers)){
        echo '<p>Thank you! Your registration was submitted.</p>';
    } else {
        echo '<p>Submission saved but email not sent (mail() failed).</p>';
    }
    echo '<p><a href="index.html">Return</a></p>';
} else {
    header('Location: index.html'); exit;
}
?>