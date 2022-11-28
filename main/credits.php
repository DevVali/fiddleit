<?php
session_start();
$lang;
require "/home/runner/fiddleit/function.main.php";
require "/home/runner/fiddleit/langs.php";

if(!empty($_COOKIE["lang"]) && is_option($_COOKIE["lang"], $langs)){
  $lang = $_COOKIE["lang"];
}else{
  $lang = "en";
  setcookie("lang", $lang, time() + (86400 * 30), "/");
}

require "/home/runner/fiddleit/function.error.php";
require "/home/runner/fiddleit/lang/{$lang}.php";

$title = $text["credits"];
require "/home/runner/fiddleit/require.header.php";
require "/home/runner/fiddleit/require.toolbar.php";
?>

<h1><?php echo $text["credits"] ?></h1>
<p><?php if($lang != "en"){echo $text["notTranslated"];} ?></p>

<ul>
  <li>To <a href="https://github.com/devvali">DevVali</a> for contributing to Frontend and Backend of fiddleit</li>
  <li>To <a href="https://github.com/tenmajkl">Majkel</a> for contributing to Backend of fiddleit</li>
</ul>

<?php require "/home/runner/fiddleit/require.footer.php"; ?>