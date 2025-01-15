<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form fields
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $company = $_POST['company'];
    $jobTitle = $_POST['job_title'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $industry = $_POST['industry'];
    $numEmployees = $_POST['num_employees'];
    $omniagentsInterest = $_POST['omniagents_interest'];
    $additionalInfo = $_POST['additional_info'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email settings
    $to = "sandeep.n@blp.co.in";  // Replace with your email
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "
        <h2>Contact Form Submission</h2>
        <p><strong>First Name:</strong> $firstName</p>
        <p><strong>Last Name:</strong> $lastName</p>
        <p><strong>Company:</strong> $company</p>
        <p><strong>Job Title:</strong> $jobTitle</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Industry:</strong> $industry</p>
        <p><strong>Number of Employees:</strong> $numEmployees</p>
        <p><strong>OmniAgents of Interest:</strong> $omniagentsInterest</p>
        <p><strong>Additional Information:</strong> $additionalInfo</p>
        <p><strong>Message:</strong><br>$message</p>
    ";

    // Set headers
    $headers = "From: no-reply@yourdomain.com\r\n"; // Replace with your domain
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>
                alert('Thank you! Your message has been sent.');
                window.location.href = 'contact.html'; // Redirect after submission
              </script>";
    } else {
        echo "<script>
                alert('There was an error sending your message. Please try again.');
                window.history.back(); // Return to form if error
              </script>";
    }
} else {
    header("Location: About-OmniAgents.html"); // Redirect if accessed directly
    exit();
}
?>
