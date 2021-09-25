<?php

function sprintException($function, $message, $suggestion) {
  // HTML body of the error message
  $exception_body = "
    <div style='padding:10px;color:white;background:black'>
      <h4>Sprint Exception</h4>
      <p>$message</p>
      <div class='font-weight-bold'><bold>Offender</bold></div>
      <p>$function()</p>
      <div class='font-weight-bold'><bold>Suggestion</bold></div>
      <div>$suggestion</div>
    </div>
  ";

  // Act according to the execution_mode
  if ($GLOBALS['execution_mode']=='oblivious') {
    echo $exception_body;
  } else if ($GLOBALS['execution_mode']=='strict') {
    die($exception_body);
  }
}

function import($path) {
  if (file_exists($path)) {
    if ($GLOBALS['use_resource_stacking']==TRUE) {
      if (strpos($path, '.js') !== false) {
          echo "<script>" . file_get_contents($path) . "</script>";
      } else if (strpos($path, '.css') !== false) {
          echo "<style>" . file_get_contents($path) . "</style>";
      } else if (strpos($path, '.php') !== false) {
          include($path);
      }
    } else {
      if (strpos($path, '.js') !== false) {
          echo '<script src="' . $path . '"></script>';
      } else if (strpos($path, '.css') !== false) {
          echo '<link rel="stylesheet" type="text/css" href="' . $path . '">';
      } else if (strpos($path, '.php') !== false) {
          include($path);
      }
    }
  } else {
    sprintException("import", "Given path does not exist, is '$path' a local resource?", "Make sure '$path' is local, or disable \$resource_stacking in settings.php.");
  }
}