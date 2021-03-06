-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 4 月 14 日 06:46
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `pacificleague_player`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(11) NOT NULL,
  `選手名` varchar(15) NOT NULL,
  `チーム名` varchar(15) NOT NULL,
  `ポジション` varchar(10) NOT NULL,
  `誕生日` date NOT NULL,
  `年齢` int(11) NOT NULL,
  `身長` int(11) NOT NULL,
  `体重` int(11) NOT NULL,
  `出身地` varchar(10) NOT NULL,
  `投打` varchar(10) NOT NULL,
  `血液型` varchar(10) NOT NULL,
  `ドラフト年度` int(11) NOT NULL,
  `経歴` varchar(100) NOT NULL,
  `獲得タイトル` text NOT NULL,
  `作業１` varchar(10) NOT NULL,
  `作業２` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `選手名`, `チーム名`, `ポジション`, `誕生日`, `年齢`, `身長`, `体重`, `出身地`, `投打`, `血液型`, `ドラフト年度`, `経歴`, `獲得タイトル`, `作業１`, `作業２`) VALUES
(7, '吉田選手', '北海道日本ハムファイターズ', '捕手', '2021-04-15', 22, 164, 62, '秋田県', '右投げ/左打ち', 'B型', 2004, 'aa', 'bbb', '', ''),
(9, '浅村 栄斗', '東北楽天イーグルス', '内野手', '1990-11-12', 30, 182, 90, '大阪府', '右投げ/右打ち', 'O型', 2008, '大阪桐蔭高～09年埼玉西武D③（～18年）～19年楽天', '◆最多本塁打1回（2020） ◆ベストナイン6回（［一塁手］2013・［二塁手］2016・2017・2018・2019・2020） ◆ゴールデングラブ賞2回（［一塁手］2013・［二塁手］2019） ◆最多打点2回（2013・2018）', '', ''),
(10, '田中 将大', '東北楽天イーグルス', '投手', '1988-11-01', 32, 188, 97, '兵庫県', '右投げ/右打ち', 'A型', 2010, '駒大苫小牧高～07年楽天イーグルスD①（～13年）～14年ヤンキース（～20年）～21年楽天イーグルス', '◆最優秀選手（2013） ◆コミッショナー特別表彰（2013） ◆正力松太郎賞（特別賞）（2013） ◆ベストナイン2回（［投手］2011・2013） ◆ゴールデングラブ賞3回（［投手］2011・2012・2013） ◆最多勝利投手2回（2011・2013） ◆最優秀防御率投手2回（2011・2013） ◆勝率第一位投手2回（2011・2013） ◆沢村栄治賞2回（2011・2013） ◆最多三振奪取投手（2012） ◆最優秀新人（2007）', '', ''),
(11, '則本 昂大', '東北楽天イーグルス', '投手', '1990-12-17', 30, 178, 82, '滋賀県', '右投げ/左打ち', 'A型', 2012, '八幡商業高～三重中京大～13年楽天D②', '◆最多三振奪取投手5回（2014・2015・2016・2017・2018） ◆最優秀新人（2013）', '', ''),
(12, '早川 隆久', '東北楽天イーグルス', '投手', '1998-07-06', 22, 180, 76, '千葉県', '左投げ/左打ち', 'B型', 2020, '木更津総合高～早稲田大～21年楽天D①', '', '', ''),
(13, '黒川 史陽', '東北楽天イーグルス', '内野手', '2001-04-17', 19, 182, 86, '奈良県', '右投げ/左打ち', 'B型', 2019, '智辯和歌山高～20年楽天D②', '', '', ''),
(14, '源田 壮亮', '埼玉西武ライオンズ', '内野手', '1993-02-16', 28, 179, 75, '大分県', '右投げ/左打ち', 'O型', 2016, '大分商業高-愛知学院大-トヨタ自動車-埼玉西武(3位 \'17～)', '(ベストナイン)\'18　(ゴールデングラブ賞)\'18　(最優秀新人)\'17　(スピードアップ賞)\'17　(オールスターゲーム第2戦 最優秀選手賞)\'18', '', ''),
(15, '松坂 大輔', '埼玉西武ライオンズ', '投手', '1980-09-13', 39, 182, 92, '東京都', '右投げ/右打ち', 'O型', 2000, '横浜高-西武(1位 \'99～06)-レッドソックス(\'07～12)-メッツ(\'13～14)-ソフトバンク(\'15～17)-中日(\'18～19)-埼玉西武(\'20～)', '(新人王)\'99、(月間MVP)\'99【7月】、\'02【4月】、\'03【5月】、(最多勝)\'99、\'00、\'01、(最多奪三振)\'00、\'01、\'03、\'05、(最優秀防御率)\'03、\'04、(沢村賞)\'01、(ゴールデングラブ賞)\'99～\'01、\'03～\'06、(ベストナイン)\'99～\'01、(オールスター最優秀選手)\'04【第1戦】、(オールスター優秀選手)\'99【第1戦】、(会長特別賞)\'00、(カムバック賞)\'18', '', ''),
(16, '森 友哉', '埼玉西武ライオンズ', '捕手', '1995-08-08', 25, 170, 85, '大阪府', '右投げ/左打ち', 'A型', 2013, '大阪桐蔭高-埼玉西武(1位 \'14～)', '(ベストナイン)\'18、(最優秀バッテリー賞)\'18、\'19、(スカパー！サヨナラ賞)\'16【8月】、\'18【3・4月】、(オールスターゲーム 第1戦 最優秀選手賞)\'18、\'19、(月間MVP)\'19【8月】、(首位打者)\'19 、(最優秀選手)\'19、(オールスター敢闘選手)\'15【第2戦】、(スカパー!ドラマティック・サヨナラ賞 年間大賞)\'18', '', ''),
(17, '山川 穂高', '埼玉西武ライオンズ', '内野手', '1991-11-23', 29, 176, 99, '沖縄県', '右投げ/右打ち', 'A型', 2013, '中部商高-富士大-埼玉西武(2位 \'14～)', '(最優秀選手) \'18、(ベストナイン) \'18 \'19、(最多本塁打) \'18、\'19、(月間MVP)\'17【8月】、【9･10月】、\'18【3･4月】、【9･10月】、\'19、【3・4月】、(オールスター敢闘選手)\'19【第1戦】', '', ''),
(18, '内海 哲也', '埼玉西武ライオンズ', '投手', '1982-04-29', 38, 186, 93, '京都ふ', '左投げ/左打ち', 'A型', 2003, '敦賀気比高-東京ガス-巨人(自由枠 \'04～18)-埼玉西武(\'19～)', '(最多奪三振)\'07、(最多勝利)\'11、\'12、(ベストナイン)\'12、(最優秀投手)\'12、(月間MVP)\'09【9月】、\'11【5月】、(交流戦最優秀選手)\'12、(最優秀バッテリー賞)\'12、(日本シリーズ最高殊勲選手)\'12、(日本シリーズ優秀選手)\'13、(ゴールデンスピリット賞)\'16', '', ''),
(19, '石川 歩', '千葉ロッテマリーンズ', '投手', '1988-04-11', 32, 186, 80, '富山県', '右投げ/右打ち', 'A型', 2013, '滑川高-中部大-東京ガス-千葉ロッテ(ドラフト1 \'14～)', '(最優秀防御率)\'16 (最優秀新人)\'14 (月間MVP)\'15年9月 (最優秀バッテリー賞/捕手:田村龍弘)\'16 (日本生命賞)\'18 (月間MVP)\'20年8月', '', ''),
(20, '井上 晴哉', '千葉ロッテマリーンズ', '内野手', '1989-07-03', 31, 180, 99, '広島県', '右投げ/右打ち', 'A型', 2013, '崇徳高-中央大-日本生命-千葉ロッテ(ドラフト5 \'14～)', '(月間MVP)\'18年7月 (スカパー！サヨナラ賞)\'20年10・11月', '', ''),
(21, '佐々木 朗希', '千葉ロッテマリーンズ', '投手', '2001-11-03', 19, 190, 85, '岩手県', '右投げ/右打ち', 'O型', 2019, '大船渡高-千葉ロッテ(ドラフト1 \'20～)', '', '', ''),
(22, '田村 龍弘', '千葉ロッテマリーンズ', '捕手', '1994-05-13', 26, 172, 81, '大阪府', '右投げ/右打ち', 'A型', 2012, '光星学院高(甲)-千葉ロッテ(ドラフト3 \'13～)', '(ベストナイン)\'16 (月間MVP)\'16年6月 (最優秀バッテリー賞/投手:石川歩)\'16 (スカパー！サヨナラ賞)\'14年8月', '', ''),
(23, '鳥谷 敬', '千葉ロッテマリーンズ', '内野手', '1981-06-26', 39, 180, 79, '東京都', '右投げ/左打ち', 'B型', 2003, '聖望学園高(甲)-早稲田大-阪神(\'04～\'19)-千葉ロッテ(\'20～)', '(ベストナイン)\'08,\'10,\'11,\'13～\'15 (ゴールデングラブ賞)\'11～\'15,\'17 (最高出塁)\'11 (月間MVP)\'10年8月 (スピードアップ賞)\'10', '', ''),
(24, '菅原　右敦', '埼玉西武ライオンズ', '内野手', '2021-04-06', 18, 165, 64, '宮城県', '右投げ/左打ち', 'O型', 2003, '', '', '', ''),
(25, '山本 由伸', 'オリックスバファローズ', '投手', '1998-08-17', 22, 178, 80, '岡山県', '右投げ/右打ち', 'AB型', 2016, '都城高－オリックス（ドラフト4・17～）', '最優秀防御率（19）', '', ''),
(26, '吉田 正尚', 'オリックスバファローズ', '外野手', '1993-07-15', 27, 173, 85, '福井県', '右投げ/左打ち', 'B型', 2015, '敦賀気比高－青山学院大－オリックス（ドラフト1・16～）', '', '', ''),
(27, '紅林 弘太郎', 'オリックスバファローズ', '内野手', '2002-02-07', 19, 186, 94, '静岡県', '右投げ/右打ち', 'B型', 2019, '駿河総合高－オリックス（ドラフト2・20～）', '', '', ''),
(28, '安達 了一', 'オリックスバファローズ', '内野手', '1988-01-07', 33, 179, 80, '群馬県', '右投げ/右打ち', 'O型', 2011, '榛名高－上武大－東芝－オリックス（ドラフト1・12～）', '', '', ''),
(29, '菅原　右敦', '福岡ソフトバンクホークス', '内野手', '2021-03-30', 19, 162, 63, '宮城県', '右投げ/両打ち', 'B型', 2019, 'test', 'test', '', ''),
(30, '甲斐 拓也', '福岡ソフトバンクホークス', '捕手', '1992-11-05', 28, 170, 85, '大分県', '右投げ/右打ち', 'O型', 2010, '楊志館高 - ソフトバンク（育成選手ドラフト6巡目・11～）', '（ベストナイン）17、20　（ゴールデングラブ）17、18、19、20', '', ''),
(31, '千賀 滉大', '福岡ソフトバンクホークス', '投手', '1993-01-30', 28, 187, 89, '愛知県', '右投げ/左打ち', 'A型', 2010, '蒲郡高 - ソフトバンク（育成選手ドラフト4巡目・11～）', '（ベストナイン）19、20　（ゴールデングラブ）19、20　（月間MVP）18・8月、19・5月、6月　（最高勝率）17　（最多勝利）20　（防御率）20　（奪三振）19、20　', '', ''),
(32, '柳田 悠岐', '福岡ソフトバンクホークス', '外野手', '1988-10-09', 32, 188, 87, '広島県', '右投げ/左打ち', 'AB型', 2010, '広島商高 - 広島経済大 - ソフトバンク（ドラフト2巡目・11～）', '（MVP）15、20　（ベストナイン）14、15、17、18、20　（ゴールデングラブ）14、15、17、18、20　（月間MVP）14・5月、15・8月、15・9月、17・6月、18・5月、20・6、7月、10、11月　（首位打者）15、18　（安打）20　（最高出塁率）15、16、17、18　（連盟特別表彰 特別賞）15', '', ''),
(33, '森 唯斗', '福岡ソフトバンクホークス', '投手', '1992-01-08', 29, 176, 96, '徳島県', '右投げ/右打ち', 'A型', 2013, '海部高～三菱自動車倉敷オーシャンズ～ソフトバンク（ドラフト2巡目・14～）', '（最多セーブ）18\r\n\r\n', '', ''),
(35, '今井 達也', '埼玉西武ライオンズ', '投手', '1998-05-09', 22, 180, 70, '栃木県', '右投げ/右打ち', 'A型', 2016, '作新学院高-埼玉西武(1位 \'17～)', '', '', ''),
(36, '菅原　右敦', '千葉ロッテマリーンズ', '捕手', '2021-03-10', 20, 163, 0, '宮城県', '左投げ/右打ち', 'O型', 2003, '東海大相模高-読売（ドラフト1位・09～16）-北海道日本ハム（17～） 2019シーズンより背番号を【5】へ変更', '', '', ''),
(37, '菅原　右敦', '千葉ロッテマリーンズ', '捕手', '2021-04-14', 20, 161, 62, '岩手県', '右投げ/両打ち', 'B型', 2003, '東海大相模高-読売（ドラフト1位・09～16）-北海道日本ハム（17～） 2019シーズンより背番号を【5】へ変更', '', '', '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;