<?php

class UtilNews
{
	public static function registerNews($news)
	{
		require_once "../classes/r.class.php";

		R::setup("mysql:host=localhost;dbname=cantina", "root", "");

		$existingNews = R::findOne("news", "email = ?", [$news->title]);


		if (!$existingNews) {
			$newsDB = R::dispense("news");
			$newsDB->title = $news->title;
			$newsDB->content = $news->content;

			if (session_status() !== PHP_SESSION_ACTIVE) {
				session_start();
			}
			$newsDB->author = $_SESSION["name"];

			date_default_timezone_set('America/Sao_Paulo');
			$newsDB->date = date('d/m/Y H:i:s');

			R::store($newsDB);
			R::close();
		}
	}

	public static function getNews()
	{
		require_once __DIR__ . "/../classes/r.class.php";

		R::setup("mysql:host=localhost;dbname=cantina", "root", "");

		$news = R::findAll("news", "ORDER BY date DESC LIMIT 2");

		foreach ($news as $dado) {
			echo "<div class='news'>";
			echo "<h2>" . $dado->title . "</h2>";
			echo "<p>" . $dado->content . "</p>";
			echo "<p><em>Criado por " . $dado->author . " em " . $dado->date . "</em></p>";
			echo "</div>";
		}
	}
}
