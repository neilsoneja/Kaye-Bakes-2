<?php
session_start();

if (empty($_SESSION['upload-message'])){
  $_SESSION['cake_type']= $_POST['cake_type'];
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>customize</title>

    <link rel="stylesheet" type="text/css"  media="screen,projection" href="css/new.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

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
      <a href="/Kaye-Bakes-2/index.html" class="navbar-brand d-flex align-items-center"><img src="images/materialize-logo.png" alt="logo"></a> <span class="logo-text"></span>

      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <form action="Dhash/upload.php" method="post" enctype="multipart/form-data">
        <div class="container col-md-6">
            <div class="mb-5">
                <label for="Image" class="form-label">Upload Image for Inspiration</label>
                <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" onchange="preview()" required>
                
            </div>
            <img id="frame" src="" class="img-fluid" />
            <p class="text-danger"><?php echo $_SESSION['upload-message']; ?></p>
            <input  class="btn btn-secondary ground-dark my-2" type="submit" value="Upload Image" name="submit">
            </div>
          </form>
          
      </div>
    </div>
  </section>


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
 <script type="text/javascript" src="js/bootstrap/bootstrap.bundle.min.js"></script>  

<!-- jQuery Library -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

<!--bootstrap-->
<script type="text/javascript" src="js/bootstrap/bootstrap-datepicker.min.js"></script>

<!--custom-->
<script type="text/javascript" src="js/own-script.js"></script>

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
