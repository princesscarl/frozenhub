<?php
include './connect.php';

date_default_timezone_set('Asia/Manila');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);


if (isset($_POST["submit-btn"])) {

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $location = $_POST['location'];
  $radios = $_POST['radios'];
  $business = $_POST['business'];
  $checkYears = $_POST['checkYears'];
  $radioType = $_POST['radioType'];
  $msg = $_POST['message'];

  //email is invalid return error
  //invalid input return error

  //if no error send mail to inputed email

  //server settings
  $mail->isSMTP();
  $mail->Host = gethostbyname("smtp.gmail.com");
  $mail->SMTPAuth = true;
  $mail->Username = 'frozenhub2023@gmail.com';
  $mail->Password = 'cvltkdpxhbymcabm';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );

  //recipients
  $mail->From = "frozenhub2023@gmail.com";
  $mail->FromName = "Frozen Hub";
  $mail->addAddress($email);
  $mail->isHTML(true);

  //template
  $email_template = 'email_template/contact_email_template.html';
  $message = file_get_contents($email_template);

  //replace string eg. %name%, name, message
  $mail->Subject = 'Frozenhub Inquiry';
  $mail->MsgHTML($message);
  $mail->Body = "<p>Good Day, Mr./Ms. {$lastName}!</p>
  <p>Thank you for taking the time to inquire on our company products and services.</p>
  <p>We have successfully recieved your inquiry.</p>
  <p>Please give us some time to process your request</p>
  <p>In case you have further queries, please reach us on our email provided below.</p>
  <br>
  <br>
  <div>
  <p>Regards</p>
  <p><b>Frozenhub</b></p>
  <p><b>Frozenhubmarketing@gmail.com</b></p>
  </div>";

  $insert_applicant_query = "INSERT INTO `application_table` (`firstName`, `lastName`, `email`, `contact_number`, `temporary_location`, `isLookingForSpace`, `business_name`, `years`, `typeOfBusiness`, `inputMessage`,`status`) 
      VALUES ('$firstName', '$lastName', '$email', '$phone', '$location', '$radios', '$business', '$checkYears', '$radioType', '$msg','Pending')";

  $result_applicant = mysqli_query($conn, $insert_applicant_query);

  if ($mail->send() and $result_applicant) {
    echo "<script> alert ('sent.') </script>";
  } else {
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo "<script> alert ('Sorry, something went wrong.') </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frozenhub</title>
  <link rel="icon" type="images/x-icon" href="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400" />

  <link rel="stylesheet" href="style.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://kit.fontawesome.com/faf8bee4ee.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/faf8bee4ee.js" crossorigin="anonymous"></script>
  <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>

  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      display: none;
    }
  </style>

</head>

