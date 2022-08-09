<?php
    $product_name = $_GET["product_name"];
    $product_price = $_GET["product_price"];
    $product_type = $_GET["type_id"];
    $product_ID = $_GET["product_id"];
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
        
        // SQL文をセット
        $stmt = $pdo->prepare('UPDATE products SET name_ = :product_name, price = :product_price, type_id = :product_type WHERE product_id = :product_ID');
 
        // 挿入する値をセット
        $stmt->bindValue(':product_name', $product_name);
        $stmt->bindValue(':product_ID', $product_ID);
        $stmt->bindValue(':product_price', $product_price);
        $stmt->bindValue(':product_type', $product_type);
        
        // SQL実行
        $stmt->execute();
        require_once 'select.php';

    } catch (PDOException $e) {
        // エラー発生
        echo $e->getMessage();
    } 
?>  