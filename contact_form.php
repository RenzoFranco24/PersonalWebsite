<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    if (!$email) {
        echo "Invalid email format.";
        exit;
    }

    // Send email (modify email address)
    $to = "renzo.franco24@gmail.com"; 
    $subject = "New Contact Form Submission from $name";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $emailBody = "Name: $name\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Message:\n$message\n";

    if (mail($to, $subject, $emailBody, $headers)) {
        header("Location: form_confirmation.html");
    } else {
        echo "Error sending message.";
    }
} else {
    echo "Invalid request.";
}
?>