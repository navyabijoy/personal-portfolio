<?php
// Replace with your real receiving email address
$receiving_email_address = 'navyabijoy14@gmail.com';

// Check if the PHP Email Form library exists
$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';
if (!file_exists($php_email_form)) {
    die('Unable to load the "PHP Email Form" Library!');
}

include($php_email_form);

$contact = new PHP_Email_Form;
$contact->ajax = true;

// Set form data
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : '';

// Add messages
$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(isset($_POST['message']) ? $_POST['message'] : '', 'Message', 10);

// Debugging: Capture and display errors
if ($contact->send()) {
    echo 'Message sent successfully!';
} else {
    echo 'Error: ' . $contact->error;
}
?>
