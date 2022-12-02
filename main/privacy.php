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

$title = $text["privacy"];
require "/home/runner/fiddleit/require/header.php";
require "/home/runner/fiddleit/require/toolbar.php";
?>

<h1><?php echo $text["privacy"] ?></h1>
<p><?php if($lang != "en"){echo $text["notTranslated"];} ?></p>

<p>By using our application(s) and its services, you agree to the following Privacy policy.</p>
<p>Our application(s) collect only necessary information we require you to provide us, such as the inputed code you type in with © fiddleit (or the uploaded file, in case you use our "Load" function), preffered language and theme. We collect the information to ensure our services will work and for better user experience. Your data and information are collected through cookies and our servers. Our application(s) are hosted by outside vendors and you can find their privacy policies here: <a href="https://replit.com/site/privacy">Replit Privacy policy</a> and <a href="https://www.cloudflare.com/privacypolicy/">Cloudflare Privacy policy</a>. All the collected data will be deleted after 30 days from the last user visition of our application(s). This doesn't apply to web storage and you have to delete items and properties of web storage manually. We use Cloudflare analytics tool which collects few basic things about you, such as your IP address, type of device you're accessing our services from and date/time data We try to keep your data safest as they can be, but just think, nothing can be 100% safe. We use varient methods to protect your data and they are protected with an access-password. We also use SSL for better security. We never share, redistribute or sell information collected. Note that we may update our policies at anytime and if we'll do so, we'll inform our users via our official social media. If you have any question about our privacy statements, please <a href="mailto:fiddleitcode@gmail.com">email us</a>.</p>
<?php require "/home/runner/fiddleit/require/footer.php"; ?>