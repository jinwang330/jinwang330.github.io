<?php
if($_POST) {
    $name = "";
    $email = "";
    $message = "";
 
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
 
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
 
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }
 
    $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" . 'Reply-To: ' . $email . "\r\n";
    $subject = 'New message from your website';
    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Message: ' . $message;
 
    $send_email_to = 'jinwang330@gmail.com';
 
    if(mail($send_email_to, $subject, $body, $headers)) {
        $result = array('message' => 'Thank you for contacting me. I will get back to you shortly.', 'status' => 'success');
    } else {
        $result = array('message' => 'Sorry, an error occurred. Please try again later.', 'status' => 'error');
    }
 
    echo json_encode($result);
} else {
    header('Location: index.html');
}
?>

