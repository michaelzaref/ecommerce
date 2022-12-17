<?php
session_start();
include('db.php');
$log = fopen("log.txt", "a");
if(isset($_POST["name"]) and isset($_POST["disc"])and isset($_POST["price"]) and isset($_POST["cat"])){

    fwrite($log, "date : ". date("Y/m/d") . " " .date("h:i:sa")."\n");
    

    fwrite($log,"product adding : "."\n" );
    fwrite($log,"product name : ".$_POST["name"] ."\n");
    fwrite($log,"disc : ".$_POST["disc"] ."\n");
    fwrite($log,"price : ".$_POST["price"] ."\n");
    fwrite($log,"cat : ".$_POST["cat"]."\n" );

    if ($conn->connect_error) {
        fwrite($log, die("Connection failed: " . $conn->connect_error)."\n");
    }
    $image_file = $_FILES["file"];

    fwrite($log,"file name :".$image_file["name"] ."\n");

    $sql = "INSERT INTO product ( name, disc, price,rate,image,note,trader)
    VALUES ('".$_POST["name"]."', '".$_POST["disc"]."', '".$_POST["price"]."','','".$image_file["name"]."','','".$_SESSION['email']."')";

    if ($conn->query($sql) === TRUE) {



    // Image not defined, let's exit
    if (!isset($image_file)) {
        fwrite($log,"error : ". die('No file uploaded.'."\n"));
    }

    // Move the temp image file to the images/ directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],

        // New image location, __DIR__ is the location of the current PHP file
        __DIR__ . "/images/" . $image_file["name"]
    );
        fwrite($log , "New record created successfully"."\n==========================\n");
    } else {
        fwrite($log ,"Error: " . $sql . "<br>" . $conn->error."\n==========================\n");
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

    <link href="css/all.min.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/css.css" rel="stylesheet" >


    <title>add product</title>
</head>
<body>

<div class="row">
<?php
    include('navbar.php');
?>
</div>
<div class=" c-side-h row">
<!-- <div  id="sside"  class="d-none d-md-block col-3 c-side rounded">
    
    
</div> -->
<?php 
        include('side.php');
    ?>

<div id="content" class="col-lg-9 col-md-9 col-sm-12 mt-3">

<div class="container py-4 ">
    
<form method="post" action="add_pro.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">product name</label>
    <input type="text" name="name" class="form-control" id="productnameinput" placeholder="name">
  </div>


  <div class="input-group mb-3">
  <div class="mb-3">
    <label for="formFileSm" class="form-label">upload image</label>
    <input type="file" name="file" id="file">
  </div>
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">catigory</label>
    <select class="form-control" name="cat" id="exampleFormControlSelect1">
      <option>electronic</option>
      <option>fasion</option>
      <option>computer</option>
    </select>
  </div>

  <div class="form-group">
    <label  for="exampleFormControlTextarea1">discription</label>
    <textarea name="disc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">price</label>
    <input name="price" type="text" class="form-control" id="productnameinput" placeholder="price">
  </div>

  <div class="col-12">
    <button type="submit" class="btn main-btn">add product</button>
  </div>

</form>


</div>

</div> 




</div>

<?php
include('footer.php');
?>





<script src="js/js.js" ></script>
<script src="js/all.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>