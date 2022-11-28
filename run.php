<?php
session_start();
$code = null;
if(isset($_SESSION["run"])){
  $code = $_SESSION["run"];
}

echo "<!-- Coded with Fiddleit: online code editor -->\r\n";
eval('?>'.$code);
echo "\r\n<!-- Coded with Fiddleit: online code editor -->";