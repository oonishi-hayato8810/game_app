<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet"href="select.css">
    <link rel="stylesheet"href="button1.css">
    <link rel="stylesheet"href="button2.css">
    <link rel="stylesheet"href="button3.css">
    <link rel="stylesheet"href="button4.css">
    <title></title>
</head>
<span class="font_test">ようこそ <?php echo $user_name; ?> さん</span>
<body>

<p>
<form action="text_search.php" method="get">   
    <label for="products">商品検索</label>
    <input type="text" name="products" placeholder="$products"/>
    <input type="hidden" name="user_id" value="<?php echo $user_ID; ?>"/>
    <input type="submit", name="sunmitBtn", value="検索" class="button1">
</form>
</p>


<?php 
    $count = $start;
    if(empty($result)) {
        echo 'データがありません';
    } else {
    foreach($result as $row) {
    
    $count += 1;
    echo '<p class="text_change">';
    echo $count;
    echo ',  ';
    echo $row["name_"];
    echo ',  \\';
    echo $row["price"];
    echo ',  ';
    echo $row["type_name"];
    echo '</p>';
    
    
    
?>
    <form action = "update.php" mechod="get">
    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_ID; ?>">
    <input type="hidden" name="start" value="0">
    <input type="hidden" name="size" value="5">
    <input type="submit" name="submitBtn" value="更新" class="button">
    </form>

    <form action = "deletedate.php" mechod="get">
    <input type="hidden" name="name_" value="<?php echo $row['name_']; ?>">
    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
    <input type="hidden" name="type_id" value="<?php echo $row['type_id']; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_ID; ?>">
    <input type="hidden" name="start" value="0">
    <input type="hidden" name="size" value="5">
    <input type="submit" name="submitBtn" value="削除" class="button2">
    </form>

<?php
    }
}
    ?>


<p>
<form action = "touroku.php" mechod="get">
    <input type="hidden" name="user_id" value="<?php echo $user_ID; ?>">
    <input type="submit" name="submitBtn" value="新規" class="button3">
</form>
</p>



 <form action = "select.php" mechod="get">
    <input type="hidden" name="user_id" value="<?php echo $user_ID; ?>">
    <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type="hidden" name="start" value="

<?php 
    $next = $start - 5;
    if ($next < 0) {
        $next = 0;
    }
    echo $next;
?>
    ">
    <input type="hidden" name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="前へ" class="button4">
 </form>
<p>
</p>
 <form action="select.php" method="get">
    <input type="hidden" name="user_id" value="<?php echo $user_ID;?>">
    <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type="hidden" name="size" value="<?php echo $size; ?>">
    <input type="hidden" name="start" value="
<?php 
    $next = $start + 5;
    echo $next;
?>
    ">
    <input type="submit" name="submitBtn" value="次へ" class="button4">
 </form>

</p>
</body>
</html>
 