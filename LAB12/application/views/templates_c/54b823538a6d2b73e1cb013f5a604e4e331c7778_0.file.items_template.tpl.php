<?php
/* Smarty version 3.1.30, created on 2018-12-20 17:10:28
  from "/users/a55814/public_html/LAB12/application/views/templates/items_template.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c1bcd0488acd7_02018467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54b823538a6d2b73e1cb013f5a604e4e331c7778' => 
    array (
      0 => '/users/a55814/public_html/LAB12/application/views/templates/items_template.tpl',
      1 => 1545325823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1bcd0488acd7_02018467 (Smarty_Internal_Template $_smarty_tpl) {
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
      <br>
      <br>

<table class="table">
  <thead class="grey lighten-2 text-white bg-dark">
    <tr>
      <th scope="col"></th>
        <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products_order']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
    <tr>
      <th scope="row">  <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['order']->value['image'];?>
" alt="prewiew" width="120" height="80"></th>
      <td><b><?php echo $_smarty_tpl->tpl_vars['order']->value['name'];?>
 </b> <h6>
            <small><?php echo $_smarty_tpl->tpl_vars['order']->value['description'];?>
</small>
        </h6></td>
      <td><?php echo $_smarty_tpl->tpl_vars['order']->value['price'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['order']->value['quantity'];?>
</td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  </tbody>

</table>
<br>
  <a href="<?php echo $_smarty_tpl->tpl_vars['voltar']->value;?>
"><button class="btn btn-info" type="button">Voltar</button></a>
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
 <?php echo '</script'; ?>
>
 <?php echo '<script'; ?>

   src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous"><?php echo '</script'; ?>
>

             <?php echo '<script'; ?>
>
$(document).ready(function(){
  $('#esc').each(function(){
    $('#esc').hide();
$('button').each('click', function(){
    $('#esc').each(function(){
      $('#esc').toggle();

    });
  });

<?php echo '</script'; ?>
>
  </body>

</html>
<?php }
}
