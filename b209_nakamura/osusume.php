<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_form.php");
    exit();
}
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
            <li><a href="setumei.php">説明</a>
            </li>
            <li><a href="osusume.php">おすすめ動画</a>
            </li>
            <li><a href="mypage.php">マイページ</a>
            
         </ul>
    </header>
<?php
// 質問ごとの質問文と次の質問への分岐を定義
$questions = array(
    1 => array(
        'question' => '大人数で遊ぶより、一人でいる方が楽だ',
        'options' => array(
            'はい' => 2,
            'いいえ' =>9
        )
    ),
    2 => array(
        'question' => 'よくゲームをする(ゲーム動画を見る)方だ',
        'options' => array(
            'はい' => 3,
            'いいえ' => 8
        )
    ),
    3 => array(
        'question' => 'よく生放送を見る',
        'options' => array(
            'はい' => 4,
            'いいえ' => 7
        )
    ),
    4 => array(
        'question' => '好きなゲームの種類は',
        'options' => array(
            'シューティングゲーム' => 5,
            'ホラゲー' => 'osusume/osusume04.php',
            'パズルゲーム、音楽ゲーム' => 'osusume/osusume01.php'

        )
    ),
    5 => array(
        'question' => '動画を見るうえで重視することは',
        'options' => array(
            'ゲームスキル' => 'osusume/osusume02.php',
            'トークスキル' => 'osusume/osusume03.php'
        )
    ),
    
    7 => array(
        'question' => '無編集の動画がいい',
        'options' => array(
            'はい' => 'osusume/osusume06.php',
            'いいえ' =>'osusume/osusume07.php' 
        )
    ),
    8 => array(
        'question' => 'お笑い芸人とアーティストどっちが好き',
        'options' => array(
            'お笑い芸人' => 'osusume/osusume08.php',
            'アーティスト' =>'osusume/osusume09.php' 
        )
    ),
    9 => array(
        'question' => '企画力のある動画が好きだ',
        'options' => array(
            'はい' => 'osusume/osusume10.php',
            'いいえ' =>'osusume/osusume11.php' 
        )
    ),
    
    
);

// ユーザーの現在の質問番号を取得
$current_question = isset($_POST['question']) ? (int)$_POST['question'] : 1;

// フォームが送信された場合
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ユーザーの回答を取得
    $answer = $_POST["answer"];
    
    // ユーザーの回答に対応する次の質問番号または結果ページを取得
    $next_question_or_result = $questions[$current_question]['options'][$answer];
    
     // 次の質問が結果の場合は、結果を表示
     if (is_numeric($next_question_or_result)) {
        $current_question = $next_question_or_result;
    } else {
        // ページを直接指定してリダイレクト
        header("Location: $next_question_or_result");
        exit; // リダイレクト後にスクリプトの実行を終了する
    }
}

// 質問を表示
echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
echo '<input type="hidden" name="question" value="' . $current_question . '">';
echo '<h3>' . $questions[$current_question]['question'] . '</h3>';
foreach ($questions[$current_question]['options'] as $option => $next_question) {
    echo '<button type="submit" name="answer" value="' . $option . '">' . $option . '</button>';
}
echo '</form>';

?>


</body>
</html>
