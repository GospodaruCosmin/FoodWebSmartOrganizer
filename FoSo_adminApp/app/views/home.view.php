<?php

///var_dump($users);
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Settings</title>
        <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style_index.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <script src="<?php echo ROOT; ?>/assets/js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    </head>
<body>
    <div class="section1-col">
        <div class="navigation">
            <img class="logo" src="<?php echo ROOT; ?>/assets/img/logo3.svg">
            <div class="navbar">
                <a id="seeUsers" onclick="browseMenu(0)">See Users</a>
                <a id="seeRecipes" onclick="browseMenu(1)">Modify website</a>
                <a href="<?php echo ROOT; ?>/logout">Log out</a>
            </div>  
        </div>
    </div>
    <div id="users" class="content">
        <h1>See all users that are in the database</h1>
        <?php foreach($users as $user){?>
            <div class="elements">
                <div class="element">
                    <!-- <img src="img/sofia_gonzales.jpg"> -->
                    <div class="information-user">
                        <p>First name: <?php echo $user['first_name'] ?></p>
                        <p>Last name: <?php echo $user['last_name'] ?></p>
                        
                        <p>Email: <?php echo $user['email_address']?></p>
                    </div>
                    <div class="control-buttons">
                        <button class="delete" onclick="deleteUser(<?php echo $user['id']?>)">Delete this user</button>
                        <button class="make-admin" onclick="makeAdmin(<?php echo $user['id'] ?>)">Make Admin</button>
                    </div>
                    
                </div>

            </div>
        <?php } ?>
        
    </div>
    <div id="recipes" class="content">
        <h1>See what is first displayed on each page</h1>
        
        <div class="elements">
            <div class="element">
                <?php echo $data['images']['products'];?>
                <div class="information-user">
                    <p>Products page</p>
                    <p>This is what is displayed</p>
                    <p class="products"></p>
                </div>
                <div class="control-buttons">
                    <button class="delete" onclick="deletePic('products')">Delete this picture</button>
                    <button class="make-admin" onclick="window.location.href = '<?php echo ROOT; ?>/upload/products'">Replace</button>
                </div>
                
            </div>

        </div>
        <div class="elements">
            <div class="element">
                <?php echo $data['images']['recipes'];?>

                <div class="information-user">
                    <p>Recipes page</p>
                    <p>This is what is displayed</p>
                    <p class="recipes"></p>
                </div>
                <div class="control-buttons">
                    <button class="delete" onclick="deletePic('recipes')">Delete this picture</button>
                    <button class="make-admin" onclick="window.location.href = '<?php echo ROOT; ?>/upload/recipes'">Replace</button>
                </div>
                
            </div>

        </div>
        <div class="elements">
            <div class="element">
                <?php echo $data['images']['dashboard'];?>
                <div class="information-user">
                    <p>Dashboard page</p>
                    <p>This is what is displayed</p>
                    <p class="dashboard"></p>
                </div>
                <div class="control-buttons">
                    <button class="delete" onclick="deletePic('dashboard')">Delete this picture</button>
                    <button class="make-admin" onclick="window.location.href = '<?php echo ROOT; ?>/upload/dashboard'">Replace</button>
                </div>
                
            </div>

        </div>

    </div>
<script>
    function deletePic(type) {
        // Create an object with the data to be sent
        var data = {
            type: type
        };

        // Send an AJAX request to the PHP file
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', 'deletePic', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Request successful
                console.log(xhr.responseText);
                var response = xhr.responseText;
                document.querySelector('.' + type).textContent = response;
            }
        };
        xhr.send(JSON.stringify(data));
    }
    function makeAdmin(id) {
        // Create an object with the data to be sent
        var data = {
            id: id
        };

        // Send an AJAX request to the PHP file
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'adminMaker', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Request successful
                console.log(xhr.responseText);
                
            }
        };
        xhr.send(JSON.stringify(data));
    }
    function deleteUser(id) {
        // Create an object with the data to be sent
        var data = {
            id: id
        };

        // Send an AJAX request to the PHP file
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', 'deleteUser', true);
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