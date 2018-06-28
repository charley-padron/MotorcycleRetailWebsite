<?php include("functions.php"); ?>
<html>
    
    <link href="http://cyan.csam.montclair.edu/~padronc1/Styles/styles.css" rel="stylesheet" media="all"/>
    
    <h1 align = "center">You have entered the motorcycle shop!</h1>
<body>
    
    <div class = "main_wrapper">
    
        <div class = "menubar">
            <a href="logout.php">Click here to logout from shop!</a>
            <ul id = "menu">
                <li><a href = "#" >Home</a></li>
                <li><a href = "#" >All Products</a></li>
                <li><a href = "#" >My Account</a></li>
                <li><a href = "#" >Sign up</a></li>
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
                
                <div id ="shop_cart">
                    
                    <span style="center">Welcome! You must be logged in to add items to cart!
                    Shopping cart: <a href="cart.php" style="color:white"/a> Go to cart</a>
                    </span>
                    
                </div>
                
                <div id="product_display">
                    <?php 
$search = $_GET['user_query'];
        
        $search = mysqli_real_escape_string($db, $search);
    
    $get_search="select * from products where product_name like '%".$search."%' ";
    $run_search = mysqli_query($db, $get_search);
    
    while($row_search = mysqli_fetch_array($run_search)){
        
        $prod_id = $row_search['product_id'];
        $prod_cat = $row_search['product_cat'];
        $prod_name = $row_search['product_name'];
        $prod_price = $row_search['product_price'];
        $prod_image = $row_search['product_image'];
        
        echo "
            <div id = 'single_prod'>
                
                <h3>$prod_name</h3>
                <img src = 'Images/$prod_image' width = '180' height = '180' />
                <p> Price: $ $prod_price</p>
                <a href = 'descript.php?prod_id=$prod_id' style='float:left'>Details</a>
                <a href= 'ecommerce.php?prod_id=$prod_id'><button style = 'float:right'>Add to cart</button></a>
            </div>
        ";
        
    }
                    
                    ?>
                    
                    
                </div>
                
            </div>
        
        </div>
    
        <div>
            footer
            
        </div>
    
    </div>

</body>
    
</html>