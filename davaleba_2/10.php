<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 10</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 10</h1>

    <h2>შიგთავსის ნახვა წაშლამდე (GET)</h2>
    <form action="10.php" method="get">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="folder" required>
        <br>
        <input class="btn" type="submit" value="ნახვა">
    </form>

    <hr>
    <h2>წაშლა თუ ცარიელია (POST)</h2>
    <form action="10.php" method="post">
        <label>წასაშლელი საქაღალდე:</label>
        <input type="text" name="saxeli" required>
        <br>
        <input class="btn" type="submit" name="washla" value="წაშლა">
    </form>

<?php
$base = "folders";
if (!file_exists($base)) {
    mkdir($base);
}

if (isset($_GET['folder'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_GET['folder']);
    $gza = $base . "/" . $saxeli;
    echo "<h2>შიგთავსი: $saxeli</h2>";
    if (is_dir($gza)) {
        $items = scandir($gza);
        $raodenoba = 0;
        echo "<ul>";
        foreach ($items as $item) {
            if ($item == "." || $item == "..") {
                continue;
            }
            $raodenoba++;
            echo "<li>$item</li>";
        }
        echo "</ul>";
        if ($raodenoba == 0) {
            echo "<p>საქაღალდე ცარიელია, შეიძლება წაიშალოს.</p>";
        } else {
            echo "<p>საქაღალდე ცარიელი არ არის.</p>";
        }
    } else {
        echo "<div class='msg'>საქაღალდე არ არსებობს.</div>";
    }
}

if (isset($_POST['washla'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_POST['saxeli']);
    $gza = $base . "/" . $saxeli;
    echo "<div class='msg'>";
    if (is_dir($gza)) {
        $items = scandir($gza);
        $raodenoba = count($items) - 2;
        if ($raodenoba == 0) {
            rmdir($gza);
            echo "საქაღალდე ცარიელი იყო და წაიშალა: $saxeli";
        } else {
            echo "საქაღალდე ცარიელი არ არის, წაშლა არ მოხდა.";
        }
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
