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

<h2>Gluo.xyz x Fiddleit</h2>
<p>

<b>Gluo.xyz</b> is the social media platform of the future.<br>
We don't need nor use your private data to make it awesome.<br><br>

We value your privacy more than others by only showing and storing the necessary information.<br>
We also strive to be easy on the eye, making it straightforward for our users to navigate and get used to Gluo.<br><br>

We hope you'll consider making an account and join us on our, mysterious and unique journey.<br>
<b> <a href="https://discord.gg/jAhwnYNTw8?event=1005499250479743117" >Join Gluo on Discord</a></b> <b><a href="https://gluo.xyz/" > Gluo's Website</a></b> 

</p>

<?php require "/home/runner/fiddleit/require/footer.php"; ?>