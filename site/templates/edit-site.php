<form action="index.php?action=edit&id=<?= $row['id'];?>&confirm=yes" method="post">
<input type="hidden" name="id" id="id" value="<?=$row['id'];?> " readonly>
    <table id="delete-table">
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Id</td>
                <td><input type="text" name="" id="" value="<?=$row['id'];?> " readonly></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="username" value="<?=$row['username'];?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email" value="<?=$row['email'];?>"></td>
            </tr>
            <tr>
                <td>Number</td>
                <td><input type="text" name="number" id="number" value="<?=$row['number'];?>"></td>
            </tr>
            <tr>
                <td>Enrollments</td>
                <td>

<?php
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
$query_courses = 'SELECT * FROM courses';
$result_courses = mysqli_query($conn ,$query_courses);
while($row_courses = mysqli_fetch_assoc($result_courses)){

?> 
<label for="<?php $row_courses['id'] ?>"><?= $row_courses['title'] ?> </label>
<input type="checkbox" name="new_post_enrollments[]" id="<?= $row_courses['id'] ?>" value="<?= $row_courses['id'] ?>" 

<?php 
for($i=0 ; $i<count($enrollments); $i++){
    if($row_courses['title'] == $enrollments[$i]){
        echo "checked" ;
    }
}

?>
>
<br>

<?php
}
?>






                </td>
            </tr>
        </table>
        <br>
        <h2>Are You Sure You Want To Update This User?</h2>
        <br>
        <div id="delete-table-Confirm">
            <button class="noselect " style="background-color:#00aaaa;" id="edit-button delete-button-confirm" type="submit">
                <span class="text">Update</span
                ><span class="icon" style="border-left-color:#007272;"
                ><svg
                    viewBox="0 0 24 24"
                    height="24"
                    width="24"
                    xmlns="http://www.w3.org/2000/svg"
                ></svg><span class="buttonSpan"><i class="fa-solid fa-pen-to-square"></i></span></span>
            </button>        
            <button id="ignore-button" onclick="window.location.href='index.php?action=<?php if($row['admin']== 2){echo 'teachers';}else{echo 'members';}?>'">Ignore</button>
        </div>
</form>