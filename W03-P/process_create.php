<?php
  //var_dump($_POST);
  $link = mysqli_connect("localhost","root","rootroot","dbp");
  $filtered = array(
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description'])
  );
  $query = "
    INSERT INTO food (
      title, description, created
      ) Value (
        '{$filtered['title']}',
        '{$filtered['description']}',
        now()
        )
  ";

  $result = mysqli_multi_query($link, $query);
  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
 ?>
