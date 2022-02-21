<?php
require_once 'dbconnect.php';

if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
   $id = (int)$_GET['id'];
   $query = "DELETE FROM classics WHERE id=$id";
   $res = mysqli_query($mysqli, $query);
   if (!$res) die (mysqli_error($mysqli));
  
   if (mysqli_affected_rows($mysqli) == 1) {
       echo "<h2>Запись с id = $id удалена</h2>";
   }
}
$query = "SELECT * FROM classics";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <p>
   <h2><?= $row['title']; ?> <a href="?del=ok&id=<?= $row['id']; ?>">уд.</a></h2>
   <?= $row['author']; ?><br>
   Category: <?= $row['type']; ?><br>
   Year: <?= $row['year']; ?><br>
   </p>
   <?php
}
