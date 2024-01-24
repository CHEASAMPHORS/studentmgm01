<?php
    include "config.php";
    if(isset($_POST['btnsave'])){
       $uname = $_POST['uname'];
       $pwd = md5($_POST['pwd']);
       
       $img1 = $_FILES['pic1']['name'];
       if($img1 !=""){
       // $ext = pathinfo($img1, PATHINFO_EXTENSION);
        //$img1 = md5(uniqid()).".".$ext; 
        move_uploaded_file($_FILES['pic1']['tmp_name'],"upload/".$img1);
       }else{
        $img1 = "";
       }
       $sql ="insert into tbl_user(u_name,u_pwd,u_pic) values('$uname','$pwd','$img1')";
       $query = mysqli_query($conn,$sql);
       if($query){
        echo"<script>alert('Add data success');</script>";
       }
    }
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
<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-success">Manage user</li>
                    <li class="list-group-item list-group-item-success">Manage Student</li>
                    <li class="list-group-item list-group-item-success">Manage Shift</li>
                    <li class="list-group-item list-group-item-success">Manage Group</li>
                    <li class="list-group-item list-group-item-success">Manage Department</li>
                    <li class="list-group-item list-group-item-success">Manage Gender</li>
                </ul>
            </div>
            <div class="col-sm-9">
                <h3 class="bg-danger text-white p-4 rounded">Add User</h3>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="was-validated">
                <div class="mb-3 mt-3">
                <label for="email" class="form-label">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                </div>
                
                <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                </div>
                <div class="mb-3">
                <label for="pwd" class="form-label">Profile:</label>
                <input type="file" name="pic1" required>
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary" name="btnsave">Save</button>
                    <button type="reset" class="btn btn-primary" name="btnsave">Clear</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>