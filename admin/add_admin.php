<?php
session_start();
$email_exist=0;
$password_not_match=0;
include('includes/db.php');
$log = fopen("log.txt", "a");


if($_SESSION['admin']=="true" and isset($_POST["name"]) and isset($_POST["email"])and isset($_POST["phone_code"]) and isset($_POST["phone_number"])and isset($_POST["password"])and isset($_POST["re_password"])){

    fwrite($log, "date : ". date("Y/m/d") . " " .date("h:i:sa")."\n");
    fwrite($log,"account regestering : "."\n" );
    fwrite($log,"name : ".$_POST["name"] ."\n");
    fwrite($log,"email : ".$_POST["email"] ."\n");
    fwrite($log,"phone_code : ".$_POST["phone_code"] ."\n");
    fwrite($log,"phone_number : ".$_POST["phone_number"]."\n" );



    $select_mail = mysqli_query($conn, "SELECT * FROM admin WHERE email = '".$_POST['email']."'");
    if(!mysqli_num_rows($select_mail)) {

        fwrite($log, "email doesn't exists \n");
        if($_POST["password"]==$_POST["re_password"]){

            $cartid =rand(10000,99999);
            $fav =rand(10000,99999);
            $sql = "INSERT INTO admin (name ,email ,phone ,password ,picture ,role,cat,fav)
                VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["phone_number"]."','".$_POST["password"]."','','".$_POST["role"]."','".$cartid."','".$fav."')";
            if ($conn->connect_error) {

                fwrite($log, die("Connection failed: " . $conn->connect_error)."\n");
            }

            if ($conn->query($sql) === TRUE) {
                
                $cart="CREATE TABLE `cart_".$cartid."` (
                    `id` int(10) UNSIGNED NOT NULL,
                    `count` varchar(100)
                  )";
                  if ($conn->query($cart) === TRUE) {
                    fwrite($log , "cart cerated"."\n==========================\n");
                  }
                  $fav="CREATE TABLE `fav_".$fav."` (
                    `id` int(10) UNSIGNED NOT NULL
                  )";
                  if ($conn->query($fav) === TRUE) {
                    fwrite($log , "fav table cerated"."\n==========================\n");
                  }
                fwrite($log , "New record created successfully"."\n==========================\n");

            } else {
                fwrite($log ,"Error: " . $sql . "<br>" . $conn->error."\n==========================\n");
            }
        
            $conn->close();
        
        }
        else{
            
            fwrite($log ,"password didn't match \n==========================\n");
            $password_not_match=1;
            
        }
        }
        else{
            fwrite($log ,"email is already exist \n==========================\n");
            $email_exist=1;
        }
    }
else{
        fwrite($log, "date : ". date("Y/m/d") . " " .date("h:i:sa")."\n");
        fwrite($log ,"'regster' page loaded without post request\n==========================\n");    
    }

fclose($log);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.min.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/css.css" rel="stylesheet" >
    <title>Document</title>
</head>
<body>
    <?php
    include('includes/navbar.php')
    ?>



<section class="h-100 ">
  <div class="container py-5 h-100">
    <div class="py- row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-5" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">regester</h3>
<?php

if($email_exist==1){
    echo'<div class="alert alert-danger rounded-pill" role="alert">
    email is already exisit !
    </div>  ';
}
if($password_not_match==1){
    echo'<div class="alert alert-danger rounded-pill" role="alert">
    password does not match !
    </div>  ';
}


?>
            <form method="post" action="add_admin.php">
                <div class="form-group input-group mt-3">
                    <div class="input-group-prepend">

                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>

                    </div>

                    <input name="name" class="form-control" placeholder="Full name" type="text">

                </div> <!-- form-group// -->

                <div class="form-group input-group mt-3">
                    <div class="input-group-prepend">

                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>

                    </div>

                    <input name="email" class="form-control" placeholder="Email address" type="email">

                </div> <!-- form-group// -->

                <div class="form-group input-group mt-3">
                    <div class="input-group-prepend">

                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <select name="phone_code" class="custom-select" style="max-width: 120px; border:1px;">
                        <option selected="">+20</option>
                        <option >+971</option>
                        <option value="1">+972</option>
                        <option value="2">+198</option>
                        <option value="3">+701</option>
                    </select>
                    <input name="phone_number" class="form-control" placeholder="Phone number" type="text">
                </div> 


                <div class="form-group input-group mt-3">
                    <div class="input-group-prepend">

                        <span class="input-group-text"> <i class="fa-solid fa-pen"></i> </span>
                        
                    </div>
                    <div style="border-width: 10px;"><span class="p-2"  >role </span> </div>
                    
                    <select name="role" class="custom-select" style="max-width: 120px; border:1px;">
                        <option selected="">buyer</option>
                        <option >trader</option>
                        
                    </select>
                    
                </div> 

                <div class="form-group input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="Create password" type="password">
                </div> <!-- form-group// -->
                <div class="form-group input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="re_password" class="form-control" placeholder="Repeat password" type="password">
                </div> <!-- form-group// -->                                      
                <div class="form-group mt-3">
                    <button type="submit" class="btn main-btn btn-block rounded-pill"> Create Account  </button>
                </div> <!-- form-group// -->      
                <p class="text-center mt-3">Have an account? <a class="red" href="login.php">Log In</a> </p>                                                                 
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    

<!--container end.//-->
<div id="div">

        </div>
<?php
include('includes/footer.php')
?>

<style>

</style>
<script src="js/js.js" ></script>
<script src="js/all.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>