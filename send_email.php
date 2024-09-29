<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Set the recipient email address
    $to = 'cayetano.vaughn@gmail.com'; // Replace with your email address

    // Set the email subject
    $subject = "New Message from $name";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect or display a success message
        echo "Thank you! Your message has been sent.";
    } else {
        // Display an error message
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>
