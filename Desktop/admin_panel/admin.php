<?php 

// 以下這裏一解封就會報錯

@include 'connect_db.php';
if(isset($_POST['add_product'])){
    $p_name=$_POST['p_name'];
    $p_price=$_POST['p_price'];
    $p_image=$_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder='uploaded_img/'.$p_image;

   

//     // 数据库上执行/执行给定的查询.
//     // $conn所處的位置是用於與MySQL服務器連接的對象

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(`name`, `price`, `image`) 
   VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};


if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn,"DELETE FROM `products` WHERE id = '$delete_id'");
    if($delete_query){
        // header()用於發送原始HTTP 標頭
        header('location:admin.php');
        $message[]="product has been deleted";
    }else{
        header('location:admin.php');
        $message[]='product can not be deleted';
    }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- customer link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

if(isset($message)){

    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span><i class="fas fa-times" onclick="this.parentElement.style.display=`none`; "></i>
        </div>';
 };
};

?>






<?php include 'header.php';?>
    <!-- 如果想使用 method="post"，就必須使用 enctype="multipart/form-data"-->
    <!-- method="post"是比起get更加的安全，因爲post是只顯示於body的裏面  -->
    <!-- input 入邊的 required 的作用就是 要求用戶在提交表單前 必須要輸入字段！！ -->
    <div class="container">
        <section>

        <!-- 這裏的script的作用就是防止頁面刷新時，由於method="post"的刷新慣性重複用戶添加產品的動作 -->
        <script>

        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );}
        
        </script>


        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
        <h3>add a new product</h3>
        <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
        <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
        <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
        <input type="submit" value="add the product" name="add_product" class="btn">
        </form>

        </section>

<!-- table 分为三类： thead, tbody, tfoot 
然后再细分： th(标题),tr(行),td(td写在tr里面)
-->
        <section class="display-product-table">

            <table>
                <thead>
                    <th>product iamge</th>
                    <th>product name</th>
                    <th>product price</th>
                    <th>action</th>
                </thead>


                <tbody>
                <?php
                //mysqli_num_rows: 通常用于检查数据库中是否存在数据
                // mysqli_fetch_assoc: 用于返回一个关联数组
                        $select_products=mysqli_query($conn,"SELECT * FROM `products`");
                        if(mysqli_num_rows($select_products) > 0){
                            while($row = mysqli_fetch_assoc($select_products)){



                            
                        
                ?>
                <!-- 經驗之談：注意“   img src="uploaded_img/  《--這個破折號要緊貼php echo $row['iamge'] ” 這是一個路徑來的，中間不能存在任何空格！！    -->
                <tr>
                    <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>$<?php echo $row['price']; ?>/-</td>
                    <td><a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are your sure you want to delete this?');">
                    <i class="fas fa-trash"></i> Delete </a>
                    <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn">
                    <i class="fas fa-edit"></i> Update</a> 

                    </td>
                </tr>

                <?php
                            };
                        }else{
                            echo "<div class='empty'> <h1> no product added </h1>  </div>";
                        };
                        

                ?>

                </tbody>
                

            </table>
        </section>


        <section class="edit-form-container">

        <?php
   
            if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
                if(mysqli_num_rows($edit_query) > 0){
                    while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>


            <!--enctype="multipart/form-data", 指定將資料回發到伺服器時瀏覽器使用的編碼型別。用於表單裡有圖片上傳。  
            詳細解釋：https://codertw.com/%E7%A8%8B%E5%BC%8F%E8%AA%9E%E8%A8%80/544448/-->

            
            <!-- type="hidden",  "hidden" 类型的 <input> 元素允许 Web 开发者存放一些用户不可见、不可改的数据，在用户提交表单时，
            这些数据会一并发送出。比如，正被请求或编辑的内容的 ID，
            或是一个唯一的安全令牌。这些隐藏的 <input>元素在渲染完成的页面中完全不可见，
            而且没有方法可以使它重新变为可见。 -->

            <form action="" method="post" enctype="multipart/form-data">
                <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" alt="" height= "200">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                <input type="text" class= "box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                <input type="number" min = "0" class= "box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                <input type="file"  class= "box" required name="update_p_image" accept="image/jpg, image/jpeg, image/png" >
                <input type="submit" value="Update Product" name="update_product" class="btn">
                <input type="reset" value= "cancel" id="close-edit" class="option-btn">
                
            </form>

        <?php

                };
              };
            };
        ?>



        </section>

    </div>
    



<!-- customer link -->
<script src="script.js"></script>
</body>
</html>