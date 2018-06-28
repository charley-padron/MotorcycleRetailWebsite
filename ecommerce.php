<?php
    session_start();
    
    if($_SESSION["logged"] != true){
        
        header("Location: index.php");
        exit();
        
    }

?>
<?php include("functions.php") ?>

<html>
    
    <link href="http://cyan.csam.montclair.edu/~padronc1/Styles/styles.css" rel="stylesheet" media="all"/>
    
    <h1 align = "center">You have entered the motorcycle shop!</h1>
<body>
    
    <div class = "main_wrapper">
    
        <div class = "menubar">
            <a href="logout.php">Click here to logout from shop!</a>
            <ul id = "menu">
                <li><a href = "" >Home</a></li>
                <li><a href = "#" >All Products</a></li>
                <li><a href = "#" >My Account</a></li>
                <li><a href = "Insert_Prod.php" >Insert Prod</a></li>
                <li><a href = "#" >Shopping cart</a></li>
            
            </ul>
        
            <div id="form">
                <form method = "get" action = "search.php" enctype="multipart/form-data">
                    <input type="text" name = "user_query" placeholder = "Search Products"/>
                    <input type = "submit" name = "search" value = "Search"/>
                </form>
            </div>
        
        </div>
    
        <div class = "content_wrapper">
        
            <div id ="sidebar">
            
                <div id = "sidebar_title">Categories</div>
            
                <ul id = "cats">
                    <?php getCat(); ?>
                <ul>
            
            </div>
        
            <div id = "content_area">
                
                <?php cart(); ?>
                
                <div id ="shop_cart">
                    
                    <span style="center">Welcome! You must be logged in to add items to cart!
                    Shopping cart: <a href="cart.php" style="color:white"/a> Go to cart</a>
                    </span>
                    
                    <div>
                    
                 <a href="cart.php" style="color:white"/a> Login</a>
                    
                </div>
                
                <div id="product_display">
                    
                    <?php getProd(); ?>
                    <?php getCatProd(); ?>
                    <!-- <?php search(); ?> -->
                    
                    
                </div>
                
            </div>
        
        </div>
    
        <div>
            footer
            
        </div>
    
    </div>

</body>
    
</html>