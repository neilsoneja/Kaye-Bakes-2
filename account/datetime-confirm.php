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
$yearinput = (int)substr($dateinput,2,4);
$monthinput = (int)substr($dateinput,5,7);
$dayinput = (int)substr($dateinput,8);
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
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/drop-down.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

    <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }



</style> 
</head>




<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
     
        <div class="row">
          <div class="input-field col s12 center">
            <h4><?php 
              echo "Your order is set for ".$set.".<br>";  
    
            ?>
            </h4>
            <h5 class="center col s12">Rush orders depends on ingridients available. Please contact us before you proceed win the order<br>Kaye Bakes<br>00000</h5>
          </div>
        </div>

		
        <div class="row center">
          <div class="input-field col s12">
          
           <a href="http://neilsoneja/Kaye-Bakes-2"  class="center btn waves-effect waves-light "> Back to Homepage</a>

           <?php
           if($order === "menu"){

           echo '<a href="from_menu.php" class="center btn waves-effect waves-light ">Proceed with order</a>' ;
           } 
           else{
            echo '<a href="customize-order.php" class="center btn waves-effect waves-light ">Proceed with order</a>';

           }  

           
          ?>
          </div>
          
        </div>
      
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
     <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/drop-down.js"></script>
     
      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    
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