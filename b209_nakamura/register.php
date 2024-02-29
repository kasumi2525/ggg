<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからの入力を取得
    $username = $_POST["username"];
    $password = $_POST["password"];

    // データベース接続情報
    $host = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "b209";

    // データベースに接続
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // 接続エラーを確認
    if ($conn->connect_error) {
        die("接続に失敗しました：" . $conn->connect_error);
    }

    // ユーザーがすでに存在するか確認
    $checkUserQuery = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($checkUserQuery);
    
    if ($result->num_rows > 0) {
        // ユーザーがすでに存在する場合
        echo "ユーザー名はすでに使用されています。別のユーザー名を選択してください。";
    } else {
        // ユーザーが存在しない場合は新規登録
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertUserQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        
        if ($conn->query($insertUserQuery) === TRUE) {
            // 登録が成功した場合、別のページにリダイレクト
            header("Location: home.php");
            exit();
        } else {
            echo "エラー：" . $insertUserQuery . "<br>" . $conn->error;
        }
    }

    // データベース接続を閉じる
    $conn->close();
}
?>

