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
    <link rel="stylesheet" href="../css/osusume.css">
    <link rel="icon" type="image/png" sizes="16x16"  href="../img/favicon-16x16.png">
    <title>進級制作B209</title>
   
</head>

<body>

<img src="../img/aaa.png" width="40%">    <header class="hed">
        <ul class="ddmenu">
            <li><a href="../home.php">HOME</a></li>
            <li><a href="../setumei.php">説明</a>
            </li>
            <li><a href="../osusume.php">おすすめ動画</a>
            </li>
            <li><a href="../mypage.php">マイページ</a>
            
         </ul>
    </header>
    <div class="main">
    <h1>あなたにおすすめの実況者は</h1>
    <div class="channel">
    <h2>HIKAKIN</h2>
    <img src="../img/hikakin.jpg"width="73%">
    <button onclick="location.href='../games/hikakin.php'" class="button">詳しく</button>
    <button onclick="toggleFavorite(this)" class="button" data-channel=11>お気に入り登録</button>
    <script>
        function toggleFavorite(button) {
    var channelName = button.getAttribute("data-channel");
    if (button.innerText === "お気に入り登録") {
        button.innerText = "お気に入り解除";
        // お気に入り登録の処理をサーバーに送信
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "favorite_process.php", true);
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
    <div class="channel">
    <h2>赤髮のとも</h2>
    <img src="../img/akagaminotomo.jpg"width="40%">
    <button onclick="location.href='../games/akagami.php'" class="button">詳しく</button>
    <button onclick="toggleFavorite(this)" class="button" data-channel=12>お気に入り登録</button>
    <script>
        function toggleFavorite(button) {
    var channelName = button.getAttribute("data-channel");
    if (button.innerText === "お気に入り登録") {
        button.innerText = "お気に入り解除";
        // お気に入り登録の処理をサーバーに送信
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "favorite_process.php", true);
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
