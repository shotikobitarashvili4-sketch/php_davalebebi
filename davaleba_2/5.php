<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 5</h1>

    <h2>მთავარი და ქვესაქაღალდის შექმნა (POST)</h2>
    <form action="5.php" method="post">
        <label>მთავარი საქაღალდე:</label>
        <input type="text" name="mtavari" required>
        <label>ქვესაქაღალდე:</label>
        <input type="text" name="qve" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>მთავარი საქაღალდის შიგთავსი (GET)</h2>
    <form action="5.php" method="get">
        <label>მთავარი საქაღალდის სახელი:</label>
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
    $mtavari = str_replace(array("..", "/", "\\"), "", $_POST['mtavari']);
    $qve = str_replace(array("..", "/", "\\"), "", $_POST['qve']);
    $gza1 = $base . "/" . $mtavari;
    $gza2 = $gza1 . "/" . $qve;

    if ($mtavari != "" && $qve != "") {
        if (!file_exists($gza1)) {
            mkdir($gza1);
        }
        if (!file_exists($gza2)) {
            mkdir($gza2);
            echo "<div class='msg'>შეიქმნა: $mtavari / $qve</div>";
        } else {
            echo "<div class='msg'>ქვესაქაღალდე უკვე არსებობს.</div>";
        }
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
