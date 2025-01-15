<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $company = strip_tags(trim($_POST["company"]));
    $job = strip_tags(trim($_POST["job"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $inquiry = strip_tags(trim($_POST["inquiry"]));
    $message = trim($_POST["message"]);

    // Set recipient email address.
    $recipient = "diwakar150793@gmail.com, diwakar150793@gmail.com";

    // Set email subject.
    $subject = "New Contact Form Submission from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Company: $company\n";
    $email_content .= "Job Title: $job\n";
    $email_content .= "Phone Number: $phone\n";
    $email_content .= "Inquiry Type: $inquiry\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers.
    $headers = "From: $name <$email>";

    // Send the email.
    if (mail($recipient, $subject, $email_content, $headers)) {
        echo "<p class='success'>Thank you! Your message has been sent.</p>";
    } else {
        echo "<p class='error'>Oops! Something went wrong, and we couldn’t send your message.</p>";
    }
} else {
    echo "<p class='error'>There was a problem with your submission, please try again.</p>";
}
?>
