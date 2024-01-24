<?php 
    $conn=new mysqli("localhost","root","","staff");
        if (isset($_GET['delete'])){
        $id=$_GET['delete'];
        $conn->query("DELETE FROM shift WHERE id='$id'");
    header("location:shiftform.php");
    }
?>