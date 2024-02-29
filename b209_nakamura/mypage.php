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
<html>
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
        <li><a href="setumei.php">説明</a></li>
        <li><a href="osusume.php">おすすめ動画</a></li>
        <li><a href="mypage.php">マイページ</a></li>
    </ul>
</header>
<div class="main">
    <?php
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        echo "<h1>" . $username . "さんのお気に入り</h1>";
    }
    ?>
    <div class="okiniiri">
    
    <?php
    $sql = "SELECT DISTINCT y.name, y.img, y.page
            FROM favorites f
            JOIN youtubers y ON f.videoid = y.id
            WHERE f.username = '$username'";
    $result = $conn->query($sql);

    // 結果を表示
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='youtuber'>";
            echo "<h2>" . $row["name"] . "</h2>";
            echo "<img src='" . $row["img"] . "' width='40%'>";
            echo "<button onclick=\"location.href='" . $row["page"] . "'\" class=\"button\">詳しく</button>";
            echo "</div>";
        }
    } else {
        echo "<div class='youtuber'>";
        echo "<h2>まだお気に入り登録をしていないようですね</h2>";
        echo "<h2>診断をしてお気に入りの実況者を探してみましょう</h2>";
        echo "<button onclick=\"location.href='osusume.php'\" class=\"button\">おすすめ動画</button>";
        echo "</div>";
    }
    ?>
</div>
<button id="logoutButton">ログアウト</button>
</div>
<?php
// ログアウトボタンがクリックされた場合のみセッション情報を削除
if(isset($_POST['logout'])){
    $_SESSION = array();
    session_destroy();
    header("Location: login_form.php"); // ログアウト後にログインページにリダイレクト
    exit;
}
?>
<script>
    document.getElementById("logoutButton").addEventListener("click", function() {
        // ログアウト処理を行う
        document.getElementById("logoutForm").submit();
    });
</script>
<form id="logoutForm" method="post" style="display: none;">
    <input type="hidden" name="logout" value="true">
</form>
</body>

</html>
