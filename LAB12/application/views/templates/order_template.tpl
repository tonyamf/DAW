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
      <br>
      <br>

<table class="table">
  <thead class="grey lighten-2 text-white bg-dark">
    <tr>
      <th scope="col">Order_id</th>
      <th scope="col">Date</th>
      <th scope="col">Price</th>
      <th scope="col">Items</th>
    </tr>
  </thead>
  <tbody>
  {foreach $orders as $order}
    <tr>
      <th scope="row">{$order.id}</th>
      <td>{$order.created_at}</td>
      <td>{$order.total}</td>
      <td><a href="{$veritens}/{$order.id}"><button class="btn btn-outline-secondary" type="button">Show</button></a></td>
    </tr>
    {/foreach}
  </tbody>

</table>
    </div>

    <!-- Footer -->
    <footer class="container-fluid">

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
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
              </li>
            </ul>
          </div>
          <div class="col-md text-md-right">
            <small>&copy;2018 DAW, Designed by <b>Antonio Franco</b></small>
          </div>
        </div>

      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://use.fontawesome.com/c560c025cf.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </script>
 <script
   src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous"></script>

             <script>
$(document).ready(function(){
  $('#esc').each(function(){
    $('#esc').hide();
$('button').each('click', function(){
    $('#esc').each(function(){
      $('#esc').toggle();

    });
  });

</script>
  </body>

</html>
