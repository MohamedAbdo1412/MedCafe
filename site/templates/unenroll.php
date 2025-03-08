<?php 
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $conn = mysqli_connect("localhost", "root", "Trap8Trap" ,"med_cafe_db");
    if(!$conn){
    echo mysqli_connect_error();
    exit; 
    }
    $course_id =$_GET['course'];
    $user_id = $_GET['id'];
    $query = "DELETE FROM enrollments WHERE course_id =${course_id} AND user_id =${user_id} ";
    $excute =mysqli_query($conn ,$query);
    header("Location: ../admin-page/index.php?action=enrolledstudents&type=course&id=${course_id}");
    exit;
}