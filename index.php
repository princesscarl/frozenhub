<?php

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
  <div class="container-fluid" style="width: 90%;">
    <div class="row">
      <div class="col-lg-8 mb-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class=" col-lg-4" id="contactUs">
        <div class="contacts container-fluid">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" width="100%" height="100%">
        </div>
        <div class="contacts container-fluid " style=" margin-top: 20px;">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" width="100%" height="100%">
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" style="width: 90%;">
    <h2 style="text-align: center; font-weight: bold; padding:10px;">Top Products</h2>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-1" align="center">
        <div class="card" style="width: 18rem;">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQ3Ux_B45xDr9B18efDjM_o7Kqty0QC7koksGUqaCJ7DR8HKn6UE_ysmzeWheJiTb119nKjepyxcHUxWNKYHljT4JuI=s1600?fbclid=IwAR1jb7ztdwKYhqZVy5ZM49eVvdw8FWp0nn2LqD60o1wAEhuDKDRENaqd-3w" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add to cart</a>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 col-xs-1" align="center">
            <div class="card" style="width: 18rem;">
              <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQ3Ux_B45xDr9B18efDjM_o7Kqty0QC7koksGUqaCJ7DR8HKn6UE_ysmzeWheJiTb119nKjepyxcHUxWNKYHljT4JuI=s1600?fbclid=IwAR1jb7ztdwKYhqZVy5ZM49eVvdw8FWp0nn2LqD60o1wAEhuDKDRENaqd-3w" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-1" align="center">
        <div class="card" style="width: 18rem;">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQ3Ux_B45xDr9B18efDjM_o7Kqty0QC7koksGUqaCJ7DR8HKn6UE_ysmzeWheJiTb119nKjepyxcHUxWNKYHljT4JuI=s1600?fbclid=IwAR1jb7ztdwKYhqZVy5ZM49eVvdw8FWp0nn2LqD60o1wAEhuDKDRENaqd-3w" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add to cart</a>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 col-xs-1" align="center">
            <div class="card" style="width: 18rem;">
              <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQ3Ux_B45xDr9B18efDjM_o7Kqty0QC7koksGUqaCJ7DR8HKn6UE_ysmzeWheJiTb119nKjepyxcHUxWNKYHljT4JuI=s1600?fbclid=IwAR1jb7ztdwKYhqZVy5ZM49eVvdw8FWp0nn2LqD60o1wAEhuDKDRENaqd-3w" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-1" align="center">
        <div class="card" style="width: 18rem;">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQ3Ux_B45xDr9B18efDjM_o7Kqty0QC7koksGUqaCJ7DR8HKn6UE_ysmzeWheJiTb119nKjepyxcHUxWNKYHljT4JuI=s1600?fbclid=IwAR1jb7ztdwKYhqZVy5ZM49eVvdw8FWp0nn2LqD60o1wAEhuDKDRENaqd-3w" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add to cart</a>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 col-xs-1" align="center">
            <div class="card" style="width: 18rem;">
              <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQ3Ux_B45xDr9B18efDjM_o7Kqty0QC7koksGUqaCJ7DR8HKn6UE_ysmzeWheJiTb119nKjepyxcHUxWNKYHljT4JuI=s1600?fbclid=IwAR1jb7ztdwKYhqZVy5ZM49eVvdw8FWp0nn2LqD60o1wAEhuDKDRENaqd-3w" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-1" align="center">
        <div class="card" style="width: 18rem;">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQ3Ux_B45xDr9B18efDjM_o7Kqty0QC7koksGUqaCJ7DR8HKn6UE_ysmzeWheJiTb119nKjepyxcHUxWNKYHljT4JuI=s1600?fbclid=IwAR1jb7ztdwKYhqZVy5ZM49eVvdw8FWp0nn2LqD60o1wAEhuDKDRENaqd-3w" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add to cart</a>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 col-xs-1" align="center">
            <div class="card" style="width: 18rem;">
              <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQ3Ux_B45xDr9B18efDjM_o7Kqty0QC7koksGUqaCJ7DR8HKn6UE_ysmzeWheJiTb119nKjepyxcHUxWNKYHljT4JuI=s1600?fbclid=IwAR1jb7ztdwKYhqZVy5ZM49eVvdw8FWp0nn2LqD60o1wAEhuDKDRENaqd-3w" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>