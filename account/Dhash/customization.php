<?php
session_start();
$baseName = $_POST["baseName"];
$cake_type=$_SESSION['cake_type'];

$basePath="/Kaye-Bakes-2/account/Dhash/images/new/".$cake_type."@/".$baseName;



$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "kaye-bakes";

$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kaye Bakes - Customize</title>

    <link rel="stylesheet" type="text/css"  media="screen,projection" href="/Kaye-Bakes-2/account/css/new.css">
    <link rel="stylesheet" type="text/css" href="/Kaye-Bakes-2/account/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Kaye-Bakes-2/account/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Kaye-Bakes-2/account/css/list-groups.css">

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
<body>
    


    <header>
      <div class="navbar navbar-dark ground-dark shadow-sm">
      <div class="container">
          <a href="/Kaye-Bakes-2/index.html" class="navbar-brand d-flex align-items-center"><img src="/Kaye-Bakes-2/account/images/materialize-logo.png" alt="logo"></a> <span class="logo-text"></span>

          </button>
      </div>
      </div>
    </header>


    <main>

    <!--base dafault details-->

    <form method="post" action="/Kaye-Bakes-2/account/Dhash/custom-add-cart.php">
   
    <div class="container">
        <section class="py-5  container  w-50">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                    
                    <img class="img-thumbnail card-img-top"  src="<?php echo $basePath; ?>"  alt="uploaded image"/>

                    </div>
                </div>

                <div class="col border">
                <?php
                
                $sql = "SELECT * FROM products WHERE image_url = '".$baseName."' ";
                $result = mysqli_query($conn, $sql);
                $query_results = mysqli_fetch_array($result);
                
                if ($query_results > 0) {
                  ?>
                  <h1 class="bebas"><?php echo $query_results['product_name'];?></h1>
                  <p>Size: <?php 
                  switch($query_results['cake_size']){
                    case '1layered':
                      echo "1 layer";
                      break;
                    case '2layered':
                      echo "2 layers";
                      break;
                    case '3layered':
                      echo "3 layers";
                      break;
                    case '4inches':
                      echo "4 inches";
                      break;
                    case '6inches':
                      echo "6 inches";
                      break;
                    case '9inches':
                      echo "9 inches";
                      break;      
                  }                  
                  ?></p>
                  <p>Flavor: <?php 
                  switch($query_results['cake_flavor']){
                    case 'chocolate':
                      echo "Chocolate Flavor";
                      break;
                    case 'red_velvet':
                      echo "Red Velvet";
                      break;
                    case 'carrot':
                      echo "Carrot Flavor";
                      break;
                    case 'mocha_chiffon':
                      echo "Mocha Chiffon Flavor";
                      break;
                    case 'vanilla_chiffon':
                      echo "Vanilla Chiffon Flavor";
                      break;
                    case 'carrot_dog':
                      echo "Carrot Flavor (Dog Cake)";
                      break;      
                  }
                  ?></p>
                  <p>Icing: <?php 
                  
                  switch($query_results['icing_flavor']){
                    case 'buttercream':
                      echo "Buttercream";
                      break;
                    case 'cream_cheese':
                      echo "Cream Cheese";
                      break;
                    case 'meringue':
                      echo "Meringue";
                      break;
                    case 'chocolate_icing':
                      echo "Chocolate";
                      break;
                    case 'vanilla_chiffon':
                      echo "Vanilla Chiffon Flavor";
                      break;
                    case 'potato':
                      echo "Potato";
                      break;      
                  }
                  
                  ?></p>

                  <?php
                  }
                else {
                  ?>
                  !DATABASE ERROR!
                  <?php }

                  echo "<input hidden value ='".$query_results['product_id']."' id = 'id_old' name='id_old'>";
                  echo "<input hidden value ='".$query_results['product_name']."' id = 'name_old' name='name_old'>";
                  echo "<input hidden value ='".$query_results['product_desc']."' id = 'desc_old' name='desc_old'>";
                  echo "<input hidden value ='".$query_results['price']."' id = 'price_old' name='price_old'>";
                  echo "<input hidden value ='".$query_results['cake_type']."' id = 'cake_type_old' name='cake_type_old'>";
                  echo "<input hidden value ='".$query_results['cake_size']."' id = 'cake_size_old' name='cake_size_old'>";
                  echo "<input hidden value ='".$query_results['cake_flavor']."' id = 'cake_flavor_old' name='cake_flavor_old'>";
                  echo "<input hidden value ='".$query_results['icing_flavor']."' id = 'icing_flavor_old' name='icing_flavor_old'>";
                  echo "<input hidden value ='".$query_results['image_url']."' id = 'image_url_old' name='image_url_old'>";
                  echo "<input hidden value ='".$query_results['customized']."' id = 'customized_old' name='customized_old'>";
                    ?>
                </div>
            </div>
        </section>
    </div>


    
  <!--Customizations start-->

  

    <div class="container  shadow-sm border">
        <div class="bebas row border ">
            <h3 class="p-3">Customize orders here</h3>  
        </div>
    </div>

    <div class="container  shadow-sm border">
      <div class="row">
        <h4 class="mt-2 ms-2 border pt-5">Size</h4>
      </div>

      <div class="row justify-content-md-center">
          <div class="col border ">
            <div class="mx-auto" >
            <h4 class=" bebas mt-2 fs-1 text-center"> <?php 
            switch($_SESSION['cake_type']){
              case 'cake':
                echo "Regular Cake";
                break;
              case 'cupcakes':
                echo "Cupcakes";
                break;
              case 'number_cup':
                echo "Number Cupcakes";
                break;              
              default:
                echo $_SESSION['cake_type']." Cake";
                break;            } 
              ?></h4>
          </div>
          </div>

      <!-- select id=cake_size -->    
          <div class="col">
            <?php
            switch($_SESSION['cake_type']){
              case "layered":
                ?>
                <select name="cake_size" id="cake_size"  class="form-control  w-50 mt-3  w-50 mt-3" >
                  <option value="" disabled selected hidden>Number of Layers</option>
                  <option value="2layered">Two-Layered Cake</option>
                  <option value="3layered">Three-Layered Cake</option>
                  </select>
           
                <?php
                break;
              case "cake":
                ?>
                <select name="cake_size" id="cake_size"  class="form-control  w-50 mt-3" >
                  <option value="" disabled selected hidden>Cake Size</option>
                  <option value="6inches">6 inches</option>
                  <option value="9inches">9 inches</option>
                  <option value="12inches">12 inches</option>
                  </select>
                <?php
                break;
              case "dog":
                ?>
                <select name="cake_size" id="cake_size"  class="form-control  w-50 mt-3" >
                  <option value="" disabled selected hidden>Cake Size</option>
                  <option value="4inches">4 inches</option>
                  <option value="6inches">6 inches</option>
                  <option value="9inches">9 inches</option>
                  </select>
                <?php
                break;
              case "cat":
                ?>
                <select name="cake_size" id="cake_size"  class="form-control  w-50 mt-3" >
                  <option value="" disabled selected >Cake Size</option>
                  <option value="4inches" selected >4 inches</option>
                  </select>
                <?php
                break;
              case "money":
                ?>
                <select name="cake_size" id="cake_size"  class="form-control  w-50 mt-3" >
                  <option value="" disabled selected hidden>Cake Size</option>
                  <option value="6inches">6 inches</option>
                  <option value="9inches">9 inches</option>
                  </select>
                <?php
                break;
              case "wedding":
                ?>
                <select name="cake_size" id="cake_size"  class="form-control  w-50 mt-3" >
                  <option value="" disabled selected hidden>Cake Size</option>
                  <option value="1layered">1 layer</option>
                  <option value="2layered">2 layers</option>
                  <option value="3layered">3 layers</option>
                  </select>
                <?php
                break;
              default:
                
                break;  }
              ?>
          </div>
      </div>
  </div>


    <!--radio name="cake_flavor" -->
    <div class="container shadow-sm ">
        <div class="row  ">
            <h4 class="mt-2 ms-2 border pt-5">Cake Flavor</h4>
        </div>
        <div class="row ">
            <div class="col ">
                <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                    <input class="list-group-item-check pe-none" type="radio" name="cake_flavor" id="chocolate" value="chocolate" >
                    <label class="list-group-item rounded-3 py-3" for="chocolate">
                        Chocolate
                      <span class="d-block small opacity-50">With support text underneath to add more detail</span>
                    </label>
                  
                    <input class="list-group-item-check pe-none" type="radio" name="cake_flavor" id="red_velvet" value="red_velvet">
                    <label class="list-group-item rounded-3 py-3" for="red_velvet">
                      Red Velvet
                      <span class="d-block small opacity-50">Some other text goes here</span>
     
                    </label>


                    <input class="list-group-item-check pe-none" type="radio" name="cake_flavor" id="carrot" value="carrot">
                    <label class="list-group-item rounded-3 py-3" for="carrot">
                      Carrot Cake
                      <span class="d-block small opacity-50">Some other text goes here</span>
     
                    </label>
                  </div>
            </div>
            <div class="col">
                <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                  
                    <input class="list-group-item-check pe-none" type="radio" name="cake_flavor" id="mocha_chiffon" value="mocha_chiffon">
                    <label class="list-group-item rounded-3 py-3" for="mocha_chiffon">
                      Mocha Chiffon
                      <span class="d-block small opacity-50">And we end with another snippet of text</span>
                    </label>
                  
                    <input class="list-group-item-check pe-none" type="radio" name="cake_flavor" id="vanilla_chiffon" value="vanilla_chiffon" >
                    <label class="list-group-item rounded-3 py-3" for="vanilla_chiffon">
                      Vanilla Chiffon
                      <span class="d-block small opacity-50">details ...</span>
                    </label>

                    
                    <input class="list-group-item-check pe-none" type="radio" name="cake_flavor" id="carrot_dog" value="carrot_dog" >
                    <label class="list-group-item rounded-3 py-3" for="carrot_dog">
                      Carrot Cake (Dog Cake)
                      <span class="d-block small opacity-50">details ...</span>
                    </label>
                  </div>
            </div>

        </div>
    </div>



    <!--radio name="icing"-->
    <div class="container">
        <div class="row  border">
            <h4 class="mt-2 ms-2">Icing</h4>
        </div>
        <div class="row border">
            <div class="col border">
                <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                    <input class="list-group-item-check pe-none" type="radio" name="icing" id="buttercream" value="buttercream" >
                    <label class="list-group-item rounded-3 py-3" for="buttercream">
                      Buttercream Frosting
                      <span class="d-block small opacity-50">With support text underneath to add more detail</span>
                    </label>
                  
                    <input class="list-group-item-check pe-none" type="radio" name="icing" id="cream_cheese" value="cream_cheese">
                    <label class="list-group-item rounded-3 py-3" for="cream_cheese">
                      Cream Cheese Frosting
                      <span class="d-block small opacity-50">Some other text goes here</span>
                    </label>

                    <input class="list-group-item-check pe-none" type="radio" name="icing" id="meringue" value="meringue">
                    <label class="list-group-item rounded-3 py-3" for="meringue">
                      Meringue Icing
                      <span class="d-block small opacity-50">(applicable for cupcakes only)</span>
                    </label>      
                  </div>
            </div>
            <div class="col border">
                <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                  
                    <input class="list-group-item-check pe-none" type="radio" name="icing" id="chocolate_icing" value="chocolate_icing">
                    <label class="list-group-item rounded-3 py-3" for="chocolate_icing">
                      Chocolate Frosting
                      <span class="d-block small opacity-50">And we end with another snippet of text</span>
                    </label>
                  
                    <input class="list-group-item-check pe-none" type="radio" name="icing" id="potato" value="potato" >
                    <label class="list-group-item rounded-3 py-3" for="potato">
                      Potato Icing (for Dog Cake)
                      <span class="d-block small opacity-50">This option is disabled</span>
                    </label>
                 
                    <input class="list-group-item-check pe-none" type="radio" name="icing" id="fondant" value="fondant" >
                    <label class="list-group-item rounded-3 py-3" for="fondant">
                      Fondant Icing
                      <span class="d-block small opacity-50">text text</span>
                    </label>
                 
                  </div>
            </div>

        </div>
    </div>

    
    <!--quantity number id="quantity" -->

    <div class="container">
        <div class="row border">
            <div class="col border">
              <h4 class=" text-end me-5 mt-1">Quantity</h4>
            </div>
            <div class="col border">
                <div class="form-control">
                    <input class="text-center w-50" type="number" name="quantity" id="quantity" min="1" value=1>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <button type="submit" class="btn btn-dark p-10" value="post">Submit</button>
      </form>
      </div>

    </div>
               
    

 

    
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>

 <!--bootstrap-->
 <script type="text/javascript" src="/Kaye-Bakes-2/account/js/bootstrap/bootstrap.bundle.min.js"></script>  

<!-- jQuery Library -->
<script type="text/javascript" src="/Kaye-Bakes-2/account/js/jquery-3.4.1.min.js"></script>

<!--bootstrap-->
<script type="text/javascript" src="/Kaye-Bakes-2/account/js/bootstrap/bootstrap-datepicker.min.js"></script>

<!--custom-->
<script type="text/javascript" src="/Kaye-Bakes-2/account/js/own-script.js"></script>

  
  </body>
</html>
