
<div id="side" class="d-none d-md-block col-3 c-side">
<div id="mySidebar" class="c-side-h" >
<!-- <button  id="nav-btn" style="position: relative;
   right: -87vw;" class=" main-btn rounded d-md-none " onclick="closeNav()" >
   <i class="fa-solid fa-xmark"></i>
</button> -->
<div id="searchs" class="d-flex justify-content-end">
        <form method="GET" action="all_products.php" style="width: 85%;" class="d-flex  align-items-center me-1 mt-1">
            <input class="form-control rounded-pill me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn main-btn rounded-pill" type="submit"><i class="fa-solid fa-magnifying-glass ps-3 pe-3"></i></button>
        </form>
    </div>
<?php
if(isset($_SESSION['id'])) {
        $session_id=$_SESSION['id'];
        $time = "SELECT `time` FROM `sessions` WHERE `id`= ".$session_id.";";
        $time_expire=new DateTime(date(mysqli_fetch_array(mysqli_query($conn, $time))[0]));
        $time_now=new DateTime(date('y-m-d'));
        if(!$time_expire>$time_now){
            session_destroy();
            echo('
            <div class="m-2 p-2 c-box ">
                <div class="d-flex justify-content-center align-items-center">
                    <p class="">Join Us</p>
                </div>
                <div class="d-flex justify-content-center p-2  align-items-center">
                    <a class=" btn main-btn rounded-pill mx-2" href="login.php">login</a>
                    <a class=" btn main-btn rounded-pill mx-2" href="regester.php">regester</a>
                </div>
            </div>
            ');
        }
      

}
else{
    echo('
    <div class="m-2 p-2 c-box ">
        <div class="d-flex justify-content-center align-items-center">
            <p class="">Join Us</p>
        </div>
        <div class="d-flex justify-content-center p-2  align-items-center">
            <a class=" btn main-btn rounded-pill mx-2" href="login.php">login</a>
            <a class=" btn main-btn rounded-pill mx-2" href="regester.php">regester</a>
        </div>
    </div>
');
    }

?>
<!-- 
<a class=" btn main-btn rounded-pill my-2 mx-2 d-md-none " href="regester.php">regester</a> -->

<div class="c-map">


<?php
if(isset($_SESSION['id'])) {
if($time_expire>$time_now){
echo'
<ul id="side-ul">
    <li>
        <a class="btn mt-2 c-section" href="add_pro.php" type="button">
            add product
        </a>
    </li>

    <li>
        <a class="btn mt-2 c-section" href="all_products.php" type="button">
            all products
        </a>
    </li>
    <li>
        <a class="btn mt-2 c-section" href="all_users.php" type="button">
            all users
        </a>
    </li>
    <li>
        <a class="btn mt-2 c-section" href="add_admin.php" type="button">
            add admin
        </a>
    </li>
    <li>
        <a class="btn mt-2 c-section" href="profile.php" type="button">
            edit profile
        </a>
    </li>
    <li>
        <a class="btn mt-2 c-section" href="poster.php" type="button">
            manage posters
        </a>
    </li>
    <li>
        <a class="btn mt-2 c-section" href="add_offer.php" type="button">
            offers
        </a>
    </li>



';
}else{
echo '<script type="text/javascript">
window.location = "login.php"
</script>';
}
}?>
</ul>
<!-- <?php
if(isset($_SESSION['id'])) {
if($time_expire>$time_now){

            echo'
            <div class="d-flex justify-content-center p-2  align-items-center">
                <a class=" btn main-btn rounded-pill mx-2" href="logout.php">logout</a>
            </div>';
        }}?> -->
</div>


</div>
</div>
