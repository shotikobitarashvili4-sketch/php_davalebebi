<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 7</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 7</h1>

    <h2>საქაღალდის შექმნა (POST)</h2>
    <form action="7.php" method="post">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="saxeli" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

    <hr>
    <h2>ელემენტების რაოდენობა (GET)</h2>
    <form action="7.php" method="get">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="folder" required>
        <br>
        <input class="btn" type="submit" value="დათვლა">
    </form>

<?php
$base = "folders";
if (!file_exists($base)) {
    mkdir($base);
}

if (isset($_POST['sheqmna'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_POST['saxeli']);
    $gza = $base . "/" . $saxeli;
    echo "<div class='msg'>";
    if ($saxeli == "") {
        echo "სახელი ცარიელია.";
    } else if (file_exists($gza)) {
        echo "საქაღალდე უკვე არსებობს: $saxeli";
    } else {
        mkdir($gza);
        echo "საქაღალდე შეიქმნა: $saxeli";
    }
    echo "</div>";
}

if (isset($_GET['folder'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_GET['folder']);
    $gza = $base . "/" . $saxeli;
    echo "<div class='msg'>";
    if (is_dir($gza)) {
        $items = scandir($gza);
        $raodenoba = 0;
        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                $raodenoba++;
            }
        }
        echo "საქაღალდეში ელემენტების რაოდენობა: $raodenoba";
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
