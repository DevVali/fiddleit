<?php

function to_string($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function is_option($source, $array) {
  $needle = ['$', 'langs', '=', '[', '=>', ']', ';', ',', 'language', 'code', '"', 'Array', '(', ')', '>', '<', '0', '1', ];
  $haystack = print_r($array, true);
  
  $data = str_replace($needle, "", $haystack);
  $data = str_contains($data, $source);
  return $data;
}