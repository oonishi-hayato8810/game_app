<?php
    $user_ID = $_GET["user_id"]; 
    $product_name = $_GET["name_"];
    $product_type= $_GET["type_id"]; 
    $product_price = $_GET["price"];
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
        $stmt = $pdo->prepare('DELETE FROM products WHERE type_id = :product_type and name_ = :product_name and price = :product_price');
        // 挿入する値をセット
        
        $stmt->bindParam(':product_price', $product_price, PDO::PARAM_INT);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':product_type', $product_type);

        // SQL実行
        $stmt->execute();
        require_once 'select.php';
        
    } catch (PDOException $e) {
        // エラー発生
        echo $e->getMessage();
     
    } finally {
        // DB接続を閉じる
        $pdo = null;
    }
?>



