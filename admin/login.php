<?php
session_start();
session_destroy();
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frozenhub";
$tablename = "application_table";
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST["submit"]))
{
	$username = $_POST["username"];
	$password = $_POST["password"];
	$getQuery = "select * from users where username = '$username' and password = '$password'";
	$result = mysqli_query($conn,$getQuery);
	if(mysqli_num_rows($result) > 0)
	{
		$_SESSION["loggedin"] = "true";
		header("Location: index.php");
	}
	else
	{
		header("Location: login.php?error=nouser");
	}	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FrozenHub Admin</title>
  <link rel="icon" type="images/x-icon" href="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400"/>

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  
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

</head>

<body class="login" style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">


<!--=========main=======-->
  <main>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center" style="background-color: white; border-radius:5px; box-shadow: rgba(0, 0, 0, 0.24) 0px 5px 10px;">
            <img src="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400" alt="" style="width:50%; height: auto; margin-top:20px;">
              <div class="d-flex justify-content-center py-4">
                <h3 style="color:#439D9E;"><b>FrozenHub Admin </b></h3>
              </div><!-- End Home -->

              <div class="card mb-3">
                <div class="card-body" style="background-color:#439D9E;">
                  <form class="row g-3 needs-validation" method="post">
                    <div class="col-12">
                      <input placeholder="Username" type="text" name="username" class="form-control" id="username" required>
                    </div>

                    <div class="col-12">
                      <input placeholder="Password" type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <br>
                    <div class="col-12"> 
                      <button class="btn btn-primary w-100" type="submit" name="submit" style="background-color: white; border:white; color:#439D9E;"><b>Login</b></button>
                     </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </main>
</body>
</html>
