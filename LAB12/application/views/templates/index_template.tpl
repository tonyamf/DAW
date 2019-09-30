<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nib.</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <style>
        i{
          position: relative;
          top: 5px;
        }
     </style>
  </head>

  <body>

  <!-- /navbar -->
  <nav class="navbar navbar-expand-md fixed-top-sm justify-content-start flex-nowrap navbar-dark bg-primary">
   <div class="container">
     <div class="nav-item  text-white-50">{$welcome}</div>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav flex-row ml-auto">
         <li class="nav-item">
              <a class="nav-link mt-2 mr-3" href="{$link2}">{$menu2}</a>
            </li>
         <li class="nav-item">
              <a class="nav-link mt-2 mr-3" href="{$link3}">{$menu3}</a>
              </li>
     </ul>
   </div>
   </div>
 </nav>
 <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
      <div class="container">
        <a class="navbar-brand text-warning" href="{$link1}"><h3>Nib<strong> .</strong></h3></a>

          <ul class="navbar-nav ml-auto">


              <li class="nav-item">
                <a class="nav-link mr-3" href="{$cart_link}/{$cart}"><i class="material-icons">
   shopping_cart
   </i>
                 {$cart} € ({$cartitems})</a>
                     <small><a class="nav-link mr-3" href="{$empty_cart}">Empty Cart</a></small>
             </ul>
                </li>

      </div>
    </nav>


    <!-- END NAV -->


    <!-- Carousel -->
    <div class="container  bg-info">
        <div class="row justify-content-md-center ">
          <div class="col-md-9">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block w-100 img-fluid" src="{$base_url}/imagens/pencarol1.png" alt="Responsive image First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 img-fluid" src="{$base_url}/imagens/pencarol2.png" alt="Responsive image Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 img-fluid" src="{$base_url}/imagens/pencarol3.png" alt="Responsive image Second slide">
                </div>
              </div>
              <a class="left carousel-control" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-lg-2 mt-5 ">
            <h4 class=" mx-5 pt-5 text-center text-lg-left text-white"><br><b>Write<br>Your<br>Way
</b><h4>
          </div>
      </div>
    </div><!-- /jumbotron -->

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">{$filtro}</h1>
          <div class="list-group">

            <a href="{$filtro_link}/0" class="list-group-item">Pens</a>
            {foreach $categories as $category}

            <a href="{$filtro_link}/{$category.id}" class="list-group-item">{$category.name}</a>
                    {/foreach}
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9 mt-5">


          <div class="row">
            {foreach $products as $product}
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src={$product.image} alt=""></a>

                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{$product.name}</a>
                  </h4>

                  <h5>{$product.price}€</h5>
                  <p class="card-text">{$product.description}</p>
                </div>
                <div class="card-footer bg-info text-center">
                  <a href="{$addcart}/{$product.id}" class=""><small class="text-white"> Add to Cart</small>
                </div>
              </div>
            </div>
            {/foreach}



          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="container-fluid">

  <!-- container -->
        <!-- about -->
        <hr class="mx-5">
        <div class="row pt-4 pb-1 mx-5 text-muted ">
          <div class="col-md col-lg-5 ">
            <p><strong>About LAB3</strong></p>
            <p>Layout with forms and carousel made with <b>Bootstrap</b> framework<p>
          </div>
          <div class="col-md col-lg-5 ml-auto">
            <p><b>BOOTSTRAP</b> <br>Build responsive, mobile-first projects on the web with the world's most popular front-end component library.</p>
          </div>
        </div><!-- /about -->
        <hr class="mx-5">
        <!-- Footer -->
        <div class="row py-3 mx-5 ">
          <div class="col-md-7">
           <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="https://www.ualg.pt/pt
                " target="_blank">Ualg</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://intranet.deei.fct.ualg.pt/DAW/calendar.html" target="_blank">Daw calender</a>
              </li>
            </ul>
          </div>
          <div class="col-md text-md-right">
            <small>&copy; 2018 DAW, Designed by <b>Antonio Franco</b></small>
          </div>
        </div><!-- /Footer -->


      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>

</html>
