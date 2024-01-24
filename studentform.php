<?php
include "config.php";
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $pob = $_POST['pob'];
        $phone = $_POST['phone'];
        $shift = $_POST['s_shift'];
        $group = $_POST['group'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $add = $_POST['address'];
        $mail = $_POST['email'];
        $depart = $_POST['depart'];
        $sid = $_POST['id'];
        $img1 = $_FILES['pic1']['name'];

        if ($img1 != "") {
            $ext = pathinfo($img1, PATHINFO_EXTENSION);
            $img1 = md5(uniqid()) . "." . $ext;
            move_uploaded_file($_FILES['pic1']['tmp_name'], "upload1/" . $img1);
        } else {
            $img1 = "";
        }

        $sql = "INSERT INTO `student`(`name`, `geder`, `dob`, `pob`, `age`, `address`, `phone`, `gmail`, `shift`, `depart`, `s_group`, `student_id`, `pic1`) VALUES ('$name','$gender','$dob','$pob','$age','$add','$phone','$mail','$shift','$depart','$group','$sid','$img1')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "";
        } else {
            echo "<script>alert('Add data Failed')</script>";
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['id'];
        $photo = mysqli_query($conn, "select * from student where id='$id'");
        $prow = mysqli_fetch_assoc($photo);
        unlink("upload1/" . $prow['pic1']);
        $delete = mysqli_query($conn, "DELETE FROM `student` WHERE ID='$id'");
        if ($delete) {
            header("location:studentform.php");
            die();
        }
    }
    if (isset($_GET['edit'])) {
        $id = $_GET['id'] ?? null;
        $query = mysqli_query($conn, "select * from student where id='$id'");
        while ($row = mysqli_fetch_assoc($query)) {
            $Vid = $row['ID'];
            $Vname = $row['name'];
            $Vage = $row['age'];
            $Vpob = $row['pob'];
            $Vphone = $row['phone'];
            $Vaddress = $row['address'];
            $Vshift = $row['shift'];
            $Vgroup = $row['s_group'];
            $Vgender = $row['geder'];
            $Vdob = $row['dob'];
            $Vadd = $row['address'];
            $Vgmail = $row['gmail'];
            $Vdepart = $row['depart'];
            $Vsid = $row['student_id'];
            $Vpic = $row['pic1'];
        }
    } else {
        $Vid = "";
        $Vname = "";
        $Vage = "";
        $Vgender = "";
        $Vdob = "";
        $Vpob = "";
        $Vaddress = "";
        $Vphone = "";
        $Vgmail = "";
        $Vshift = "";
        $Vdepart = "";
        $Vgroup = "";
        $Vsid = "";
        $Vpic = "";
    }

    if (isset($_POST['btnedit'])) {
        $tid = $_POST['txtid'];
        $tname = $_POST['name'];
        $tage = $_POST['age'];
        $tpob = $_POST['pob'];
        $tphone = $_POST['phone'];
        $tshift = $_POST['s_shift'];
        $tgroup = $_POST['group'];
        $tgender = $_POST['gender'];
        $taddress = $_POST['address'];
        $tdob = $_POST['dob'];
        $tadd = $_POST['address'];
        $tmail = $_POST['email'];
        $tdepart = $_POST['depart'];
        $tsid = $_POST['id'];
        $timg1 = $_FILES['pic1']['name'];

        if ($_FILES['pic1']['name'] != "") {
            list($name, $ext) = explode(".", $_FILES['pic1']['name']);
            $timg1 = md5(uniqid()) . "." . $ext;
            unlink("upload1/" . $_POST['txtpic']);
            move_uploaded_file($_FILES['pic1']['tmp_name'], "upload1/" . $timg1);
        } else {
            $timg1 = $_POST['txtpic'];
        }
        $sql = "update student set name='" . $tname . "',age='" . $tage . "',pob='" . $tpob . "',phone='" . $tphone . "',shift='" . $tshift . "',s_group='" . $tgroup . "',geder='" . $tgender . "',dob='" . $tdob . "',address='" . $taddress . "',gmail='" . $tmail . "',depart='" . $tdepart . "',student_id='" . $tsid . "',pic1='" . $timg1 . "' where id='" . $tid . "'";

        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<div class='alert alert-success' role='alert'>
        កែប្រែជោគជ័យ
      </div>";
            header("location:studentform.php");
        } else {
            echo "<div class='alert alert-danger fontkh4' role='alert'>
        <i class='bi bi-exclamation-circle-fill'></i> កែប្រែមិនជោគជ័យ!
      </div>";
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
        <div class="container-fluid">
            <?php include "barner.php"; ?>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="bg-primary p-3 text-white border rounded">
                        <h2>Add New Students</h2>
                    </div>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="txtid" value="<?php echo $Vid; ?>">
                        <input type="hidden" name="txtpic" value="<?php echo $Vpic; ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 mt-3 h5">
                                    <label>ឈ្មោះសិស្ស:</label>
                                    <input type="text" value="<?php echo $Vname; ?>" class="form-control" placeholder="Student Name" name="name" required>
                                </div>
                                <div class="mb-3 mt-3 h5">
                                    <label>អាយុ:</label>
                                    <input type="text" value="<?php echo $Vage; ?>" class="form-control" placeholder="Age:" name="age" required>
                                </div>
                                <div class="mb-3 mt-3 h5">
                                    <label>ទីកន្លែងកំណើត:</label>
                                    <input type="text" value="<?php echo $Vpob; ?>" class="form-control" placeholder="" rows="3" name="pob" required>
                                </div>
                                <div class="mb-3 mt-3 h5">
                                    <label>លេខទូរស័ព្ទ:</label>
                                    <input type="text" value="<?php echo $Vphone; ?>" class="form-control" placeholder="phone number" name="phone" required>
                                </div>
                                <div class="mb-3 mt-3 h5">
                                    <label>វេនសិក្សា:</label>
                                    <select class="form-select" value="<?php echo $Vshift; ?>" name="s_shift" style="width:100%;">
                                        <?php
                                        include "config.php";
                                        $query = mysqli_query($conn, "select * from shift");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option values="<?php echo $row['id'];  ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 mt-3 h5">
                                    <label>ឈ្មោះក្រុម:</label>
                                    <input type="text" value="<?php echo $Vgroup; ?>" class="form-control" placeholder="Group Name" name="group" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3 mt-4 h5">
                                    <label>ភេទ:</label>
                                    <select class="form-select" value="<?php echo $Vgender; ?>" name="gender" style="width:100%;">
                                        <?php
                                        include "config.php";
                                        $query = mysqli_query($conn, "select * from gender");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option values="<?php echo $row['id'];  ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 mt-3 h5">
                                    <label>ថ្ងៃ ខែ ឆ្នាំកំណើត:</label>
                                    <input type="date" value="<?php echo $Vdob; ?>" class="form-control" placeholder="" name="dob" required>
                                </div>
                                <div class="mb-3 mt-3 h5">
                                    <label>អាស័យដ្ឋានបច្ចុប្បន្ន:</label>
                                    <input type="text" value="<?php echo $Vaddress; ?>" class="form-control" placeholder="Address" rows="3" name="address" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email">Mail:</label>
                                    <input type="email" value="<?php echo $Vgmail; ?>" class="form-control" id="email" placeholder="Enter email" name="email">
                                </div>
                                <div class="mb-3 mt-3 h5">
                                    <label>មហាវិទ្យាល័យ:</label>
                                    <select class="form-select bg-light" value="<?php echo $Vdepart; ?>" id="floatingSelect" name="depart" style="width:100%;">
                                        <?php
                                        include "config.php";
                                        $query = mysqli_query($conn, "select * from department where status='2'");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option values="<?php echo $row['id'];  ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 mt-3 ">
                                    <label>ID:</label>
                                    <input type="text" value="<?php echo $Vsid; ?>" class="form-control" placeholder="Student ID" name="id" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                     <label>រូបថត:</label>
                                    <input type="file" class="form-control" name="pic1" placeholder="image">
                                </div>
                            </div>
                        </div>
                        <div>
                            <?php
                            if (isset($_GET['edit'])) {
                                echo "<button type='submit' class='btn btn-warning' name='btnedit'>Update</button>";
                            } else {
                                echo ' <button type="submit" class="btn btn-primary rounded-pill mt-3" name="save">Send</button>';
                            }
                            ?>
                            <button class="btn btn-success btn btn-danger rounded-pill mt-3" type="reset">Cencal</button>
                        </div>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row mt-2">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="table-responsive">
                        <table class="table border rounded-3 text-nowrap bg-light">
                        <div class="col-8">
                            <input class="form-control"name="search" placeholder="Search">
                        </div>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ឈ្មោះ</th>
                                    <th scope="col">ភេទ</th>
                                    <th scope="col">អាយុ</th>
                                    <th scope="col">ថ្ងៃ​ ខែ ឆ្នាំកំណើត</th>
                                    <th scope="col">ទីកន្លែងកំណើត</th>
                                    <th scope="col">អស័យដ្ឋានបច្ចុប្បន្ន</th>
                                    <th scope="col">លេខទូរស័ព្ទ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">វេនសិក្សា</th>
                                    <th scope="col">មហាវិទ្យាល័យ</th>
                                    <th scope="col">ក្រុម</th>
                                    <th scope="col">អត្តលេខសិស្ស</th>
                                    <th scope="col">រូបថត</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <?php
                            include "config.php";
                            $sql = "select * from student";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['ID'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['geder'] ?></td>
                                    <td><?php echo $row['age'] ?></td>
                                    <td><?php echo $row['dob'] ?></td>
                                    <td><?php echo $row['pob'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['gmail'] ?></td>
                                    <td><?php echo $row['shift'] ?></td>
                                    <td><?php echo $row['depart'] ?></td>
                                    <td><?php echo $row['s_group'] ?></td>
                                    <td><?php echo $row['student_id'] ?></td>
                                    <td>
                                        <img src="<?php echo "upload1/" . $row['pic1']; ?>" height="40px">
                                    </td>
                                    <td>
                                        <a href="?delete&id=<?php echo $row['ID'] ?>" onclick="return confirm('Jg delete ke man??')" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>
                                        <a href="?edit&id=<?php echo $row['ID']; ?>">
                                            <button type="button" class="btn btn-success">Update</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
    </body>

    </html>