<body style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">
  
  <?php include 'navbar.php'; ?>

  <section class="application" id="appform">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mb-3">
          <form class="applyNow" method="POST">
            <div class="container-fluid mt-3" style="margin-left: 10px;">
              <h1 style="text-align:left; padding: 3px; color:white; font-weight:bold;">Join Us</h1>
              <p style="text-align:left; padding: 3px; color:white; font-size: 20px;">Be our branch partner today!</p>
            </div>

            <div class="form-row">
              <div class="col-md-6 p-3">
                <input type="text" placeholder="First name" name="firstName" id="fName">
              </div>

              <div class="col-md-6 p-3">
                <input type="text" placeholder="Last name" name="lastName" id="lName" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 p-3">
                <div class="fieldEmail">
                  <input type="email" placeholder="Email" name="email" id="email" required>
                </div>
              </div>

              <div class="col-md-6 p-3">
                <div class="fieldContact">
                  <input type="number" placeholder="Contact Number" name="phone" id="number" required>
                </div>
              </div>
            </div>

            <div class="form-group p-3">
              <p for="inputLocation" style="color:white; font-weight:bold;">Target Location: </p>
              <input type="text" class="form-control" id="inputLocation" placeholder="Location" name="location" required>
            </div>

            <div class="question p-3">
              <p style="color:white; font-weight:bold;">Do you have any existing space or are you still looking for one?</p>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radios" id="radio1" value="I have an existing space.">
                <label class="form-check-label" for="radio1" style="color:white; font-weight:bold;">I have an existing space.</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="radios" id="radio2" value="I am still looking for one.">
                <label class="form-check-label" for="radio2" style="color:white; font-weight:bold;">I am still looking for one.</label>
              </div>
            </div>

            <div class="form-group p-3">
              <p for="inputBusiness" style="color:white; font-weight:bold;">Existing Business: </p>
              <input type="text" class="form-control" id="inputBusiness" placeholder="Business Name" name="business">
            </div>


            <div class="years p-3">
              <label for="inputYears" style="color:white; font-weight:bold;">Years in Business: </label>
              <select name="checkYears" id="years" class="form-select" required>
                <option value="" selected="" disabled="">Select Years</option>
                <option value="1-2">1-2 Years</option>
                <option value="3-4">3-4 Years</option>
                <option value="5-6">5-6 Years</option>
                <option value="7-8">7-8 Years</option>
                <option value="9-10">9-10 Years</option>
                <option value=">10">More than 10 Years</option>
              </select>
            </div>


            <div class="business p-3">
              <p style="color:white; font-weight:bold;">Type of Business: </p>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioType" id="radios1" value="Self-operate">
                <label class="form-check-label" for="exampleRadios1" style="color:white; font-weight:bold;">Self-operate</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioType" id="radios2" value="Company operated">
                <label class="form-check-label" for="exampleRadios2" style="color:white; font-weight:bold;">Company operated</label>
              </div>

              <div class="form-group">
                <label for="inputMessage" style="color:white; font-weight:bold;">Message:</label>
                <textarea class="form-control" id="inputMessage" name="message" rows="3"></textarea>
              </div>
            </div>

            <div class="form-submit text-center mb-3">
              <input type="submit" name="submit-btn" class="button btn-lg">
            </div>
          </form>
        </div>

        <div class=" col-lg-4" id="contactUs">
          <div class="contacts container-fluid p-3">
            <h1 style="text-align:left; padding: 3px; color:#439D9E;">Contacts</h1>
            <ul style="list-style-type:none;">
              <li><i class="fa-solid fa-phone" style="font-size: 1em;"></i><a> 0962 071 8415</a></li>
              <li><i class="fa-solid fa-envelope" style="font-size: 1em;"></i><a class="conLink" href="frozenhubhr@gmail.com"> frozenhubhr@gmail.com</a></li>
              <li><i class="fa-brands fa-square-facebook" style="font-size: 1em;"></i><a class="conLink" href="https://www.facebook.com/FrozenHubco"> FrozenHub</a></li>
              <li><i class="fa-brands fa-square-instagram" style="font-size: 1em;"></i><a class="conLink" href="https://www.instagram.com/frozenhub_official/"> frozenhub_official</a></li>
            </ul>
          </div>

          <div class=" col-xxl pt-5" id="Location">
            <div class="contacts container-fluid p-3">
              <h1 style="text-align:left; padding: 3px; color:#439D9E;">Location</h1>
              <div style="display: flex; align-items: center; justify-content: center;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.970935999983!2d121.16046064983453!3d14.196480190610522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd63dc7d0494ab%3A0x6bee433db31ec2ba!2sMargimel%20Building%2C%20Manila%20S%20Rd%2C%20Calamba%2C%204027%20Laguna!5e0!3m2!1sen!2sph!4v1679807808305!5m2!1sen!2sph" height="450" width="contain" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer style=" width: 90%; margin-top:10px; margin-bottom: 20px; margin-right: auto; margin-left: auto; background-color: #439D9E; border-radius: 5px;">
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2); margin-top:20px; margin-bottom: 20px;  border-radius: 5px;">
      © 2023 Copyright: <a class="text-white" href="https://Frozenhub.com/">Frozenhub.com</a>
    </div>
  </footer>
</body>

</html>