<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $filterd = array(
        'emp_no' => mysqli_real_escape_string($link, $_POST['emp_no']),
        'birth_date' => mysqli_real_escape_string($link, $_POST['birth_date']),
        'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
        'last_name' => mysqli_real_escape_string($link, $_POST['last_name']),
        'gender' => mysqli_real_escape_string($link, $_POST['gender']),
        'hire_date' => mysqli_real_escape_string($link, $_POST['hire_date'])
    );

    $query = "
        UPDATE employees 
        SET
            birth_date = '{$filterd['birth_date']}', 
            first_name = '{$filterd['first_name']}', 
            last_name = '{$filterd['last_name']}', 
            gender = '{$filterd['gender']}', 
            hire_date = '{$filterd['hire_date']}'
        WHERE 
            emp_no = '{$filterd['emp_no']}'
        ";
    //print_r($query);
    $result = mysqli_query($link, $query);
    if($result == false){
        echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($link));
    } else {
        echo '성공하였습니다. <a href="index.php">돌아가기</a>';
    }
?>