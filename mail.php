<?php
$name = trim($_POST['contact-name']);
$phone = trim($_POST['contact-phone']);
$email = trim($_POST['contact-email']);
$subject = trim($_POST['contact-subject']);
$message = trim($_POST['contact-message']);
if ($name == "") {
    $msg['err'] = "\n Name cannot be empty!";
    $msg['field'] = "contact-name";
    $msg['code'] = FALSE;
} else if ($phone == "") {
    $msg['err'] = "\n Phone number cannot be empty!";
    $msg['field'] = "contact-phone";
    $msg['code'] = FALSE;
} else if (!preg_match("/^[0-9 \\-\\+]{4,17}$/i", trim($phone))) {
    $msg['err'] = "\n Please put a valid phone number!";
    $msg['field'] = "contact-phone";
    $msg['code'] = FALSE;
} else if ($email == "") {
    $msg['err'] = "\n Email cannot be empty!";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "\n Please put a valid email address!";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if ($message == "") {
    $msg['err'] = "\n Message cannot be empty!";
    $msg['field'] = "contact-message";
    $msg['code'] = FALSE;
} else if ($subject == "") {
    $msg['err'] = "\n Subject cannot be empty!";
    $msg['field'] = "contact-subject";
    $msg['code'] = FALSE;
} else {
    $to = 'tasha@iamtashab.com';
    $subject = $subject;
    $_message = '<html><head></head><body>';
    $_message .= '<p>Name: ' . $name . '</p>';
    $_message .= '<p>Message: ' . $phone . '</p>';
    $_message .= '<p>Email: ' . $email . '</p>';
    $_message .= '<p>Message: ' . $message . '</p>';
    $_message .= '</body></html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Tasha B. Website <tasha@iamtashab.com>' . "\r\n";
    $headers .= 'cc: tashabyers28@yahoo.com' . "\r\n";
    // $headers .= 'bcc: contact@example.com' . "\r\n";
    mail($to, $subject, $_message, $headers, '-f tasha@iamtashab.com');

    $msg['success'] = "\n Thank you! Your email has been sent successfully.";
    $msg['code'] = TRUE;
}
echo json_encode($msg);