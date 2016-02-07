<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JAZUGNagoyaHandson</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    
    <!-- My StyleSeet -->
    <link rel="stylesheet" href="./style.css" />
    <?php
        session_start();
    ?>
  </head>
  <body>
    <?php
        $task_name='nodata';
        $task_date='nodata';

        if(isset($_POST['task_name'])&&isset($_POST['task_date'])){
            $task_name = $_POST['task_name'];
            $task_date = $_POST['task_date'];
            
            $task_array = array();
            
            if(isset($_SESSION['tasks'])){
                $json = $_SESSION['tasks'];
                $task_array = json_decode($json);
            }
            
            $task = array('name'=>$task_name,'date'=>$task_date);
            array_push($task_array,$task);
            $json = json_encode($task_array);
            $_SESSION['tasks'] = $json;
            
        }
        
        print('<h1>Todo</h1>');

        print('<h3>名前</h3>');
        print('<p>');
        print($task_name);
        print('</p>');
        print('<h3>期限日</h3>');
        print('<p>');
        print($task_date);
        print('</p>');
        
    ?>
    <a href="./index.php">前に戻る</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>