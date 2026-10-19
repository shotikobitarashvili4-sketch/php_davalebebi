<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 2</h1>

    <h2>ახალი საქაღალდის შექმნა (POST)</h2>
    <form action="2.php" method="post">
        <label>ახალი საქაღალდის სახელი:</label>
        <input type="text" name="saxeli" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>არსებობის შემოწმება (GET)</h2>
    <form action="2.php" method="get">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="check" required>
        <br>
        <input class="btn" type="submit" value="შემოწმება">
    </form>

<?php
$base = "folders";
if (!file_exists($base)) {
    mkdir($base);
}

if (isset($_POST['sheqmna'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_POST['saxeli']);
    $gza = $base . "/" . $saxeli;
    if ($saxeli != "" && !file_exists($gza)) {
        mkdir($gza);
        echo "<div class='msg'>საქაღალდე შეიქმნა: $saxeli</div>";
    } else {
        echo "<div class='msg'>საქაღალდე ვერ შეიქმნა: $saxeli</div>";
    }
}

if (isset($_GET['check'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_GET['check']);
    $gza = $base . "/" . $saxeli;
    echo "<div class='msg'>";
    if (is_dir($gza)) {
        echo "საქაღალდე არსებობს სერვერზე: $saxeli";
    } else {
        echo "საქაღალდე არ არსებობს: $saxeli";
    }
    echo "</div>";
}
?>

    <p class="back"><a href="index.php">მენიუ</a></p>
</div>
</body>
</html>
