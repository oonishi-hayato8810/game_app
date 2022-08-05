<!DOCTYPE html>
<html>
    
<head>
  <meta charset="utf-8">
  <title></title>
  
</head>
<?php
    $user_ID = $_GET["user_id"];
    $password = $_GET["pass_word"];
    $start = $_GET["start"];
    $size = $_GET["size"];
    
    
    try {
        // データベースに接続
        $pdo = new PDO(
            // ホスト名、データベース名
            'mysql:host=localhost;dbname=order;',
            // ユーザー名
            'root',
            // パスワード
            '',
            // レコード列名をキーとして取得させる
            [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]
        );
        
        // SQLクエリ作成(よくない例)
        // $query = 'SELECT * FROM user WHERE user_id = \'' . $user_id . '\' AND password = \'' . $password . '\'' ;
        $query = 'SELECT * FROM user WHERE user_id = :user_ID AND user_password = :password';
        // SQL文をセット
        //$stmt = $pdo->prepare('SELECT * FROM user');
        $stmt = $pdo->prepare($query);
        // SQL文を実行

        //バインド 変換？みたいな感じ
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':user_ID', $user_ID);

        $stmt->execute();
        /*foreach ($stmt as $row)  {
            echo ($row["user_id"]);
            echo ",";
            echo ($row["user_name"]);
            echo ",";
            echo ($row["user_password"]);
            echo ",";
            echo ($row["e_mail"]);
            echo ",";
            echo ($row["permission"]);
            echo ",";
            echo "<BR>";
        }*/
        
        $result = $stmt->fetchAll();
        if(empty($result)){
            require_once 'login.html';
        } else {
            $user_name = $result[0]["user_name"];
            // 5件だけ検索
            $query = 'SELECT * FROM products limit :begin, :size';


            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':begin', $start, PDO::PARAM_INT);  //formatみたいなやつ
            $stmt->bindParam(':size', $size, PDO::PARAM_INT);    //formatみたいなやつ
            $stmt->execute();  // sql実行
            $result = $stmt->fetchAll();

            require_once 'viewSelect_tpl.php';
        }

    } catch (PDDException $e) {
        //例外が発生したら無視
        require_once 'exception_tpl.php';
        echo $e->getMessage();
        exit();
    }
?>  
</html>

