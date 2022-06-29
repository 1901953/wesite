<?php
include "connect_db.php";


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `cart` WHERE id = $delete_id");

    if ($delete_query) {
        echo "The product successfully deleted!";
    } else {
        echo "The product already deleted!";
    }
}

if (isset($_POST['update_update_btn'])) {
    $update_product_id = $_POST['update_quantity_id'];
    $update_product_quantity = $_POST['update_quantity'];

    $update_query = mysqli_query($conn, "UPDATE `cart` SET  quantity = '$update_product_quantity' WHERE id =' $update_product_id'");
}


if (isset($_GET['delete_all'])) {
    $delete_all_cart = mysqli_query($conn, "DELETE FROM `cart`");

    if ($delete_all_cart) {
        echo "All the products successfully deleted!";
        header('Location:cart.php');
    } else {
        echo "All the products already delete!";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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

    <div class="row">

        <div class="col-md-1">

        </div>


        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">


                    <table class="table table-hover">
                        <p class="text-center fs-2" style="font-family:'Lucida Grande'">Shopping Cart</p>

                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                            $select_carts = mysqli_query($conn, "SELECT * FROM `cart`");
                            $sum = 0;
                            $grand = 0;

                            if (mysqli_num_rows($select_carts) > 0) {
                                while ($row = mysqli_fetch_assoc($select_carts)) {

                                    $num = 1;
                                    $sum = $sum + $num;



                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $sum; ?></th>
                                        <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td>$<?php echo $row['price']; ?>/-</td>
                                        <td>

                                            <form action="" method="post">
                                                <input type="hidden" name="update_quantity_id" value="<?php echo $row['id'] ?>">
                                                <input type="number" name="update_quantity" min="1" placeholder="More products ..." value="<?php echo $row['quantity'] ?>" class="border border-secondary me-2 rounded-3">
                                                <input type="submit" name="update_update_btn" value="update" class="btn btn-outline-success">
                                            </form>


                                        </td>

                                        <td>$<?php echo $sub_total = $row['price'] * $row['quantity']; ?>/-</td>


                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                            <td><a href="cart.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger me-md-2" onclick="return confirm('Are your sure you want to Delete this?')">Delete</a></td>
                                        </div>




                                    </tr>
                            <?php
                                    $grand = $grand + $sub_total;
                                };
                            };
                            ?>


                    </table>

                    <p style="font-size:1.5rem; color:aqua;">Grand Total : <span style="color:black;">$<?php echo $grand; ?>/-</span></p>

                    <div class="d-md-flex justify-content-md-end">
                        <a href="cart.php?delete_all" class="btn btn-outline-danger<?= ($grand > 1) ? '' : 'disable'; ?> mb-4 mt-2 me-5" style=" margin-right:2.5rem;">DELETE ALL</a>
                    </div>

                </div>
            </div>

        </div>




        <div class="col-md-1">

        </div>







    </div>

    <div class="bg-info p-3 text-center">
        <p>All rights reserved @- Designed by Jack-2022</p>
    </div>






    <!-- boostrap 5.1.3 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>