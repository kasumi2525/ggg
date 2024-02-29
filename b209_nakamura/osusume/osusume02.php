<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_form.php");
    exit();
}
// データベースに接続
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "b209";
$conn = new mysqli($servername, $username, $password, $dbname);

// ユーザーがお気に入り登録している実況者を取得
$username = $_SESSION["username"];
$sql = "SELECT videoid FROM favorites WHERE username='$username'";
$result = $conn->query($sql);
$favorites = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $favorites[] = $row["videoid"];
    }
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


    <div class="main">
    <h1>あなたにおすすめの実況者は</h1>

    <div class="channel">
    <h2>SHAKAch</h2>
    <img src="../img/shaka.png"width="40%">
    <button onclick="location.href='../games/shakach.php'" class="button">詳しく</button>
    <button onclick="toggleFavorite(this)" class="button" data-channel=03>お気に入り登録</button>
    <script>
         function toggleFavorite(button, channelName) {
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
    <h2>Selly</h2>
    <img src="../img/selly.png"width="40%">
    <button onclick="location.href='../games/selly.php'" class="button">詳しく</button>
    <button onclick="toggleFavorite(this)" class="button" data-channel=04>お気に入り登録</button>
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
