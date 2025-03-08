<?php
session_start();
if($_SESSION['admin']=== '1'){
?>



<!-- The Whole God Damn Site -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/Add.css">
        <link rel="stylesheet" href="css/Delete.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="logo.png">
        <title>MedCafe Admin Panel</title>
    </head>
    <body>
        <aside id="sidebar">
            <div class="side-bar-title">
                <button id="closeSidebar" class="close-btn" onclick="closeSidebar()">&times;</button> <!-- Close Button -->
                <img class="side-bar-image" src="logo.png" alt="">
            </div>
            <div class="side-bar-links">
                <div class="side-bar-link">
                    <i class="fa-solid fa-house"></i>
                    <a href="index.php">Home</a>
                </div>
                <div class="side-bar-link">
                    <i class="fa-solid fa-layer-group"></i>
                    <a href="index.php?action=courses">Courses</a>
                </div>
                <div class="side-bar-link" onclick="window.location.href='index.php?action=members';">
                    <i class="fa-solid fa-user"></i>
                    <a href="index.php?action=members">Members</a>
                </div>
                <div class="side-bar-link" onclick="window.location.href='index.php?action=teachers';">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <a href="index.php?action=teachers">Teachers</a>
                </div>
                <div class="side-bar-link">
                    <i class="fa-solid fa-coins"></i>
                    <a href="#">Transactions</a>
                </div>
                <div class="side-bar-link logout" onclick="window.location.href='index.php?action=logout';">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <a href="index.php?action=logout" id="logout">Logout</a>
                </div>
            </div>
        </aside>
        <main>
            <nav>
                <button id="openSidebar" class="menu-btn" onclick="openSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </button>   
                <h1 class="dashboard">Dashboard</h1>
                <h1 class="premium"><i class="fa-solid fa-crown"></i><?php echo "   ".$_SESSION['username']?></h1>
                <div class="nav-bar-links">
                    <div class="nav-bar-link">
                        <a href="./../home-page/index.php">Members Site</a>
                    </div>
                    <img src="logo.png" alt="" height="50px">
                </div>
            </nav>
            <script src="script.js"></script>
            <section class="variable-section"> 
                <section class="variable">
<?php






if(isset($_GET['action'])){
    $perform= $_GET['action'];
}else{
    $perform= 'default';
}
// Connection To Database
    $conn = mysqli_connect("localhost", "root", "Trap8Trap" ,"med_cafe_db");
    if(!$conn){
    echo mysqli_connect_error();
    exit; 
    }
switch($perform){

    case 'members':  
        
// Enrollments informations


// Adding To Members

$query = "SELECT * FROM users WHERE admin=0";
$response = mysqli_query($conn ,  $query);
echo "
<table border='1' cellpadding='10'>
<header class='variable-header'>
<h2>Members</h2>
<button onclick="."window.location.href='index.php?action=addusers&type=member'"."><i class='fa-solid fa-square-plus'></i> Add New Member</button>
</header>
<br>
<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Number</th>
<th>Enrolments</th>
<th>Edit</th>
<th>Delete</th>

</tr>";
while($row = mysqli_fetch_assoc($response)){
            $query_enrollments = "SELECT * FROM `enrollments` WHERE `user_id` =  " .$row['id'] ; 
            $result_enrollments = mysqli_query($conn ,$query_enrollments);
            $enrollments = [];
            while($row_enrollments = mysqli_fetch_assoc($result_enrollments) ){
                $query_courses_name = "SELECT `title` FROM courses WHERE id =" .$row_enrollments['course_id'] ;
                $result_courses_name = mysqli_query($conn , $query_courses_name);
                while($row_courses_name = mysqli_fetch_assoc($result_courses_name)){

                    array_push($enrollments,$row_courses_name['title']) ;
                }
                
            };

            

                    $userid=$row["id"];
            echo "
            
                    <tr>
                        <td>${row['id']}</td>
                        <td>${row['username']}</td>
                        <td>${row['email']}</td>
                        <td>${row['number']}</td>
                        <td>" ;
            for( $i = 0; $i<count($enrollments) ; $i++ ){
                echo $i + 1 ." - " ;
                echo $enrollments[$i];
                echo  "<br>";
            }
                        
            echo           "</td>
                        <td>";
                        include('css/Add-button.php');
                        
            echo    "</td>

                        <td>";
                        include('css/Delete-button.php');

            echo    "</td>
                    </tr>";
        }





        exit;


        case 'teachers':
        $query = "SELECT * FROM users WHERE admin=2";
        $response = mysqli_query($conn , $query);
        echo "<table border='1' cellpadding='10'>
                    <header class='variable-header'>
                        <h2>Teachers</h2>
                        <button onclick="."window.location.href='index.php?action=addusers&type=teacher'"."><i class='fa-solid fa-square-plus'></i> Add New Teacher</button>
                    </header>
                    <br>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Courses Id</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </tr>";
        while($row = mysqli_fetch_assoc($response)){
                    $userid=$row["id"];
            echo "
            
                    <tr>
                        <td>${row['id']}</td>
                        <td>${row['username']}</td>
                        <td>${row['email']}</td>
                        <td>${row['number']}</td>
                        <td>Courses Id</td>
                        <td>"
                        ;
                        include('css/Add-button.php');
                        
            echo    "</td>

                        <td>";
                        include('css/Delete-button.php');

            echo    "</td>
                    </tr>";
        }


        exit;
        
        case 'logout':
        session_start();
        session_unset();  // Remove all session variables
        session_destroy(); // Destroy the session
        header("Location: ../login-page/index.php");
        exit();


        case 'delete' :

        $query = "SELECT * FROM users WHERE id=${_GET['id']}";
        $response = mysqli_query($conn , $query);
        while($row = mysqli_fetch_assoc($response)){
            
            if(isset($_GET['confirm']) && $_GET['confirm']=='yes'){}else{include('../templates/delete-site.php');}
            if($row['admin']== 2 && isset($_GET['confirm']) && $_GET['confirm']=='yes'){
                $redirect_after_proccess= 'teachers';
            }else{
                $redirect_after_proccess= 'members';
            };
        }
        if(isset($_GET['confirm']) && $_GET['confirm']=='yes'){
        $query_delete="DELETE FROM users WHERE id = ${_GET['id']}";
        $response_delete = mysqli_query($conn , $query_delete);
        
        
        header("Location: index.php?action=$redirect_after_proccess");
        exit;
        }
        

        


        exit;

        case 'edit':


            $query = "SELECT * FROM users WHERE id=${_GET['id']}";
            $response = mysqli_query($conn , $query);
            while($row = mysqli_fetch_assoc($response)){
                
                if(isset($_GET['confirm']) && $_GET['confirm']=='yes'){}else{
                    
                    include('../templates/edit-site.php');
                
                }
                if($row['admin']== 2 && isset($_GET['confirm']) && $_GET['confirm']=='yes'){
                    $redirect_after_proccess= 'teachers';
                }else{
                    $redirect_after_proccess= 'members';
                };
            }
            if(isset($_GET['confirm']) && $_GET['confirm']=='yes'){
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $new_enrollments = $_POST['new_post_enrollments'];
                    $id_update = $_POST['id'];
                    $username_update = $_POST['username'];
                    $email_update = $_POST['email'];
                    $number_update = $_POST['number'];
                    $query_update = "UPDATE users SET username='$username_update', email='$email_update', number='$number_update' WHERE id=$id_update";
                    $response_update = mysqli_query($conn , $query_update);
                    $query_delete_enrollments = "DELETE FROM enrollments WHERE user_id =" . $_POST['id'];
                    $excute_delete_enrollments = mysqli_query($conn , $query_delete_enrollments);
                    foreach($new_enrollments as $enrollment){
                        $query_add_new_enrollments = "INSERT INTO enrollments (user_id , course_id) VALUES (${_POST['id']} ,$enrollment)";
    
                        $excute_add_new_enrollments = mysqli_query($conn , $query_add_new_enrollments);
                    }
                    header("Location: index.php?action=$redirect_after_proccess");
                    exit;
                }
            }
        exit;
        case 'courses':
            include('../templates/courses-accordion.php');
        exit;
        case 'addusers':
            
            if(isset($_GET['confirm']) && $_GET['confirm']=='yes'){
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    if($_POST['type']== 2 && isset($_GET['confirm']) && $_GET['confirm']=='yes'){
                        $redirect_after_proccess= 'teachers';
                    }else{
                        $redirect_after_proccess= 'members';
                    };
                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    $admin_add = $_POST['type'];
                    $username_add = $_POST['username'];
                    $email_add = $_POST['email'];
                    $number_add =   $_POST['number'] ;
                    $password_add = sha1($_POST['password']);
                    $query_add = "INSERT INTO users (username, email, number, password ,admin) VALUES ('$username_add', '$email_add', $number_add, '$password_add' ,$admin_add)";
                    $response_add = mysqli_query($conn , $query_add);
                    header("Location: index.php?action=$redirect_after_proccess");
                    exit;
                }
            }else{
                include('../templates/users-add-site.php');
            }
            
            
        exit;
        case 'addcourses':
            
            if(isset($_GET['confirm']) && $_GET['confirm']=='yes'){
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $title_add =$_POST['title'];
                    $description_add =$_POST['description'];
                    $teacher_add =$_POST['teacher'];
                    $price_add =$_POST['price'];
                    $query_add = "INSERT INTO courses ( title,description,instructor_id, price) VALUES ('$title_add', '$description_add', $teacher_add, '$price_add')";
                    $response_add = mysqli_query($conn , $query_add);
                    header("Location: index.php?action=courses");
                    exit;
                }
            }else{
                include('../templates/courses-add-site.php');
            }
            
            
        exit;
        case 'enrolledstudents' :
            include("../templates/enrolled-students.php");

        exit;
        
        case 'default':
        echo "Welcome to Website ${_SESSION['username']}";

        exit;
}










?>



                </section>
            </section>
        </main>
        
        <script src="script.js"></script>
    </body>
</html>









<?php
}
elseif($_SESSION['admin']==='0'){
    header('Location:../home-page/index.php');
    exit;
}
else{
    header('Location:../login-page/index.php');
    exit;
}


mysqli_close($conn);
?>