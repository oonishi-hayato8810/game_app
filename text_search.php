<link rel="stylesheet"href="change.css">
<?php
    $textbox = $_GET["products"];
    $user_ID = $_GET["user_id"];
    if(empty($textbox)) {
        echo '商品名を入力してください';
        ?>
    <form action="select.php" method="get">
        <input type="submit", name="submitBtn", value="戻る" class="button">
        <input type="hidden" name="user_id" value="<?php echo $user_ID;?>">
        <input type="hidden" name="size" value="5">
        <input type="hidden" name="start" value="0">
    </form>
    <?php 
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
            $query = 'SELECT * FROM products INNER JOIN typess ON products.type_id = typess.type_id WHERE name_ like :product_name';
                
            $stmt = $pdo->prepare($query);
            $product = '%'.$textbox.'%';
            //バインド 
            $stmt->bindParam(':product_name', $product);

            $stmt->execute();
            
            $result = $stmt->fetchAll();
            if(empty($result)) {
                echo '該当するデータがありません';

            } else {
                foreach($result as $row) {
                echo '<p class="text_change">';
                echo $row["name_"];
                echo ',  \\';
                echo $row["price"];
                echo ',    ';
                echo $row["type_name"];
                echo '</p>';
                }
            }
            ?>
            <form action="select.php" method="get">
                <input type="submit", name="submitBtn", value="戻る" class="button">
                <input type="hidden" name="user_id" value="<?php echo $user_ID;?>">
                <input type="hidden" name="size" value="5">
                <input type="hidden" name="start" value="0">
            </form>
            <?php

        } catch (PDDException $e) {
            //例外が発生したら無視
            require_once 'exception_tpl.php';
            echo $e->getMessage();
            exit();
    }
    
    

?>  
