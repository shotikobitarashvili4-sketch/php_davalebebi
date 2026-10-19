<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 4</h1>

    <h2>მთავარი საქაღალდის შექმნა (POST)</h2>
    <form action="4.php" method="post">
        <label>მთავარი საქაღალდის სახელი:</label>
        <input type="text" name="saxeli" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>შიგთავსის ჩვენება (GET)</h2>
    <form action="4.php" method="get">
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
    $saxeli = str_replace(array("..", "/", "\\"), "", $_POST['saxeli']);
    $gza = $base . "/" . $saxeli;
    if ($saxeli != "" && !file_exists($gza)) {
        mkdir($gza);
        echo "<div class='msg'>მთავარი საქაღალდე შეიქმნა: $saxeli</div>";
    } else {
        echo "<div class='msg'>საქაღალდე უკვე არსებობს ან სახელი არასწორია.</div>";
    }
}

if (isset($_GET['folder'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_GET['folder']);
    $gza = $base . "/" . $saxeli;
    echo "<h2>შიგთავსი: $saxeli</h2>";
    if (is_dir($gza)) {
        $items = scandir($gza);
        echo "<table><tr><th>სახელი</th><th>ტიპი</th></tr>";
        foreach ($items as $item) {
            if ($item == "." || $item == "..") {
                continue;
            }
            $tipi = is_dir($gza . "/" . $item) ? "საქაღალდე" : "ფაილი";
            echo "<tr><td>$item</td><td>$tipi</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='msg'>საქაღალდე არ მოიძებნა.</div>";
    }
}
?>

    <p class="back"><a href="index.php">მენიუ</a></p>
</div>
</body>
</html>
