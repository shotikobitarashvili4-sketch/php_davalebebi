<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 9</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 9</h1>

    <h2>საქაღალდე და info.txt (POST)</h2>
    <form action="9.php" method="post">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="saxeli" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>შიგთავსის წაკითხვა (GET)</h2>
    <form action="9.php" method="get">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="folder" required>
        <br>
        <input class="btn" type="submit" value="წაკითხვა">
    </form>

<?php
$base = "folders";
if (!file_exists($base)) {
    mkdir($base);
}

if (isset($_POST['sheqmna'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_POST['saxeli']);
    $gza = $base . "/" . $saxeli;
    if ($saxeli != "") {
        if (!file_exists($gza)) {
            mkdir($gza);
        }
        $fp = fopen($gza . "/info.txt", "w");
        fwrite($fp, "ეს არის info.txt ფაილი საქაღალდეში: " . $saxeli);
        fclose($fp);
        echo "<div class='msg'>შეიქმნა საქაღალდე და ჩაიწერა info.txt</div>";
    }
}

if (isset($_GET['folder'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_GET['folder']);
    $gza = $base . "/" . $saxeli;
    if (is_dir($gza)) {
        $items = scandir($gza);
        $failebi = array();
        $sakagaldeebi = array();
        foreach ($items as $item) {
            if ($item == "." || $item == "..") {
                continue;
            }
            if (is_dir($gza . "/" . $item)) {
                $sakagaldeebi[] = $item;
            } else {
                $failebi[] = $item;
            }
        }
        echo "<h2>ფაილები</h2>";
        if (count($failebi) == 0) {
            echo "<p>ფაილები არ არის.</p>";
        } else {
            echo "<ul>";
            foreach ($failebi as $f) {
                echo "<li>$f</li>";
            }
            echo "</ul>";
        }
        echo "<h2>საქაღალდეები</h2>";
        if (count($sakagaldeebi) == 0) {
            echo "<p>საქაღალდეები არ არის.</p>";
        } else {
            echo "<ul>";
            foreach ($sakagaldeebi as $s) {
                echo "<li>$s</li>";
            }
            echo "</ul>";
        }
    } else {
        echo "<div class='msg'>საქაღალდე არ მოიძებნა.</div>";
    }
}
?>

    <p class="back"><a href="index.php">მენიუ</a></p>
</div>
</body>
</html>
