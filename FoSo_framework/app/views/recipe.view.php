<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
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
                <img class="recipe-img"src="<?php echo $data['information']['image']; ?>">

                <div class="recipe-info">
                    <div class="title">
                        <h2><?php echo $data['information']['title']; ?></h2>
                        <p><span>&#9445; 
                            <?php
                                foreach($data['information']['diets'] as $diet){
                                    echo ucfirst($diet)." ";
                                }
                            ?>
                        </span></p>
                    </div>
                    
                    
                    <div class="information-row">
                        <h3>&#128337; Total time <?php echo  $data['information']['readyInMinutes'];?> minutes</h3>
                    </div>
                    <h3> <i class="fa fa-male"></i> Number of servings <?php echo  $data['information']['servings'];?></h3>
                    <h3>Nutrition Values</h3>
                    <div class="nutrition-values">
                        <div class="value">
                            <p>kcal <?php echo $data['nutrienti']['Calories']; ?></p>
                        </div>
                        <div class="value">
                            <p>fat <?php echo $data['nutrienti']['Fat']; ?>g</p>
                        </div>
                        <div class="value">
                            <p>sugars <?php echo $data['nutrienti']['Sugar']; ?>g</p>
                        </div>
                        <div class="value">
                            <p>fibre <?php echo $data['nutrienti']['Fiber']; ?>g</p>
                        </div>
                        <div class="value">
                            <p>protein <?php echo $data['nutrienti']['Protein']; ?>g</p>
                        </div>
                    </div>
                    <a href="#" onclick="sendData()"><span>Add to today's nutritional count</span></a>
                    <div class="response"></div>
                </div>
            </div>
            <div class="second-part">
                <div class="ingredients">
                    <h4>Ingredients</h4>
                    <?php
                        foreach($data['information']['extendedIngredients'] as $ingrediente)
                            echo "<p>".$ingrediente['original']."</p>";
                    
                    ?>
                    <form action="../addshoppinglist/<?php echo $data['id_reteta'];?>" method="post">
                                <button type="submit">Add to shopping list</button>
                        <!-- <a type="submit">Add to shopping list</a> -->
                    </form>
                </div>
                <div class="preparation">
                    <h4>Preparation</h4>
                    <?php
                        foreach($data['information']['analyzedInstructions'][0]['steps'] as $step){?>
                            <h5>Step <?php echo $step['number']; ?></h5>
                            <p><?php echo $step['step']; ?></p>
                        
                    <?php
                        }
                    ?>
                    </div> 
            </div>

        </div>
    </div>

<script>
    function sendData() {
        var data = <?php echo json_encode($data['nutrienti']); ?>;

        // Send an AJAX request to the PHP file
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../nutrition', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Request successful
            console.log(xhr.responseText);
            var responseDiv = document.querySelector('.response');
            responseDiv.innerHTML = xhr.responseText;
        }
        };
        xhr.send(JSON.stringify(data));
    }
</script>

</body>
</html>