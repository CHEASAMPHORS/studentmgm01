<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../studentmgm/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="login.css">
</head>
    <?php if(isset($_GET['error'])){?>
    <p class="error alert alert-danger" role="alert"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <body>
    <form action="cod.php" method="POST">
<!-- <form class="container" onsubmit="myfunction()"> -->
    <div class="containe">
        <div class="my-form">
        <div class="header">
            <h1><b>System Login</b></h1>
            <p>Get Your Admin Account Now</p>
        </div>
    <div class="fom">
        <div>
            <label class="A"><h5><b>Name</b></h5> </label></br>
            <input type="text" name="name" placeholder="Enter Username" class="form-control" required>
        </div>
        <div class="C">
            <label for=""><h5><b>Password</b></h5></label></br>
            <input type="password" name="pwd" placeholder="Enter Password" class="form-control" required>
        </div>
        <div class="ll">
            <div class="div">
            <button type="submit" class="btn btn-danger" name="btnlog">Login</i></button>
            <button type="cancel" class="btn btn-primary" name="btnclear">Cancel</i></button>
            </div>
        </div>
    </div>
</div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>