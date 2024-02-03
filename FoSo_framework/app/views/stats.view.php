<!DOCTYPE html>
<html>
   
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style_stats.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
    <button class="back" onclick="window.location.href = '<?php echo ROOT; ?>/home'">Go Back</button>
    <div class="content">
       <h1>Nutritional Values</h1>
        <div class="content-col">
            <div class="prices">
                <div class="periods">
                    <h2>Today</h2>
                    <p> Kcal consumed: <span><?php echo $data['kcalToday'];?></span> </p>
                    <p> Fat consumed: <span><?php echo $data['fatToday'];?></span> </p>
                    <p> Sugar consumed: <span><?php echo $data['sugarsToday'];?></span> </p>
                    <p> Fibre consumed: <span><?php echo $data['fibreToday'];?></span> </p>
                    <p> Protein consumed: <span><?php echo $data['proteinToday'];?></span> </p>
                </div>
                <div class="periods">
                    <h2>This week</h2>
                    <p> Kcal consumed: <span><?php echo $data['kcalLastWeek'];?></span> </p>
                    <p> Fat consumed: <span><?php echo $data['fatLastWeek'];?></span> </p>
                    <p> Sugar consumed: <span><?php echo $data['sugarsLastWeek'];?></span> </p>
                    <p> Fibre consumed: <span><?php echo $data['fibreLastWeek'];?></span> </p>
                    <p> Protein consumed: <span><?php echo $data['proteinLastWeek'];?></span> </p>
                </div>
                <div class="periods">
                    <h2>This month</h2>
                    <p> Kcal consumed: <span><?php echo $data['kcalLastMonth'];?></span> </p>
                    <p> Fat consumed: <span><?php echo $data['fatLastMonth'];?></span> </p>
                    <p> Sugar consumed: <span><?php echo $data['sugarsLastMonth'];?></span> </p>
                    <p> Fibre consumed: <span><?php echo $data['fibreLastMonth'];?></span> </p>
                    <p> Protein consumed: <span><?php echo $data['proteinLastMonth'];?></span> </p>
                </div>
            </div>
        </div>
        <h1>My lists</h1>
        <div class="content-col">
            <div class="nutritional">
                <div class="time-periods">
                    <h2>Shopping List</h2>
                    <p>You have a total of <?php echo $data['shoppingList'];?> elements in your <span>shopping list</span>.</p>
                    
                </div>
                <div class="time-periods">
                    <h2>Preffered Products</h2>
                    <p>You have a total of <?php echo $data['savedProducts'];?> products in your <span>favourite products list</span>.</p>
                </div>
                <div class="time-periods">
                    <h2>Favourite Recipes</h2>
                    <p>You have a total of <?php echo $data['savedRecipes'];?> recipes in your <span>favourite recipes list</span>.</p>
                </div>
            </div>
        </div>
        
    </div>
    
</body>
<form method="post">
    <input class="back" type="submit" name="submit" value="Get PDF">
</form>
</html>
