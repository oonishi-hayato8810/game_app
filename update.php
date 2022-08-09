<?php
    $pry_key = $_GET["product_id"];
    $user_ID= $_GET["user_id"]; 
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
        $query = 'SELECT * FROM products where product_id = :product_ID';
        // SQL文をセット
        //$stmt = $pdo->prepare('SELECT * FROM user');
        $stmt = $pdo->prepare($query);
        // SQL文を実行

        //バインド 変換？みたいな感じ
        $stmt->bindParam(':product_ID', $pry_key);
        //$stmt->bindParam(':user_ID', $user_ID);

        $stmt->execute();
        
        $result = $stmt->fetchAll();

        require_once 'update2.php';
        }

     catch (PDDException $e) {
        //例外が発生したら無視
        require_once 'exception_tpl.php';
        echo $e->getMessage();
        exit();
    }
    
  ?>
