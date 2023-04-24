<?php
session_start();
include "encryption.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frozenhub";
$tablename = "application_table";
$conn = new mysqli($servername, $username, $password, $dbname);
 
if(!isset($_SESSION["loggedin"]))
{
	header("Location: login.php");
}
if(isset($_POST["delete"]))
{
	$delete_id = $_POST["delete"];
	$getQuery = "delete from application_table where ID = $delete_id";
	mysqli_query($conn,$getQuery);
}
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 
  <title>Dashboard</title>
  <link rel="icon" type="images/x-icon" href="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400"/>
 
  <link rel="stylesheet" href="../style.css">

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
    <body style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">
    	  <!-- ======= Header ======= -->
    <div class="navigation p-4">
        <div class="container-fluid">

          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="../index.php" style="font-size: 30px; font-weight:bold; color:white;">Frozenhub</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item ml-4">
                  <a class="nav-link" href="download.php" style="font-size: 20px; font-weight:bold;">Download</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-weight:bold;">Forms</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?jobs" style="font-size: 20px;">Job Application</a>
                  <a class="dropdown-item" href="index.php?complaints" style="font-size: 20px;">Complaints</a>
                  <a class="dropdown-item" href="index.php?inquiries" style="font-size: 20px;">Inquiries</a>
                  <a class="dropdown-item" href="index.php?feedback" style="font-size: 20px;">Feedback</a>
                  </div>
                </li>
            


              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-weight:bold;">Shop</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?view_products" style="font-size: 20px;">View Products</a>
                  <a class="dropdown-item" href="index.php?view_orders" style="font-size: 20px;">List of Orders</a>
                  <a class="dropdown-item" href="index.php?view_users" style="font-size: 20px;">List of Users</a>
                  </div>
                </li>
              </ul>

              <form class="form-inline my-2 my-lg-0 ml-4">
                <input type="text" name="search" id="search" autocomplete="off" placeholder="Search by name, status... ">
              </form>
              
              <a class="nav-link" href="login.php" style="font-size: 20px; font-weight:bold;"><i class="fa-solid fa-right-from-bracket pl-4" title="Logout"></i></a>
            </div>
          </nav>
        </div>
    </div>      

<?php
    
    if (isset($_GET['inquiries'])){
      include ('./inquires.php');
    }
    elseif (isset($_GET['jobs'])){
      include ('./jobs.php');
    }
    elseif (isset($_GET['complaints'])){
      include ('./complaints.php');
    }
    elseif (isset($_GET['feedback'])){
      include ('./feedback.php');
    }
    elseif (isset($_GET['view_products'])){
      include ('./shop/view_products.php');
    }
    elseif (isset($_GET['view_top'])){
      include ('./shop/view_top.php');
    }
    elseif (isset($_GET['view_promos'])){
      include ('./shop/view_promos.php');
    }
  ?>


  <script type="text/javascript">
        $(document).ready(function(){
            $('#search').keyup(function(){
                search_table($(this).val());
 
            });
 
            function search_table(value){
                $('#table tr').each(function(){
                var found='false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
                    {
                        found='true';
                    }
            });
                if(found=='true'){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
 
            });
 
            }
 
        });
    </script>
   </body>
</html>