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
}
