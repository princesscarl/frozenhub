<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';

if(isset($_POST["submit-btn"])) {
    $mail = new PHPMailer(true);

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $radios = $_POST['radios'];
    $business = $_POST['business'];
    $checkYears = $_POST['checkYears'];
    $radioType = $_POST['radioType'];
    $message = $_POST['message'];

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->Username = "princesscarl975@gmail.com";
    $mail->Password ='fxckmxmrobalpqln';
    $mail->SMTPSecure = "ssl";
    $mail->Port = '465';

    $mail->setFrom('princesscarl975@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = 'Message Recieved from Applicant:' . $firstName;
    $mail->Body = "Name: $firstName <br> Phone: $phone<br> Email: $email <br> Message: $message";

    $mail->send();
        
    echo
    "
    <script>
    alert('Sent Successful');
    document.location.href = 'index.php#appform';
    </script>
    ";
}
?>