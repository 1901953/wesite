 <?php 
  include 'connect_db.php';
  
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">


    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
          <h3 class="text-center">Login</h3>
          <form class="mt-3" method="post">


            <div class="mb-3">
            <label class="form-label">User Name</label>
            <input  class="form-control" type="text" placeholder="Please, enter your user name" name="user_name" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" placeholder="Please, enter your password" name="user_password" required>
            </div>


            <div class="mb-3 pt-3 text-center">
              <input type="submit" class="form-control btn btn-outline-primary"  name="submit" value="Submit" required>
            </div>
          </form>
            
        </div>
    </div>



    <div class="col-md-1">


    </div>
      


</div>

<br><br><br><br><br><br><br><br>
<div class="bg-info p-3 mt-4">
      <p>&nbsp;</p>
    </div>



<!-- boostrap 5.1.3 js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>