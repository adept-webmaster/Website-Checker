<?php
  function getDateAndTime() {
    date_default_timezone_set('Europe/London');
    return date("h:ia d/m/y");
  }

  echo "<p>";
  echo "Last check: " . getDateAndTime();
  echo "</p>";
?>
