<?php  
session_start();
date_default_timezone_set("Asia/Tokyo"); 

// slicing current date to int 
$date = date('y-m-d');
$year = (int)substr($date,0,2);
$month = (int)substr($date,3,5);
$day = (int)substr($date,6);


//getting variables
$dateinput = $_POST["date_delivery"];



$order = $_POST["order_type"];

//setting as session variables
$_SESSION["date_delivery"] = $dateinput;


//sliicing input date to int
$yearinput = (int)substr($dateinput,8);
$dayinput = (int)substr($dateinput,3,5);
$monthinput = (int)substr($dateinput,0,2);
$days= $dayinput - $day;


//assigning string for the warning
if ($days==0){
  $set="today";
  }
else{
  $set="tomorrow";
}


if ($monthinput == $month && $days < 2)
{

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Order</title>

  <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->

  <!-- CORE CSS--> 
    <link rel="stylesheet" type="text/css"  media="screen,projection" href="css/new.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap/signin.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
  <!-- CSS -->
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
    </style> 
</head>




<body class="text-center ">
  <!-- Start Page Loading 
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
   End Page Loading -->

<main class="form-signin w-100 m-auto">

<!--<img class="mb-4" src="/Kaye-Bakes-2/images/logo1.png" alt=""  height="57">-->
<h1 class="bebas mb-3 ground-color col s12">Warning!</h1>

<div id="login-page" class="row">
  <div class="container col s12 z-depth-4 card-panel">

    
      <div class="form-floating  mb-4">  
          <h5 class="bebas center"><?php echo "Your order is set for ".$set.".<br>";?></h5>
          <h6 class="bebas center">details details details</h6>
      </div>


      <div class="form-floating mb-3 row">
      <a href="http://neilsoneja/Kaye-Bakes-2" class="ground-dark w-50 btn btn-sm btn-secondary mb-3 ">Back to Homepage</a>
      <?php
        if($order === "menu"){
          echo '<a href="from_menu.php" class="ground-dark w-50 btn btn-sm btn-secondary mb-3">Proceed</a>' ;} 
        else{
          echo '<a href="customize-order.php" class="ground-dark w-50 btn btn-sm btn-secondary mb-3">Proceed</a>';}    
      ?>
       </div>
    </div>
  </div>
</main>

  <!-- ================================================
    Scripts
    ================================================ -->


  <!--bootstrap-->
  <script type="text/javascript" src="js/bootstrap/bootstrap.bundle.min.js"></script>  

    <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

  <!--custom-->
   <script type="text/javascript" src="js/own-script.js"></script>

    


</body>
</html>

<?php
}
else{

  if ($order === "menu")
    {
      header("Location: /Kaye-Bakes-2/account/from_menu.php"); 
      exit();
    }
  else{
      header("Location: /Kaye-Bakes-2/account/customize-order.php"); 
      exit();
  }
}
?>