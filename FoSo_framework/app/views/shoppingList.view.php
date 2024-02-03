<!DOCTYPE html>
<html>
   
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style_list.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo ROOT; ?>/assets/js/script.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<body>
    <button class="back" onclick="window.location.href = '<?php echo ROOT; ?>/home'">Go Back</button>
    <div class="content">
        <div class="content-col">
            <h1>Shopping List</h1>
            <?php foreach($data as $element){ ?>
                <div class="ing-price">
                    <p><?php echo $element ?></p>
                    <!-- <span>10 RON</span> -->
                </div>
            <?php } ?>
            <p class="mesaj"></p>
        <button type="button" class="confirm" onclick="sendDeleteRequest()">I bought these ingredients</button>
        <button type="button" class="confirm" onclick="importList()">Export this shopping list</button>
        </div>
    </div>
    <button type="button" class="confirm" onclick="window.location.href = '<?php echo ROOT; ?>/import'">Import an existing shopping list</button>

<script>
  function sendDeleteRequest() {
    var data = {
      userConn: '<?php echo $_COOKIE['userConn']; ?>'
    };

    var xhr = new XMLHttpRequest();
    xhr.open('DELETE', 'clearList', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            var ingPriceDivs = document.getElementsByClassName('ing-price');
                        for (var i = ingPriceDivs.length - 1; i >= 0; i--) {
                            ingPriceDivs[i].remove();
                        }
                        // Update .mesaj div content
                        var mesajDiv = document.querySelector('.mesaj');
                        mesajDiv.textContent = 'No ingredients in the shopping list.';
        } else {
           
            var mesajDiv = document.querySelector('.mesaj');
            mesajDiv.textContent = ' Error while trying to access database.';
          console.error('Request failed with status ' + xhr.status);
        }
      }
    };
    xhr.send(JSON.stringify(data));
  }
  function importList() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'clearList', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            var mesajDiv = document.querySelector('.mesaj');
            mesajDiv.textContent = 'List exported successfully';
        } else {
            var mesajDiv = document.querySelector('.mesaj');
            mesajDiv.textContent = 'Error while trying to export list.';
          console.error('Request failed with status ' + xhr.status);
        }
      }
    };
    xhr.send();
  }
</script>
</body>

</html>
