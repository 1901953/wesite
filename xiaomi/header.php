<?php
include 'connect_db.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- boostrap 5.1.3 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style.css -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0 sticky-top">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a href="#"><img src="./images/84-849853_shopping-cart-png-background-image-shopping-online-logo.png" alt="" style="width: 20px; height: 20px; margin:0 1rem; display:flex; align-items: center;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="align-items: center; padding-top:0px;">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Products</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <!-- php -->
                        <?php
                        $sum = 0;
                        $cart_quantity = mysqli_query($conn, "SELECT * FROM `cart`");
                        if (mysqli_num_rows($cart_quantity) > 0) {
                            while ($cart_query = mysqli_fetch_assoc($cart_quantity)) {
                                $num = 0;
                                $num = $num + $cart_query['quantity'];

                                $sum = $sum + $num;
                            }
                        }

                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php echo $sum; ?></sup></a>
                        </li>

                        <!-- php -->
                        <li class="nav-item">
                            <a class="nav-link" href="checkout.php">Checkouts</a>
                        </li>


                        <form class="d-flex" style="padding-left:41.5rem;">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <!-- "me-auto" 的意思是 margin-right:auto -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Signup</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>

            </ul>
        </nav>

    </div>




    <!-- boostrap 5.1.3 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>