<?php
session_start();
include 'connect_db.php';
include 'functions.php';

// check user whether press the "post" button
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was poseted
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];

    // 1.未解決問題，就是未能 echo 提醒用戶 不能注冊相同的user_name!!!!
    if (!empty($user_name) && !empty($user_password) && !empty($user_email) && !is_numeric($user_name)) {

        $account_query = mysqli_query($conn, "SELECT * FROM `users`");
        if (mysqli_num_rows($account_query) > 0) {
            $repeat_account = mysqli_fetch_assoc($account_query);

            if ($repeat_account['user_name'] == $user_name) {
                header("Location:signup.php");
            } else {
                // save database
                $user_id = random_num(20);

                $query = mysqli_query($conn, "INSERT INTO `users`(user_id, user_name, password, email) VALUES('$user_id','$user_name', '$user_password', '$user_email' )");

                header("Location:login.php");
            }
        }
    } else {
        echo '<div>Please enter some valid information! </div>';
    };
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="login_style.css">
    <!-- boostrap 5.1.3 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include 'header.php';
    ?>


    <div class="row mt-3">

        <div class="col-md-1">


        </div>


        <div class="col-md-10">
            <!-- products -->
            <div class="row">
                <h3 class="text-center" style="font-size:2.5rem; font-weight:bold">Signup</h3>
                <form class="mt-3" method="post">


                    <div class="mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                        <label class="form-label">User Name</label>
                        <input class="form-control border border-4" type="text" placeholder="Please, enter your user name" name="user_name">
                    </div>

                    <div class="mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control border border-4" placeholder="Please, enter your password" name="user_password">
                    </div>

                    <div class="mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control border border-4" placeholder="Please, enter your email" name="user_email">
                    </div>



                    <div class="mb-3 pt-3 text-center">
                        <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Signup">
                    </div>

                    <div class="mb-3 pt-3 text-center">
                        <a href="login.php" id="button" class="btn btn-outline-info" style="width:100%">Login</a>
                    </div>

                </form>

            </div>
        </div>



        <div class="col-md-1">


        </div>



    </div>


    <div class="bg-info p-3 fixed-bottom">
        <p>&nbsp;</p>
    </div>



    <!-- boostrap 5.1.3 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>