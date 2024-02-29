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

    // 入力されたユーザー情報を検証
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // ユーザーが存在する場合
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            // パスワードが一致する場合
            $_SESSION["username"] = $username;
            header("Location: home.php"); // ログイン後のページにリダイレクト
            exit();
        } else {
            // パスワードが間違っている場合
            $error = "パスワードが間違っています。";
            echo $error;
            exit();
        }
    } else {
        // ユーザーが存在しない場合
        $error = "ユーザー名が存在しません。";
        echo $error;
        exit();
    }
  
    
  }
  // データベース接続を閉じる
    $conn->close();
?>