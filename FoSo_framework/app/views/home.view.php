<!DOCTYPE html>
<html>
   
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ROOT;?>/assets/css/style_index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<body>
    <div class="section1">
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
        <div class="section1-2">
            <div class="welcome-message">
                <div class="messages">
                    <div class="message">
                        <h1>Browse through <span href="#popular-recipes">popular recipes</span></h1>
                    </div>
                    <div class="message">
                        <h1>or search into our broad <span>recipe database</span>!</h1>
                    </div>
                    
                    <!-- <div class="message">
                        <p>Don't feel like cooking? We've got that covered!</p>
                    </div> 
                    <div class="message">
                        <p>Check <a class="go-restaurants" href="#popular-restaurants">popular restaurants</a> or <a class="go-restaurants" href="search_restaurants.html">seach your favorite</a>.</p>
                    </div>  -->
                </div>
               <div class="recipes-button">
                    <button class="search" onclick="window.location.href = '<?php echo ROOT;?>/recipes'">Search recipes</button>
                    <button class="popular" onclick="window.location.href = '#popular-recipes'">Popular recipes</button>
               </div>
            </div>
            <!-- <img src="<?php echo ROOT;?>/assets/img/index-first.png"> -->
            <?php echo $content['images']['dashboard'];?>

        </div>
    </div>
    <div id="popular-recipes" class="section2">
        
            <div class="most-liked-recipes">
                <div class="title">
                    <h1>Most liked recipes</h1>
                    <i><a style="color: inherit;" href="<?php echo ROOT;?>/recipes">More recipes</a></i>
                </div>
                <div class="recipes-row">
                <div class="recipes">
                    <div class="desc-food">
                        <img class="img-popular" src="<?php echo $data['recipes'][0]['image'];?>">
                            <div class="desc">
                                <h3><?php echo $data['recipes'][0]['title']; ?></h3>
                            </div>
                            <div class="desc">
                                <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data['recipes'][0]['id'];?>">View ingredients</a></i>
                                <i><a onclick="saveRecipe(
                                        '<?php echo $data['recipes'][0]['id']; ?>',
                                        '<?php echo $data['recipes'][0]['image']; ?>',
                                        '<?php echo $data['recipes'][0]['title']; ?>'
                                        )">Save recipe</a></i>                            </div>
                    </div>

                </div>
                <div class="recipes">
                    <div class="desc-food">
                    <img class="img-popular" src="<?php echo $data['recipes'][1]['image'];?>">
                            <div class="desc">
                                <h3><?php echo $data['recipes'][1]['title']; ?></h3>
                            </div>
                            <div class="desc">
                                <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data['recipes'][1]['id'];?>">View ingredients</a></i>
                                <i><a onclick="saveRecipe(
                                        '<?php echo $data['recipes'][1]['id']; ?>',
                                        '<?php echo $data['recipes'][1]['image']; ?>',
                                        '<?php echo $data['recipes'][1]['title']; ?>'
                                        )">Save recipe</a></i>                            </div>
                    </div>

                </div>
                <div class="recipes">
                    <div class="desc-food">
                        <img class="img-popular" src="<?php echo $data['recipes'][2]['image'];?>">
                            <div class="desc">
                                <h3><?php echo $data['recipes'][2]['title']; ?></h3>
                            </div>
                            <div class="desc">
                                <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data['recipes'][2]['id'];?>">View ingredients</a></i>
                                <i><a onclick="saveRecipe(
                                        '<?php echo $data['recipes'][2]['id']; ?>',
                                        '<?php echo $data['recipes'][2]['image']; ?>',
                                        '<?php echo $data['recipes'][2]['title']; ?>'
                                        )">Save recipe</a></i>                            </div>
                    </div>

                </div>
            </div>
            </div>
    </div>
    <div id="popular-recipes" class="section2">
        
            <div class="most-liked-recipes">
                <div class="recipes-row">
                <div class="recipes">
                    <div class="desc-food">
                        <img class="img-popular" src="<?php echo $data['recipes'][3]['image'];?>">
                            <div class="desc">
                                <h3><?php echo $data['recipes'][3]['title']; ?></h3>
                            </div>
                            <div class="desc">
                                <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data['recipes'][3]['id'];?>">View ingredients</a></i>
                                <i><a onclick="saveRecipe(
                                        '<?php echo $data['recipes'][3]['id']; ?>',
                                        '<?php echo $data['recipes'][3]['image']; ?>',
                                        '<?php echo $data['recipes'][3]['title']; ?>'
                                        )">Save recipe</a></i>
                            </div>
                    </div>

                </div>
                <div class="recipes">
                    <div class="desc-food">
                        <img class="img-popular" src="<?php echo $data['recipes'][4]['image'];?>">
                            <div class="desc">
                                <h3><?php echo $data['recipes'][4]['title']; ?></h3>
                            </div>
                            <div class="desc">
                                <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data['recipes'][4]['id'];?>">View ingredients</a></i>
                                <i><a onclick="saveRecipe(
                                        '<?php echo $data['recipes'][4]['id']; ?>',
                                        '<?php echo $data['recipes'][4]['image']; ?>',
                                        '<?php echo $data['recipes'][4]['title']; ?>'
                                        )">Save recipe</a></i>
                            </div>
                    </div>

                </div>
                <div class="recipes">
                    <div class="desc-food">
                        <img class="img-popular" src="<?php echo $data['recipes'][5]['image'];?>">
                            <div class="desc">
                                <h3><?php echo $data['recipes'][5]['title']; ?></h3>
                            </div>
                            <div class="desc">
                                <i><a href="<?php echo ROOT;?>/recipe/<?php echo $data['recipes'][5]['id'];?>">View ingredients</a></i>
                                <i><a onclick="saveRecipe(
                                        '<?php echo $data['recipes'][5]['id']; ?>',
                                        '<?php echo $data['recipes'][5]['image']; ?>',
                                        '<?php echo $data['recipes'][5]['title']; ?>'
                                        )">Save recipe</a></i>
                            </div>
                    </div>

                </div>
            </div>
            </div>
    </div>
    <!-- <div id="popular-restaurants"class="section3">
        <div class="most-liked-recipes">
            <div class="title">
                <h1>Popular restaurants</h1>
                <i><a>More restaurants</a></i>
            </div>
            <div class="recipes-row">
            <div class="recipes">
                <div class="desc-food">
                    <img class="img-popular" src="<?php echo ROOT;?>/assets/img/alejandros.jpg">
                        <div class="desc">
                            <h3>Alejanndro's</h3>
                        </div>
                        <div class="desc">
                            <i><a href="single_restaurant.html">View ingredients</a></i>
                            <i><a>Add to favourites</a></i>
                        </div>
                </div>

            </div>
            <div class="recipes">
                <div class="desc-food">
                    <img class="img-popular" src="<?php echo ROOT;?>/assets/img/alejandros.jpg">
                        <div class="desc">
                            <h3>Zarzo</h3>
                        </div>
                        <div class="desc">
                            <i><a href="single_restaurant.html">View ingredients</a></i>
                            <i><a>Add to favourites</a></i>
                        </div>
                </div>

            </div>
            <div class="recipes">
                <div class="desc-food">
                    <img class="img-popular" src="<?php echo ROOT;?>/assets/img/alejandros.jpg">
                        <div class="desc">
                            <h3>Restaurant EDEN</h3>
                        </div>
                        <div class="desc">
                            <i><a href="single_restaurant.html">View ingredients</a></i>
                            <i><a>Add to favourites</a></i>
                        </div>
                </div>

            </div>
        </div>
        </div>

    </div> -->
<script>
    function saveRecipe(recipeId, image, title) {
        // Create an object with the data to be sent
        var data = {
            recipeId: recipeId,
            image: image,
            title: title
        };

        // Send an AJAX request to the PHP file
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'saveRecipe', true);
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



