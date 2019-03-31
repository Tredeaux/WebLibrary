<!DOCTYPE html>
<html lang="en">
<title>TITLE</title>
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="description" content="Page Description">
    <meta name="keywords" content="SEO tags">
    <meta name="author" content="Author">
    <!-- If mobile version -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/style.css" type="text/css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="Favicon/Location"/>

    <!-- CDN -->
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div id="width" <?php if ($_SESSION["admin"] == 1) { echo 'style="border:5px solid red;"';} ?> class="width">
    <div class="header">
        <img id="top" style="height:15vh;width:auto;" src="Images/Logo.png">
        <p class="header_1">Header</p>
    </div>

    <div class="topnav" id="myTopnav">
        <a href="page.php">Page</a>
        <a href="page.php">Page</a>
        <a href="page.php">Page</a>
        <a href="page.php">Page</a>

    </div>

    <div class="spacer"></div>

    <div style="margin:auto;display:flex;">
        
        <div style="background-color:#eee;min-height:150px;" onclick="location.href='about.php'" class="mCard Main">
            <i style="font-size:3em;color:#2f2f2f;" class="fa fa-address-card"></i>
            <h1>Text</h1>
        </div>
    
        <div style="background-color:#eee;min-height:150px;" onclick="location.href='news.php'" class="mCard Main">
            <i style="font-size:3em;color:#2f2f2f;" class="fa fa-align-left"></i>
            <h1>Text</h1>
        </div>
    
        <div style="background-color:#eee;min-height:150px;" class="mCard Main">
            <i style="font-size:3em;color:#2f2f2f;" class="fa fa-graduation-cap"></i>
            <h1>Text</h1>
        </div>
    
        <div  style="background-color:#eee;min-height:150px;" onclick="findFunction()" class="mCard Main">
            <i style="font-size:3em;color:#2f2f2f;" class="fa fa-search"></i>
            <h1>Text</h1>
        </div>
    </div>
    
</div> 

</body>
</html>