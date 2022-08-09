<!DOCTYPE html>
<html>
    
<head>
  <meta charset="utf-8">
  <title>登録画面</title>
  <link rel="stylesheet"href="touroku.css">

</head>
</div>
<div align="center" class="body">
 <body>
 <p>
    <label>追加する商品情報を入力してください</label>
  </p>

  <?php
      $user_ID = $_GET["user_id"];
  ?>

  <form action="newdate.php" method="get">

    <p>
    <label for="name_">商品名</label>
    <input type="text" name="name_" placeholder="product_name"/>
    </p>

    <p>
    <label for="type_id">商品タイプ</label>
    <select name="type_id">
      <option value="1">モバイルゲーム</option>
      <option value="2">PCゲーム</option>
      <option value="3">CSゲーム</option>
    </select>
    </p>

    <p>
    <label for="price">金額</label>
    <input type="text" style="ime-mode:disabled;" name="price" placeholder="product_price"/>
    </p>

    <input type="hidden" name="user_id" value="<?php echo $user_ID;?>">
    <input type="submit", name="sunmitBtn", value="登録" class="button">
  </form>
  <p>
  </p>

   <form action="select.php" method="get">
    <input type="submit", name="submitBtn", value="戻る" class="button">
    <input type="hidden" name="user_id" value="<?php echo $user_ID;?>">
    <input type="hidden" name="size" value="5">
    <input type="hidden" name="start" value="0">
   </form>
  </body>
</div> 
</html>
