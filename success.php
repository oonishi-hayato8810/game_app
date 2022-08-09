<!DOCTYPE html>
<html>
    
<head>
  <meta charset="utf-8">
  <link rel="stylesheet"href="touroku.css">

</head>
<div align="center" class="body">
<body>
<form action="select.php" method="get">
    <p>
    <label>登録が完了しました</label>
    </p>
    <input type="submit", name="submitBtn", value="戻る" class="button">
    <input type="hidden" name="user_id" value="<?php echo $user_ID;?>">
    <input type="hidden" name="size" value="5">
    <input type="hidden" name="start" value="0">
</from>
</body>
</div>

</html>
