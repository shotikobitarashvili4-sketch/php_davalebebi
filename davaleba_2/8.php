<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 8</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 8</h1>

    <h2>ორი საქაღალდის შექმნა (POST)</h2>
    <form action="8.php" method="post">
        <label>პირველი საქაღალდე:</label>
        <input type="text" name="folder1" required>
        <label>მეორე საქაღალდე:</label>
        <input type="text" name="folder2" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>ერთ-ერთის შიგთავსი (GET)</h2>
    <form action="8.php" method="get">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="folder" required>
        <br>
        <input class="btn" type="submit" value="ჩვენება">
    </form>

<?php
$base = "folders";
if (!file_exists($base)) {
    mkdir($base);
}

if (isset($_POST['sheqmna'])) {
    $f1 = str_replace(array("..", "/", "\\"), "", $_POST['folder1']);
    $f2 = str_replace(array("..", "/", "\\"), "", $_POST['folder2']);

    if ($f1 != "" && !file_exists($base . "/" . $f1)) {
        mkdir($base . "/" . $f1);
    }
    if ($f2 != "" && !file_exists($base . "/" . $f2)) {
        mkdir($base . "/" . $f2);
    }
    echo "<div class='msg'>შეიქმნა საქაღალდეები: $f1 და $f2</div>";
}

if (isset($_GET['folder'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_GET['folder']);
    $gza = $base . "/" . $saxeli;

    if (is_dir($gza)) {
        echo "<h2>შიგთავსი: $saxeli</h2>";
        $items = scandir($gza);
        $i = 0;
        echo "<ul>";
        while ($i < count($items)) {
            $item = $items[$i];
            if ($item != "." && $item != "..") {
                if (is_dir($gza . "/" . $item)) {
                    echo "<li>საქაღალდე: $item</li>";
                } else {
                    echo "<li>ფაილი: $item</li>";
                }
            }
            $i++;
        }
        echo "</ul>";
    } else {
        echo "<div class='msg'>საქაღალდე არ არსებობს.</div>";
    }
}
?>

    <p class="back"><a href="index.php">მენიუ</a></p>
</div>
</body>
</html>
