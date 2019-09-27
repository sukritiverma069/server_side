<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/Grid.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>

        <div id="mySidepanel" class="sidepanel">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <a href="home.php">Home</a>
                <a href="monthly.php">Monthly</a>
                <a href="quaterly.php">Quaterly</a>
                <a href="yearly.php">Yearly</a>
                
              </div>
              
              <button class="openbtn" onclick="openNav()">☰ </button>  
              
              
              <script>
              function openNav() {
                document.getElementById("mySidepanel").style.width = "250px";
              }
              
              function closeNav() {
                document.getElementById("mySidepanel").style.width = "0";
              }
              </script>
    
    
</body>
</html>