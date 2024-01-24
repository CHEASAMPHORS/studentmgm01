<?php
    include "config.php";
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['name'])){ 
        
    if(isset($_POST['save'])){
       $department = $_POST['name'];
       $sql = "insert into gender(name) values('$department')";
       $query = mysqli_query($conn, $sql);
       if($query){
        echo "<script>alert('Add data success');</script>";
       }
    }
?>
<?php
    include "config.php";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $delete=mysqli_query($conn, "DELETE FROM gender WHERE id='$id'");
        if($delete){
            header("location:gendercontext.php");
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="contantner">
        <div class="row bg-secondary p-3 mb-2 text-white border rounded">
            <div class="col-7">
                <div class="row">
                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <h4>Total Gender =</h4>
                    </div>
                    <div class="col">
                        <?php
                        include "config.php";
                        $query = "SELECT id FROM gender ORDER BY id"; 
                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_num_rows($query_run);
                        echo '<h4>' . $row . '</h4>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-8">
                            <input class="form-control"name="search" placeholder="Search">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary">search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="bg-primary p-3 text-white border rounded">
                    <h2>Add New Despartment</h2>
                </div>
            <div>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control mt-3" placeholder="Add New despartment" name="name">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary mt-3" name="save" type="submit">Save</button>
                            <button class="btn btn-success mt-3" type="reset">Clear</button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </form>
            </div>
            <table class="table table-striped mt-3 ">
                <thead>
                <tr class="bg-success">
                    <th>Shift ID</th>
                    <th>Shift Name</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    include "config.php";
                    $sql = "select * from gender";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)){
                    ?>
                         <tr>
                            <td><?php echo $row ['id'] ?></td>
                            <td><?php echo $row ['name'] ?></td>
                            <td>
                                <a href="?delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Do you want to delete')" class="btn btn-danger fontkh"><i class="bi bi-trash"></i>Delete</a>
                            </td>
                            <td>
                                <button class="btn btn-success  " name="update"  type="submit">Update</button>
                            </td>
                         </tr>
                    <?php
                    }                    
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
    
</body>
</html>
<?php
