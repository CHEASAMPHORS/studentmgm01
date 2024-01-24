<?php
    include "config.php";
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['username'])){ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
</head>
<body style="background-color:#00BFFF;">
    <div class="container-fluid" >
        <?php  include "barner.php"; ?>
        <?php  include "firstcontent.php"; ?>  
    </div>
</body>
</html>
<?php
}else{
    header("location:login.php");
    exit();
}
?>