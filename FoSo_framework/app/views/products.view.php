<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ROOT;?>/assets/css/style_search_recipes.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo ROOT;?>/assets/js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
    <div id="section1" class="section1">
        <div class="section1-col">
			<div class="navigation">
                <img class="logo" src="<?php echo ROOT;?>/assets/img/logo3.svg">
                <div class="navbar">
                    <a href="<?php echo ROOT;?>/home">Dashboard</a>
                    <a href="<?php echo ROOT;?>/recipes">Recipes</a>
                    <a href="<?php echo ROOT;?>/products">Products</a>
                    <a href="<?php echo ROOT;?>/stats">Your Stats</a>
                    <a href="<?php echo ROOT;?>/shoppingList">Shopping List</a>
                    <a href="<?php echo ROOT;?>/frecipes">Favourites</a>
                    <a href="<?php echo ROOT;?>/logout">Log out</a>
                </div>  
            </div>
        </div>
    </div>
    
        <div id="section2" class="section2">
            <div class="search-bar">
                
                <h1>Discover products</h1>
                
            </div>
           
            <!-- <img class="popular-recipe" src="<?php echo ROOT;?>/assets/img/products2.jpg"> -->
            <?php echo $content['images']['products']; ?>
            <form>
                <input class="nosubmit" type="search" name="product" value="<?php echo isset($_GET['product']) ? $_GET['product'] : ''; ?>" placeholder="Search for products">   
            </form>
           <?php
                require 'products.dynamic.php';
                
            ?>
            <form action="decrement">
                <button class="save" type="submit">See previous</button>
            </form>
            <form action="increment">
                <button class="save" type="submit">See next</button>
            </form>
        </div>
        
</div>
<script>
    function saveProduct(productId, image, title) {
        // Create an object with the data to be sent
        var data = {
            productId: productId,
            image: image,
            title: title
        };

        // Send an AJAX request to the PHP file
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'saveProduct', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Request successful
                console.log(xhr.responseText);
                // Handle the response if needed
            }
        };
        xhr.send(JSON.stringify(data));
    }
</script>
</body>

</html>
