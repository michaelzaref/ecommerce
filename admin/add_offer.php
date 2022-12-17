<?php
session_start();
include('includes/db.php');
$log = fopen("log.txt", "a");
if(isset($_POST["name"]) and isset($_POST["prec"])and isset($_POST["code"])){

    fwrite($log, "date : ". date("Y/m/d") . " " .date("h:i:sa")."\n");
    

    fwrite($log,"product adding : "."\n" );
    fwrite($log,"product name : ".$_POST["name"] ."\n");
    fwrite($log,"disc : ".$_POST["prec"] ."\n");
    fwrite($log,"price : ".$_POST["code"] ."\n");


    if ($conn->connect_error) {
        fwrite($log, die("Connection failed: " . $conn->connect_error)."\n");
    }
    $image_file = $_FILES["file"];

    fwrite($log,"file name :".$image_file["name"] ."\n");

    $sql = "INSERT INTO offers ( name, precent, code,img)
    VALUES ('".$_POST["name"]."', '".$_POST["prec"]."', '".$_POST["code"]."','".$image_file["name"]."')";

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
        __DIR__ . "/../offers/" . $image_file["name"]
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
      include('includes/navbar.php');
  ?>
</div>
<div class=" c-side-h row">
<?php 
  include('includes/side.php');
?>
<div id="content"  class="col-lg-9 col-md-9 col-sm-12">

<div class="col-lg-9 col-md-9 col-sm-12">
  <div class="row">
    <?php

    $get_cat_i = "SELECT * FROM `offers` ";
    $run_cat_i = mysqli_query($conn, $get_cat_i);
    while($row_cat_i = mysqli_fetch_array($run_cat_i))
    {
      $name = $row_cat_i['name'];
      $precent = $row_cat_i['precent'];
      $img = $row_cat_i['img'];
      $code = $row_cat_i['code'];   
      $id = $row_cat_i['id'];
    ?>

      <div class="col col-lg-3 col-md-6 my-2 my-1">
        <div style="height: 30rem;">
          <div class="card ms-1 d-flex justify-content-center align-items-center">
            <img style="height: 13rem; width: 10rem;" src="../offers/<?php echo($img); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo($name); ?></h5>
                <p style="height: 6rem;width: 10rem;" class="card-text">Use code:<?php $code;?></p>
                <p class="card-text">up to  :  <?php echo($precent); ?>%</p>
                <a href="delete_offer.php?id=<?php echo $id;?>" class="btn main-btn" style="color: white;"><i class="fa-solid fa-trash"></i></a>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>




<div id="content" class="shadow border-dark col-lg-9 col-md-9 col-sm-12 mt-3">

<div class="container py-4 ">
    
<form method="post" action="add_offer.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">offer name</label>
    <input type="text" name="name" class="form-control" id="productnameinput" placeholder="name">
  </div>


  <div class="input-group mb-3">
    <div class="mb-3">
      <label for="formFileSm" class="form-label">upload image</label>
      <input type="file" name="file" id="file">
    </div>
  </div>


  <div class="form-group">
    <label  for="exampleFormControlTextarea1">up to (ineger %)</label>
    <textarea name="prec" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">code</label>
    <input name="code" type="text" class="form-control" id="productnameinput" placeholder="price">
  </div>

  <div class="col-12">
    <button type="submit" class="btn main-btn">add product</button>
  </div>

</form>


</div>

</div> 




</div>

<?php
include('includes/footer.php');
?>





<script src="js/js.js" ></script>
<script src="js/all.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>