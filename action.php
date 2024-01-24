<?php
include 'config.php';
$output='';

if(isset($_POST['query'])){
    $search=$_POST['query'];
    $stmt=$conn->prepare("SELECT * FROM student WHERE name LIKE CONCAT('%',?,'%')");
    $stmt->bind_param("ss",$search,$search);
}
else{
    $stmt=$conn->prepare("SELECT * FROM student");
}
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows>0){
    $output ="<thead>
    <tr>
        <th>ID</th>
        <th>ឈ្មោះ</th>
        <th>ភេទ</th>
        <th>អាយុ</th>
        <th>ថ្ងៃ​ ខែ ឆ្នាំកំណើត</th>
        <th>ទីកន្លែងកំណើត</th>
        <th>អស័យដ្ឋានបច្ចុប្បន្ន</th>
        <th>លេខទូរស័ព្ទ</th>
        <th>Email</th>
        <th>វេនសិក្សា</th>
        <th>មហាវិទ្យាល័យ</th>
        <th>ក្រុម</th>
        <th>អត្តលេខសិស្ស</th>
    </tr>
</thead>
    <tbody>";
    while($row=$result->mysqli_fetch_assoc()){
        $output .="
        <tr>
        <td>". $row['ID']."</td>
        <td>". $row['name']."</td>
        <td>". $row['geder'] ."</td>
        <td>". $row['age'] ."</td>
        <td>". $row['dob'] ."</td>
        <td>". $row['pob'] ."</td>
        <td>". $row['address'] ."</td>
        <td>". $row['phone'] ."</td>
        <td>". $row['gmail'] ."</td>
        <td>". $row['shift'] ."</td>
        <td>". $row['depart'] ."</td>
        <td>". $row['s_group'] ."</td>
        <td>". $row['student_id'] ."</td>
    </tr>";
    }
    $output .="</tbody>";
    echo $output;
}
else{
    echo "<h3>No Records Found!</h3"
}

?>