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
                
                <h1>Discover recipes</h1>
                
            </div>
           
            <!-- <img class="popular-recipe" src="<?php echo ROOT;?>/assets/img/pizza-cropped.jpg"> -->
            <?php echo $content['images']['recipes'];?>
              
            <div class="filters">
                <form class="nosubmit" method="get">
                    <input class="nosubmit" type="search" name="search-recipe" value="<?php echo isset($_SESSION['searchRecipe']['searchQuery']) ? $_SESSION['searchRecipe']['searchQuery'] : ''; ?>" placeholder="Search for recipes based on ingredients">   

                    <div class="bfilter">
                        <button class="filter last-one" type="button" onclick="toggleDropdown()">More Filters Recipes</button>
                    </div>
                

                    <div id="filtering">
                        <div class="filtering-row filtering-big">
                            <div class="filtering-col">
                                <p>Category</p>
                                <div class="filtering-row">
                                    <label class="meal-type">
                                        <input type="radio" name="type" value="main course" id="main-course"> Main Course
                                        <input type="radio" name="type" value="side dish" id="side-dish"> Side Dish
                                        <input type="radio" name="type" value="breakfast" id="breakfast"> Breakfast
                                    </label>
                                </div>
                                <div class="filtering-row">
                                    <label class="meal-type">
                                        <input type="radio" name="type" value="dessert" id="dessert"> Dessert
                                        <input type="radio" name="type" value="appetizer" id="appetizer"> Appetizer
                                        <input type="radio" name="type" value="beverage" id="beverage"> Beverage
                                    </label>
                                    </div>
                                <div class="filtering-row">
                                    <label class="meal-type">
                                        <input type="radio" name="type" value="snack" id="snack"> Snack
                                        <input type="radio" name="type" value="soup" id="soup"> Soup
                                        <input type="radio" name="type" value="marinade" id="marinade"> Marinade
                                    </label>
                                </div>
                                <p>Cuisine</p>
                                <div class="filtering-row">
                                    <label>
                                            <input type="checkbox" class="cuisine" name="cuisine[]" value="african"> African
                                            <input type="checkbox" class="cuisine" name="cuisine[]" value="asian"> Asian
                                            <input type="checkbox" class="cuisine" name="cuisine[]" value="american"> American
                                    </label>
                                </div>
                                <div class="filtering-row">
                                    <label>
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="chinese"> Chinese
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="eastern-european"> Eastern European
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="greek"> Greek
                                    </label>
                                </div>
                                <div class="filtering-row">
                                <label>
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="indian"> Indian
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="italian"> Italian
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="japanese"> Japanese
                                </label>
                                </div>
                                <div class="filtering-row">
                                <label>
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="mediterranean"> Mediterranean
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="mexican"> Mexican
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="middle-eastern"> Middle Eastern
                                </label>
                                </div>
                                
                                <div class="filtering-row">
                                <label>
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="spanish"> Spanish
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="thai"> Thai
                                    <input type="checkbox" class="cuisine" name="cuisine[]" value="vietnamese"> Vietnamese
                                </label>
                                </div>
                                <p>Diet Type</p>
                                <div class="filtering-row">
                                    <label>
                                        <input type="checkbox" class="diets" name="diets[]" value="gluten free"> Gluten Free
                                        <input type="checkbox" class="diets" name="diets[]" value="vegetarian"> Vegetarian
                                        <input type="checkbox" class="diets" name="diets[]" value="lacto-vegetarian"> Lacto-vegetarian
                                    </label>
                                </div>
                                <div class="filtering-row">
                                    <label>
                                        <input type="checkbox" class="diets" name="diets[]" value="vegan"> Vegan
                                        <input type="checkbox" class="diets" name="diets[]" value="paleo"> Paleo
                                        <input type="checkbox" class="diets" name="diets[]" value="whole30"> Whole30
                                    </label>
                                </div>
                                <p>Allergies</p>
                                <div class="filtering-row">
                                    <label>
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="dairy"> Dairy
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="egg"> Egg
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="gluten"> Gluten
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="grain"> Grain
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="peanut"> Peanut      
                                    </label>
                                </div>
                                <div class="filtering-row">
                                    <label>
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="seafood"> Seafood
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="sesame"> Sesame
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="shellfish"> Shellfish
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="soy"> Soy
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="sulfite"> Sulfite      
                                    </label>
                                </div>
                                <div class="filtering-row">
                                    <label>
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="tree nut"> Tree Nut
                                        <input type="checkbox" class="intolerances" name="intolerances[]" value="wheat"> Wheat      
                                    </label>
                                </div>
                                
                            </div>
                            <div class="filtering-col">
                                
                            </div>
                        </div>
                        <div class="filtering-row">
                            <button class="save" type="submit" onclick="hideFilters()">Apply filters</button>
                            <button class="close"  onclick="hideFilters()">Reset filters</button>
                        </div>
                    </div>
                </form>
            </div>
           <?php
                
                require 'recipes.dynamic.php';
            ?>
    
        </div>
        
</div>
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
