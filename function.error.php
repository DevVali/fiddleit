<?php

set_error_handler("invalid_option", 2);

function invalid_option() {
  echo "<br>";
  echo "<strong>Warning</strong>: You provided a non-exsiting option.<br>";
  echo "<br>";
  echo "To fix this error, clear the browser cookies and open this application from a new tab.<br>";
  die();
}