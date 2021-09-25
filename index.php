<?php session_start();

// SETTINGS & FUNCTIONS
include("sprint/settings.php");
include("sprint/core/functions.php");
include("sprint/core/classes.php");

// COLLECT PARAMETERS
$page = (isset($_GET['page'])) ? $_GET['page'] : "index";
$param = (isset($_GET['param'])) ? $_GET['param'] : false;
$serve_content = (!in_array($page, $resource_blacklist)) ? true : false;

if ($serve_content)
{
  // FORCE HTTPS
  if($use_forced_https) {
    echo '
      <script>
      if (location.protocol !== "https:") {
        location.replace(`https:${location.href.substring(location.protocol.length)}`);
      }
      </script>
    ';
  }

  // OPEN DOCUMENT
  echo '<!DOCTYPE html><html lang="en"><head>
  <meta name="description" content="YouTube Radio. A website containing various YouTube music streams that play 24/7.">
  <meta charset="utf-8">
  <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
  <!-- SPRINT3.3 -->
  <link rel="apple-touch-icon" href="assets/logo.png">';

  // INCLUDE PRELOAD
  include("sprint/resource-preload.php");

  // INCLUDE PARTIALS
  if ($page=='home') {
    // include("sprint/partials/navbar.php");
  } else if ($page=='admin') {
    if (isset($_SESSION["loggedin"])) {
      // include("sprint/partials/admin_navbar.php");
    } else {
      // $page = '404';
    }
  }
}

// SERVE VIEW
if (isset($page) & file_exists("areas/" . $page . "/views/index.php"))
{
  include("areas/" . $page . "/views/index.php");
}
else if (isset($page) & file_exists("areas/" . $page . "/views/index.html"))
{
  include("areas/" . $page . "/views/index.html");
}
else
{
  include("areas/404/index.php");
}

if ($serve_content)
{
  // INCLUDE AFTERLOAD
  echo "<project-scripts>";
  include("sprint/resource-afterload.php");
  echo "</project-scripts>";

  // ADD PRODUCT ICON
  echo '<link rel="icon" type="image/png" href="assets/favicon.png"/>';
}
?>