<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style_register_final.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
    <div class="logo">
    <img src="<?php echo ROOT; ?>/assets/img/logo3.svg">
    </div>
    <div class="content">
        <div class="content-col">   
            <div class="welcome">
                <div class="messages">
                    <div class="message">
                        <h2><span>YAY! You've finished configuring your account!</span></h2>
                    </div>
                    <div class="message">
                        <p><span>Next on, you can</span> allow location sharing <span>or change</span> </p>
                    </div> 
                    <div class="message">
                        <p><span>your</span> account settings, <span>or</span> change your diet preferences.</p>
                    </div> 
                    <div class="message">
                        <p><span>But enough talking! Click</span> the button below <span>and let's get you on</span> </p>
                    </div>
                    <div class="message">
                        <p><span>board to the</span> next culinary adventure!</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    
    <div class="done-button">
        <button type="button" class="done" onclick="window.location.href = '<?php echo ROOT; ?>/login'">To Dashboard</button>
    </div>
</body>

</html>







