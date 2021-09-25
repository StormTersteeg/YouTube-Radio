<?php
// App settings
$execution_mode = 'strict'; // quiet - oblivious - strict
$resource_blacklist = ["controller"];
$use_resource_stacking = TRUE;
$use_forced_https = TRUE;

// Database settings
$database_model = 'local';
$database_credentials = array(
  'local' => array('localhost', 'root', ''),
  'production' => array('localhost', 'root', '')
);