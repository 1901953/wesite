<?php

session_start();
include 'connect_db.php';
include 'functions.php';

$user_data = check_login($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi Website</title>
    <!-- boostrap 5.1.3 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style.css -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    @include 'header.php';
    ?>

    Hello <?php echo $user_data['user_name']; ?>

    <!-- third child -->
    <div class="bg-light mt-3">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communications is at the heart of e-commerce and community</p>
    </div>

    <!-- four child -->
    <!-- col md-10 的意思是 中型設備-屏幕寬度為768px , md-10意思是在中型設備裏面 這個内容占了10個空間，總共為12個空間-->
    <div class="row p-0">

        <div class="col-md-1">
            <a href="admin.php" class="btn btn-outline-warning">Admin Panel</a>
        </div>


        <div class="col-md-8">
            <!-- products -->
            <div class="row">
                <?php

                $product_query = mysqli_query($conn, "SELECT * FROM `products`");
                if (mysqli_num_rows($product_query) > 0) {

                    $i = 1;
                    while ($i < 10) {
                        $product_show = mysqli_fetch_assoc($product_query);
                        $i++;
                ?>

                        <div class="col-md-4 mb-2">

                            <div class="card">
                                <img src="uploaded_img/<?php echo  $product_show['image']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $product_show['name']; ?></h5>
                                    <p class="card-text text-center">$<?php echo $product_show['price']; ?>/-</p>
                                    &nbsp; &nbsp;
                                    <a href="#" class="btn btn-primary me-5">Buy now</a>
                                    <a href="#" class="btn btn-secondary ms-5">View More</a>
                                </div>
                            </div>

                        </div>

                <?php
                    };
                };
                ?>


            </div>
        </div>

        <div class="col-md-2 me-0">
            <ul class="navbar-nav me-auto text-center">

                <li class="nav-item bg-info">
                    <p class="text-light mb-1 mt-1">Featured Recommended</p>
                </li>

                <li>
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <a href="#"><img src="./images/xiaomilaptop15pro.jpg" class="d-block w-100" alt="..."></a>
                                <p class="carousel_text">xiaomi laptop 15 Pro</p>
                            </div>

                            <div class="carousel-item" data-bs-interval="2000">
                                <a href="#"><img src="./images/xiaomi_11.jpg" class="d-block w-100" alt="..."></a>
                                <p>xiaomi 11</p>
                            </div>

                            <div class="carousel-item">
                                <a href=""><img src="./images/MIXFOLD.jpg" class="d-block w-100" alt="..."></a>
                                <p>xiaomi MIX FOLD</p>
                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </li>




            </ul>





        </div>
        <div class="col-md-1">


        </div>



    </div>
    </div>





    <!-- last child -->
    <div class="bg-info p-3 text-center">
        <p>All rights reserved @- Designed by Jack-2022</p>
    </div>


    </div>




    <!-- boostrap 5.1.3 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>