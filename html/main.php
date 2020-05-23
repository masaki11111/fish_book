<?php
require("./result.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>

  <title>i</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- css -->
  <link rel="stylesheet" href="./_main.css">
  <!-- fontawesome-->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<style>
/* scssで記述すると，反映されない（優先順位の問題かな） */
/* .tex{
display: none;
} */
.vanish{
  display: none;
}
.dark{
  opacity: .2;
  /* color:red; */
}
/* 縦線 */
.v_line_fix {
  position:fixed;
  margin-left: 5.6rem;
  width: 0.1rem;
  height: 150.0rem;
  background-color: rgb(110, 110, 110);
  z-index: 999;
}
.point{
  position:fixed;
  /* top:0rem; */
  z-index: 1000;
}
.sensuikan{
  position:fixed;
  width:5rem;
  left: 2.50rem;
  object-fit: cover;
}
.fa-circle{
  font-size: 0.1rem;
  margin-left: 0.54rem;
}

<?php for($i=0;$i<10;$i++): ?>
<?php echo ".circle_" . $i;?>{
  position:fixed;
  top:<?php echo $i*10 ;?>%;
  left: 0.9rem;
  font-family: 'Monotype Corsiva';
  color: rgb(110, 110, 110);
  z-index: 999;
  /* width: 0.1rem; */
  /* background-color: black; */
}
<?php endfor; ?>

</style>
<body>
  <div class="background">
  </div>
  <header>
    <div class="sky"></div>
    <div class="fix">
      <!-- <div class="fix_bk"> -->
      <div class="header_style">
        <div class="header_1">
          <div class="tex">
            <!-- Biotope -->
            <?php
            // echo $DB_PIC_ARRAY[1];
            // header('Content-type: image/png');
            // $DB_PIC_ARRAY[0];
            // print(htmlspecialchars($DB_PIC_ARRAY[0],ENT_QUOTES));
            // print($DB_PIC_ARRAY[2]);
            // echo "heoo";
            ?>
            <!-- バンコクのノマドエンジニア育成講座 -->
          </div>
          <div class="header_1_1">
            <!-- <img src="./img/isaralogo.png" alt="isara"> -->
            <!-- <img src="./img/mainsp.jpg" alt="isara"> -->
          </div>
        </div>
        <div class="header_3">
          <div class="menu">
            <div class="title">
              <!-- <div class="icon">
              <img src="./img/jobsupport.png" alt="">
            </div> -->
            <div class="title_1">
              fish
            </div>
            <div class="switch">
              <span class="fas fa-chevron-up"></span>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="v_line_fix"></div>
  <div class="point">
    <img class="sensuikan" src="../img/sensuikan.png" alt="">
    <!-- <div class="">

  </div> -->
  <!-- <i class="fas fa-circle"></i> -->
</div>

<?php for($i=0;$i<10;$i++): ?>
  <div class="<?php echo "circle_" . $i;?>">
    <!-- <span></span> -->
    <span ><?php echo $i*1000 . "m";?></span>
    <span class="fas fa-circle"></span>
    <!-- <span >1000m</span> -->
  </div>
<?php endfor; ?>
<!-- <span >1000m</span> -->
<!-- <span class="fas fa-circle"></span> -->
<!-- <span >1000m</span> -->
</header>

<main>
  <!-- 波表現 -->
  <svg style="position: absolute;top:22.7rem;z-index: 3;width:100%;height:1.3rem;" version="1.1" xmlns="http://www.w3.org/2000/svg"><path id="wave" d=""/></svg>

  <!-- ドロップダウンメニュ -->
  <div class="dropdown">
    <div class="flex">
      <?php for($i=0;$i<count($image);$i++): ?>
        <div class="item <?php echo $i; ?>">
          <a href="#">
            <img src="<?php echo $image[$i][3];?>" alt="">
          </a>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  <!-- <img src="./result.php" alt=""> -->

  <!-- お魚の出現位置を決定（横） -->
  <?php for($i=0;$i<count($image);$i++): ?>
    <div class="m_<?php echo $i; ?> vanish">
      <a class="js-modal-open_<?php echo $i; ?>" href="">
        クリックでモーダルを表示
        <img style="
        position:absolute;
        z-index: <?php echo 9998-$i ?>;
        top:<?php echo 5 + $image[$i][4]/100;?>%;
        /* top:90%; */
        left:<?php echo $image[$i][7];?>%;
        width:<?php echo $image[$i][5]*100;?>rem;
        object-fit: cover;
        opacity:<?php echo $image[$i][8];?>"
        src="<?php echo $image[$i][3];?>"alt=""
        >
      </a>
    </div>
    <!-- モーダルウィンドウ -->
    <div class="modal js-modal_<?php echo $i; ?>">
      <div class="modal__bg js-modal-close_<?php echo $i; ?>"></div>
      <div class="modal__content">
        <p>
          <?php echo $image[$i][2]; ?>
          <!-- たつのおとしご -->
        </p>
        <a class="js-modal-close_<?php echo $i;?>" href="">
          <i class="far fa-times-circle"></i>
        </a>
      </div><!--modal__inner-->
    </div><!--modal-->
  <?php endfor; ?>

  <!-- <div class="" id="aaaa" style="width:100rem">
  ddddddddddd
</div> -->
</main>
<!-- 以下のバージョンだとcol-mdなどブレイクポイントをしているときは動くが，col-8など指定していない場合は数値に関係なく縦並びになる -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous"> -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script>
$(function () {
  setTimeout('animation()'); //アニメーションを実行
});
function animation(){
  <?php for($j=0;$j<count($image);$j++):?>
  // console.log("a");
  <?php echo $image[$j][1];?>();
  <?php endfor;?>
}
// 魚の動きを作成して，データベース上の記号をもとに振り分ける
<?php for($k=0;$k<count($image);$k++):?>
// up_down
<?php if ($image[$k][6] =="up_down"):?>
function <?php echo $image[$k][1];?>() {
  $('.m_<?php echo $k;?>').find("img").animate({
    top: '-=1.0%',
    left:'-=1.0%'
  }, <?php echo $image[$k][9];?>).animate({
    top: '+=1.0%',
    left:'+=1.0%'
  }, <?php echo $image[$k][9];?>);
  setTimeout('<?php echo $image[$k][1];?>()', <?php echo $image[$k][9]*2;?>); //アニメーションを繰り返す間隔
}
// to_left
<?php elseif ($image[$k][6] =="to_left"): ?>
function <?php echo $image[$k][1];?>(){
  $('.m_<?php echo $k;?>').find("img").animate({
    top: '-=10.0%',
    left:'-=200%'
  }, <?php echo $image[$k][9]?>).animate({
    top: '+=-=10.0%',
    left:'+=200%'
  }, 0);
  setTimeout('<?php echo $image[$k][1];?>()', <?php echo $image[$k][9]?>); //アニメーションを繰り返す間隔
}
// to_right
<?php elseif ($image[$k][6] =="to_right"): ?>
function <?php echo $image[$k][1];?>(){
  $('.m_<?php echo $k;?>').find("img").animate({
    top: '+=1.0%',
    left:'+=200%'
  }, <?php echo $image[$k][9]?>).animate({
    top: '-=1.0%',
    left:'-=200%'
  }, 0);
  setTimeout('<?php echo $image[$k][1];?>()', <?php echo $image[$k][9]?>); //アニメーションを繰り返す間隔
}
<?php endif; ?>
<?php endfor;?>

$(function() {
  $('.menu').on('click',function(){
    $('.menu__line').toggleClass('active');
    $('.gnav').fadeToggle();
  });
});

// モーダルウィンドウ
<?php for($i=0;$i<count($image);$i++): ?>
$(function(){
    $('.js-modal-open_<?php echo $i;?>').on('click',function(){
        $('.js-modal_<?php echo $i;?>').fadeIn();
        return false;
    });
    $('.js-modal-close_<?php echo $i;?>').on('click',function(){
        $('.js-modal_<?php echo $i;?>').fadeOut();
        return false;
    });
});
<?php endfor; ?>
// $(this).next().slideToggle();
$(document).on('click',function(e) {
   if(!$(e.target).closest('.menu').length) {
     // ターゲット要素の外側をクリックした時の操作
     if($(".dropdown").css('display') !="none"){
     $(".dropdown").slideUp(300);
     $(".menu").find(".switch").children().toggleClass("fas fa-chevron-up");
     $(".menu").find(".switch").children().toggleClass("fas fa-chevron-down");
     console.log("not");
   } }
    else {
     // ターゲット要素をクリックした時の操作
     $(".dropdown").slideToggle(300);
     $(this).find(".switch").children().toggleClass("fas fa-chevron-up");
     $(this).find(".switch").children().toggleClass("fas fa-chevron-down");
     console.log("yes");
   }
});


<?php for($i=0;$i<count($image);$i++): ?>
$(".<?php echo $i; ?>").on('click',function(){
  $(".<?php echo $i; ?>").toggleClass("dark");
  $(".m_<?php echo $i; ?>").toggleClass("vanish");
});
<?php endfor; ?>

$(window).scroll(function() {
  // 表示されている部分のウィンドウサイズ
  // var wh = window.innerHeight;
  var ws=$(this).scrollTop();
  var sh = $(window).height();
  var pos=(ws/5000)*100;
  var height=(sh/5000)*100;

  $(".point").css({
    // color:"red",
    top:pos + "%",
    height:height + "%",
    // height:"20rem"
    // top:"5"
  });
});

</script>
<!-- 水泡表現 -->
<script src="https://cdn.jsdelivr.net/npm/bubbly-bg@1.0.0/dist/bubbly-bg.js"></script>
<script>
bubbly({
  blur:1,
  colorStart: 'rgb(153, 250, 255)',
  colorStop: 'rgb(153, 250, 255)',
  compose: "lighter",
  radiusFunc:() => 1.5 + Math.random() * 1,
  angleFunc:() => -Math.PI / 2,
  velocityFunc:() => Math.random() * 0.5,
  bubbleFunc:() => `hsla(${200 + Math.random() * 50}, 1%, 65%, .1)`,
  bubbles:350
});
// console.log(document.querySelector(".header_style"));
</script>

<!-- 波表現 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
<script src="js/wavify-master/wavify.js"></script>
<script src="js/wavify-master/jquery.wavify.js"></script>
<script>
$('#wave').wavify({
  // boxの上部から波の頂点までの長さ
  height: 10,
  bones: 30,
  // 波の高さ
  amplitude: 3,
  // color: "rgb(153, 250, 255)",
  color: "rgb(156, 254, 246)",
  speed: .50
});
</script>

</body>
</html>
