<?php
header("Content-Type: application/json; charset=utf-8");
print('moge');
$sql = mysql_connect('ja-cdbr-azure-west-a.cloudapp.net', 'b82cee9bd25c06', 'ee67f77a');
print($sql);
$todoDb = mysql_select_db('garitodo',$sql);
mysql_set_charset('utf-8');


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
    $name = $task['task_name'];
    $date = $task['task_date'];
    $result = mysql_query('insert into todo (name,date) values ('.$name.','.$date.')');
    /*
    $task_array = array();
    if(isset($_COOKIE['tasks'])){
        $json = $_COOKIE['tasks'];
        $task_array = json_decode($json);
    }
    
    array_push($task_array,$task);
    setcookie('tasks',json_encode($task_array));
    */
    print('{"message":"'.$result.'"}');
}else {
    http_response_code(400); 
}

mysql_close($sql);
?>