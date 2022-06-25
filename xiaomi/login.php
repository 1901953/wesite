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


    if (!empty($user_name) && !empty($user_password) && !empty($user_email) && !is_numeric($user_name)) {
      // read database

      $result = mysqli_query($conn, "SELECT * FROM `users` WHERE user_name = '$user_name'limit 1 ");

      if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {

          $user_data = mysqli_fetch_assoc($result);

          if ($user_data['password'] == $user_password && $user_data['user_name'] == $user_name && $user_data['email'] == $user_email) {
            $_SESSION['user_id'] = $user_data['user_id'];
            header("Location:index.php");
            die;
          }
        }
      }
      echo '<div>User Name or Password is not correct, even though is email not correct! </div>';
    } else {
      echo '<div>User Name or Password is not correct, even though is email not correct! </div>';
    };
  };
  ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
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
         <h3 class="text-center" style="font-size:2.5rem; font-weight:bold">Login</h3>
         <form class="mt-3" method="post">


           <div class="mb-3">
             <label class="form-label">User Name</label>
             <input class="form-control" type="text" placeholder="Please, enter your user name" name="user_name" required>
           </div>

           <div class="mb-3">
             <label class="form-label">Password</label>
             <input type="password" class="form-control" placeholder="Please, enter your password" name="user_password" required>
           </div>


           <div class="mb-3">
             <label class="form-label">Email</label>
             <input type="email" class="form-control " placeholder="Please, enter your email" name="user_email">
           </div>


           <div class="mb-3 pt-3 text-center">
             <input type="submit" class="form-control btn btn-outline-primary" name="submit" value="Login" required>
           </div>

           <div class="mb-3 pt-3 text-center">
             <a href="signup.php" id="button" class="btn btn-outline-info" style="width:100%">Sign up</a>
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