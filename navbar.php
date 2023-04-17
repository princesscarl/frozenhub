<?php session_start(); 

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

?>

<div class="navigation">
  <section class="header mt-3">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-9">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" width="100%" height="auto">
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
            <a class="nav-link" href="./index.php">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">All Products</a>
              <a class="dropdown-item" href="#">All Promos</a>
            </div>


          <li class="nav-item">
            <a class="nav-link" href="./hub.php #Announcement">Announcement</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./hub.php #aboutUs">About Us</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="inquiries.php #appform">Join Us - Franchise</a>
              <a class="dropdown-item" href="feedback.php #feedback">Product Feedback</a>
              <a class="dropdown-item" href="complaints.php #complaints">Complaints</a>
              <a class="dropdown-item" href="job_application.php #jobApp">Job Application</a>
            </div>
          </li>

        

<!--           
          <li class="nav-item">
            <a class="nav-link">LOGOUT</a>
          </li> -->


          <?php 
    if(!isset($_SESSION['email'])){
    echo'
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>';
    }

    elseif(isset($_SESSION['email'])){
      $email = $_SESSION['email'];

      $name_query = "SELECT * FROM user_details WHERE `email` = '$email'";
      $result = mysqli_query($conn, $name_query);
     
  
      if (mysqli_num_rows($result) == 0) {
  
          } else {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];
            $firstName = $row['fname'];
            $_SESSION['user_id'] = $user_id;
      }
  
      echo'<li class="nav-item">
      <input type="text" hidden name="user_id" ='
      .$_SESSION['user_id'].'>
      </form>
      <a class="nav-link" href="#">Welcome '.$firstName.'</a>
    </li>
';
    }?>

<?php if(isset($_SESSION['email'])){
            echo'
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./user_area/edit_account.php">Edit Account</a>
            <a class="dropdown-item" href="#">View Orders</a>
            <a class="dropdown-item" href="#">Change Password</a>
            <a class="dropdown-item" href="../user_area/logout.php">Logout</a>
          </div>
          </li>
          ';
          } ?>


          <?php if (!isset($_SESSION['email'])) {
            echo '
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./user_area/login.php">Login</a>
              <a class="dropdown-item" href="./user_area/register.php">Register</a>
            </div>
            </li>
          ';
          } ?>
  </ul>

        </div>
        </div>
        </div>

