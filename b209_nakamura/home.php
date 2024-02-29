<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="16x16"  href="img/favicon-16x16.png">
    
    <title>進級制作B209</title>
</head>
<body>

<img src="img/aaa.png" width="40%">

    <header class="hed">
        <ul class="ddmenu">
            <li><a href="home.php">HOME</a></li>
            <li><a href="setumei.php">説明</a>
            </li>
            <li><a href="osusume.php">おすすめ動画</a>
            </li>
            <li><a href="mypage.php">マイページ</a>
            
         </ul>
    </header>
    
    <div class="main">
        
        <div class="hello">
        <h1>
            <?php
            if (isset($_SESSION["username"])) {
                echo "<p>ようこそ、" . $_SESSION["username"] . "さん！</p>";
            } 
            ?></div>
        </h1>
        <div class="sindan">
        <h1>あなたに合ったおすすめの実況動画を</h1>
        <p>数多くあるゲーム実況からあなたにおすすめの動画を選抜します。<br>
            新たな動画や実況者に出会えるかも！</p>
        <button onclick="location.href='osusume.php'" class="button">おすすめ動画</button>
    </div>

    <div class="setumei">
        <h1>ゲーム実況とは？</h1>
        <p>ゲーム実況とは、プレイヤーが実況しながらゲームを遊ぶことをいいます。<br>これらを行う人のことを</p>
        <h3>『ゲーム実況者』</h3>
        <p>と呼びます。</p>
        <button onclick="location.href='setumei.php'" class="button">実況者</button>
    </div>

    <div class="osusume">
        <h1>私のおすすめの実況者</h1>
        <p>私がおすすめする実況者はNoelchannelです</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/NKelkj-HozM?si=OcV-JlkIIcN9M8GD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <p>Noelchannelは中高の同級生５人の実況者グループです<br>
            2021年3月31日に活動を終了し、現在は個別で配信をしています。<br>
            だらだらと日常的な雰囲気が好きな人にはおすすめの実況者です。
        </p>
    </div>
    </div>
</body>
</html>
