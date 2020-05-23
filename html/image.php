<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<!-- <title>PHP</title> -->
</head>
<body>
<header>
<!-- <h1 class="font-weight-normal">PHP</h1> -->
</header>

<main>
<!-- <h2>Practice</h2> -->
<pre>
<?php
//ipアドレスは自分のパソコンのものを設定
//PDO:php database object
try{
  $db=new PDO('mysql:dbname=db_fish_book;host=127.0.0.1;charset=utf8','root','');
}catch(PDOException $e){
  echo 'DB接続エラー:' . $e->get_Message();
}

// $count = $db->exec('INSERT INTO my_items2 SET maker_id=1,item_name="もも", price=210');
// echo $count . 'くだんのデータを購入しました';


$records=$db->query('select * from fish_image');
while($record=$records->fetch()){
  print($record['content'] . "\n");
}
 ?>
<!-- ここにプログラムを記述します -->
</pre>
</main>
</body>
</html>
