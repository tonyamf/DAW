<?php
/* Smarty version 3.1.30, created on 2018-12-20 15:52:32
  from "/users/a55814/public_html/LAB12/application/views/templates/cart_template.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c1bbac0555e29_56024977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '026cdf289505adb250c63af67ee7d555e7b098ac' => 
    array (
      0 => '/users/a55814/public_html/LAB12/application/views/templates/cart_template.tpl',
      1 => 1545321078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1bbac0555e29_56024977 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
     <div class="nav-item  text-white-50"><?php echo $_smarty_tpl->tpl_vars['welcome']->value;?>
</div>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav flex-row ml-auto">
         <li class="nav-item">
              <a class="nav-link mt-2 mr-3" href="<?php echo $_smarty_tpl->tpl_vars['link2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['menu2']->value;?>
</a>
            </li>
         <li class="nav-item">
              <a class="nav-link mt-2 mr-3" href="<?php echo $_smarty_tpl->tpl_vars['link3']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['menu3']->value;?>
</a>
              </li>
     </ul>
   </div>
   </div>
 </nav>
 <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
      <div class="container">
        <a class="navbar-brand text-warning" href="<?php echo $_smarty_tpl->tpl_vars['link1']->value;?>
"><h3>Nib<strong> .</strong></h3></a>

          <ul class="navbar-nav ml-auto">


              <li class="nav-item">
                <a class="nav-link mr-3" href="<?php echo $_smarty_tpl->tpl_vars['cart_link']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['cart']->value;?>
"><i class="material-icons">
   shopping_cart
   </i>
                 <?php echo $_smarty_tpl->tpl_vars['cart']->value;?>
 € (<?php echo $_smarty_tpl->tpl_vars['cartitems']->value;?>
)</a>
                     <small><a class="nav-link mr-3" href="<?php echo $_smarty_tpl->tpl_vars['empty_cart']->value;?>
">Empty Cart</a></small>
             </ul>
                </li>

      </div>
    </nav>


    <!-- END NAV -->



    <div class="container">
       <div class="card shopping-cart mt-5">
                <div class="card-header bg-dark text-light">
                    Shipping cart
                    <a href="<?php echo $_smarty_tpl->tpl_vars['link1']->value;?>
" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body mt-5">
                        <!-- PRODUCT -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                        <div class="row ">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</strong></h4>
                                <h4>
                                    <small><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['subtotal'];?>
<span class="text-muted">€</span></strong></h6>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['buttoncart']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['rowid'];?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['qty']+1;?>
"><input type="button" value="+" class="plus"></a>
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value['qty'];?>

                                        <a href="<?php echo $_smarty_tpl->tpl_vars['buttoncart']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['rowid'];?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['qty']-1;?>
"><input type="button" value="-" class="minus"></a>
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['buttoncart']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['rowid'];?>
/0" type="button" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                          <hr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                        <!-- END PRODUCT -->
                        <!-- PRODUCT -->


                        <!-- END PRODUCT -->

                </div>
                <div class="card-footer">

                    <div class="pull-right" style="margin: 10px">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['criarOrder']->value;?>
" class="btn btn-success pull-right">Checkout</a>
                        <div class="pull-right" style="margin: 5px">
                            Total price: <b><?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
 €</b>
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
      <?php echo '<script'; ?>
 src="https://use.fontawesome.com/c560c025cf.js"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"><?php echo '</script'; ?>
>

  </body>

</html>
<?php }
}
