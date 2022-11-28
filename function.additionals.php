<?php

$disabled = ['require', 'require_once', 'include', 'include_once', 'eval', ];

function disabled($data) {
  global $disabled;
  $result = str_replace($disabled, 'DISABLED_FOR_SECURITY_REASONS', $data);
  return $result;
}