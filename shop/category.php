<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    #myCarousel {
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .carousel-inner .carousel-item>div {
        display: none;
    }

    .carousel-inner .carousel-item>div:first-child {
        display: block;
    }
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-start,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
    display: flex;
}

@media (min-width: 768px) {

    .carousel-inner .carousel-item-right.active,
    .carousel-inner .carousel-item-next,
    .carousel-item-next:not(.carousel-item-start) {
        transform: translateX(25%) !important;
    }

    .carousel-inner .carousel-item-left.active,
    .carousel-item-prev:not(.carousel-item-end),
    .active.carousel-item-start,
    .carousel-item-prev:not(.carousel-item-end) {
        transform: translateX(-25%) !important;
    }

    .carousel-item-next.carousel-item-start,
    .active.carousel-item-end {
        transform: translateX(0) !important;
    }

    .carousel-inner .carousel-item-prev,
    .carousel-item-prev:not(.carousel-item-end) {
        transform: translateX(-25%) !important;
    }
}
</style>

<div id="myCarousel" class="carousel slide container" data-bs-ride="carousel" style="font-family: 'Poppins', sans-serif; font-weight:bold; color:white">
    <div class="carousel-inner w-100 text-center">

    <?php
$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

$category = "SELECT * FROM categories";
$result_category = mysqli_query($conn,$category);
while ($row = mysqli_fetch_assoc($result_category)) {
$category_title = $row['category_title'];
$category_id = $row['category_id']
?>
        <div class="carousel-item active">
            <div class="col-md-3 p-2">
                <div class="card card-body" style="background-color: #7BB4BD;">
                    <div class="flex-column lh-1 imagename">   
                   <a href="index.php?category=<?php echo $category_id?>" style="text-decoration-none text-light"><?php echo $category_title?></a>
                    </div>
                </div>
            </div>
        </div>


        <?php }?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$('.carousel .carousel-item').each(function () {
var minPerSlide = 4;
var next = $(this).next();
if (!next.length) {
next = $(this).siblings(':first');
}
next.children(':first-child').clone().appendTo($(this));

for (var i = 0; i < minPerSlide; i++) { next=next.next(); if (!next.length) { next=$(this).siblings(':first'); } next.children(':first-child').clone().appendTo($(this)); } });
</script>