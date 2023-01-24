<!DOCTYPE html>
<?php

   include_once('app/selectProdutos.php');
    include_once('app/gravar_verificacao.php');
     include_once('app/carrinho.php');
     
   
   
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eElectronics - Gtwork</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class=" user"></i> My Account</a></li>
                            <li><a href="#"><i class=" heart"></i> Wishlist</a></li>
                            <li><a href="cart.php"><i class=" user"></i> My Cart</a></li>
                            <li><a href="checkout.php"><i class=" user"></i> Checkout</a></li>
                             <?php
                            if(!isset($_SESSION['UsuarioID'])){
                                echo "<li><a href='admin/login.php'><i class=' user'></i> Login</a></li>";
                            }else{
                                echo "<li><a href='app/sair.php'><i class=' user'></i> Logout</a></li>";
                            }
                            
                             if($_SESSION['UsuarioPermissao'] == "admin"){
                                echo "<li><a href='admin/index.php'><i class=' user'></i> DashBoard</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                              <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key"><?php if(isset($_SESSION)){ echo"$Semail";} ?> </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php">Gtwork<pan>Electronics</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt"><?php 
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                                    
                                    $resultado4=mysqli_query($cnx,"select *from produtos where id = $id") or die (mysqli_error());
                                    $data = mysqli_fetch_assoc($resultado4);
                                    $final += $data['precoUnitario']*$qtd;
                                    $conta=$conta + 1;
                                    }
                        echo number_format($final,2,',','.');  ?> kz</span> <i class=" shopping-cart"></i> <span class="product-count"><?php echo $conta ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Loja</a></li>
                        <li class="active"><a href="single-product.php">Produto unico</a></li>
                        <li><a href="cart.php">Carrinho</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="#">Categoria</a></li>
                        <li><a href="#">Outros</a></li>
                        <li><a href="#">Contactos</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Produtos</h2>
                        
                       <?php
                               if(mysqli_num_rows($resultado2)>0){
                                while($data3=mysqli_fetch_array($resultado2,MYSQLI_ASSOC)){ 
                                    echo"
                                     
                        <div class='thubmnail-recent'>
                            <img src='upload_img/".$data3['imagem'].".jpg' class='recent-thumb' alt=''>
                            <img src='upload_img/".$data3['imagem'].".png' class='recent-thumb' alt=''>
                            <h2><a href='single-product.php?id=".$data3['idp']."'>".$data3['nome']."</a></h2>
                            <div class='product-sidebar-price'>
                                <ins>".number_format($data3['precoUnitario'],'2',',','.')."kz</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                       
                    ";
                        }
                    }
                    ?>
                       
                                      
                    
                </div>
                
                    
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                       
                       <?php
                                $id = $_GET['id'];
                                $result=mysqli_query($cnx,"select *from produtos where id = $id");
                              
                                 if(mysqli_num_rows($result)>0){
                                      while($dataU=mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
                                      $produto = $dataU['nome'];
                                      $preco = $dataU['precoUnitario'];
                                      $imagem = $dataU['imagem'];
                                      $descricao = $dataU['descricao'];
                                      $idp = $dataU['id'];
                                    }
                                }
                          ?>
                            
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                    <?php
                                       echo" <img src='upload_img/$imagem.png' alt=''>";
                                       echo" <img src='upload_img/$imagem.jpg' alt=''>";
                                    ?>
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                        <img src="img/product-thumb-4.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                              
                      
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo "$produto"; ?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo number_format($preco,'2',',','.') ?>kz</ins> <del>$800.00</del>
                                    </div>    
                                    
                                    <?php echo"<form action='?acao=add&id=".$idp."' class='cart' method='POST'>"; ?>
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Avaliações</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Descrição do Produto</h2>  
                                                <p><?php echo "$descricao"; ?></p>

                                                <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class=" star"></i>
                                                            <i class=" star"></i>
                                                            <i class=" star"></i>
                                                            <i class=" star"></i>
                                                            <i class=" star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-1.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class=" shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class=" link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart TV - 2015</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins> <del>$800.00</del>
                                    </div> 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-2.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class=" shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class=" link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>$899.00</ins> <del>$999.00</del>
                                    </div> 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-3.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class=" shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class=" link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new i phone 6</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins> <del>$425.00</del>
                                    </div>                                 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-4.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class=" shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class=" link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony playstation microsoft</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$200.00</ins> <del>$225.00</del>
                                    </div>                            
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-5.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class=" shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class=" link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart Air Condtion</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$1200.00</ins> <del>$1355.00</del>
                                    </div>                                 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-6.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class=" shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class=" link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Samsung gallaxy note 4</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>                            
                                </div>                                    
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Electronics</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class=" facebook"></i></a>
                            <a href="#" target="_blank"><i class=" twitter"></i></a>
                            <a href="#" target="_blank"><i class=" youtube"></i></a>
                            <a href="#" target="_blank"><i class=" linkedin"></i></a>
                            <a href="#" target="_blank"><i class=" pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                    <h2 class="footer-wid-title">Navegação do usuário </h2>
                        <ul>
                            <li><a href="#">Minha conta</a></li>
                            <li><a href="#">Histórico de pedidos</a></li>
                            <li><a href="#">Lista de desejos</a></li>
                            <li><a href="#">Contato do fornecedor</a></li>
                            <li><a href="#">Página inicial</a></li>
                        </ul> 
                 
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                    <h2 class="footer-wid-title">Categorias</h2>
                        <ul>
                            <li><a href="#">Celular</a></li>
                            <li><a href="#">Acessórios domésticos</a></li>
                            <li><a href="#">TV LED</a></li>
                            <li><a href="#">Computador</a></li>
                            <li><a href="#">Gadetes</a></li>
                        </ul>                      
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Boletim informativo</h2>
                        <p>Assine nossa newsletter e receba ofertas exclusivas que você não encontrará em nenhum outro lugar diretamente na sua caixa de entrada!</p>                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Inscrever-se">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 eElectronics. All Rights Reserved. Coded with <i class=" heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class=" cc-discover"></i>
                        <i class=" cc-mastercard"></i>
                        <i class=" cc-paypal"></i>
                        <i class=" cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="js/jquery.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>
