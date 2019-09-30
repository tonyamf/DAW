<!doctype html>
<html lang="en">
  <head>

    <title>Log in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body >
  	<!--  BEGIN NAV -->
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
     <div class="container">
       <a class="navbar-brand text-warning" href="{$link1}">Nib<strong> .</strong></a>
       <div class="nav-item order-1 text-white-50">{$welcome}</div>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav ml-auto">
           <li class="nav-item">
             <a class="nav-link" href="{$link2}">{$menu2} </a>
           </li>
           <li class="nav-item">
             <a class="nav-link active mr-3" href="{$link3}">{$menu3} <span class="sr-only">(current)</span></a>
         </ul>
       </div>
     </div>
   </nav><!-- /navbar -->
	<!-- END NAV -->

    <!--Login-->

    <div class="container-fluid">

      <div class="row py-5 my-5 justify-content-sm-center">
        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 border-bottom border-primary">
          <h5 class="display-4 text-center mt-5 text-muted">Log in</h5>
          <form class="py-3" method="post" action="login_action" >

          	 <div class="alert-danger" role="alert">  <!-- BEGIN REGISTER -->
              <h5 class="text-center my-3">{$messagem}</h5>
            </div><!-- END REGISTER -->
            <div class="form-group my-4">
              <label for="Email">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="email" value="{$email}" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group my-4">
              <label for="Password">Password</label>
              <input type="password" class="form-control" name="pwd" id="pwd"  value="{$pwd}" required>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="autologin" name="autologin" value="1">
              <label class="form-check-label" for="autologin">Save my session</label>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
          
          </form>
        </div>
      </div>
    </div><!-- /login -->



    <div class="container-fluid pt-4"><!-- container -->
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
    </div><!-- /.container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jQuery/1.9.1/jQuery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>
