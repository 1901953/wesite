



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- boostrap 5.1.3 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">


    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style.css -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
    @include 'header.php';
?>

    <!-- third child -->
    <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communications is at the heart of e-commerce and community</p>
    </div>

    <!-- four child -->
    <!-- col md-10 的意思是 中型設備-屏幕寬度為768px , md-10意思是在中型設備裏面 這個内容占了10個空間，總共為12個空間-->
    <div class="row p-0">

        <div class="col-md-1">


        </div>
        <div class="col-md-8">
        <!-- products -->
            <div class="row">
                <div class="col-md-4 mb-2">

                    <div class="card">
                        <img src="./images/xiaomi_phone7.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="#" class="btn btn-secondary">View More</a>
                        </div>
                    </div>

                </div>

                


                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/xiaomi_phone_8.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="#" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>




                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/xiaomi_phone9.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="#" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/xiaomi_phone10.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="#" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/xiaomi_phone11.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="#" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>




                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/xiaomi_phone12.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="#" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>


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
                        <a href="#"><img src="./images/xiaomi_phone10.jpg" class="d-block w-100" alt="..."></a>
                        <p class="carousel_text">xiaomi 10</p>
                        </div>

                        <div class="carousel-item" data-bs-interval="2000">
                        <a href="#"><img src="./images/xiaomi_phone13.jpg" class="d-block w-100" alt="..."></a>
                        <p>xiaomi MIX Alpha</p>
                        </div>

                        <div class="carousel-item">
                        <a href=""><img src="./images/xiaomi_phone14.jpg" class="d-block w-100" alt="..."></a>
                        <p>xiaomi 9 Pro</p>
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

                <li class="nav-item bg-info">
                    <p class="text-light mb-1 mt-1">New Products</p>
                </li>

                <li>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mt-1">
                                <a href="#" class="smbar_image"><img src="./images/xiaomi_phone11.jpg" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <p class="card-title text-center">xiaomi 9s</p>
                                    <p class="card-text text-center">$100/-</p>
                                    
                                </div>
                            </div>

                        </div>
                        


                        <div class="col-md-6">
                            <div class="card mt-1">
                                <a href="#" class="smbar_image"><img src="./images/xiaomi_phone11.jpg" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <p class="card-title text-center">xiaomi 9s</p>
                                    <p class="card-text text-center">$100/-</p>
                                    
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="card mt-1">
                                <a href="#" class="smbar_image"><img src="./images/xiaomi_phone11.jpg" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <p class="card-title text-center">xiaomi 9s</p>
                                    <p class="card-text text-center">$100/-</p>
                                    
                                </div>
                            </div>

                        </div>





                        <div class="col-md-6">
                            <div class="card mt-1">
                                <a href="#" class="smbar_image"><img src="./images/xiaomi_phone11.jpg" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <p class="card-title text-center">xiaomi 9s</p>
                                    <p class="card-text text-center">$100/-</p>
                                    
                                </div>
                            </div>

                        </div>


                    </div>
                </li>

<!-- 
                <li class="nav-item bg-info mt-1">
                    <p>Other products of interest</p>
                </li> -->

                    
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</body>
</html>