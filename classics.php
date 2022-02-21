<?php
require_once 'dbconnect.php';

$query = "SELECT * FROM classics";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <p>
       <h2><?= $row['title']; ?></h2>
       <?= $row['author']; ?><br>
       Category: <?= $row['type']; ?><br>
       Year: <?= $row['year']; ?><br>
   </p>
   <?php
}
