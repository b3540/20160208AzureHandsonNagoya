<?php
header("Content-Type: application/json; charset=utf-8");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    http_response_code(200);
    if(isset($_COOKIE['tasks'])){
        $json = $_COOKIE['tasks'];
        print($json);
    }else{
        print('{}');
    }
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
    http_response_code(200);
    
    $task = $_POST['task'];
    $task_array = array();
    if(isset($_COOKIE['tasks'])){
        $json = $_COOKIE['tasks'];
        $task_array = json_decode($json);
    }
    
    array_push($task_array,$task);
    setcookie('tasks',json_encode($task_array));
    print('{"message":"success"}');
}else {
    http_response_code(400); 
}


?>