<?php
    include 'connect_db.php';
// submit products
    if(isset($_POST['submit_product'])){
        $p_name = $_POST['p_name'];
        $p_price = $_POST['p_price'];
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp_name=$_FILES['p_image']['tmp_name'];
        $p_image_folder='uploaded_img/'.$p_image;


        $add_product = mysqli_query($conn, " INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image') ");


        if($add_product){
            move_uploaded_file($p_image_tmp_name, $p_image_folder);
            header("location:admin.php");
            $message[] = "Product successfully add";
        }else{
            $message[] = "Product had already been add";
        }
    };


// delete products
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE `id` = $delete_id");

        if($delete_query){
            header("location:admin.php");
            $message[] = "Product successfully delete";
        }else{
            header("location:admin.php");
            $message[] = "Product already delete";
        };
    };

    






    if(isset($_POST['update_product'])){
        $update_p_id = $_POST['update_p_id'];
        $update_p_name = $_POST['update_p_name'];
        $update_p_price = $_POST['update_p_price'];
        $update_p_image= $_FILES['update_p_image']['name'];
        $update_p_image_tmp_name= $_FILES['update_p_image']['tmp_name'];
        $update_p_image_folder= 'upload_img/'.$update_p_image;
    
        $update_query=mysqli_query($conn,"UPDATE `products` SET name = '$update_p_name', 
        price = '$update_p_price', image = '$update_p_image'  WHERE id = '$update_p_id' ");
    
        if($update_query){
            header("location:admin.php");
            move_uploaded_file($update_p_image_tmp_name,$update_p_image_folder);
            $message[]='Product update successfully';
        }else{
            header("location:admin.php");
            $message[]='Product update failed';
        }
    
    
    }








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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

    if(isset($message)){
        foreach($message as $message){
            echo  '<div class="message">'.$message.' <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i>  </div>';
        }
    }
?>

<div class="container">
    <section>
        <form method="post" action="" enctype="multipart/form-data">
        <h3>Add a new product<i></i></h3>
        <div class="mb-3">
            <label  class="form-label">Product Name</label>
            <input type="text" name="p_name" placeholder="Enter the product name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label  class="form-label">Product Price</label>
            <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="form-control" required>
        </div>


        <div class="mb-3">
            <label  class="form-label">Product Image</label>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg"  class="form-control" required>
        </div>


        <div class="d-grid">
            <input type="submit" name="submit_product" value="Upload" class="btn btn-primary">
        </div>
        </form>
    </section>



    <section class="container-form">
        <table class="table  table-striped table-hover">
            <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product Price</th>
                    <th class="text-center">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Action</th>
                    </tr>
            </thead>

            <tbody>
            <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                $sum = 0;
                if(mysqli_num_rows($select_products) >0){
                    while( $row =mysqli_fetch_assoc($select_products)){
                    
                    $num = 1;
                    $sum = $sum+ $num;

                
            ?>
                <tr>
                    <th scope="row"><?php echo $sum ; ?></th>
                    <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['name'];?></td>
                    <td>$<?php echo $row['price'];?>/-</td>
                    <td><a href="admin.php?edit=<?php echo $row['id'] ;?>" class="btn btn-primary ms-0" onclick="return confirm('Are your sure you want to Update this?');">Update</a></td>
                    <td><a href="admin.php?delete=<?php echo $row['id'] ;?>" class="btn btn-danger ms-0" onclick="return confirm('Are your sure you want to Delete this?')">Delete</a></td>
                </tr>
            <?php
                    };
                };
            ?>

            </tbody>

        </table>
    </section>



<section class="edit-container">
        <?php
            if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
            

            if(mysqli_num_rows($edit_query) > 0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
            
        ?>

        <form method="post" action="" enctype="multipart/form-data">
            <h3>Update Product</h3>

            <img src="uploaded_img/<?php echo $fetch_data['image'] ;?>">

            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">

            <div class="mb-3">
                <label  class="form-label">Product Name</label>
                <input type="text" name="update_p_name" value="<?php echo $fetch_edit['name'];?>"  placeholder="Enter the product name" class="form-control" required>
            </div>


            <div class="mb-3">
                <label  class="form-label">Product Price</label>
                <input type="number" name="update_p_price" min="0" value="<?php echo $fetch_edit['price'];?>" placeholder="Enter the product price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label  class="form-label">Product Image</label>
                <input type="file" name="update_p_image" accept="image/png, image/jpg, image/jpeg"  class="form-control" required>
            </div>

            <div class="d-grid">
                <input type="submit" name="update_product" value="Update" class="btn btn-primary">
            </div>

            
            <div class="d-grid mt-3">
                <input type="reset" id="close-edit" value="Cancel" class="btn btn-secondary">
            </div>

        </form>

        <?php
                    };
                };
                echo "<script> document.querySelector('.edit-container').style.display = 'flex'; </script>";
            };
        ?>





    </section>












</div>







<!-- boostrap 5.1.3 js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

<script src="script.js"></script>
</body>
</html>