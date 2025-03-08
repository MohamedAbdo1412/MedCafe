<div class="courses">
    <header class="variable-header">
        <h2>Courses</h2>
        <button onclick="window.location.href='index.php?action=addcourses'"><i class="fa-solid fa-square-plus"></i>  Add New Course</button>
    </header>
    <?php
    
        $query_courses = 'SELECT * FROM courses';
        $result_courses = mysqli_query($conn ,$query_courses);
        $No =0;
        while($row = mysqli_fetch_assoc($result_courses)){ 
            $No++;
            $query_teacher_name ='SELECT * FROM users WHERE `id` = ' .$row["instructor_id"];
            $result_teacher_name = mysqli_query($conn ,$query_teacher_name );
            while($teacher =mysqli_fetch_assoc($result_teacher_name )){
                $teacher_username =$teacher['username'];
            }
            $course_id = $row['id'] ;
            ?>
            
    <div class="course" id="course">
        <label for="" class="course-label"><h2><?= $row['title']?></h2></label>
        <div class="course-content">
            <ul>
                <li><strong>Title : </strong><?= $row['title']?></li>
                <li><strong>Description : </strong><?= $row['description']?></li>
                <li><strong>Teacher : </strong><a href=""><?= $teacher_username?></a></li>
                <li><strong>Price : </strong><?= $row['price']?> $</li>
            </ul>
            <div class="course-content-functions">
                <button style="background-color:#5cb85c;" onclick="window.location.href='index.php?action=enrolledstudents&type=course&id=<?= $course_id?>' "><i class="fa-solid fa-users-rectangle"></i> Enrolled Students</button>
                <button><i class="fa-solid fa-photo-film"></i> Media Provided</button>
                <button id="edit-button"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                <button style="background-color:#e62222;"><i class="fa-solid fa-trash"></i> Delete</button>
            </div>
        </div>
    </div>
    <?php }?>
</div>
    
<script>
      // For Accordion 

      const course = document.getElementsByClassName('course');

for (let index = 0; index < course.length; index++) {
    console.log(course[index]);

    let label = course[index].getElementsByClassName("course-label");

    // Ensure there is at least one label before adding the event listener
    if (label.length > 0) {
        label[0].addEventListener('click', function () {
            course[index].classList.toggle('active');
        });
    }
}

            


</script>
