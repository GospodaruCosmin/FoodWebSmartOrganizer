<!DOCTYPE html>
<html>

<head>
    <title>Product Page</title>
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style_recipe.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo ROOT; ?>/assets/js/script.js"></script>
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
    <div class="content">
        <div class="content-col">
            <div class="first-part">
                <img class="recipe-img"src="<?php echo $data['image']; ?>">

                <div class="recipe-info">
                    <div class="title">
                        <h2><?php echo $data['title']; ?></h2>
                    </div>
                    
                    
                    <div class="information-row">
                        <h3>🏬 Aisle <?php echo  $data['aisle'];?></h3>
                    </div>
                   
                </div>
            </div>
            <div class="second-part">
                <div class="ingredients">
                    <h5>Badges</h5>
                    <?php
                        foreach($data['importantBadges'] as $badges)
                            echo "<p>".ucfirst($badges)."</p>";
                    
                    ?>
                </div>
                <div class="preparation">
                    <h5>Description</h5>
                    <p><?php echo $data['description']; ?></p>
                    <h5>Ingredient List</h5>
                    <p><?php echo $data['ingredientList'];?></p>
                    </div> 
            </div>

        </div>
    </div>


</body>
</html>