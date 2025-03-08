<?php 


// Connection To Database
$conn = mysqli_connect("localhost", "root", "Trap8Trap" ,"med_cafe_db");
if(!$conn){
echo mysqli_connect_error();
exit; 
}



    $query = "INSERT INTO enrollments (user_id , course_id) VALUES (${_POST['member']} ,${_GET['course']})";
    $result = mysqli_query($conn , $query);


    header("Location: ../admin-page/index.php?action=enrolledstudents&type=course&id=${_GET['course']}");
    exit;