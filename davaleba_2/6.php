<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 6</h1>

    <h2>საქაღალდე და ცარიელი ფაილი (POST)</h2>
    <form action="6.php" method="post">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="folder" required>
        <label>ფაილის სახელი:</label>
        <input type="text" name="faili" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>შიგთავსის ჩვენება (GET)</h2>
    <form action="6.php" method="get">
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
    $folder = str_replace(array("..", "/", "\\"), "", $_POST['folder']);
    $faili = str_replace(array("..", "/", "\\"), "", $_POST['faili']);
    $gza = $base . "/" . $folder;

    if ($folder != "" && $faili != "") {
        if (!file_exists($gza)) {
            mkdir($gza);
        }
        $fp = fopen($gza . "/" . $faili, "w");
        fclose($fp);
        echo "<div class='msg'>შეიქმნა საქაღალდე და ცარიელი ფაილი: $folder / $faili</div>";
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
