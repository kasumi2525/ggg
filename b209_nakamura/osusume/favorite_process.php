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

// POSTリクエストが送信されたかどうかを確認
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // セッションからユーザー名を取得
    $username = $_SESSION["username"];
    
    // チャンネル名とアクション（追加または削除）を取得
    $channelName = $_POST["channel_name"];
    $action = $_POST["action"];
    
    // お気に入り登録の場合
    if ($action === "add") {
        // データベースにお気に入り登録情報を挿入
        $sql = "INSERT INTO favorites (username, videoid) VALUES ('$username', '$channelName')";
        if ($conn->query($sql) === TRUE) {
            echo "お気に入りに登録しました";
        } else {
            echo "エラー: " . $sql . "<br>" . $conn->error;
        }
    }
    // お気に入り解除の場合
    else if ($action === "remove") {
        // データベースからお気に入り登録情報を削除
        $sql = "DELETE FROM favorites WHERE username='$username' AND videoid='$channelName'";
        if ($conn->query($sql) === TRUE) {
            echo "お気に入り登録を解除しました";
        } else {
            echo "エラー: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    // POSTリクエスト以外のリクエストを無視する
    http_response_code(405); // メソッド不許可のステータスコードを返す
    exit;
}
?>
