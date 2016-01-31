<?php
header("Content-Type: application/json; charset=utf-8");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    http_response_code(200);
    $parameter = $_GET['param'];
    print('{"message":"success http get! '.$parameter.'"}');
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
    http_response_code(200);
    $parameter = $_POST['param'];
    print('{"message":"success http post! '.$parameter.'"}');
}else {
    http_response_code(400); 
}


?>