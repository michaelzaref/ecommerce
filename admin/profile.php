<?php
session_start();
include('includes/db.php');

$log = fopen("log.txt", "a");
$q="SELECT * FROM `users` WHERE `email`='".$_SESSION['email']."'";
$arr=mysqli_fetch_array(mysqli_query($conn, $q));


if(isset($_POST["name"]) and isset($_POST["email"])and isset($_POST["phone"])and isset($_POST["role"])and isset($_POST["bio"])){

    fwrite($log, "date : ". date("Y/m/d") . " " .date("h:i:sa")."\n");
    
    if ($conn->connect_error) {
        fwrite($log, die("Connection failed: " . $conn->connect_error)."\n");
    }
    if ($_FILES["photo"]["name"]!=NULL) {
        $image_file =  $_FILES["photo"];
        $tmp=$_FILES["photo"]["tmp_name"];
        $sql = "UPDATE `users` SET `name`='".$_POST["name"]."',`email`='".$_POST["email"]."',`phone`='".$_POST["phone"]."',`picture`='".$image_file["name"]."',`session`='".$_SESSION['id']."' ,`role`='".$_POST['role']."',`bio`='".$_POST['bio']."'WHERE `email`='".$_SESSION['email']."'";
        
        if ($conn->query($sql) === TRUE ) {



            // Image not defined, let's exit
            if (!isset($image_file)) {
                fwrite($log,"error : ". die('No file uploaded.'."\n"));
            }
        
            
            move_uploaded_file(
        
                $tmp,
        
                
                __DIR__ . "/users-images/" . $image_file["name"]
            );
                fwrite($log , "New record created successfully"."\n==========================\n");
                $image_file = $_FILES["photo"];
                $_SESSION["picture"]= $image_file["name"];
            } else {
                fwrite($log ,"Error: " . $sql . "<br>" . $conn->error."\n==========================\n");
            }
            $_SESSION['role']=$_POST['role'];
            $_SESSION['bio']=$_POST['bio'];
        
    }else{

        $sql = "SELECT * FROM `users` WHERE `email`='".$_POST["email"]."'";
        $arr=mysqli_fetch_array(mysqli_query($conn, $sql));
        $image_file = $arr["picture"];
        $_SESSION["picture"]=  $arr["picture"];
        $sql = "UPDATE `users` SET `name`='".$_POST["name"]."',`email`='".$_POST["email"]."',`phone`='".$_POST["phone"]."',`session`='".$_SESSION['id']."' ,`role`='".$_POST['role']."',`bio`='".$_POST['bio']."'WHERE 1";

        $_SESSION['role']=$_POST['role'];
        $_SESSION['bio']=$_POST['bio'];
    }



   

    $conn->close();

}
else{
    fwrite($log, "date : ". date("Y/m/d") . " " .date("h:i:sa")."\n");
    fwrite($log ,"'add product' page loaded without post request\n==========================\n");
    
}

fclose($log);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>add product</title>
</head>

<body>

    <div class="row">
        <?php
    include('includes/navbar.php');
?>
    </div>
    
    <div style="min-height: calc(100vh - 155px);" class="row" id="row">
  <?php 
                    include('includes/side.php');
                ?>
            
            




        <div id="content" class="c-side-h col-lg-9 col-md-9 col-sm-12">

            <div class="container py-4 px-5">

                <?php
    if(isset($_SESSION['picture']) and $_SESSION['picture'] != NULL ){


        echo'<div class="form-group">
        <label for="exampleFormControlInput1">profile photo</label>
        <img src="../users-images/'.$_SESSION['picture'].'" alt="Avatar" class="rounded-circle profile-pic">
      </div>';
    }else{
        echo'<img src="../imgs/avatar.png" alt="Avatar" class="rounded-circle profile-pic">';
    }
    ?>

                <form method="post" action="profile.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">product name</label>
                        <input type="text" name="name" value="<?php echo$_SESSION["name"]; ?>" class="form-control"
                            id="productnameinput" placeholder="name">
                    </div>


                    <div class="input-group mb-3">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">upload image</label>
                            <input type="file" name="photo" value="<?php echo$_SESSION["picture"]; ?>" id="file">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">email</label>
                        <input name="email" value="<?php echo$_SESSION["email"]; ?>" type="text" class="form-control"
                            id="productnameinput" placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">phone</label>
                        <input name="phone" value="<?php echo$_SESSION["phone"]; ?>" type="text" class="form-control"
                            id="productnameinput" placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">role</label>
                        <input name="role" value="<?php echo$_SESSION["role"]; ?>" type="text" class="form-control"
                            id="productnameinput" placeholder="role">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">bio</label>
                        <input name="bio" value="<?php echo$_SESSION["bio"]; ?>" type="text" class="form-control"
                            id="productnameinput" placeholder="bio">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn main-btn">edit</button>
                    </div>

                </form>


            </div>

        </div>




    </div>

    <?php
include('includes/footer.php');
?>





    <script src="js/js.js" ></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>