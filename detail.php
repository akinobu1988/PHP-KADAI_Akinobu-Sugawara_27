<?php
//１．PHP
//select.phpのPHP部分コードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正、GETの内容をSELECTする！

require_once("funcs.php");
$id = $_GET['id'];

//1.  DB接続します
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=pacificleague_player;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=' . $id . ';');
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . print_r($error, true));
}else{
    $result = $stmt->fetch();
}
?>

<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>選手名鑑</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        .navbar-brand {
            font-size: 30px;
            font-family: bold;
        }

        .container-fluid {
            background-color: black;
        }

        .register {
            margin-top: 0;
            margin-bottom: 30px;
            margin-left: 15px;
        }

        .team, .birth, .age, .height, .weight, .pref, .carrer, .register, .player, .postion {
            margin-bottom: 15px;
            margin-left: 15px;
        }

        .type, .draft, .title {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .register {
            margin-top: 10px;
        }

        .prefSelect {
            background-color: black; 
            padding-left: 15px;
            padding-top: 15px; 
            padding-bottom: 15px; 
        }

        .teamSelect {
            background-color: black; 
            padding-left: 15px;
            color: white; 
            padding-top: 15px; 
            padding-bottom: 15px; 
        }

        .playerSearch {
            height: 30px;
            width: 300px;
            margin-top: 15px; 
            margin-bottom: 15px; 
            margin-left: 15px;
        }

        .freeSearch {
            background-color: black; 
            padding-left: 15px;
            color: white; 
            padding-top: 15px; 
            padding-bottom: 15px; 
        }

        .submit {
            width: 30px;
            height: 30px;
        }

    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h1 class="navbar-brand" >〜パ・リーグの全てがここにある〜 PLAYER SEARCH</h1>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="update.php">
        <div class="jumbotron">
            <u><h3 class="register">登録フォーム</h3></u>
            <label class="player">選手名：<input type="text" name="name" value="<?= $result['name'] ?>"></label>
            <br>
            <label class="team">チーム名：
              <select name="team">
                <option value="" selected>チーム名</option>
                <option value="北海道日本ハムファイターズ">北海道日本ハムファイターズ</option>
                <option value="東北楽天イーグルス">東北楽天イーグルス</option>
                <option value="埼玉西武ライオンズ">埼玉西武ライオンズ</option>
                <option value="千葉ロッテマリーンズ">千葉ロッテマリーンズ</option>
                <option value="オリックスバファローズ">オリックスバファローズ</option>
                <option value="福岡ソフトバンクホークス">福岡ソフトバンクホークス</option>
              </select>
            </label>
            <br>
            <label class="postion">ポジション：
              <select name="position">
                <option value="" selected>ポジション</option>
                <option value="投手">投手</option>
                <option value="捕手">捕手</option>
                <option value="内野手">内野手</option>
                <option value="外野手">外野手</option>
              </select>
            </label>
            <br>
            <label class="birth">誕生日：
              <input type="date" name="birth">
            </label>
            <br>
            <label class="age">年齢：
              <select name="age">
                  <option selected>年齢</option>
                  <option value="18歳">18歳</option>
                  <option value="19歳">19歳</option>
                  <option value="20歳">20歳</option>
                  <option value="21歳">21歳</option>
                  <option value="22歳">22歳</option>
                  <option value="23歳">23歳</option>
                  <option value="24歳">24歳</option>
                  <option value="25歳">25歳</option>
                  <option value="26歳">26歳</option>
                  <option value="27歳">27歳</option>
                  <option value="28歳">28歳</option>
                  <option value="29歳">29歳</option>
                  <option value="30歳">30歳</option>
                  <option value="31歳">31歳</option>
                  <option value="32歳">32歳</option>
                  <option value="33歳">33歳</option>
                  <option value="34歳">34歳</option>
                  <option value="35歳">35歳</option>
                  <option value="36歳">36歳</option>
                  <option value="37歳">37歳</option>
                  <option value="38歳">38歳</option>
                  <option value="39歳">39歳</option>
              </select>
            </label>
            <br>
            <label class="height">身長：
              <select name="height">
                <option value="" selected>身長</option>
                <option value="160cm">160cm</option>
                <option value="161cm">161cm</option>
                <option value="162cm">162cm</option>
                <option value="163cm">163cm</option>
                <option value="164cm">164cm</option>
                <option value="165cm">165cm</option>
                <option value="166cm">166cm</option>
                <option value="167cm">167cm</option>
                <option value="168cm">168cm</option>
                <option value="169cm">169cm</option>
                <option value="170cm">170cm</option>
                <option value="171cm">171cm</option>
                <option value="172cm">172cm</option>
                <option value="173cm">173cm</option>
                <option value="174cm">174cm</option>
                <option value="175cm">175cm</option>
                <option value="176cm">176cm</option>
                <option value="177cm">177cm</option>
                <option value="178cm">178cm</option>
                <option value="179cm">179cm</option>
                <option value="180cm">180cm</option>
                <option value="181cm">181cm</option>
                <option value="182cm">182cm</option>
                <option value="183cm">183cm</option>
                <option value="184cm">184cm</option>
                <option value="185cm">185cm</option>
                <option value="186cm">186cm</option>
                <option value="187cm">187cm</option>
                <option value="188cm">188cm</option>
                <option value="189cm">189cm</option>
                <option value="190cm">190cm</option>
                <option value="191cm">191cm</option>
                <option value="192cm">192cm</option>
                <option value="193cm">193cm</option>
                <option value="194cm">194cm</option>
                <option value="195cm">195cm</option>
                <option value="196cm">196cm</option>
                <option value="197cm">197cm</option>
                <option value="198cm">198cm</option>
                <option value="199cm">199cm</option>
            </select>
            </label>
            <br>
            <label class="weight">体重：
            <select name="weight">
                <option value="" selected>体重</option>
                <option value="60kg">60kg</option>
                <option value="61kg">61kg</option>
                <option value="62kg">62kg</option>
                <option value="63kg">63kg</option>
                <option value="64kg">64kg</option>
                <option value="65kg">65kg</option>
                <option value="66kg">66kg</option>
                <option value="67kg">67kg</option>
                <option value="68kg">68kg</option>
                <option value="69kg">69kg</option>
                <option value="70kg">70kg</option>
                <option value="71kg">71kg</option>
                <option value="72kg">72kg</option>
                <option value="73kg">73kg</option>
                <option value="74kg">74kg</option>
                <option value="75kg">75kg</option>
                <option value="76kg">76kg</option>
                <option value="77kg">77kg</option>
                <option value="78kg">78kg</option>
                <option value="79kg">79kg</option>
                <option value="80kg">80kg</option>
                <option value="81kg">81kg</option>
                <option value="82kg">82kg</option>
                <option value="83kg">83kg</option>
                <option value="84kg">84kg</option>
                <option value="85kg">85kg</option>
                <option value="86kg">86kg</option>
                <option value="87kg">87kg</option>
                <option value="88kg">88kg</option>
                <option value="89kg">89kg</option>
                <option value="90kg">90kg</option>
                <option value="91kg">91kg</option>
                <option value="92kg">92kg</option>
                <option value="93kg">93kg</option>
                <option value="94kg">94kg</option>
                <option value="95kg">95kg</option>
                <option value="96kg">96kg</option>
                <option value="97kg">97kg</option>
                <option value="98kg">98kg</option>
                <option value="99kg">99kg</option>
            </select>
            </label>
            <br>
            <label class="pref">出身地：
            <select name="pref">
                <option value="" selected>都道府県</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="茨城県">茨城県</option>
                <option value="栃木県">栃木県</option>
                <option value="群馬県">群馬県</option>
                <option value="埼玉県">埼玉県</option>
                <option value="千葉県">千葉県</option>
                <option value="東京都">東京都</option>
                <option value="神奈川県">神奈川県</option>
                <option value="新潟県">新潟県</option>
                <option value="富山県">富山県</option>
                <option value="石川県">石川県</option>
                <option value="福井県">福井県</option>
                <option value="山梨県">山梨県</option>
                <option value="長野県">長野県</option>
                <option value="岐阜県">岐阜県</option>
                <option value="静岡県">静岡県</option>
                <option value="愛知県">愛知県</option>
                <option value="三重県">三重県</option>
                <option value="滋賀県">滋賀県</option>
                <option value="京都ふ">京都府</option>
                <option value="大阪府">大阪府</option>
                <option value="兵庫県">兵庫県</option>
                <option value="奈良県">奈良県</option>
                <option value="和歌山県">和歌山県</option>
                <option value="鳥取県">鳥取県</option>
                <option value="島根県">島根県</option>
                <option value="岡山県">岡山県</option>
                <option value="広島県">広島県</option>
                <option value="山口県">山口県</option>
                <option value="徳島県">徳島県</option>
                <option value="香川県">香川県</option>
                <option value="愛媛県">愛媛県</option>
                <option value="高知県">高知県</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
                <option value="熊本県">熊本県</option>
                <option value="大分県">大分県</option>
                <option value="宮崎県">宮崎県</option>
                <option value="鹿児島県">鹿児島県</option>
                <option value="沖縄県">沖縄県</option>
            </select>
            <br>
            <label class="type">投打：
            <select name="type">
                <option value="" selected>投打</option>
                <option value="右投げ/右打ち">右投げ/右打ち</option>
                <option value="右投げ/左打ち">右投げ/左打ち</option>
                <option value="右投げ/両打ち">右投げ/両打ち</option>
                <option value="左投げ/右打ち">左投げ/右打ち</option>
                <option value="左投げ/左打ち">左投げ/左打ち</option>
                <option value="左投げ/両打ち">左投げ/両打ち</option>
            </select>
            </label>
            <br>
            <label class="blood">血液型：
            <select name="blood">
                <option value="" selected>血液型</option>
                <option value="A型">A型</option>
                <option value="B型">B型</option>
                <option value="O型">O型</option>
                <option value="AB型">AB型</option>
            </select>
            </label>
            <br>
            <label class="draft">ドラフト年度：
            <select name="draft">
                <option value="2000年">2000年</option>
                <option value="2001年">2001年</option>
                <option value="2002年">2002年</option>
                <option value="2003年">2003年</option>
                <option value="2004年">2004年</option>
                <option value="2005年">2005年</option>
                <option value="2006年">2006年</option>
                <option value="2007年">2007年</option>
                <option value="2008年">2008年</option>
                <option value="2009年">2009年</option>
                <option value="2010年">2010年</option>
                <option value="2011年">2011年</option>
                <option value="2012年">2012年</option>
                <option value="2013年">2013年</option>
                <option value="2014年">2014年</option>
                <option value="2015年">2015年</option>
                <option value="2016年">2016年</option>
                <option value="2017年">2017年</option>
                <option value="2018年">2018年</option>
                <option value="2019年">2019年</option>
                <option value="2020年">2020年</option>
            </select>
            </label>
            <br>
            <label class="career">経歴<input type="text" name="carrer" value="<?= $result['carrer'] ?>"></label>
            <br>
            <label class="title">獲得タイトル <textarea name="title" cols="30" rows="3">value="<?= $result['title'] ?>"</textarea></label>
            <br>
            <!-- インプットを追加 -->
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
            <input type="submit" value="更新" class="register">
        </div>
    </form>
    <!-- Main[End] -->
</body>

</html>
