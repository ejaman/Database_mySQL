<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>check_student</title>
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
      table {
        width: 100%;
      }
      th, td {
        padding: 10px;
        border-bottom: 1px solid #dadada;
      }
    </style>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th>Inst_code</th>
          <th>Inst_name</th>
          <th>Inst_adress</th>
          <th>Inst_email</th>
          <th>Inst_phone</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $jb_conn = mysqli_connect( 'localhost', 'root', '1234', 'culture_world' );
          $jb_sql = "SELECT * FROM culture_world.instructor;";
          $jb_result = $jb_conn->query($jb_sql);
          while( $jb_row = $jb_result->fetch_array(MYSQLI_ASSOC)){
            echo '<tr><td>' . $jb_row[ 'INST_CODE' ] . '</td><td>'. $jb_row[ 'INST_NAME' ] . '</td><td>' . $jb_row[ 'INST_ADDRESS' ] . '</td><td>' . $jb_row[ 'INST_EMAIL' ] . '</td><td>'.$jb_row['INST_PHONE'].'</td></tr>';
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
