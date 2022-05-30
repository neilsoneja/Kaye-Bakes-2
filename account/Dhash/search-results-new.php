<?php
session_start();
//retrieving query imagae filename and cake type
$queryName = $_SESSION['query-filename'];
$cake_type=$_SESSION['cake_type'];

//resseting output array
$output=array();

//executing python Dhash search indexing

exec( "python index_images.py --images images/new/".$cake_type."@");


//executing python Dhash search algo
exec( "python search.py --q uploads/".$queryName, $output);

//transferring search results to paths array
$paths = array();
  foreach ($output as $filename){
      //path to images dir

      $path="/Kaye-Bakes-2/account/Dhash/images/new/".$cake_type."@/".$filename;
      $paths[$filename]=$path; 
  }

//path to inquiry image
$queryPath="/Kaye-Bakes-2/account/Dhash/uploads/".$queryName;
$_SESSION['queryname']=$queryName;
$_SESSION['queryPath']=$queryPath;


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>customize</title>

    <link rel="stylesheet" type="text/css"  media="screen,projection" href="/Kaye-Bakes-2/account/css/new.css">
    <link rel="stylesheet" type="text/css" href="/Kaye-Bakes-2/account/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Kaye-Bakes-2/account/css/font-awesome.min.css">

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

  <section class="py-5  container  w-50">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col">
        <div class="card shadow-sm">
           
          <img class="img-thumbnail card-img-top"  src="<?php echo $queryPath; ?>"  alt="uploaded image"/>

        </div>
      </div>
      <div class="col">
        <h1>text text </h1>
      </div>
    </div>

  </section>

   
    <div class="album py-5 bg-light" >
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        
        <?php
        foreach ($paths as $name => $url)
        {
        ?>
        <div class="col">
          <form method="post" action="customization.php">
          <div class="card shadow-sm">
            <img class="img-thumbnail card-img-top"  src="<?php echo $url; ?>"  alt="uploaded image"/>
            <input id="baseName" name="baseName" value="<?php echo $name; ?>" hidden>
            <div class="card-body">
              <p class="card-text">Name with description</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Customize</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
        
        <?php
      }
      ?>
   
      </div>
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

<script>  
function preview() {
    frame.src = URL.createObjectURL(event.target.files[0]);
}
function clearImage() {
    document.getElementById('formFile').value = null;
    frame.src = "";
}
</script>    
  </body>
</html>
