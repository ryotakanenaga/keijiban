<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <mata charset="utf-8">
        <title>掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php  
        mb_internal_encoding("utf8");

        $pdo= new PDO("mysql:dbname=lesson01;host=localhost;","root","");
        $stmt = $pdo->query("select * from 4each_keijiban");

    ?>
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="header-list">
                <ul>
                    <li>トップ</li>
                    <li>プロフィール</li>
                    <li>4eachについて</li>
                    <li>登録フォーム</li>
                    <li>問い合わせ</li>
                    <li>その他</li>
                </ul>
            </div>
        </header>
        <main>
            <div class="left">
                <h1>プログラミングに役立つ掲示板</h1>
                <form method="post" action="insert.php">
                    <h2>入力フォーム</h2>
                    <div class="komoku">
                        <label>ハンドルネーム</label>
                        <br>
                        <input type="text" class="text" size="40" name="handlename">
                    </div>
                    <div class="komoku">
                        <label>タイトル</label>
                        <br>
                        <input type="text" class="text" size="40" name="title">
                    </div>
                    <div class="komoku">
                        <label>コメント</label>
                        <br>
                        <textarea cols="65" rows="7" name="comments"></textarea>
                    </div>
                    <div>
                        <input type="submit" class="submit" value="送信する">
                    </div>
                </form>
                <?php 
                    while($row = $stmt->fetch()){
                    echo "<div class='toukou'>";
                    echo "<h2>".$row['title']."</h2>";
                    echo "<p>".$row['comments']."</p>";
                    echo "<p class='toukou_orner'>posted by ".$row['handlename']."</p>";
                    echo "</div>";
                    }
                ?>
            </div>
            <div class="right">
                <div class="right-list">
                    <h3>人気の記事</h3>
                    <ul>
                        <li>PHPおすすめ本</li>
                        <li>PHP MyAdminの使い方</li>
                        <li>今人気のエディタ Top5</li>
                        <li>HTMLの基礎</li>
                    </ul>
                </div>
                <div class="right-list">
                    <h3>オススメリンク</h3>
                    <ul>
                        <li>インターノウス株式会社</li>
                        <li>XAMPPのダウンロード</li>
                        <li>Eclipseのダウンロード</li>
                        <li>Bracketsのダウンロード</li>
                    </ul>
                </div>
                <div class="right-list">
                    <h3>カテゴリ</h3>
                    <ul>
                        <li>HTML</li>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>JavaScript</li>
                    </ul>
                </div>
            </div>
        </main>
        <footer>
            <p>copyright © internous | 4each blog the which provides A to Z about programming.</p>
        </footer>
    </body>
</html>