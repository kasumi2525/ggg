<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_form.php");
    exit();
}
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "b209";

// MySQLへの接続
$conn = new mysqli($servername, $username, $password, $dbname);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" sizes="16x16"  href="../img/favicon-16x16.png">
    <title>進級制作B209</title>
   
</head>

<body>

<img src="../img/aaa.png" width="40%">
    <header class="hed">
        <ul class="ddmenu">
            <li><a href="../home.php">HOME</a></li>
            <li><a href="../setumei.php">説明</a>
            </li>
            <li><a href="../osusume.php">おすすめ動画</a>
            </li>
            <li><a href="../mypage.php">マイページ</a>
            
         </ul>
    </header>
   
</head>
<div class="setumei">
    <h1>キヨ</h1>
    <img src="../img/kiyo.png"width="40%">
    <div class="komaka">
        <p>ニコニコ動画を経て現在YouTubeで活動するゲーム実況者</p>
        <p>実写や実況中は非常に気さくで明るい性格の持ち主<br>

声が大きいのも特徴的で、ある実況では車の急ブレーキの様な叫び声を上げて話題になった</p>
        <p>とにかく自由発言が多く、どんなに短いゲームでもキヨのフリートークで長く楽しむことができる</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/zIdUsj9DnVc?si=SfIJmUtGMrm7kuYQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    
    <button onclick="toggleFavorite(this)" class="button" data-channel=09>お気に入り登録</button>
    <script>
        function toggleFavorite(button) {
    var channelName = button.getAttribute("data-channel");
    if (button.innerText === "お気に入り登録") {
        button.innerText = "お気に入り解除";
        // お気に入り登録の処理をサーバーに送信
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../osusume/favorite_process.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                // サーバーからのレスポンスを処理する（必要に応じて）
                console.log(xhr.responseText);
            }
        };
        xhr.send("channel_name=" + encodeURIComponent(channelName) + "&action=add");
    } else {
        button.innerText = "お気に入り登録";
        // お気に入り解除の処理をサーバーに送信
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../osusumefavorite_process.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                // サーバーからのレスポンスを処理する（必要に応じて）
                console.log(xhr.responseText);
            }
        };
        xhr.send("channel_name=" + encodeURIComponent(channelName) + "&action=remove");
    }
}
    </script>
    </div>
</div>


</body>
</html>