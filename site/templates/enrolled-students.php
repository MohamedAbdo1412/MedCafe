<head>
    <style>
        @media (max-width: 729px) {
        .variable-header h2{
            align-self: flex-start;
        }
    }
    @media (max-width: 729px) {
    .variable-header h2{
        font-size: 14px;
        max-width: 200px;
    }
    #enroll_section{
        transform: scale(0.8);
    }
}
</style>
</head>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'GET'){
$query_enrolled_students = "SELECT * FROM enrollments  WHERE course_id = ". $_GET['id'];
$response_enrolled_students = mysqli_query($conn , $query_enrolled_students);
echo "
<header class='variable-header'>
<h2>Enrolled Students To ";
$query_course_name = "SELECT `title` FROM courses WHERE id =" . $_GET['id'];
$response_course_name = mysqli_query($conn , $query_course_name);
echo "<span style='color:rgb(1, 64, 136);' >" . mysqli_fetch_assoc($response_course_name)['title'] ."</span>" ;
echo" </h2>";
?>
        <div id="enroll_section">
            <button id="enroll_pre" onclick="enroll_pre()"><i class="fa-solid fa-square-plus"></i> Enroll New Member</button>
            <form id="enroll_form" action="../templates/enroll-new.php?course=<?= $_GET['id'] ?>" class="remove-form" method="POST">
                <select name="member" id="teacher" required>
                    <option disabled selected hidden>Select A Member</option>
                    <?php 
                            $query_all_students = "SELECT * FROM users WHERE `admin` = 0";
                            $response_all_students = mysqli_query($conn , $query_all_students);
                            while($row_all_students = mysqli_fetch_assoc($response_all_students)){
                                $query_member_enrollments = "SELECT * FROM enrollments WHERE user_id = " .$row_all_students['id'] .  " AND course_id = "  . $_GET['id'];
                                $response_member_enrollments = mysqli_query($conn , $query_member_enrollments ); 
                                
                                if(mysqli_num_rows($response_member_enrollments) > 0){
                                    
                                }else{
                                    echo "<option value=' ${row_all_students['id']}'>${row_all_students['username']}</option>" ;
                                }
                                
                            }
                            ?>
                        
                </select>
                <button id="enroll_apply" type="submit">Apply</button>
            </form>
        </div>
        <script>
            const form = document.getElementById("enroll_form")
            const enroll_pre_button = document.getElementById("enroll_pre")
            function enroll_pre(){
                
                form.classList.remove('remove-form')
                form.classList.add('active-form')
                enroll_pre_button.style.display = "none"
                
                
            }
            </script>
            <?php
echo "
</header>
<br>
<table border='1' cellpadding='10'>
<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Number</th>
<th>Fire</th>

</tr>";
while($row_enrolled = mysqli_fetch_assoc($response_enrolled_students)){
            $query_enrolled = "SELECT * FROM `users` WHERE `id` =  " .$row_enrolled['user_id'] ; 
            $result_enrolled = mysqli_query($conn ,$query_enrolled);
            while($row = mysqli_fetch_assoc($result_enrolled)){
            
            

            echo "
            
                    <tr>
                        <td>${row['id']}</td>
                        <td>${row['username']}</td>
                        <td>${row['email']}</td>
                        <td>${row['number']}</td>
                        " ;
            
                        
            echo    "<td>";
                        ?>
                        <button class="noselect red" onclick="window.location.href='../templates/unenroll.php?course=<?=$_GET['id']?>&id=<?= $row['id']?>';"><span class="text">Fire</span><span class="icon"><i class="fa-solid fa-door-open" style="color:white;"></i></span></button>
                        <?php
            echo    "</td>
                    </tr>";

            }
        }




    }
