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

if (!empty($_POST['submit']) && $_POST['submit'] == 'ADD') {

   $author = strip_tags($_POST['author']);
   $title = strip_tags($_POST['title']);
   $type = strip_tags($_POST['type']);
   $year = strip_tags($_POST['year']);
   $query = "INSERT INTO classics (author, title, type, year) VALUES ('$author', '$title', '$type', '$year')";
   $res = mysqli_query($mysqli, $query);
   if (!$res) die (mysqli_error($mysqli));

   if (mysqli_affected_rows($mysqli) == 1) {
       echo "<h2>Запись добавлена</h2>";
   }
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'UPDATE') {
    $id = (int)$_GET['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $type = $_POST['type'];
    $year = $_POST['year'];

    $query = "UPDATE classics SET 'title'=$id, 'author'=$author, 'type'=$type, 'year'=$year WHERE 'id'=$id";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    if (mysqli_affected_rows($mysqli) == 1) {
        echo "<h2>Запись с id = $id изменена</h2>";
    }
}

?>
    <h3>Добавить запись</h3>
    <form action="" method="post">
       <label>Author <input type="text" name="author"></label>
       <label>Title <input type="text" name="title"></label>
       <label>Category <input type="text" name="type"></label>
       <label>Year <input type="number" min="1000" max="<?php echo date('Y')?>" name="year"></label>
       <input type="submit" name="submit" value="ADD">
    </form>
<?php
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
   <form action="" method="post">
       <label>Author <input type="text" name="author" value="<?= $row['author']; ?>"></label>
       <label>Title <input type="text" name="title" value="<?= $row['title']; ?>"></label>
       <label>Category <input type="text" name="type" value="<?= $row['type']; ?>"></label>
       <label>Year <input type="number" min="1000" max="<?php echo date('Y')?>" name="year" value="<?= $row['year']; ?>"></label>
       <input type="submit" name="submit" value="UPDATE">
    </form>
   <?php
}
