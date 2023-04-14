<?php
include 'connect.php';

    if(isset($_POST["submit"])) {


      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $phoneNum = $_POST['phoneNum'];
      $proNo = $_POST['proNo'];
      $comDate = $_POST['comDate'];
      $proName = $_POST['proName'];
      $boughtOn = $_POST['boughtOn'];
      $details = $_POST['details'];
      $actions = $_POST['actions'];

      // File upload path
      $targetDir = "pictures/";
      $fileName = $_FILES["file"]["name"];
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

      if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
      $insert_applicant_query = "INSERT INTO complaints_table
      (firstname, lastname, email, phoneNum, proNo, comDate, proName, boughtOn, details, actions, picture) 
      VALUES ('$firstname', '$lastname', '$email', '$phoneNum', '$proNo', '$comDate', '$proName', '$boughtOn', '$details', '$actions', '$fileName')";

      $result_applicant = mysqli_query($conn, $insert_applicant_query);

      if($result_applicant){
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
    <link rel="icon" type="images/x-icon" href="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400"/>

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
    <div class="navigation">
      <section class = "header mt-3">
        <div class="container-fluid">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-9">
              <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR31xX2o13KZKqA4iGZd6OUXCJ1CEzzBldzaso7vJkyMkq5i5dozuacVW6I" width="100%" height="auto">
            </div>
          </div>
        </div>
      </section>
      
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link" href="./hub.php #Announcement">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./hub.php #aboutUs">About Us</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php #appform">Join Us - Franchise</a>
                  <a class="dropdown-item" href="feedback.php #feedback">Product Feedback</a>
                  <a class="dropdown-item" href="#complaints">Complaints</a>
                  <a class="dropdown-item" href="job_application.php #jobApp">Job Application</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
    </div>

    <section class="application" id="complaints">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 mb-3">
            <form class="applyNow" method="POST" enctype="multipart/form-data">
              <div class="container-fluid mt-3" style="margin-left: 10px;">
                <h1 style="text-align:left; padding: 3px; color:white; font-weight:bold;">Complaint Form</h1>
                <p style="text-align:left; padding: 3px; color:white; font-weight:bold;">Customer Details:</p>
              </div>

              <div class="form-row">
                <div class="col-md-6 p-3">
                  <input type="text" placeholder="First name" name="firstname" id="fname">
                </div>
        
                <div class="col-md-6 p-3">
                  <input type="text" placeholder="Last name" name="lastname" id="lname" required>
                </div>
              </div>
            
               <div class="form-row">
                  <div class="col-md-6 p-3">
                    <div class="divEmail">
                      <input type="email" placeholder="Email" name="email" id="email" required>
                    </div>
                  </div>
                
                  <div class="col-md-6 p-3">
                    <div class="divContact">
                      <input type="number" placeholder="Contact Number" name="phoneNum" id="pNumber" required>
                    </div>
                  </div>
              </div>
              <div class="container-fluid">
              <p style="text-align:left; padding: 3px; color:white; font-weight:bold;">Complaint Information:</p>
              </div>
              <div class="form-row">
                  <div class="col-md-6 p-3">
                    <input type="text" placeholder="Product Number" name="proNo" id="ProductNumber">
                  </div>

                  <div class="col-md-6 p-3">
                      <input type="text" placeholder="Product Name" name="proName" id="ProductName" required>
                    </div>
             </div>
               <div class="form-row">
                <div class="col-md-6 p-3">
                    <label style="color:white; font-weight:bold; float:left;">Bought On:</label>
                    <input type="date" placeholder="Bought On" name="boughtOn" id="boughtOn" required>
                </div>

                <div class="col-md-6 p-3">
                    <div class="divCDate">
                        <label style="color:white; font-weight:bold; float:left;">Complain Date:</label>
                        <input type="date" placeholder="Complaint Date" name="comDate" id="ComplaintDate" required>
                    </div>
                </div>
              </div>


              <div class="container-fluid">
              <div class="form-group">
              <p style="text-align:left; padding: 3px; color:white; font-weight:bold;">Picture of the Product:</p>
                <input type="file" accept=".img,.jpg,.png" class="form-control-file" name="file" style="height:70px">
              </div>
              </div>


              <div class="container-fluid">
                <div class="form-group">
                    <label for="inputMessage" style="color:white; font-weight:bold;">Complaint Details:</label>
                    <textarea class="form-control" id="inputMessage" name="details" rows="3"></textarea>
                </div>
              </div>

              <div class="container-fluid">
                <div class="form-group">
                  
                    <label for="inputMessage" style="color:white; font-weight:bold;">Proposed action:</label>
                    <textarea class="form-control" id="inputMessage" name="actions" rows="3"></textarea>
                </div>
              </div>

             
              <div class="form-submit text-center mb-3">
                <input type="submit" name="submit" class="button btn-lg">
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