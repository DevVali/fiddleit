<?php
session_start();
$lang;
$theme;
$code;
$default = "<?php\necho phpversion();";

require "/home/runner/fiddleit/function/additionals.php";
require "/home/runner/fiddleit/function/main.php";
require "/home/runner/fiddleit/langs.php";
require "/home/runner/fiddleit/themes.php";

if(!empty($_COOKIE["lang"]) && is_option($_COOKIE["lang"], $langs)){
  $lang = to_string($_COOKIE["lang"]);
}else{
  $lang = "en";
  setcookie("lang", $lang, time() + (86400 * 30), "/");
}
if(!empty($_GET["lang"]) && is_option($_GET["lang"], $langs)){
  $lang = to_string($_GET["lang"]);
  setcookie("lang", $lang, time() + (86400 * 30), "/");
}

if(!empty($_COOKIE["theme"]) && is_option($_COOKIE["theme"], $themes)){
  $theme = to_string($_COOKIE["theme"]);
}else{
  $theme = "twilight";
  setcookie("theme", $theme, time() + (86400 * 30), "/");
}
if(!empty($_GET["theme"]) && is_option($_GET["theme"], $themes)){
  $theme = to_string($_GET["theme"]);
  setcookie("theme", $theme, time() + (86400 * 30), "/");
}

if(isset($_POST["code"])){
  $code = disabled($_POST["code"]);
  $_SESSION["run"] = $code;
}

if(isset($_SESSION["run"])){
  $code = $_SESSION["run"];
}else{
  $code = $default;
}

require "/home/runner/fiddleit/function/error.php";
require "/home/runner/fiddleit/lang/{$lang}.php";

$title = $text["title"];
require "/home/runner/fiddleit/require/header.php";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism-<?php echo to_string($theme) ?>.min.css">

<ul class="toolbar">
  <li class="toolbar-item"><a class="toolbar-item" href="/index.php" style="font-size:18px">&nbsp;&nbsp;&nbsp;fiddleit</a></li>
  <li class="toolbar-item"><a class="toolbar-item"><button class="button-primary" id="load"><i class="fa-solid fa-cloud-arrow-up"></i> <?php echo $text["loadLabel"] ?></button></a></li>
  <li class="toolbar-item"><a class="toolbar-item"><button class="button-primary" id="open"><i class="fa-solid fa-folder-open"></i> <?php echo $text["openLabel"] ?></button></a></li>
  <li class="toolbar-item"><a class="toolbar-item"><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><textarea id="txtarea" name="code" hidden></textarea><button type="submit" class="button-success"><i class="fa-solid fa-play"></i> <?php echo $text["runLabel"];  ?></button></form></a></li>
  <li class="toolbar-item"><a class="toolbar-item"><button class="button-primary" id="save"><i class="fa-solid fa-floppy-disk"></i> <?php echo $text["saveLabel"] ?></button></a></li>
  <li class="toolbar-item"><a class="toolbar-item"><button class="button-primary" id="download"><i class="fa-solid fa-cloud-arrow-down"></i> <?php echo $text["downloadLabel"] ?></button></a></li>
  <li class="toolbar-item"><a class="toolbar-item"><button class="button-primary" id="copy"><i class="fa-solid fa-copy"></i> <?php echo $text["copyLabel"] ?></button></a></li>
  <li class="toolbar-item"><a class="toolbar-item"><select><option>PHP <?php echo phpversion() ?></option></select></a></li>
  <li class="toolbar-item"><a class="toolbar-item"><select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <?php foreach(  $themes as $option  ) : ?>
      <option value="/index.php?theme=<?php echo $option["theme"] ?>" <?php if($theme == $option["theme"]){echo "selected";} ?>><?php echo strtoupper($option["theme"]) ?></option>
    <?php endforeach ?>
  </select></a></li>
  <li class="toolbar-item"><a class="toolbar-item"><select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <?php foreach(  $langs as $option  ) : ?>
      <option value="/index.php?lang=<?php echo $option["code"] ?>" <?php if($lang == $option["code"]){echo "selected";} ?>><?php echo strtoupper($option["code"]) ?></option>
    <?php endforeach ?>
  </select></a></li>
</ul>
<div class="popup-screen">
  <div class="popup-box">
    <i class="fa-solid fa-xmark popup-close"></i>
    <h2><?php echo $text["loadDescr"] ?></h2>
    <input type="file" accept=".php" id="input-load">
  </div>
</div>
<pre><code class="language-php line-numbers" id="editor" style="outline:none" spellcheck="false" contenteditable><?php echo to_string($code) ?> </code></pre>

<?php if(isset($_SESSION["run"])){ ?>
  <a href="/run.php" target="_blank"><button class="button-primary" style="width:45%;float:right;"><i class="fa-solid fa-up-right-from-square"></i> <?php echo $text["newTabLabel"] ?></button></a>
  <style>.preview{background-color:white;color:black;height:600px;}</style>
<?php } ?>
<iframe src="/run.php" title="Code preview" class="preview"></iframe>

<script src="/src/app.js"></script>
<?php require "/home/runner/fiddleit/require/footer.php"; ?>
