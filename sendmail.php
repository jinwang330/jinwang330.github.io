//this is currently not in use because github does not host email using php so I've decided to use googleform//
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Set the recipient email address (your email address)
    $to = "jinwang330@gmail.com";

    // Set the email subject
    $subject = "New Contact Form Submission from $name";

    // Build the email message
    $email_message = "Name: $name\n\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Message:\n$message";

    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully, redirect to a thank you message
        echo "<script>alert('Thank you for contacting me! I will get back to you shortly.');</script>";
    } else {
        // Email failed to send, display an error message
        echo "<script>alert('There was a problem sending your message. Please try again later.');</script>";
    }
}
?>
