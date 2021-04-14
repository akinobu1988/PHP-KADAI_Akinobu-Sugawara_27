-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 4 月 14 日 06:48
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `pacificleague_player`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `pass`) VALUES
(1, 'すがわらあきのぶ', 'akinobu.sugawara@plm-baseball.co.jp', '$2y$10$LF7gLKfGFcJQZAhD09cwXuth/Wditl7A5gjqBpKcnj6z1gOtkyZqa'),
(2, 'メッシ', 'messi@gmail.com', '$2y$10$eLp/5e66oK2w5mZmffmFX.7JkEVsw8/brGbr6nFz3ncSqgi/eo5YO'),
(3, 'ロベカル', 'brazil@yahoo.co,jp', '$2y$10$J1AojdiGm2j6oswsp6V48uWUcJVjMJwXQRt9Ew/Cwl4/P8VP0k3EG'),
(4, 'ロベルトバッジョ', 'italy@gmail.com', '$2y$10$GGiLur9J/K9BJuM4CyqieODyo/3Rb986rEoBoXZyLIgQ1pvGcaCfe'),
(5, '佐藤', 'sato@gmail.com', '$2y$10$KRQnJoaQXoWo2HrlX5rn.OyjBTi1gHgAOQvswKWZHCg0VbvgKNeS2'),
(6, '那須川　天心', 'nasukawa@gmail.com', '$2y$10$FrySSar0yiMRr8bMoO5Ig.dAGrwCSiXb3y80DaefJu6omvRMkjEje'),
(7, '菅原右敦', 'akinobu1988@gmail.com', '$2y$10$VMD..lXbHm2UFd8gim7rUu4eaZyerqvyuQserupAlm6VvR5qw/rBS'),
(8, '菅原右敦', 'akinobu1988@gmail.com', '6jan88'),
(9, '菅原右敦', 'akinobu1988@yahoo.co.jp', '$2y$10$JrzhEN5/C9LF27nAeOTWw.RjwpXBOeLO6i56Yo1vRbxvquSsuTUWq'),
(10, '金本', 'kanemoto@gmail.com', '8888'),
(11, '矢野', 'yano@gmail.com', '$2y$10$.TwulPwceCVtBLv81E5dTuXA9Jz735yJ.QGxqvbd/f1cLQuye46Au'),
(12, '糸井', 'itoi@gmail.com', '$2y$10$Ze60tVNrUBFV9rlb22yhN.VRnupaStNyuPym5nPXCQIhN63rOAbny'),
(13, '佐藤', 'sato@gmail.com', '$2y$10$qhX9XkalMK/.LutTlLgvke8Q7moBzAJYZCNh9SsqpLfmM53Q8LdAW');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;