<!DOCTYPE html>
<?php
//var_dump($data);

?>
<html>
    <head>
        <title>Favourites</title>
        <link rel="stylesheet" href="<?php echo ROOT;?>/assets/css/style_fav_recipe.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <script src="<?php echo ROOT;?>/assets/js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    </head>
<body>
    <div class="section1-col">
    <div class="navigation">
                <img class="logo" src="<?php echo ROOT;?>/assets/img/logo3.svg">
                <div class="navbar">
                    <a href="<?php echo ROOT;?>/home">Dashboard</a>
                    <a href="<?php echo ROOT;?>/recipes">Recipes</a>
                    <a href="<?php echo ROOT;?>/products">Products</a>
                    <a href="<?php echo ROOT;?>/stats">Your Stats</a>
                    <a href="<?php echo ROOT;?>/shoppingList">Shopping List</a>
                    <a href="<?php echo ROOT;?>/fproducts">Favourites</a>
                    <a href="<?php echo ROOT;?>/logout">Log out</a>
                </div>  
            </div>
    </div>
    <button class="add" onclick="browseMenu(0)">Favourite Products</button>
    <button class="add" onclick="browseMenu(1)">Favourite Recipes</button>
    <div id="users" class="content">
        <h1>Check out your favourite products</h1>
        <?php foreach($data['products'] as $produs){ ?>
            <div class="elements">
                <div class="element">
                    <img src="<?php  echo $produs['image'];?>">
                    <div class="information-user">
                        <p><?php  echo $produs['name'];?></p>
                    </div>
                    <div class="control-buttons">
                        <button class="delete" onclick="removeFav(<?php echo $produs['idProduct']; ?>,1)">Remove from list</button>
                        <button class="make-admin" onclick="window.location.href = '<?php echo ROOT;?>/product/<?php echo $produs['idProduct']; ?>'">See product</button>
                    </div>
                    
                </div>

            </div>
        <?php } ?>
        
    </div>
    <div id="recipes" class="content">
        <h1>See your favourite recipes</h1>


        <?php foreach($data['recipes'] as $reteta){ ?>
            <div class="elements">
                <div class="element">
                    <img src="<?php  echo $reteta['image'];?>">
                    <div class="information-user">
                        <p><?php  echo $reteta['name'];?></p>
                    </div>
                    <div class="control-buttons">
                        <button class="delete" onclick="removeFav(<?php echo $reteta['idRecipe']; ?>,2)">Remove this recipe</button>
                        <button class="make-admin" onclick="window.location.href = '<?php echo ROOT;?>/recipe/<?php echo $reteta['idRecipe']; ?>'">See recipe</button>
                    </div>
                    
                </div>

            </div>
        <?php } ?>
 <script>
 function removeFav(id,type) {
        // Create an object with the data to be sent
        var data = {
            id: id,
            type: type
        };

        // Send an AJAX request to the PHP file
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', 'deleteFromFav', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Request successful
                console.log(xhr.responseText);
                location.reload();
            }
        };
        xhr.send(JSON.stringify(data));
    }
 
 </script>
</body>

</html>