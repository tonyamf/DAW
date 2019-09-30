<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

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



    <div class="container">
       <div class="card shopping-cart mt-5">
                <div class="card-header bg-dark text-light">
                    Shipping cart
                    <a href="{$link1}" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body mt-5">
                        <!-- PRODUCT -->
            {foreach $products as $product}
                        <div class="row ">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                    <img class="img-responsive" src="{$product['image']}" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong>{$product['name']}</strong></h4>
                                <h4>
                                    <small>{$product['description']}</small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6><strong>{$product['subtotal']}<span class="text-muted">€</span></strong></h6>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <a href="{$buttoncart}/{$product['rowid']}/{$product['qty']+1}"><input type="button" value="+" class="plus"></a>
                                        {$product['qty']}
                                        <a href="{$buttoncart}/{$product['rowid']}/{$product['qty']-1}"><input type="button" value="-" class="minus"></a>
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <a href="{$buttoncart}/{$product['rowid']}/0" type="button" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                          <hr>
                        {/foreach}

                        <!-- END PRODUCT -->
                        <!-- PRODUCT -->


                        <!-- END PRODUCT -->

                </div>
                <div class="card-footer">

                    <div class="pull-right" style="margin: 10px">
                        <a href="{$criarOrder}" class="btn btn-success pull-right">Checkout</a>
                        <div class="pull-right" style="margin: 5px">
                            Total price: <b>{$total_price} €</b>
                        </div>
                    </div>
                </div>
            </div>
    </div>

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
      <script src="https://use.fontawesome.com/c560c025cf.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>

</html>
