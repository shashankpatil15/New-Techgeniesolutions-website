<?php
// filepath: c:\Users\Sham\TechGenie-Code\saas-website-template\saas-website-template\send_mail.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $project = htmlspecialchars($_POST['project']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "sales@techgeniesolutions.in";
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "
        You have received a new message from your website contact form.\n\n
        Here are the details:\n
        Name: $name\n
        Email: $email\n
        Phone: $phone\n
        Project: $project\n
        Subject: $subject\n
        Message:\n$message
    ";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again later.'); window.location.href='contact.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='contact.html';</script>";
}
?>