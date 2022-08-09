<?php
    $user_ID = $_GET["user_id"];
    $product_name = $_GET["name_"];
    $product_type= $_GET["type_id"]; 
    $product_price = $_GET["price"];
    
    //金額が0以下の時は受け付けない
    if($product_price < 0) {
        require_once 'touroku.php';

        exit;
    } 
    
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
        
        // SQL文をセット
        $stmt = $pdo->prepare('INSERT INTO products(name_, type_id, price, order_date, order_status, order_user_id) VALUES (:product_name, :product_type, :product_price, now(), 3, :userid)');#now())'); #now()は現在日時を取得するSQL関数
 
        // 挿入する値をセット
        $stmt->bindValue(':product_name', $product_name);
        $stmt->bindValue(':product_type', $product_type);
        $stmt->bindValue(':product_price', $product_price, PDO::PARAM_INT);
        $stmt->bindValue(':userid', $user_ID);

        // SQL実行
        $stmt->execute();
        
        require_once 'success.php';

    } catch (PDOException $e) {
        // エラー発生
        echo $e->getMessage();
    } 
?>  
