<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="assets/css/style_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <script src="js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
    <div class="contents">
        
        <img class="left-pic"src="assets/img/pizza.jpg">
        <div class="login-form">  
            

            <div class="form">
                <h1>Please enter your e-mail <span>and we'll take care of you!</span>!</h1>
                <?php
                    echo $err;
                ?>
                <form class="formular" method="post">
                    <h3>Password</h3>
                    <input type="text" placeholder="Enter your password" name="password" required>
                    <h3>Type your password again</h3>
                    <input type="text" placeholder="Enter your password again" name="password-again" required>  
                    <input type="submit" value="Change password" class="sign-in-input">    
                </form>
            </div>
        </div>
    </div>     

</body>

</html>