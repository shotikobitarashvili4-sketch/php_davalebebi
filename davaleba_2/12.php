<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 12</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 12</h1>

    <h2>სტრუქტურის შექმნა (POST)</h2>
    <form action="12.php" method="post">
        <label>მთავარი საქაღალდე:</label>
        <input type="text" name="mtavari" required>
        <label>ქვესაქაღალდე:</label>
        <input type="text" name="qve" required>
        <label>ფაილის სახელი:</label>
        <input type="text" name="faili" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>შიგთავსის ჩვენება (GET)</h2>
    <form action="12.php" method="get">
        <label>მთავარი საქაღალდის სახელი:</label>
        <input type="text" name="folder" required>
        <br>
        <input class="btn" type="submit" value="ჩვენება">
    </form>

    <hr>
    <h2>წაშლა (POST)</h2>
    <form action="12.php" method="post">
        <label>წასაშლელი მთავარი საქაღალდე:</label>
        <input type="text" name="washla_saxeli" required>
        <br>
        <input class="btn" type="submit" name="washla" value="წაშლა">
    </form>

<?php
$base = "folders";
if (!file_exists($base)) {
    mkdir($base);
}

if (isset($_POST['sheqmna'])) {
    $mtavari = str_replace(array("..", "/", "\\"), "", $_POST['mtavari']);
    $qve = str_replace(array("..", "/", "\\"), "", $_POST['qve']);
    $faili = str_replace(array("..", "/", "\\"), "", $_POST['faili']);

    $gza1 = $base . "/" . $mtavari;
    $gza2 = $gza1 . "/" . $qve;

    if ($mtavari != "" && $qve != "" && $faili != "") {
        if (!file_exists($gza1)) {
            mkdir($gza1);
        }
        if (!file_exists($gza2)) {
            mkdir($gza2);
        }
        $fp = fopen($gza2 . "/" . $faili, "w");
        fwrite($fp, "ფაილი შეიქმნა ქვესაქაღალდეში.");
        fclose($fp);
        echo "<div class='msg'>შეიქმნა: $mtavari / $qve / $faili</div>";
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
            $tipi = is_dir($gza . "/" . $item) ? "ქვესაქაღალდე" : "ფაილი";
            echo "<tr><td>$item</td><td>$tipi</td></tr>";
            if (is_dir($gza . "/" . $item)) {
                $shignit = scandir($gza . "/" . $item);
                foreach ($shignit as $x) {
                    if ($x == "." || $x == "..") {
                        continue;
                    }
                    $t = is_dir($gza . "/" . $item . "/" . $x) ? "საქაღალდე" : "ფაილი";
                    echo "<tr><td>&nbsp;&nbsp;$item / $x</td><td>$t</td></tr>";
                }
            }
        }
        echo "</table>";
    } else {
        echo "<div class='msg'>საქაღალდე არ მოიძებნა.</div>";
    }
}

if (isset($_POST['washla'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_POST['washla_saxeli']);
    $gza = $base . "/" . $saxeli;
    echo "<div class='msg'>";
    if (is_dir($gza)) {
        $qveebi = scandir($gza);
        foreach ($qveebi as $q) {
            if ($q == "." || $q == "..") {
                continue;
            }
            $p = $gza . "/" . $q;
            if (is_dir($p)) {
                $shignit = scandir($p);
                foreach ($shignit as $x) {
                    if ($x == "." || $x == "..") {
                        continue;
                    }
                    if (is_file($p . "/" . $x)) {
                        unlink($p . "/" . $x);
                    }
                }
                rmdir($p);
            } else {
                unlink($p);
            }
        }
        rmdir($gza);
        echo "საქაღალდე წაიშალა: $saxeli";
    } else {
        echo "საქაღალდე არ არსებობს.";
    }
    echo "</div>";
}
?>

    <p class="back"><a href="index.php">მენიუ</a></p>
</div>
</body>
</html>
