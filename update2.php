<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet"href="update.css">
    <title></title>
</head>
<body>
    <p>商品名、金額、商品タイプを変更してください</p>
    <form method='get' action='update3.php'>
    <label>商品名</label>
    <input type='text' name='product_name' value='<?php echo $result[0]["name_"]?>'>
    <label>金額</label>
    <input type='text' name='product_price' value='<?php echo $result[0]["price"]?>'>
    <label>商品タイプ</label>
    <select name="type_id">
      <option value="1">モバイルゲーム</option>
      <option value="2">PCゲーム</option>
      <option value="3">CSゲーム</option>
    </select>
    <input type="hidden" name="product_id" value="<?php echo $pry_key; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_ID; ?>">
    <input type="hidden" name="start" value="<?php echo $start; ?>">
    <input type="hidden" name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="変更" class="button">
    </form>
</body>
</html>
    

