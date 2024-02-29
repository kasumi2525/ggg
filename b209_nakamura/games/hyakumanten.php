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
        <h1>壱百満天原サロメ</h1>
        <img src="../img/sarome.png"width="40%">
            <div class="komaka">
                <p>「 にじさんじ 」に所属するバーチャルライバー</p>
                <p>お嬢様のような縦ロールや豪奢な出で立ち、お嬢様みたいな口調ではありますが「一般女性」であり、色々生まれつき</p>
                <p>初配信にて個人情報を公開すると称し住民票、履歴書、マイナンバーカード、中身（2・3年前の胃カメラの写真）を晒す</p>
                <p>「本当のお嬢様に憧れる一般家庭育ちの一般女性」</p>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/AniQdstq4KM?si=fpDaKREXhyOuvqUN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <button onclick="toggleFavorite(this)" class="button" data-channel=07>お気に入り登録</button>
              
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
        xhr.open("POST", "favorite_process.php", true);
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