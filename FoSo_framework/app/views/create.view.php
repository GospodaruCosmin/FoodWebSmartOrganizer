<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style_register_first.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <script src="<?php echo ROOT; ?>/assets/js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<body style="background-image: url('<?php echo ROOT; ?>/assets/img/background.jpg');">
    <div class="logo">
        <img src="<?php echo ROOT; ?>/assets/img/logo3.svg">
    </div>
    <div class="content">
        <div class="content-col">   
            <div class="welcome">
                <div class="messages">
                    <div class="message">
                        <h1 style="color:white; font-family: 'Poppins', sans-serif">Create an account</h1> 
                    </div>
                    <div class="message" style="color:white; font-family: 'Poppins', sans-serif">
                        <p>Already a member? <span><a onclick="window.location.href = 'login.html'">Log in</a></span></p>
                    </div>
                    <div class="message" style="color:white; font-family: 'Poppins', sans-serif">
                        <p>The first steps are always the hardest ones... but we promise it's worth it!</p>
                    </div>  
                </div>
            </div> 
           
                <div class="form">
                    <p><?php echo $err;?></p>
                    <form method="post"> 
                         <div class="flname">
                            <div class="name">
                                <label for="firstName" style="color:white; font-family: 'Poppins', sans-serif">First Name:</label>
                                <input type="text" id="firstName" name="firstName" required>
                            </div>
                            <div class="name">
                                <label for="lastName" style="color:white; font-family: 'Poppins', sans-serif">Last Name:</label>
                                <input type="text" id="lastName" name="lastName" required>
                            </div>
                        </div>
                        
                            <label for="Email", style="color:white; font-family: 'Poppins', sans-serif">Email:</label>
                            <input type="text" id="Email" name="email" required>
                            <label for="Password" style="color:white; font-family: 'Poppins', sans-serif">Password:</label>
                            <input type="password" id="password" name="password" required>
                            <button type="submit" style="font-family:Poppins, sans-serif">Continue to your diet</button>
                    </form>   
                </div>
                
            </div>
            
    </div>
</body>
</html>
<!-- onclick="window.location.href = '<?php echo ROOT; ?>/createsecond'" -->