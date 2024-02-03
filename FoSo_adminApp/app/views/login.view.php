<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style_login.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <script src="<?php echo ROOT; ?>/assets/js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    </head>
<body style="background-image: url('./assets/img/food.jpg');">
    <div class="content">
        <form method="POST">
            <div class="container">
                <label>Username : </label>   
                <input type="text" placeholder="Enter Username" name="username" required>  
                <label>Password : </label>   
                <input type="password" placeholder="Enter Password" name="password" required> 
                <?php  echo $err; ?> 
                <button type="submit">Login</button>   

            </div>

        </form>

    </div>

</body>

</html>