<?php
session_start();
include "connect_db.php";
include 'functions.php';

if (isset($_POST['submit'])) {
    $checkout_id = $_POST['id'];
    $checkout_user_id = $_POST['user_id'];
    $checkout_name = $_POST['real_name'];
    $checkout_user_name = $_POST['user_name'];
    $checkout_email = $_POST['email'];
    $checkout_phone_number = $_POST['phone_num'];
    $checkout_address = $_POST['address'];
    $checkout_payment = $_POST['Mpay'];








    $query = mysqli_query($conn, "INSERT INTO `checkouts`(id, user_id, name, user_name, email, phone_number, address, payment) 
    VALUES('$checkout_id','$checkout_user_id', '$checkout_name', '$checkout_user_name', '$checkout_email', '$checkout_phone_number', '$checkout_address', '$checkout_payment')");

    if ($query) {
        echo "Checkouts success";
    } else {
        echo "Checkouts failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkouts</title>
    <!-- boostrap 5.1.3 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style.css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "header.php";
    ?>
    <div class="row">
        <p class="text-center mt-1 mb-4" style="font-size:2rem; font-family:'Lucida Grande'; ">Xiaomi Checkouts</p>

        <div class="col-md-1"></div>

        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">

                    <?php
                    $check_id = $_SESSION['id'];
                    $check_user_id = $_SESSION['user_id'];
                    $user_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$check_id' AND user_id = '$check_user_id' ");

                    if (mysqli_num_rows($user_query) > 0) {
                        while ($user_fetch = mysqli_fetch_assoc($user_query)) {
                    ?>

                            <form class="row g-3 border border-2" style="padding:1rem; border-radius:0.5rem;" method="post">
                                <input type="hidden" name="id" value="<?php echo $user_fetch['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_fetch['user_id'] ?>">
                                <input type="hidden" name="user_name" value="<?php echo $user_fetch['user_name'] ?>">


                                <div class="col-md-4" style="width:100%">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="real_name" placeholder="Please enter your real name" required>
                                </div>


                                <div class="col-md-4" style="width:100%">
                                    <label class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" placeholder="Please enter your email" required>
                                    </div>
                                </div>

                                <div class="col-md-4" style="width:100%">
                                    <label class="form-label">Phone number</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="phone_num" placeholder="Please enter your phone number" required>
                                    </div>
                                </div>

                                <div class="col-md-6" style="width:100%">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>

                                <div class=" col-md-3" style="width:100%">
                                    <label class="form-label">Payment method</label>
                                    <select class="form-select">
                                        <option value="Mpay" name="Mpay">Mpay</option>
                                        <option value="ICBC" name="ICBC">ICBC</option>
                                        <option value="BNU" name="BNU">BNU</option>
                                    </select>
                                </div>



                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Confim submit">
                                </div>


                        <?php
                        };
                    };
                        ?>


                            </form>


                </div>
            </div>
        </div>


        <div class="col-md-1"></div>



    </div>


    <div class="bg-info p-3 fixed-bottom text-center">
        &nbsp;
    </div>





    <!-- boostrap 5.1.3 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>