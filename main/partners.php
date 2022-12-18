<?php
session_start();
$lang;
require "/home/runner/fiddleit/function/main.php";
require "/home/runner/fiddleit/langs.php";

if(!empty($_COOKIE["lang"]) && is_option($_COOKIE["lang"], $langs)){
  $lang = to_string($_COOKIE["lang"]);
}else{
  $lang = "en";
  setcookie("lang", $lang, time() + (86400 * 30), "/");
}

require "/home/runner/fiddleit/function/error.php";
require "/home/runner/fiddleit/lang/{$lang}.php";

$title = $text["partners"];
require "/home/runner/fiddleit/require/header.php";
require "/home/runner/fiddleit/require/toolbar.php";
?>

<h1><?php echo $text["partners"] ?></h1>
<a href="https://www.gluo.xyz"><img src="https://cdn.discordapp.com/attachments/889423777123938315/1053339769351983184/advertisement.png" alt="Advertisement" class="advertisement"></a>
<p><?php if($lang != "en"){echo $text["notTranslated"];} ?></p>

<p>Fiddleit's partners who helps us continue running.</p>

<h2>You can have your own name here!</h2>
<p>And your description! Become our first partner.</p>

<?php require "/home/runner/fiddleit/require/footer.php"; ?>