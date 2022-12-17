<?php
session_start();
include('includes/db.php');
$log = fopen("log.txt", "a");
if(isset($_POST["name"]) and $_SESSION['admin']=="true"){


    if ($conn->connect_error) {
        fwrite($log, die("Connection failed: " . $conn->connect_error)."\n");
    }
    $image_file = $_FILES["file"];
    $sql = "INSERT INTO posters ( name,path)
    VALUES ('".$_POST["name"]."', '".$image_file["name"]."')";

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
        __DIR__ . "/../imgs/" . $image_file["name"]
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
<!-- <div  id="sside"  class="d-none d-md-block col-3 c-side rounded">
    
    
</div> -->
<?php 
        include('includes/side.php');
    ?>

<div id="content" class="col-lg-9 col-md-9 col-sm-12 mt-3">

<div class="container py-4 ">
    
<form method="post" action="poster.php" enctype="multipart/form-data">
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

  <div class="col-12">
    <button type="submit" class="btn main-btn">add product</button>
  </div>

</form>


</div>
<div class="row">
<?php 

$get_cat_i = "SELECT * FROM `posters` WHERE 1";
$run_cat_i = mysqli_query($conn, $get_cat_i);
while($row_cat_i = mysqli_fetch_array($run_cat_i))
{
  
  $name = $row_cat_i['name'];
  $img = $row_cat_i['path'];
  $id = $row_cat_i['id'];
  
    ?>
    <div class="card col-3">
      <img  src="../imgs/<?php echo $img ?>" class="d-block w-100" alt="<?php echo $$name ?>">
      <a href="delete_poster.php?id=<?php echo $id ;?>"><i class="fa-solid fa-trash"></i></a>
    </div>

    <?php }?>
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