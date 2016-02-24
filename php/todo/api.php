<?php
//javascriptから非同期通信で呼ばれるapiプログラム

//アクセスはすべてjson、utf-8で返す
header("Content-Type: application/json; charset=utf-8");

//もしリクエストがhttp getメソッドなら
if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    //httpステータスコードを200に
    http_response_code(200);
    
    //クッキーにタスクがセットされているなら
    if(isset($_COOKIE['tasks'])){
        //クッキーからタスクのjsonデータを取り出して出力
        $json = $_COOKIE['tasks'];
        print($json);
    }else{
        //クッキーにタスクがセットされていないなら初回なので空のデータを返す
        print('{}');
    }

//もしリクエストがhttp postメソッドなら
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //httpステータスコードを200に
    http_response_code(200);
    
    //postで送られてきたタスクデータを取得
    $task = $_POST['task'];
    $task_array = array();
    if(isset($_COOKIE['tasks'])){
        
        //現在のクッキーに入っているタスク一覧データを取り出す
        $json = $_COOKIE['tasks'];
        $task_array = json_decode($json);
        
    }
    //タスク一覧に送られてきたタスクを追加する
    array_push($task_array,$task);
    //クッキーにタスクを保存
    setcookie('tasks',json_encode($task_array));
    //成功したことを返す
    print('{"message":"success"}');

}else {
    //getとpost以外は400を返す
    http_response_code(400); 
}

?>