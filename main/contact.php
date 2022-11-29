<?php
session_start();
$lang;
require "/home/runner/fiddleit/function/main.php";
require "/home/runner/fiddleit/langs.php";

if(!empty($_COOKIE["lang"]) && is_option($_COOKIE["lang"], $langs)){
  $lang = to_string($_COOKIE["lang"]);
}else{
  $lang = "en";
  setcookie("lang", $lang, time() + (86400 * 30), "/", 1, 1);
}

require "/home/runner/fiddleit/function/error.php";
require "/home/runner/fiddleit/lang/{$lang}.php";

$title = $text["contact"];
require "/home/runner/fiddleit/require/header.php";
require "/home/runner/fiddleit/require/toolbar.php";
?>

<h1><?php echo $text["contact"] ?></h1>
<p><?php if($lang != "en"){echo $text["notTranslated"];} ?></p>

<ul>
  <li><a href="https://www.gluo.xyz/user/fiddleit">Gluo</a> to get notified on our latest updates</li>
  <li><a href="https://www.buymeacoffee.com/fiddleit">Buy Me a Coffee</a> because everything in I.T. requires coffee - <a href="https://networkchuck.coffee">networkchuck.coffee</a></li>
  <li><a href="https://discord.gg/dsTTyA7MuQ">Discord</a> for community help</li>
  <li><a href="https://github.com/DevVali/fiddleit">GitHub</a> for contributing, ideas and issues</li>
  <li><a href="mailto:fiddleitcode@gmail.com">E-mail</a> for questions, ideas and issues</li>
</ul>
<p><strong>If a vulnerability issue found, please <a href="mailto:fiddleitcode@gmail.com">email us</a>!</strong></p>

<?php require "/home/runner/fiddleit/require/footer.php"; ?>