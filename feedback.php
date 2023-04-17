<?php

date_default_timezone_set('Asia/Manila');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
include './connect.php';

    if(isset($_POST["submit-btn"])) {


      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $proName = $_POST['proName'];
      $ratings = $_POST['ratings'];
      $feedback = $_POST['feedback'];

      $targetDir = "pictures/";
      $fileName = $_FILES["file"]["name"];
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

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
  $mail->From= "frozenhub2023@gmail.com";
  $mail->FromName = "Frozen Hub";
  $mail->addAddress($email);
  $mail->isHTML(true);

  //template
  $email_template = 'email_template/contact_email_template.html';
  $message = file_get_contents($email_template);

  //replace string eg. %name%, name, message
  $mail->Subject = 'Product Feedback';
  $mail->MsgHTML($message);
  $mail->Body = "<p>Good Day, Mr./Ms. {$lastName}!</p>
  <p>Thank you for your valuable feedback.</p>
  <p>We appreciate the time you took to share your experience with us.</p>
  <p>What you shared with us will help us improve our services and products.</p>
  <p>You may contact us at Frozenhubmarketing@gmail.com if you have any questions.</p>
  <br>
  <br>
  <div>
  <p>Regards</p>
  <p><b>Frozenhub</b></p>
  <p><b>Frozenhubmarketing@gmail.com</b></p>
  </div>";

      if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
      $insert_applicant_query = "INSERT INTO `feedback_table`
      (`firstName`, `lastName`, `email`, `phone`, `proName`, `ratings`, `feedback`, `picture` ) 
      VALUES ('$firstName', '$lastName', '$email', '$phone', '$proName', '$ratings', '$feedback', '$fileName')";

      $result_applicant = mysqli_query($conn, $insert_applicant_query);

      if ($mail->send() and $result_applicant){
        echo "<script> alert ('Thank you for inquiry.') </script>";
      }

      else{
        echo "<script> alert ('Sorry, something went wrong.') </script>";
      }
}}
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

<?php include './navbar.php'; ?>

    <section class="application" id="feedback">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 mb-3">
            <form class="applyNow" method="POST" enctype="multipart/form-data">
              <div class="container-fluid mt-3" style="margin-left: 10px;">
                <h1 style="text-align:left; padding: 3px; color:white; font-weight:bold;">Feedback</h1>
                <p style="text-align:left; padding: 3px; color:white; font-size: 20px;">Let us hear your opinion and suggestion to improve our service to serve you better!</p>
                <p style="text-align:left; padding: 3px; color:white; font-weight:bold;">Customer Details:</p>
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

              <div class="container-fluid">
                <div class="form-group">
                    <label for="inputProduct" style="color:white; font-weight:bold;">Product Name:</label>
                    <input type="text" id="inputProduct" name="proName" rows="3" placeholder="Product Name">
                </div>
              </div>

              <div class="container-fluid">
              <div class="form-group">
              <p style="text-align:left; padding: 3px; color:white; font-weight:bold;">Picture of the Product:</p>
                <input type="file" accept=".img,.jpg,.png" class="form-control-file" name="file" style="height:70px">
              </div>
              </div>

              <div class="question p-3">
                <p style="color:white; font-weight:bold;">How would you rate our service and products?</p>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ratings" id="rating1" value="Excellent">
                  <label class="form-check-label" for="radio1" style="color:white; font-weight:bold;">Excellent</label>
                </div>
            
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ratings" id="rating2" value="Very Good">
                  <label class="form-check-label" for="radio2" style="color:white; font-weight:bold;">Very Good</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ratings" id="rating3" value="Good">
                  <label class="form-check-label" for="radio2" style="color:white; font-weight:bold;">Good</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ratings" id="rating4" value="Fair">
                  <label class="form-check-label" for="radio2" style="color:white; font-weight:bold;">Fair</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ratings" id="rating5" value="Poor">
                  <label class="form-check-label" for="radio2" style="color:white; font-weight:bold;">Poor</label>
                </div>
              </div>
      
              <div class="business p-3">
                <div class="form-group">
                  <label for="inputMessage" style="color:white; font-weight:bold;">Leave us your feedback:</label>
                  <textarea class="form-control" id="inputMessage" name="feedback" rows="3"></textarea>
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
                <li><i class="fa-solid fa-envelope" style="font-size: 1em;"></i><a class="conLink" href ="frozenhubhr@gmail.com"> frozenhubhr@gmail.com</a></li>
                <li><i class="fa-brands fa-square-facebook"  style="font-size: 1em;"></i><a class="conLink" href="https://www.facebook.com/FrozenHubco"> FrozenHub</a></li>
                <li><i class="fa-brands fa-square-instagram" style="font-size: 1em;"></i><a class="conLink" href ="https://www.instagram.com/frozenhub_official/"> frozenhub_official</a></li>
              </ul>  
            </div>

            <div class=" col-xxl pt-5" id="Location" >
              <div class="contacts container-fluid p-3">
                  <h1 style="text-align:left; padding: 3px; color:#439D9E;">Location</h1>
                  <div style="display: flex; align-items: center; justify-content: center;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.970935999983!2d121.16046064983453!3d14.196480190610522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd63dc7d0494ab%3A0x6bee433db31ec2ba!2sMargimel%20Building%2C%20Manila%20S%20Rd%2C%20Calamba%2C%204027%20Laguna!5e0!3m2!1sen!2sph!4v1679807808305!5m2!1sen!2sph"  height="450" width="contain"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>  
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </section>

    <footer style=" width: 90%; margin-top:10px; margin-bottom: 20px; margin-right: auto; margin-left: auto; background-color: #439D9E; border-radius: 5px;">
      <div class="text-center text-white p-3"style="background-color: rgba(0, 0, 0, 0.2); margin-top:20px; margin-bottom: 20px;  border-radius: 5px;">
        © 2023 Copyright: <a class="text-white" href="https://Frozenhub.com/">Frozenhub.com</a>
      </div>
    </footer>
</body>
</html>