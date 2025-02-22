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
        <title>MedCafe Admin Panel</title>
    </head>
    <body>
        <aside>
            <div class="side-bar-title">
                <img class="side-bar-image" src="logo.png" alt="">
            </div>
            <div class="side-bar-links">
                <div class="side-bar-link">
                    <i class="fa-solid fa-house"></i>
                    <a href="index.php">Home</a>
                </div>
                <div class="side-bar-link">
                    <i class="fa-solid fa-layer-group"></i>
                    <a href="#">Categories</a>
                </div>
                <div class="side-bar-link" onclick="window.location.href='index.php?action=members';">
                    <i class="fa-solid fa-user"></i>
                    <a href="index.php?action=members">Members</a>
                </div>
                <div class="side-bar-link">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <a href="#">Teachers</a>
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
                <h1>MedCafe Admin Panel</h1>
                <h1><?php echo "Hello ".$_SESSION['username']?></h1>
                <div class="nav-bar-links">
                    <div class="nav-bar-link">
                        <a href="./../home-page/index.html">Members Site</a>
                    </div>
                    <img src="logo.png" alt="" height="50px">
                </div>
            </nav>
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
    
// Adding To Members
        
        $query = "SELECT * FROM users WHERE admin=0";
        $response = mysqli_query($conn , $query);
        echo "<table border='1' cellpadding='10'>
                    <caption>DataBase Information</caption>
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
                        <td>";
                        include('css/Add-button.php');
                        
            echo    "</td>

                        <td>";
                        include('css/Delete-button.php');

            echo    "</td>
                    </tr>";
        }





        exit;
        case 'default':
        echo 'Welcome to Website';
        exit;
        case 'logout':
        session_start();
        session_unset();  // Remove all session variables
        session_destroy(); // Destroy the session
        header("Location: ../login-page/index.php");
        exit();
}










?>



                </section>
            </section>
        </main>
        
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
?>