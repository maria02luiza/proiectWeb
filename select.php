<?php
require 'connect.php';
global $link;

// Query de select
$sql = 'SELECT * FROM produse';
if ($result = mysqli_query($link, $sql)) {
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      echo $row['Nume'] . '<br>';
      echo $row['Pret'] . '<br>';
      echo $row['Stoc'] . '<br>';
    }
    // Eliberare rezultat
    mysqli_free_result($result);
  } else {
    echo 'No records matching your query were found.';
  }
} else {
  echo 'ERROR: Could not able to execute ' . $sql . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>