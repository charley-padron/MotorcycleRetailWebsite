<?php

include("/home/padronc1/db.php");

function cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
    
        //$id = get user id
        
        $prod_id = $_GET['add_cart'];
       // check for duplicate
        $check_prod = "select * from cart where user_id = '$id' and product_id = '$prod_id'";
        
        $res = mysqli_query($db, $check_prod);
       
       //if array is larger then [0], there is dup 
        if(mysqli_num_rows($res) > 0){
            
            echo"";
            
        }
        
        else{
            
            $insert = "insert into cart(product_id, user_id) values ('$prod_id', '$id')";
            
        }
        
        $run = mysqli_query($db, $insert);
        
        echo "<script>window.open('index.php', '_self'</script>";
    
        
    }
    
}

//Get Categories
function getCat(){
    
    global $db;
    
    $get_cat = "select * from categories";
    
    $run_cat = mysqli_query($db, $get_cat);
    
    while($row_cat = mysqli_fetch_array($run_cat)){
        
        $cat_id = $row_cat['cat_id'];
        $cat_name = $row_cat['cat_name'];
        
        echo "<li><a href='ecommerce.php?cat=$cat_id'>$cat_name</li>";
        
    }
    
}

function getProd(){
    
    if(!isset($_GET['cat'])){
    
    global $db;
    
    $get_prod = "select * from products order by RAND() LIMIT 0,50";
    $run_prod = mysqli_query($db, $get_prod);
    
    while($row_prod = mysqli_fetch_array($run_prod)){
        
        $prod_id = $row_prod['product_id'];
        $prod_cat = $row_prod['product_cat'];
        $prod_name = $row_prod['product_name'];
        $prod_price = $row_prod['product_price'];
        $prod_image = $row_prod['product_image'];
        
        echo "
            <div id = 'single_prod'>
                
                <h3>$prod_name</h3>
                <img src = 'Images/$prod_image' width = '180' height = '180' />
                <p> Price: $ $prod_price</p>
                <a href = 'descript.php?prod_id=$prod_id' style='float:left'>Details</a>
                <a href= 'ecommerce.php?add_cart=$prod_id'><button style = 'float:right'>Add to cart</button></a>
            </div>
        ";
        
    }
    
    }
}

function getCatProd(){
    
    if(isset($_GET['cat'])){
        
        $cat_id = $_GET['cat'];
    
    global $db;
    
    $get_cat_prod = "select * from products where product_cat = '$cat_id'";
    $run_cat_prod = mysqli_query($db, $get_cat_prod);
    
    
    while($row_cat_prod = mysqli_fetch_array($run_cat_prod)){
        
        $prod_id = $row_cat_prod['product_id'];
        $prod_cat = $row_cat_prod['product_cat'];
        $prod_name = $row_cat_prod['product_name'];
        $prod_price = $row_cat_prod['product_price'];
        $prod_image = $row_cat_prod['product_image'];
        
        echo "
            <div id = 'single_prod'>
                
                <h3>$prod_name</h3>
                <img src = 'Images/$prod_image' width = '180' height = '180' />
                <p> $ $prod_price</p>
                <a href = 'descript.php?prod_id=$prod_id' style='float:left'>Details</a>
                <a href= 'ecommerce.php?prod_id=$prod_id'><button style = 'float:right'>Add to cart</button></a>
            </div>
        ";
        
    }
    
    }
}

function search(){
    
    global $db;
    
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
                <p> $ $prod_price</p>
                <a href = 'descript.php?prod_id=$prod_id' style='float:left'>Details</a>
                <a href= 'ecommerce.php?prod_id=$prod_id'><button style = 'float:right'>Add to cart</button></a>
            </div>
        ";
        
    }
    
}

?>