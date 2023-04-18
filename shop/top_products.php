<div class="container-fluid" style="width: 90%;">
    <h2 style="text-align: center; font-weight: bold; padding:10px;">Top Products</h2>
    <div class='row d-flex'>

<?php include './shop/common_functions.php';

getproducts();
?>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> You are not logged in. Do you want to login? </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><a class="text-light text-decoration-none" href="./user_area/login.php">YES</a></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="index.php" class="text-light text-decoration-none">NO</a></button>
          </div>
        </div>
      </div>
    </div>
