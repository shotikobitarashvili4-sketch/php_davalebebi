<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 11</h1>

    <h2>საქაღალდე და ტექსტური ფაილები (POST)</h2>
    <form action="11.php" method="post">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="saxeli" required>
        <label>ფაილების რაოდენობა:</label>
        <input type="number" name="raodenoba" min="1" max="20" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>დანომრილი სია (GET)</h2>
    <form action="11.php" method="get">
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
    $n = $_POST['raodenoba'];
    $gza = $base . "/" . $saxeli;

    if ($saxeli != "" && $n > 0) {
        if (!file_exists($gza)) {
            mkdir($gza);
        }
        $i = 1;
        while ($i <= $n) {
            $faili = $gza . "/file" . $i . ".txt";
            $fp = fopen($faili, "w");
            fwrite($fp, "ფაილი ნომერი " . $i);
            fclose($fp);
            $i++;
        }
        echo "<div class='msg'>შეიქმნა საქაღალდე და $n ტექსტური ფაილი.</div>";
    }
}

if (isset($_GET['folder'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_GET['folder']);
    $gza = $base . "/" . $saxeli;
    if (is_dir($gza)) {
        $items = scandir($gza);
        echo "<h2>ელემენტები</h2>";
        echo "<ol>";
        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                echo "<li>$item</li>";
            }
        }
        echo "</ol>";
    } else {
        echo "<div class='msg'>საქაღალდე არ მოიძებნა.</div>";
    }
}
?>

    <p class="back"><a href="index.php">მენიუ</a></p>
</div>
</body>
</html>
