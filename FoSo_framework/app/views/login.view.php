
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="<?php echo ROOT;?>/assets/css/style_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <script src="js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
    <div class="contents">
        
        <img class="left-pic"src="<?php echo ROOT;?>/assets/img/pizza.jpg">
        <div class="login-form">  
            

            <div class="form">
                <h1>Welcome to <span>FoodFriend</span>!</h1>
                <i>Your journey to a balanced and organised diet awaits!</i>
                <h2>Welcome back!</h2>
                <i>We missed you</i>
                <?php
                    echo $err;
                ?>
                <form class="formular" method="post">
                    <h3>Email :</h3>
                    <input type="text" placeholder="Enter your email" name="user" required>
                    <h3>Password : </h3>   
                    <input type="password" placeholder="Enter your password" name="password" required>  
                    <input type="submit" value="Sign In" class="sign-in-input">    
                    <div class="remember-forgot">
                        <div class="remember">
                            <input type="checkbox" checked="checked">Remember me 
                        </div>
                        <p class="forgot-password" onclick="window.location.href = '<?php echo ROOT;?>/forgot'">Forgot your password?</p>
                    </div>
                    <div class="sign-up">
                        <p>Don't have an account?</p>
                        <h2 onclick="window.location.href = '<?php echo ROOT;?>/create'">Sign Up Now</h2>
                    </div>
                </form>
            </div>
        </div>
    </div>     

</body>

</html>
