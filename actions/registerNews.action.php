<?php

require_once "../utils/news.util.php";
require_once "../classes/news.class.php";

$title = $_POST["title"];
$content = $_POST["content"];

$news = new News();
$news->title = $title;
$news->content = $content;

UtilNews::registerNews($news);
header("Location: ../index.php");
exit();
