<?php
$check_code2 = $_POST['code2'];
echo $check_code2;
?>

<section id="team" class="slider" data-stellar-background-ratio="0.5">
     <div class="recent-post">
        <h4> 강의 수강 학생 조회 </h4>

     <table>
      <thead>
        <tr>
          <th>stu_name</th>
          <th>stu_address</th>
          <th>stu_phone</th>
          <th>stu_email</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $con = mysqli_connect('localhost','root','1234','cultureland');
            $query = "SELECT stu_name, stu_address, stu_phone, stu_email
            FROM cultureland.course, cultureland.register, cultureland.student
            where course.course_code=register.course_code
            and student.stu_code = register.stu_code
            and register.course_code= '$check_code2';";
            $exec = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($exec)){
            echo '<tr><td>' . $row[ 'stu_name' ] . '</td><td>'. $row[ 'stu_address' ] .  '</td><td>'. $row[ 'stu_phone' ] .  '</td><td>'. $row[ 'stu_email' ] .  '</td></tr>';
             }
        ?>
      </tbody>
    </table>
    </div>
    </section>