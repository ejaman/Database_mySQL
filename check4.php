<?php
$check_code3 = $_POST['code3'];
echo $check_code3;
?>

<section id="team" class="slider" data-stellar-background-ratio="0.5">
     <div class="recent-post">
        <h4> 강의 수강 학생 조회 </h4>

     <table>
      <thead>
        <tr>
          <th>inst_name</th>
          <th>stu_name</th>
          <th>course_name</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $con = mysqli_connect('localhost','root','1234','cultureland');
            $query = "SELECT inst_name,stu_name,course_name
            from instructor, student, course,register
            where instructor.inst_code=course.inst_code
            and student.stu_code=register.stu_code
            and register.course_code= course.course_code
            and instructor.inst_code='$check_code3';";
            $exec = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($exec)){
            echo '<tr><td>' . $row[ 'inst_name' ] . '</td><td>'. $row[ 'stu_name' ] .  '</td><td>'. $row[ 'course_name' ] .  '</td></tr>';
             }
        ?>
      </tbody>
    </table>
    </div>
    </section>