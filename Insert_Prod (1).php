<!DOCTYPE>

<?php include("functions.php"); ?>

<html>
    
    <head>
        <title>Insert Products</title>
    </head>
    
    <body bgcolor="#383838">
        
        <form action = "Insert_Prod.php" method = "post" enctype = "multipart/form-data">
            
            <table align="center" width = "750px" border="2" bgcolor="lightgrey">
                
                <tr align="center">
                    
                    <td colspan = "8"><h2>Insert New Product Here</h2></td>
                    
                </tr>
                
                <tr>
                    <td>Product Name:</td>
                    <td><input type = "text" name = "product_name" size="40" required/> </td>
                </tr>
                
                <tr>
                    <td>Product Category:</td>
                    <td>
                    
                    <select name="product_cat" required>
                        
                        <option>Select a Category</option>
                        <?php
    
                            $get_cat = "select * from categories";
    
                            $run_cat = mysqli_query($db, $get_cat);
    
                            while($row_cat = mysqli_fetch_array($run_cat)){
        
                                $cat_id = $row_cat['cat_id'];
                                $cat_name = $row_cat['cat_name'];
        
                                echo "<option value = '$cat_id'>$cat_name</option>";
        
                            }
                            
                        ?>
                        
                    </select>    
                        
                    </td>
                </tr>
                
                <tr>
                    <td>Product Image:</td>
                    <td><input type = "file" name = "product_image" required/> </td>
                </tr>
                
                <tr>
                    <td>Product Price:</td>
                    <td><input type = "text" name = "product_price" required/> </td>
                </tr>
                
                <tr>
                    <td>Product Description:</td>
                    <td><textarea name = "product_descr" cols="20" rows="10"required></textarea> </td>
                </tr>
                
                <tr align="center">
                    <td colspan="8"><input type = "submit" name = "insert_post" value = "Insert into Database"/> </td>
                </tr>
                
                
            </table>
            
        </form>
        
    </body>
    
</html>

<?php

if(isset($_POST['insert_post'])){
    
    $product_name = $_POST['product_name'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_descr = $_POST['product_descr'];
    
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp'];
    
    move_uploaded_file($product_image_tmp, "Images/$product_image");
    
   echo $insert_product = "insert into products(product_name, product_cat, product_price, product_descr, product_image) values('$product_name','$product_cat','$product_price','$product_descr','$product_image')";
   
   $insert_prod = mysqli_query($db, $insert_product);
   
   if($insert_prod){
       
       echo "<script>alert('Product inserted!')</script>";
       echo "<script>window.open('Insert_Prod.php','_self')</script>";
       
   }
    
}

?>