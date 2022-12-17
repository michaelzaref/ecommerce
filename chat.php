<?PHP session_start();?>


<?PHP 
include('db.php');

if(isset($_GET['id'])){
    $table_name="chat".$_GET['id']."_".$_SESSION['acc-id'];
    
    $check_table="SELECT * FROM information_schema.tables WHERE table_schema = 'ecommerce' AND table_name = 'chat' LIMIT 1;";
    
    $run_cat_i = mysqli_query($conn, $check_table);
    if(isset($_GET['message'])){
        $sender= $_SESSION['acc-id'];
        $message= $_GET['message'];
        if(mysqli_fetch_array($run_cat_i)['TABLE_NAME']!=$table_name){
        
            $craet_table ="CREATE TABLE ".$table_name." (
                message varchar(255),
                sender varchar(255),
                time varchar(255)
            );";
            echo $craet_table;
            $run_cat_i = mysqli_query($conn, $craet_table);
            
    
        }
        $sql = "INSERT INTO `".$table_name."`(`message`, `sender`, `time`) VALUES ('".$message."','".$sender."','".date("Y/m/d")."')";
        mysqli_query($conn, $sql);
        echo($sql);
        

        
    }
    
    
    


    // -----


    // while($row_cat_i = mysqli_fetch_array($run_cat_i))
    // {
    //   $name = $row_cat_i['name'];
    //   $comment = $row_cat_i['comment'];

    // }
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
    <link href="css/product.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>e-commerce</title>
</head>
<body>
    <div >
        <?php
            include('navbar.php');
        ?>
    </div>
<div id="row" class="row">
        <div id="side" class="d-none d-md-block col-3 c-side rounded">
            <?php 
                include('side.php');
            ?>
            </div>
            <div id="content">



    <div class="col-lg-9 col-md-9 col-sm-12">
    <div  class="   row ">
    

    
    <div  class="mt-4 shadow-sm pe-4 ms-4 col col-sm-12 col-md-6">
        <div>
            <div class="">
                <p>comments</p>
            </div>
            <div id="scroll" class="c_comment">
                <?php
                    $get_cat_i = "SELECT * FROM `".$table_name."` WHERE 1";
                    $run_cat_i = mysqli_query($conn, $get_cat_i);
                    while($row_cat_i = mysqli_fetch_array($run_cat_i))
                    {
                    $sender = $row_cat_i['sender'];
                    $message_s = $row_cat_i['message'];
                ?>
                    <div class="shadow-sm p-1 my-3 rounded c-section">
                        <span><?php echo $sender; ?></span>
                        <p><?php echo $message_s; ?></p>
                    </div> 
                <?php
                }?>

            </div>

        </div>
        <div class="mt-5"  style="bottom: 0;">
            <div class=" input-group mb-3">
                <form action="chat.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type="text" name="message" class="form-control" placeholder="type message" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button  class="btn main-btn" type="submit" id="button-addon2">send</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
        
</div> 
        
    

<?php
 }
?> 

    </div>  

<?php

    include('footer.php');
?>
 

<script src="js/js.js" ></script>
<script src="js/all.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js" ></script>
<script src="js/jquery-3.6.1.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>