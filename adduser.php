<?php
    include "config.php";
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['name'])){ 
        
    if(isset($_POST['btnsave'])){
       $uname = $_POST['uname'];
       $pwd = ($_POST['pwd']);
       $img1=$_FILES['pic1']['name'];
       
       if ($img1 != "") {
        $ext = pathinfo($img1, PATHINFO_EXTENSION);
        $img1 = md5(uniqid()) . "." . $ext;
        move_uploaded_file($_FILES['pic1']['tmp_name'], "upload/" . $img1);
    } else {
        $img1 = "";
    }
       $sql = "insert into user (username,password,pic1) values ('$uname','$pwd','$img1')";
       $query = mysqli_query($conn,$sql);
       if($query){
        echo "<script>alert('Insert Success')</script>";
       }
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
    <div class="container-fluid" >
        <?php  include "barner.php"; ?>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <h3 class="bg-danger text-white p-4 rounded">Add User</h3>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                <label for="email" class="form-label">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname">
                </div>

                <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>

                <div class="mb-3">
                <label for="img" class="form-label">Profile Picture:</label>
                <input type="file" class="form-control" id="img" placeholder="Enter pic" name="pic1">
                </div>

                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary" name="btnsave">Save</button>
                    <button type="reset" class="btn btn-success" name="btnsave">Clear</button>
                </div>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <!-- Select Date  -->
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            <div class="col">
                <?php 
                    $sql = "select * from user";
                    $query = mysqli_query($conn,$sql);
                    echo "<table class='table table-striped'>";
                    echo"<th>User Id</th><th>User Name</th><th>Profile Picture</th> ";
                    while($row=mysqli_fetch_assoc($query)){
                        echo"<tr>";
                            echo "<td>'".$row['id']."'</td>";
                            echo "<td>'".$row['username']."'</td>";
                            echo "<td>'".$row['pic1']."'</td>";
                        echo"</tr>";
                        
                    }
                    echo "</table>";
                
                ?>
            </div>
            <div class="col-2"></div>
        </div>
        <!-- End Select Date -->
    </div>
</body>
</html>