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
    <h1>Please Input Todo Task!</h1>
    <div id="main-container">
        <form method="POST" action="./result.php">
            <h3>名前</h3>
            <input type="text" name="task_name" class="form-control" placeholder="task name" />
            <h3>期限日</h3>
            <input type="date" name="task_date" class="form-control" />
            <input type="submit" value="submit" class="btn btn-default" />
        </form>
        
        <h2>登録済みタスク</h2>
        <?php
            if(isset($_SESSION['tasks'])){
                $json = $_SESSION['tasks'];
                
                $tasks = json_decode($json);
                //print_r($tasks);
                for($i =0;$i<count($tasks);$i++){
                    print('<p>');
                    print('name => ');
                    print($tasks[$i]->name);
                    print('date => ');
                    print($tasks[$i]->date);
                    print('<input type="checkbox" />');
                    print('</p>');
                }
            }
        ?>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
