<?php 
session_start();
include('db.php');
$invalid=0;
$first=0;
$invalid_pass=0;
if(isset($_POST['email']) and isset($_POST['password'])){
  if($_POST['email']=='' and $_POST['password']==''){
    $first=1;
    $invalid_pass=1;
  }
  $first=1;
  $get_cat_i = "SELECT * FROM `users` WHERE `email`='".$_POST['email']."';"; 
  $arr=mysqli_fetch_array(mysqli_query($conn, $get_cat_i));
  
  if($arr!= NULL){
    $first=1;
    $password = $arr['password'];
    $name = $arr['name'];
    if($password){
      $first=1;
  
      if($password==$_POST['password']){
        $first=1;
        $date_expire=date("Y-m-d", strtotime("tomorrow"));
        $session_id=rand(10000000,99999999);
        // echo($session_id);
  
        $_SESSION['id']=$session_id;
        $_SESSION['acc-id']=$arr['id'];
        $_SESSION['fav-id']=$arr['fav'];
        $_SESSION['cart-id']=$arr['cart'];
        $_SESSION['name']=$name;
        $_SESSION['email']=$_POST['email'];
        $_SESSION['phone']=$arr['phone'];
        $_SESSION['session']=$arr['session'];
        $_SESSION['role']=$arr['role'];
        $_SESSION['bio']=$arr['bio'];

        $se_id = "UPDATE `users` SET `session`='".$_SESSION['id']."' WHERE `name`='".$_SESSION['name']."'";
        mysqli_query($conn, $se_id);
  
  
  
        $get_img = "SELECT * FROM `users` WHERE `email`='".$_POST['email']."';";
        $_SESSION["picture"]= mysqli_fetch_array(mysqli_query($conn, $get_img))['picture'];
        
  
  
        // setcookie("session_id", $session_id, time() + (86400 * 1), "/");
        $sql = "INSERT INTO `sessions`(`email`, `id`, `time`)
                  VALUES ('".$_POST["email"]."', '".$_SESSION['id']."', '".$date_expire."')";
                  // echo($sql);
  
        $conn->query($sql);
        
        header("Location: index.php");
  
  
  
              
      }
      else{
        $first=1;
        $invalid=1;
      }
    }
  }else{
    $first=1;
    $invalid=2;
  }
 
}


      



?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.min.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/css.css" rel="stylesheet" >
    <title>login</title>
</head>
<body id="body">
  <div id="cont" style="height: fsdfsd ;">
  <?php
    
    include('navbar.php');
    
    ?>
  </div>
<section class="h-100 ">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <?php
          if($first==1){

              if($invalid_pass==1){
              echo'<div class="alert alert-danger rounded-pill" role="alert">
              enter username and password !
              </div>  ';}
              if($invalid==1 and $invalid_pass!=1){
                echo'<div class="alert alert-danger rounded-pill" role="alert">
                invalid username or password !
              </div>  ';
              }elseif($invalid==2){
                echo'<div class="alert alert-danger rounded-pill" role="alert">
                this user is not regesterd !
              </div>  ';
              }
            }

          
              
              
              
          ?>
          <form method="POST" action="login.php">
          <h3 class="mb-5">Sign in</h3>

<div class="form-outline mb-4">
  <input name="email" type="email" id="typeEmailX-2" placeholder="Email address" class="form-control form-control-lg" />
  </div>

<div class="form-outline mb-4">
  <input name="password" type="password" placeholder="password" id="typePasswordX-2" class="form-control form-control-lg" />
</div>

<!-- Checkbox -->
<div class="form-check d-flex justify-content-start mb-4">
  <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
  <label class="form-check-label" for="form1Example3"> Remember password </label>
</div>

<div class="form-group mt-3">
        <button type="submit" class="btn main-btn btn-block rounded-pill"> login  </button>
    </div>

    <div class=" mt-3">
    <a class="red" href="regester.php">regester</a>

    </div>


          </form>
            
          </div>
        </div>
      </div>  
    </div>
  </div>
</section>
<?php
include('footer.php')
?>
  </div>
    
<script src="js/js.js" ></script>
<script src="js/all.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>