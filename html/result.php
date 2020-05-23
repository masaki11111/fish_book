<?php
// session_start();
//ipアドレスは自分のパソコンのものを設定
//PDO:php database object
try{
  // インスタンス化
  $db=new PDO('mysql:dbname=db_fish_book;host=127.0.0.1;charset=utf8','root','');
}catch(PDOException $e){
  echo 'DB接続エラー:' . $e->get_Message();
}

// $count = $db->exec('INSERT INTO my_items2 SET maker_id=1,item_name="もも", price=210');
// echo $count . 'くだんのデータを購入しました';


// メソッド利用
// $images=$db->query('SELECT * FROM fish_image WHERE id = 2');
// $image = $images->fetch();
// header('Content-type: image/png');
// echo  $image['content'];

//データベース上の画像データを直接呼び出す方法
// $number = 1;
// $sql = "SELECT * FROM fish_image WHERE id = :image_id";
// $stmt = $db->prepare($sql);
// $stmt->bindValue(":image_id", 1 , PDO::PARAM_INT);
// $stmt->execute();
// $image = $stmt->fetch();
// header('Content-type: image/png');
// echo  $image['content'];


// データベース上のパスから画像データを呼び出す方法
$sql = "SELECT * FROM fish_image";
$stmt = $db->prepare($sql);
// $stmt->bindValue(":image_id", 1 , PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetchAll();

//お魚を表示させる横幅をランダムに設定
for($num=0;$num<count($image);$num++){
  // left(0-100にすると，画像が見切れるため0~70
  $image[$num][7]=rand(0,70);
  // opacity
  $image[$num][8]=rand(10,90);
  // 移動量(ランダム化)
  if($image[$num][6]=="up_down"){
    $image[$num][9]=rand(1600,3200);
  }
  elseif ($image[$num][6]=="to_left") {
    $image[$num][9]=rand(80000,160000);
  }
  elseif ($image[$num][6]=="to_right") {
    $image[$num][9]=rand(80000,160000);
  }
}

// 左右に移動するタイプは初期位置を右端に設定
// $image[2][7]=100;
// $image[4][7]=100;
// $image[5][7]=100;
// $image[6][7]=-1;
// $image[7][7]=100;

// opacityを0.2~0.8に調節
$image[0][8]*=0.01;
$image[1][8]*=0.01;
$image[2][8]*=0.01;
$image[3][8]*=0.01;
$image[4][8]*=0.01;
$image[5][8]*=0.01;
$image[6][8]*=0.01;
$image[7][8]*=0.01;
$image[8][8]*=0.01;
$image[9][8]*=0.01;
$image[10][8]*=0.01;

// echo($image[0][6] . "\n");
// echo($image[0][8] . "\n");
// echo($image[1][7] . "\n");
// echo($image[2][7] . "\n");
// echo($image[3][7] . "\n");
// echo($image[4][7] ."\n");
// var_dump(count($image));
// while($image = $stmt->fetchAll()){
//   $path[]=$image;
// }
// echo $path[0][0];
// echo $path[1][1];
// $path[]=$image;
// echo $path[0][0];

// var_dump($image);
// $path[]=$image;
// var_dump($path[0]["type"]);

// $path[]=$image;
// while($image = $stmt->fetch()){
//   $path[]=$image;
// }

// header('Content-type: image/png');
// echo  $image[0];
// echo  $image["type"];


// $sql = 'SELECT * FROM fish_image WHERE id = 2';
// var_dump($image['content']);

// var_dump($DB_PIC_ARRAY[1]);
// var_dump("he");
// $record=$records->fetchAll();
// for($i = 0; $i < count($record); $i++){
//   print($i);
//   header('Content-type: image/png');
// print( $record["content"]);
// }
// unset($pdo);
// exit();
?>
