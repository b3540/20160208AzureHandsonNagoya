<?php
header("Content-Type: application/json; charset=utf-8");

$sql = mysql_connect('ja-cdbr-azure-west-a.cloudapp.net', 'b82cee9bd25c06', 'ee67f77a');

$todoDb = mysql_select_db('garitodo',$sql);
mysql_set_charset('utf-8');


if($_SERVER["REQUEST_METHOD"] == "GET"){
    http_response_code(200);
    $result = array();
    $sqlresult = mysql_query('select * from todo');
    while($i =mysql_fetch_assoc($sqlresult)){
        array_push($result,array('task_name'=>$i['name'],'task_date'=>$i['date']));
    }
    print(json_encode($result));
    
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
    http_response_code(200);
    
    $task = $_POST['task'];
    $name = $task['task_name'];
    $date = $task['task_date'];
    $result = mysql_query('insert into todo(name,date) values ("'.$name.'","'.$date.'")');
    print('{"message":"'.mysql_error($sql).'"}');
}else {
    http_response_code(400); 
}

mysql_close($sql);
?>