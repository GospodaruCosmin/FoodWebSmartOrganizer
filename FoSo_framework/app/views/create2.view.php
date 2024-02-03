<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style_register_second.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo ROOT; ?>/assets/js/script.js"></script>
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
                        <h1>Create an account</h1> 
                    </div>
                    <div class="message">
                        <p>Already a member? <span><a onclick="window.location.href = 'login.html'">Log in</a></span></p>
                    </div>
                    <div class="message">
                        <p>You're almost ready to start your new culinary journey!</p>
                    </div>  
                </div>
            </div>  
        </div>
    </div>
    <form method="post" >
        <div class="content-second">
            <div class="search-allergies">
                <h3>Select your allergies or food intolerances:</h3>
                <div class="list-allergies">
                
                    <div class="col-allergies">                   
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="dairy"> 
                            <p>Dairy</p>                 
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="egg"> 
                            <p>Egg</p>
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="gluten"> 
                            <p>Gluten</p>
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="grain">
                            <p>Grain</p>
                        </div>
                        <div class="row-allergy">
                            <input type="radio" class="nothing" name="nothing" value="nothing"> 
                            <p>Nothing</p>
                        </div>
                    </div>
                    <div class="col-allergies">
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="peanut">
                            <p> Peanut</p>
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="seafood">
                            <p>Seafood</p>
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="sesame">
                            <p>Sesame</p>
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="shellfish"> 
                            <p>Shellfish</p>
                        </div>
                    </div>
                    <div class="col-allergies">
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="soy"> 
                            <p>Soy</p>
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="sulfite"> 
                            <p>Sulfite</p>
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="tree nut"> 
                            <p>Tree Nut</p>
                        </div>
                        <div class="row-allergy">
                            <input type="checkbox" class="intolerances" name="intolerances[]" value="wheat"> 
                            <p>Wheat</p>
                        </div>
                    </div>
                </div>      
            </div>

        </div>
        
        <div class="done-button">
            <button type="submit" class="done" >Done</button>
        </div>
    </form>
</body>
</html>
