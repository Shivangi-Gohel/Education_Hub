<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Your email address
    $to = "your-email@example.com";

    // Email subject and body
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from the contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n\n" .
                  "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you for contacting us, $name. We will get back to you shortly!";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
